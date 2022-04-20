<?php
$hn='localhost';
$db='shelfbased';
$un='shelfBased';
$pw='lonerzBlvd';
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
function getBooks(){
    $result=queryMysql("SELECT bookId,isbn,title,category,edision,released,deskription,picture,firstname,lastname FROM books NATURAL JOIN authors WHERE authors.bookId=bookId ");

while($data=mysqli_fetch_array($result)){
    echo "
<div class='kards'>".
"<img class='picture'src='";
echo $data['picture']; echo "' width='90' height='120'>";
echo "<p>";echo stripslashes( $data['title']);echo"</p>";
echo "<p>";echo stripslashes($data['edision']);echo"</p>";
echo "<p>";echo stripslashes($data['firstname'])." ". stripslashes($data['lastname']);echo"</p>";
echo "<p>";echo stripslashes( $data['category']);echo"</p>";
echo "<p>";echo stripslashes($data['released']);echo"</p>"."<div class='cart-buttons'> <a href='#' class='cart-button display-none'> cart</a>"."<a href='bookdetails.php?"."id=";echo stripslashes($data['bookId']);echo"'class='cart-button'> preview</a></div></div>";
}
}
// logout
function logOut(){
    if (isset($_SESSION['uzer'])){
        destroySession();
        
        echo "<p class='out'>You have been logged out. Please 
<a href='index.php'>click here</a> to refresh the screen.</p>";
}
else 
echo "
<div class='main'><br>" .
"You cannot log out because you are not logged in";
}

function displayModal(){
    echo <<<_END
        <div class="modal fade" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title text-align-center" id="staticBackdropLiveLabel">Logout</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <p class='text-align-center modal-p'>Are you sure you wanna logout ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn button-out">
                            <a class="color-white" href="logout.php">Logout</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    _END;
}
 ?>
