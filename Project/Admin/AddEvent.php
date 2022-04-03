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

    $type = $_POST['type'];
    $place = $_POST['place'];
    $time = $_POST['time'];
    $tickets = $_POST['tickets'];
    $address = $_POST['address'];
    $name = $_POST['name'];





    $row = mysqli_query($conn, "insert into events
                                      (type,place,time,available_tickets,address,Name)
                                      values ('{$type}','{$place}','{$time}','{$tickets}','{$address}','{$name}')");

    header('Location: DashboardAdmin.php');
}

?>

<form action="" method="post" >
    <div class="wrapper">
        <fieldset>
            <legend>Add event</legend>
            <div>
                <label for="name">Name</label>
                <input id="name"  type="text" name="name" required>
            </div>

            <div>
                <label for="place">Place</label>
                <input id="place"  type="text" name="place"  required>
            </div>

            <div>
                <label for="type">Type</label>
                <input id="type"  type="text" name="type"  required>
            </div>

            <div>
                <label for="time">Time</label>
                <input id="time"  type="date" name="time" required>
            </div>

            <div>
                <label for="tickets">Available tickets</label>
                <input id="tickets"  type="number" name="tickets"  required>
            </div>

            <div>
                <label for="address">Address</label>
                <input id="address"  type="text" name="address"  required>
            </div>

            <button type="submit">Submit</button>

</form>

</body>
</html>
