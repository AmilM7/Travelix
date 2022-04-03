<?php
require ('../Include/isLoggedInAdmin.php');
require ('../Include/db.php');

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM catering_facilities where CF_ID='{$id}'");

header('Location: DashboardAdmin.php');