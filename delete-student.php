<?php
include_once 'db-config.php';
$id = $_GET['id'];

mysqli_query($link,"delete from students_results where id=$id");
header('location: student-result.php');
