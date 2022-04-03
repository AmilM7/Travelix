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

    $departureTime = $_POST['departureTime'];
    $arrivalTime = $_POST['arrivalTime'];
    $company = $_POST['company'];
    $startPlace = $_POST['startPlace'];
    $endPlace = $_POST['endPlace'];
    $type = $_POST['type'];


    mysqli_query($conn, "insert into transport
                               (startPlace,endPlace,type,departureTime,arrivalTime,company)
                               values ('{$startPlace}','{$endPlace}','{$type}','{$departureTime}','{$arrivalTime}','{$company}')");




    header('Location: DashboardAdmin.php');
}
?>

<form action="" method="post" >
    <div class="wrapper">
        <fieldset>
            <legend>Add transport service</legend>

            <div>
                <label for="departureTime">Departure time</label>
                <input id="departureTime"  type="datetime-local" name="departureTime"  required>
            </div>
            <div>
                <label for="arrivalTime">Arrival time</label>
                <input id="arrivalTime"  type="date" name="arrivalTime"  required>
            </div>
            <div>
                <label for="startPlace">Start place</label>
                <input id="startPlace"  type="text" name="startPlace"  required>
            </div>
            <div>
                <label for="endPlace">End place</label>
                <input id="endPlace"  type="text" name="endPlace"  required>
            </div>
            <label for="type">Type</label>
            <select id="type" name="type">
                <option value="Bus">Bus</option>
                <option value="Train">Train</option>
                <option value="Airplane">Airplane</option>
            </select>

            <div>
                <label for="company">Company</label>
                <input id="company"  type="text" name="company"  required>
            </div>

            <button type="submit">Submit</button>

</form>

</body>
</html>
