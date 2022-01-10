<?php

require_once 'common.php'
?>
<head>
    <title><?php echo $appname ?>: Account</title>
</head>
 <body class="dflex flex flex-column h-100" >
   <main class="main container">
  <?php
  if (!$loggedin) die();
  echo "<div class='account-heading top-heading'><h3>Welcome to $appname  </h3> </div>";

$result=queryMysql("SELECT * FROM uzerprofiles WHERE uzer='$uzer'");

// $error=$firstName=$lastName=$phone=$dateofbirth="";
if (isset($_POST['firstname'])&&
 isset($_POST['lastname'])&&
 isset($_POST['phone'])&&
 isset($_POST['dateOB'])
 )
{
  $firstName=sanitizeString($_POST['firstname']);
  $lastName=sanitizeString($_POST['lastname']);
  $phone=sanitizeString($_POST['phone']);
  $dateofbirth=sanitizeString($_POST['dateOB']);

// if($firstName=="" ||$lastName=="" || $phone==""  || $dateofbirth=="")
// $error="<p class='error-feedback'> Please enter complete details</p><br>";


  if ($result->num_rows)
   queryMysql("UPDATE uzerprofiles SET firstname='$firstName',lastname='$lastName',
   phone='$phone',dateOB='$dateofbirth'
   WHERE uzer='$uzer' ");
   else queryMysql("INSERT INTO uzerprofiles VALUES('$uzer','$firstName','$lastName','$phone','$dateofbirth')")
;}
else {
  if ($result->num_rows){
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $firstName=stripslashes($row['firstname']);
    $lastName=stripslashes($row['lastname']);
    $phone=stripslashes($row['phone']);
    $dateofbirth=stripslashes($row['dateOB']);
  }
  else $firstName=$lastName=$phone=$dateofbirth="";
}
$firstName=stripslashes(preg_replace('/\s\s+/',' ', $firstName));
$lastName=stripslashes(preg_replace('/\s\s+/',' ', $lastName));
$phone=stripslashes(preg_replace('/\s\s+/',' ', $phone));
showProfile($uzer);
echo <<<_END
<div class="books"><h3>Books</h3>

</div>
<div class=""><h5 class=""> manage your account</h5> </div>
<div class="tab-list">
  <div data-id='tab1' class='tab active'>Set Profile</div>
<div data-id='tab2' class='tab '>  Bank Account</div>
<div data-id='tab3' class='tab '>Account Deactivation</div>    
</div>

<div class="content-panels">
 <div class="tab-panel" id="tab1">
  <div class="register" id="register">
  <form action="account.php" method="post" enctype="multipart/form-data">
    <label for="validationServer01" class="form-label">First name</label>
   <input type="text" id="validationServer01" name="firstname" value="$firstName" required>
    <label for="validationServer01" class="form-label">Lastname</label>
   <input type="text" id="validationServer01" name="lastname" value="$lastName" required>
   <label class="form-label">Phone</label>
   <input type="text" id="validationServer01" name="phone"  value="$phone" required>
   <label class="form-label">Date of birth</label>
   <input type="date" id="validationServer01" name="dateOB" value="$dateofbirth" required>
   <input type="submit" value="save" name="saveprofile">
  </form>
  </div>
  <div class="tab-panel hidden" id="tab2">
  <h3>content 2</h3>
  </div>
  <div class="tab-panel hidden" id="tab3">
  <h3>content 3</h3>
  </div>
_END;
 ?>


</div>
</main>  
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
 </body>
 </html>
