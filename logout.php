<?php

session_start();
$_SESSION['status'] = 0;
header('location: login/index.php');
