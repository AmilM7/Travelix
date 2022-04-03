<?php
session_start();
if (!isset($_SESSION['logged_in']) or !isset($_SESSION['admin'])) {
    header('Location: FormLogIn.php');
    exit();
}