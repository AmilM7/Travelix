<?php
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    exit('Error connecting to the DB server'); }