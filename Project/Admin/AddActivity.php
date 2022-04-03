<?php

require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');

$id = $_GET['id'];
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
    $price = $_POST['price'];
    $description = $_POST['description'];
    $address = $_POST['address'];


    mysqli_query($conn, "insert into activity (name,price,description,address)
                                       values ('{$name}','{$price}','{$description}','{$address}')");


    $query = mysqli_query($conn, "select A_ID
                                        from activity
                                        where name = '{$name}'");


    $row = mysqli_fetch_assoc($query);
    mysqli_query($conn, "insert into rec_activities (Activity,Cities) values ('{$row['A_ID']}','{$id}')");
    header('Location: DashboardAdmin.php');
}

?>

<form action="" method="post" >
    <div class="wrapper">
        <fieldset>
            <legend>Add activity</legend>

            <div>
                <label for="name">Name</label>
                <input id="name"  type="text" name="name" required>
            </div>
            <div>
                <label for="price">Price</label>
                <input id="price"  type="number" name="price">
            </div>
            <div>
                <label for="description">Description</label>
                <input id="description"  type="text" name="description" required>
            </div>
            <div>
                <label for="address">Address</label>
                <input id="address"  type="text" name="address">
            </div>

            <button type="submit">Submit</button>

</form>

</body>
</html>
