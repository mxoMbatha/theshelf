<?php
session_start();
echo <<<_END
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="styles.css">
      <link href="dist/css/bootstrap.min.css" rel="stylesheet">
      <script src='jquery-3.6.0.min.js'></script>
</head>
_END;
require_once 'functions.php';
$userString='Account';
if (isset($_SESSION['uzer']))
{
    $uzer =$_SESSION['uzer'];
    $loggedin=TRUE;
    $userString=$uzer;

}
else $loggedin=FALSE;

if($loggedin)
echo <<<_END
<nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark">
 <div class="container-fluid">
 <a class="logo " href="index.php">$appname</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


 <div class="collapse navbar-collapse justify-content-center" id="navmenu">
 <ul class="navbar-nav">
     <li class="nav-item">
     <a class="nav-link" href="#library">library</a>
      </li>
     <li class="nav-item">
     <a class="nav-link" href="#Shop">shop</a></li>
     <li class="nav-item"> 
     <a class="nav-link" href="#community">community</a></li>
     <li class="nav-item">
     <a class="nav-link" href="account.php">$userString</a>
     </li>
 </ul>
</div>
 
    </div>
  </nav>
 
_END;
else
echo <<<_END
<nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark">
 <div class="container-fluid">
 <a class="logo " href="index.php">$appname</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


 <div class="collapse navbar-collapse justify-content-center" id="navmenu">
 <ul class="navbar-nav">
     <li class="nav-item">
     <a class="nav-link" href="#library">library</a>
      </li>
     <li class="nav-item">
     <a class="nav-link" href="#Shop">shop</a></li>
     <li class="nav-item"> 
     <a class="nav-link" href="#community">community</a></li>
     <li class="nav-item">
     <a class="nav-link" href="account.php">Account</a>
     </li>
 </ul>
</div>
 
    </div>
  </nav>
_END;
?>