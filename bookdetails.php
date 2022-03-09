<?php
require_once 'functions.php';
// collecting data[id] from the query string;
$id=$_GET['id'];

$result="SELECT * FROM books NATURAL JOIN authors WhERE bookId=?";

if($stmt=$conn->prepare($result)){
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $row=$stmt->get_result();
    $data=$row->fetch_object();
    echo
    "<img class='picture'src='".stripslashes($data->picture) . "' width='' height='240'>"."<p>".stripslashes( $data->title) ."</p>". "<p>".stripslashes($data->edision )."</p>";

echo "<p>".stripslashes($data->firstname)." ". stripslashes($data->lastname);echo"</p>";
echo "<p>". stripslashes( $data->category)."</p>";
echo "<p>". stripslashes($data->released)."</p>"."<p>";
echo stripslashes($data->deskription)."</p>";

}