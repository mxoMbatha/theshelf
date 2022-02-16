
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
               die ("<h2>Welcome  To  $appname " .''. " $uzer</h2> ". "<br>"."<a href='account.php'>continue with your profile</a>" );
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




<script src="main.js"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>