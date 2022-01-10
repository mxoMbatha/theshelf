<?php
require_once 'functions.php';


if(isset($_POST['uzer'])){
    $uzer=sanitizeString($_POST['uzer']);
    $result=queryMysql("SELECT * FROM uzers WHERE uzer='$uzer'");
if($result->num_rows)
echo "<span class='taken error-feedback'>&nbsp:&#x2718;" ."username taken</span>";
else
echo "<span class='valid-feedback'>&#x2714;" ." username available</span>";
}