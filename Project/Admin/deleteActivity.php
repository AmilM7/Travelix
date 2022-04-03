<?php
require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM activity where A_ID='{$id}'");

header('Location: DashboardAdmin.php');
