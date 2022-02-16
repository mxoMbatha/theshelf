<?php
session_start();
require_once 'functions.php';
$userString='Account';
if (isset($_SESSION['uzer']))
{
    $uzer =$_SESSION['uzer'];
    $loggedin=TRUE;
    $userString=$uzer;

}
else $loggedin=FALSE;
?>