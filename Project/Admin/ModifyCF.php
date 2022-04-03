<?php

require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');


$id = $_GET['id'];

$query = mysqli_query($conn, "select *
                                    from  catering_facilities
                                    where CF_ID='{$id}' ");
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

    $name = $_POST['name'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $breakfast = $_POST['breakfast'];


    $row = mysqli_query($conn, "update catering_facilities set name='{$name}', type='{$type}', address='{$address}',
                                      contact = '{$contact}', breakfast = '{$breakfast}'
                                        where CF_ID='{$id}'");

    header('Location: DashboardAdmin.php');
}

?>

<form action="" method="post" >
    <div class="wrapper">
        <fieldset>
            <legend>Modify catering facility</legend>
            <div>
                <label for="name">Name</label>
                <input id="name"  type="text" name="name"  value="<?= $row['name'] ?? '' ?>">
            </div>
            <div>
                <label for="type">Type</label>
                <input id="type"  type="text" name="type"  value="<?= $row['type'] ?? '' ?>">
            </div>
            <div>
                <label for="address">Address</label>
                <input id="address"  type="text" name="address"  value="<?= $row['address'] ?? '' ?>">
            </div>
            <div>
                <label for="contact">Contact</label>
                <input id="contact"  type="tel" name="contact"  value="<?= $row['contact'] ?? '' ?>">
            </div>
            <div>
                <label for="breakfast">Breakfast</label>
                <input id="breakfast"  type="number" name="breakfast"  value="<?= $row['breakfast'] ?? '' ?>">
            </div>

            <button type="submit">Submit</button>
        <div>
</form>

<a href="deleteCF.php?id=<?=$id?>">Delete catering facility</a>

</body>
</html>
