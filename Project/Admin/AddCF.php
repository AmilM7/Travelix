<?php

require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');

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
    <title>Add</title>
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
    $country = $_POST['country'];
    $breakfast = $_POST['breakfast'];

    mysqli_query($conn, "insert into catering_facilities
                                (name,type,address,contact,country,breakfast)
                               values ('{$name}','{$type}','{$address}','{$contact}','{$country}','{$breakfast}')");




    header('Location: DashboardAdmin.php');
}

?>

<form action="" method="post" >
    <div class="wrapper">
        <fieldset>
            <legend>Add catering facility</legend>
            <div>
                <label for="name">Name</label>
                <input id="name"  type="text" name="name"  required>
            </div>
            <div>
                <label for="type">Type</label>
                <input id="type"  type="text" name="type"  required>
            </div>
            <div>
                <label for="address">Address</label>
                <input id="address"  type="text" name="address"  required>
            </div>
            <div>
                <label for="contact">Contact</label>
                <input id="contact"  type="number" name="contact"  required>
            </div>
            <div>
                <label for="country">County</label>
                <input id="country"  type="text" name="country"  required>
            </div>
            <div>
                <label for="breakfast">Breakfast</label>
                <input id="breakfast"  type="number" name="breakfast" placeholder="Type 1 if yes and 0 if no" required>
            </div>

            <button type="submit">Submit</button>

</form>

</body>
</html>

