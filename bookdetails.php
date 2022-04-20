<?php
require_once 'common.php';

require_once 'functions.php';
?>

<head>
<title><?php $appname ?>Book-details</title>
</head>
<body class="dflex flex flex-column h-100" >
    <div class="container">    <?php
// collecting data[id] from the query string;
$id=$_GET['id'];

$result="SELECT * FROM books NATURAL JOIN authors WhERE bookId=?";

if($stmt=$conn->prepare($result)){
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $row=$stmt->get_result();
    $data=$row->fetch_object();
    echo
    "<div class='book-details'>".
    "<img class='picture'src='".stripslashes($data->picture) . "' width='' height='240'>"."<p>".stripslashes( $data->title) ."</p>". "<p>".stripslashes($data->edision )."</p>";

echo "<p>".stripslashes($data->firstname)." ". stripslashes($data->lastname);echo"</p>";
echo "<p>". stripslashes( $data->category)."</p>";
echo "<p>". stripslashes($data->released)."</p>"."<p>";
echo stripslashes($data->deskription)."</p></div>";

}
?>
</div>
<div class="p-5 newsletter">
       <div class="container">
           <div class="d-md-flex justify-content-betwen align-items-center">
            <p class="mb-3 mb-md-0">Subscribe to our newsletter</p>
            <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter email">
          <button class="btn btn-lg btn-dark subscribe" id="#subscribe" type="submit">Send Email</button>
        </div>
            </div>
           </div>
</div>

<footer class=" py-3 p-5 position-relative" >
<div class="container-xl">
<div class="row mb-3">
    <div class="col-md-8 themed-grid-col">

       <div class="pb-3 social">
            <h3>Connect with <?php echo "<a class='logolink' href='index.php'> $appname </a>"?></h3>
        <ul>
          <li><a href="#email">email</a></li>
          <li><a href="#facebook">facebook</a></li>
          <li><a href="#instagram">instagram</a></li>
          <li><a href="#twitter">twitter</a></li>
        </ul> 
        </div>
    <div class="row">
          

            <div class="col-md-6 themed-grid-col foot">
            <p>Copyright &copy; <span id="yearnow"></span>
             <span><a class='logolink' href="index.php"><?php echo $appname ?></a> </span>
                All Right Reserved.  |  
             <span> <a href="Trems">Terms & Conditions</a> |  <a href="Privacy"> Privacy</a></span> </p>
            </div>
    </div>
</div>
     <div class="col-md-4 themed-grid-column  left-footer"> 
        <div class="logo"><h4><a  class='logolink' href="index.php"><?php echo $appname ?></a></h4></div>
        <p>Read books</p>
               <div class="links">
      <ul >
          <li><a class="" href="#eLibrary">eLibrary</a></li>
          <li><a href="#About">About</a></li>
          <li><a href="#support">Support</a></li>
          <li><a href="#contact">Contact</a></li>
      </ul>
        </div>
    </div>   
</div>
</div>
</div>
</footer>
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
<script src="query.js"></script>
<script src="jquery-3.6.0.min.js"></script>
 </body>
 </html>


