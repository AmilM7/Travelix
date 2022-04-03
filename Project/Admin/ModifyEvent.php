<?php

require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');

$id = $_GET['id'];
$query = mysqli_query($conn, "     select *
                                        from events
                                        where E_ID='{$id}' ");
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

    $place = $_POST['place'];
    $time = $_POST['time'];
    $tickets = $_POST['tickets'];
    $address = $_POST['address'];
    $row = mysqli_query($conn, "update events set place='{$place}', time='{$time}', available_tickets='{$tickets}', address = '{$address}'
                                        where E_ID='{$id}'");
    header('Location: DashboardAdmin.php');
}

?>

<form action="" method="post" >
    <div class="wrapper">
        <fieldset>
            <legend>Modify event</legend>

            <div>
                <label for="place">Place</label>
                <input id="place"  type="text" name="place"  value="<?= $row['place'] ?? '' ?>">
            </div>
            <div>
                <label for="time">Time</label>
                <input id="time"  type="date" name="time"  value="<?= $row['time'] ?? '' ?>">
            </div>
            <div>
                <label for="tickets">Available tickets</label>
                <input id="tickets"  type="number" name="tickets"  value="<?= $row['available_tickets'] ?? '' ?>">
            </div>
            <div>
                <label for="address">Address</label>
                <input id="address"  type="text" name="address"  value="<?= $row['address'] ?? '' ?>">
            </div>

            <button type="submit">Submit</button>
    <div>

</form>

<a href="deleteEvent.php?id=<?=$id?>">Delete event</a>

</body>
</html>
