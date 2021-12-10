<?php

require_once('config/constants.php');

$con = mysqli_connect(LOCALHOST,USERNAME,PASSWORD) or die(mysqli_error());
$db_select= mysqli_select_db($con, DBNAME) or die(mysqli_error($con));

?>