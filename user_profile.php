<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
require_once 'sessions.php';
?>
    <title><?php echo $appname ?>: user profile</title>
     <link  href="styles.css " rel="stylesheet">
      <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    
</body>
</html>


<?php
if (!$loggedin) die();
$result=queryMysql("SELECT * FROM uzerprofiles WHERE uzer='$uzer'");

$firstName=$lastName=$phone=$dateofbirth="";
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
   else queryMysql("INSERT INTO uzerprofiles VALUES('$uzer','$firstName','$lastName','$phone','$dateofbirth')");
   header('location:url.php')
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

$firstName=$lastName=$phone=$dateofbirth="";


echo <<<_END
<div class="main">
<div class='top-heading '>
<h3>register profile</h3>
</div>
<div class="content-box">
  <div class="register box-shadow" id="register">
  <form action="user_profile.php" method="post" enctype="multipart/form-data">
  
    <label for="validationServer01" class="form-label">personal details</label>
   <input type="text" placeholder='first name'  id="validationServer01" name="firstname" value="$firstName" required>
   
   <input type="text" placeholder='lastname' id="validationServer01" name="lastname" value="$lastName" required>
   
   <input type="text" placeholder='contact number'  id="validationServer01" name="phone"  value="$phone" required>
  <br class='form-item'>
   <label class="form-label">Date of birth</label>
   <input type="date" id="validationServer01" name="dateOB" value="$dateofbirth" required>
   <br class='form-item'>

   <label class="form-label ">gender</label>
   <select name="gender">
    <option value="select">Select Gender </option>
   <option value="Male">male</option>
   <option value="Female">female</option>
   <option value="Other">other</option> 
   </select>
   <br class='form-item'>


    <label class="form-label">nationality</label>
   <select name="nationality">
   <option value="select">Select Country </option>
   <option value="south african">south africa</option> 
</select>
   <br class='form-item'>

    <label class="form-label">ethnicity</label>
   <select name="ethnicity">
   <option value="select">Select Race </option>
   <option value="african"> African</option>
   <option value="indian"> Indian</option>
   <option value="caucasian"> Caucasian</option>
   <option value="colored"> colored</option>
   <option value="asian"> Asian</option>
   <option value="arab">Arab</option> 
</select>

   <br class='form-item'>
   <input type="submit" value="Next" class="submit" name="saveprofile">

  </form>
  </div>
 
  </div>
  </div>
_END;
?>

<script src="jquery-3.6.0.min.js"></script>
<script src="/dist/js/bootstrap.bundle.min.js"></script>
<script src="query.js"></script>
<script src="main.js"></script>
</body>
</html>