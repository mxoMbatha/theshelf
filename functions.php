<?php
$hn='localhost';
$db='shelfbased';
$un='shelfBased';
$pw='Intheshelf';
$appname='TheShelf';

$conn=new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error)die($conn->connect_error);
function createTable($name,$query){
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "table '$name' created already exists. <br>";
}
function queryMysql($query){
    global $conn;
    $result=$conn->query($query);
    if(!$result) die($conn->error);
    return $result;

}
function destroySession(){
    $_SESSION=array();
    if (session_id()!="" || isset($_COOKIE[session_name
    ()]))
    setcookie(session_name(), '' ,time()-2592000,'/');
    session_destroy();
}
function sanitizeString($var){
    global $conn;
    $var=strip_tags($var);
    $var=htmlentities($var);
    $var=stripslashes($var);
    return $conn->real_escape_string($var);
}
function showProfile($uzer){
    $result=queryMysql("SELECT uzer,firstname,lastname,dateOB,phone,email FROM uzers NATURAL JOIN uzerprofiles WHERE uzer ='$uzer'");
    if ($result->num_rows){
        $row=$result->fetch_array(MYSQLI_ASSOC);
        echo "<div class='profile'>".
        "<div class='profile-item'>".
         "<div class='profile-item'>".
        stripslashes($row['uzer'])."</div>".
        stripslashes($row['firstname']). " ".
        stripslashes($row['lastname'])."</div>".
         "<div class='profile-item'>".
        stripslashes($row['dateOB'])."</div>".
         "<div class='profile-item'>".
        stripslashes($row['phone'])."</div>".
         "<div class='profile-item'>".
        stripslashes($row['email'])."</div>".
        "</div>";
    }
}
?>