<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="styles.css">
      <link href="dist/css/bootstrap.min.css" rel="stylesheet">
      <script src='jquery-3.6.0.min.js'></script>
      <?php
require_once 'sessions.php';
?>  
    <title><?php echo $appname ?>:Sign Up</title>
  
</head>
 
<body>
    <?php
$error=$uzer=$pass=$email="";

if(isset($_SESSION['uzer'])) destroySession();
if (isset($_POST['uzer'])){
$uzer=sanitizeString($_POST['uzer']);
$email=sanitizeString($_POST['email']);
$pass=sanitizeString($_POST['pass']);
if($uzer=="" ||$email==""  || $pass=="")
$error="<p class='error-feedback'> Please enter complete details</p><br>";

else {
    $result=queryMysql("SELECT * FROM  uzers WHERE uzer='$uzer' ");
    if ($result->num_rows)
    $error="<p class='error-feedback'>username already exist</p> <br>";

else{
      queryMysql("INSERT INTO uzers VALUES('$uzer','$email','$pass')");die
      ("<div><h3 class=top-heading >Welcome to $appname </h3>
       <h5>your account is succesfully created <a href='#' id='sign-again'> click here to sign in<a/> </h5>  <br>
      </div>
      <div id='letIn'>
      <script>
     $('#sign-again').click(function (e) {
    e.preventDefault();
    $.get('login.php', function (data) {
        $('#letIn').html(data);
    })
    $('#letIn').fadeTo('slow');
})
      </script>
      </div>")
      ;
     }
  }
}
echo <<<_END
<main class="main">
<div class="sign-up">
<h5 class="top-heading">Please enter your details to sign up </h5>
<div class="sign-container">
   <h3 class="logolink">$appname</h3>
<form action="signUP.php" method="post">
<input placeholder="Username" type="text" maxlegnth="16" name="uzer" value="$uzer"onBlur="checkUser(this)">
<span id="feedback"></span>
<input type="text" maxlegnth="16" placeholder="Email" name="email" value="$email">
<input type="password" maxlegnth='16' name="pass" value="$pass" placeholder="Password">
<input class="login-button" type="submit" name="sigup" value="Sign Up" >
</form>
_END
?>
</div>
</div> 

<div class="register" id="register">
  <form action="" method="post"></form>


</div>
</main>  

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




<script src="main.js"></script>
<script src="query.js"></script>
</body>
</html>


