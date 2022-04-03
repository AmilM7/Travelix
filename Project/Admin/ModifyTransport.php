<?php

require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');


$id = $_GET['id'];

$query = mysqli_query($conn, "select *
                                    from transport
                                     where T_ID='{$id}' ");
$row = mysqli_fetch_assoc($query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Header/Header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <title>Modifications</title>
    <link rel="stylesheet" href="../FormsSignUp.css">
</head>
<body>
<?php
include '../Header/HeaderAdmin.php';

if ($_POST) {
    $departureTime = $_POST['departureTime'];
    $arrivalTime = $_POST['arrivalTime'];
    $company = $_POST['company'];

    $row = mysqli_query($conn, "update transport set departureTime='{$departureTime}', arrivalTime='{$arrivalTime}', company='{$company}'
                                        where T_ID='{$id}'");
    header('Location: DashboardAdmin.php');

}


?>



<form action="" method="post" >
    <div class="wrapper">
        <fieldset>
            <legend>Modify transport service</legend>

            <div>
                <label for="departureTime">Departure time</label>
                <input id="departureTime"  type="datetime-local" name="departureTime"  value="<?= date('Y-m-d\TH:i', strtotime($row['departureTime'] ?? '')) ?>">
            </div>
            <div>
                <label for="arrivalTime">Arrival time</label>
                <input id="arrivalTime"  type="date" name="arrivalTime"  value="<?= $row['arrivalTime'] ?? '' ?>">
            </div>
            <div>
                <label for="company">Company</label>
                <input id="company"  type="text" name="company"  value="<?= $row['company'] ?? '' ?>">
            </div>

    <button type="submit">Submit</button>
    <div>
</form>
<a href="deleteTransport.php?id=<?=$id ?>" class="hrefZadnji">Delete transport service</a>

</body>
</html>