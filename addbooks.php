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
<div class="main">
<div class="semi-borderz">
<div class="sign-container">
             <h2>INSERT BOOK</h2>
<form method="post" enctype="multipart/form-data" >         
<pre class="borderz"> 
    <div class="sectionA">
            <input type="text" name="title" placeholder="title">
            <input type="text" name="edition" placeholder="edition">
            <input type="text" name="released" placeholder="year released">
            <input type="text" name="isbn" placeholder="isbn">
            <input type="text" name="category" placeholder="category">
        </div>
        <div class="sectionB">

            <textarea name="description" id="description"  cols="20" rows="10" placeholder="description"></textarea>
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
</pre>
</div>
  <div class="container books-container">
<div class="Allbooks">
    <h3>ALL BOOKS</h3>
    <table>
        <thead>
            <tr>
            <th>id</td>
            <th>isbn</td>
            <th>title</td>
            <th>edition</td>
            <th>realesed</td>
            <th>category</td>
            <th>image</td>
            </tr>
        </thead>
        <tbody>
            <tr>

            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</body>
</html>