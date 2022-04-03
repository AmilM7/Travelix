<?php

require ('Include/isLoggedIn.php');
require ('Include/db.php');

if($_GET['id1'] == null || $_GET['idEvent'] == null) {
    header('Location: MainUserPage.php');
    exit();
}

$id = $_GET['id1'];
$idEvent = $_GET['idEvent'];
$idUser = $_SESSION['user_id'];

$query = mysqli_query($conn, "select con.C_ID
                                    from contracts con, arrangement ar, users us
                                    where us.U_ID=con.user and con.arrangement=ar.Ar_ID and con.arrangement = '{$id}' and con.user = '{$idUser}';");

$row = mysqli_fetch_assoc($query);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Header/Header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <title>Successfully Booked</title>
    <link href="BookedPage.css" rel="stylesheet">
</head>
<body>
<?php include 'Header/Header2.php';
if(mysqli_num_rows($query)==0) {
    mysqli_query($conn, "insert into contracts (user, arrangement,Date) values ('{$idUser}','{$id}',CURDATE())");
    mysqli_query($conn, "update events set available_tickets = available_tickets-1
                            where E_ID = '{$idEvent}'");

    echo '<h1>You have successfully booked arrangement, thank You for your trust!</h1>';
}
else   echo '<h1>You have already booked this arrangement</h1>';
?>

</body>
</html>
