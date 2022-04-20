
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
require_once 'sessions.php'
?>
    <title><?php echo $appname ?>:Sign In</title>
</head>
<body class="dflex flex flex-column h-100  ">
      <?php
   $error=$uzer=$pass="";
     if (isset($_POST['uzer'])){
       $uzer=sanitizeString($_POST['uzer']);
       $pass=sanitizeString($_POST['pass']);
       if($uzer==""||$pass=="")
       $error="<p class='error-feedback'>Please complete your details </p> <br>";
       else{
           $result=queryMysql("SELECT uzer,pass FROM uzers WHERE uzer='$uzer' AND pass='$pass'");
           if($result->num_rows==0){
               $error="<span class='error-feedback'>Username /Password invalid</span><br>";
            }
           else{
               $_SESSION['uzer']=$uzer;
               $_SESSION['pass']=$pass;
               header('location:index.php');
               die ("
               <div class='main'>
      <div class='confirmation-php'>

      <h3 class=top-heading >welcome to $appname  $uzer</h3>
        <p class='successful'>you've been succesfully logged in</p>
       <br>
       <div class= 'centre-content'>
        
       <div class='centre-links in'>
        <p class='continue'>
        <a href='account.php' id='continue'>account set-up</a>
        </p>
        <p class='backTo'>
        <a href='Index.php' id='skip'>home<a/>
        </p>
        <p class='toBooks'>
        <a href='books.php' id='toBooks'>books</a>
        </p>
         </div>
         </div>
         </div>
      </div>" );
           }
       }
   }
   echo <<<_END
   <main class=" main">

   <div class="form-signin log-In"> 
     <h3 class="top-heading"><span class="sides">|</span>LogIn<span class="sides">|</span></h3>
   <div class="sign-container">
   <h3 class="logolink">$appname</h3>
<form method="post" action="login.php">
<input type="text" maxlength="16" placeholder="Username" name="uzer" value="$uzer" >
<input type="password" placeholder="Password" maxlength="16" name="pass" value="$pass">
_END;
?>
<input class="login-button" type="submit" name="Login" value="Login">
<p><input type="checkbox" name="remember" id="remembered">remember me</p>
<a href="#forgotpassword" >forgot your password/username?
</a>
<a class="link-up"  href="signUp.php ">don't have account? sign up </a>
</form>
</div>
</div>
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
<script src="dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>