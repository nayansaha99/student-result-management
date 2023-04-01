<?php

$link = mysqli_connect('localhost','root','test','srms');
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

