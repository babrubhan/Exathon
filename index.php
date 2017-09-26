

<?php
 require_once 'dbconfig.php';
 session_start();
 // it will never let you open index(login) page if session is set
 if (!isset($_SESSION ['user'])) {
 // header("Location: index.php");
  //echo 'hello';
 //exit;
}

 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $uemail = trim($_POST['uemail']);
  $uemail = strip_tags($uemail);
  $uemail = htmlspecialchars($uemail);
  
  $upass = trim($_POST['upass']);
  $upass = strip_tags($upass);
  $upass = htmlspecialchars($upass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($uemail)){
   $error = true;
  }
  
  if(empty($upass)){
   $error = true;
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $upass); // password hashing using SHA256
   
  
  
   $query=$link->query("SELECT userID, userName, userPass FROM register WHERE userEmail='$uemail'");
   $row=$query->fetch_array();
   $count = $query->num_rows; // if uname/pass correct it returns must be 1 row
   $name = $row['userName'];
   
    if($password==$row['userPass'] && $count==1){
     $_SESSION['user'] = $row['userID'];
    header("Location: instruction.php");
    echo strlen($row['userPass']);
    echo strlen($password);
    }
    else{
        $errMSG = "Incorrect Credentials, Try again...";
    }
     
  /* if( $count == 1 && !strcmp($upass,$row['userPass']) ) {
    
    $_SESSION['user'] = $row['userID'];
    header("Location: instruction.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }*/
    
  }
  
 }
 
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css" />
  
  
  <link href="css/online_exam_config.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>

  <div class="signin-form">
  	<div class="container">

       <form class="form-signin" method="post" id="login-form">
		<center><h3><b><span style="color:rgb(4, 19, 102)">Welcome In EXASTIC Online Portal</span><b></h3>
		<hr/>
         <h2 class="form-signin-heading">User Login</h2><hr /></center>
		 
		  <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>

            <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email address" name="uemail" id="uemail" required />
                  <span id="check-e"></span>
            </div>
            <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="upass" required />
            </div>
            <hr />

            <div style="align:right" class="form-group">
                  <center><button type="submit" class="btn btn-default upanel" name="btn-login" id="btn-login">
    		              <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			             </button></center>

        </div>
    </form>
  </div>
</div>

</body>
<script type="text/javascript" src="js/own.js"></script>
</html>
<?php ob_end_flush(); ?>
