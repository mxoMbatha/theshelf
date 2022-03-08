<?php
require_once 'common.php';

if(isset($_POST['submit'])){
    $varA=rand(1111,9999);
    $varB=rand(1111,9999);
    $varC=$varA.$varB;
    $varC=md5($varC);
    $imageName=$_FILES["picture"]["name"];
    $imageDir="./imageshelf/".$varC.$imageName;
    $imageDirDB="imageshelf/".$varC.$imageName;

    move_uploaded_file($_FILES["picture"]["tmp_name"],$imageDir);
    
  $result=queryMysql("INSERT INTO books (bookId, isbn,title,edision,category,released,deskription, picture) VALUES (NULL,'$_POST[isbn]','$_POST[title]','$_POST[edition]','$_POST[category]','$_POST[released]','$_POST[description]','$imageDirDB')");

    if ($result){
        echo '<script type="text/javascript"> alert("inserted successfully");</script>'; 
    }
    else {
        echo '<script type="text/javascript"> alert("error inserting this record");</script>';
    }
}
?>
<div class="">
<div class="">
             <h2 class="text-align-center">INSERT BOOK</h2>
             <div class="borderz">

                <form method="post" enctype="multipart/form-data" >
          
    <div class="sectionA">
            <input type="text" name="title" placeholder="title">
            <input type="text" name="edition" placeholder="edition">
            <input type="text" name="released" placeholder="year released">
            <input type="text" name="isbn" placeholder="isbn">
            <input type="text" name="category" placeholder="category">
        </div>
        <div class="sectionB">

            <textarea name="description" id="description"  cols="20" rows="6" placeholder="description"></textarea>
          <!-- <select name="category" id="category">
           <option disabled selected>select category
          </option> -->
       <?php
        //    $catSelect=mysqli_query($conn,"SELECT category FROM books ");
        //    while ($data = mysqli_fetch_array($catSelect)) {
        //        echo "<option value='" .$data['category'] ."'>" .$data['category'] . "</option>";
        //    }
        //    
        //    </select>
       //    ?>
  <input type="file" name="picture" Required>
                      <input type="submit" id="submit" value="INSERT" name="submit">
                      </div>
                      </div>
 </div>
<div class="">
<div class="Allbooks">
    <h3 class="text-align-center">ALL BOOKS</h3>
    <table class="myTable">
        <thead>
            <tr>
            <th>id</th>
            <th>isbn</th>
            <th>title</th>
            <th>category</th>
            <th>edition</th>
            <th>realesed</th>
            <th>desc</th>
            <th>image</th>
            </tr>

        </thead>
        <tbody>
               <?php
            $result=queryMysql("SELECT bookId,isbn,title,category,edision,released,deskription,picture FROM books");

            while($data=mysqli_fetch_array($result)){
            echo
            " <tr class='table-data'>". "<td>".$data['bookId']."</td>";
            echo"<td>".stripslashes($data['isbn']) ."</td>";
            echo "<td>".stripslashes($data['title'])."</td>";
            echo "<td>".stripslashes($data['edision'])."</td>";
            echo "<td>".stripslashes($data['category'])."</td>";
            echo "<td>".stripslashes($data['released'])."</td>"
            ;echo "<td>".stripslashes($data['deskription'])."</td>";
            echo "<td>"."<img class='picture'src='";
            echo $data['picture'];
            echo "' width='50' height='60'>";
            echo "</td>"." </tr>"."<br>";
            }
            ?>
           
        </tbody>
    </table>
</div>
</div>
</div>
<script src="dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>