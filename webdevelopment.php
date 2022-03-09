<?php
require_once 'functions.php';
$web='web development';
$result=queryMysql("SELECT isbn,title,category,edision,released,deskription,picture,firstname,lastname FROM books NATURAL JOIN authors WHERE books.category='$web'");

while ($data=mysqli_fetch_array($result)) {
        echo "<div class='kards'>".
"<img class='picture'src='";
echo $data['picture']; echo "' width='90' height='120'>";
echo "<p>";echo stripslashes( $data['title']);echo"</p>";
echo "<p>";echo stripslashes($data['edision']);echo"</p>";
echo "<p>";echo stripslashes($data['firstname'])." ". stripslashes($data['lastname']);echo"</p>";
echo "<p>";echo stripslashes( $data['category']);echo"</p>";
echo "<p>";echo stripslashes($data['released']);echo"</p>"."<div class='cart-buttons'> <a href='#' class='cart-button display-none'> cart</a>"."<a href='bookdetails.php?"."id=";echo stripslashes($data['bookId']);echo"' class='cart-button'> preview</a></div>";
}
