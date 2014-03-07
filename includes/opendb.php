<?php

$link = mysqli_connect($hostname, $username, $password, $dbname);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected to database successfully';
mysqli_select_db($link,$dbname);

?>

