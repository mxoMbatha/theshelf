<?php
require_once 'functions.php';
if(isset($_POST['search'])){
    $title=sanitizeString($_POST['search']);
    $result=queryMysql("SELECT isbn,title,category,edision,released,deskription,picture,firstname,lastname FROM books NATURAL JOIN authors WHERE books.title LIKE '%$title%' OR books.category LIKE '%$title%' OR books.edision LIKE '%$title%' OR authors.firstname LIKE '%$title%' OR authors.lastname LIKE '%$title%'");
    
    while($data=mysqli_fetch_array($result)){
    echo "
<div class='kards'>".
"<img class='picture'src='";
echo $data['picture']; echo "' width='90' height='120'>";
echo "<p>";echo stripslashes( $data['title']);echo"</p>";
echo "<p>";echo stripslashes($data['edision']);echo"</p>";
echo "<p>";echo stripslashes($data['firstname'])." ". stripslashes($data['lastname']);echo"</p>";
echo "<p>";echo stripslashes( $data['category']);echo"</p>";
echo "<p>";echo stripslashes($data['released']);echo"</p>"."<div class='cart-buttons'> <a href='#' class='cart-button display-none'> cart</a>"."<a href='#' class='cart-button'> preview</a></div></div>";
}

}
else
echo "<p>Opps! sorry, no results found</p>";
?>