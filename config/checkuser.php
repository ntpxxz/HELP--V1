<?php

include_once ('config/function.php'); //include functions
$check = new DB_CON;
$check->SessionCheck();
$check->UserType();
?>