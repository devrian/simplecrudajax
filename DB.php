<?php

$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'ajax_db';

$link = mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_error());

$_SESSION['user'] = 1;