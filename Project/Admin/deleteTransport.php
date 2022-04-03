<?php
require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM transport where T_ID='{$id}'");

header('Location: DashboardAdmin.php');