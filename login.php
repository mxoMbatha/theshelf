<?php
require_once 'common.php'
?>
<head>
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
     <h3 class="top-heading">LogIn</h3>
   <div class="sign-container">
   <h3 class="logolink">$appname</h3>
<form method="post" action="login.php">
<input type="text" maxlength="16" placeholder="Username" name="uzer" value="$uzer" >
<input type="password" placeholder="Password" maxlength="16" name="pass" value="$pass">
_END;
?>
<input class="login-button" type="submit" name="Login" value="Login">
<a href="#forgotpassword" >forgot your password/username
</a>
</form>
</div>
</div>
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

<script src="main.js"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>