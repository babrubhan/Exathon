<?php
// define variables and set to empty values (refer W3school)
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	 if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required"; 
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback Form</title>
 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  
 <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
</script>
 
</head>
<body>

  <div class="signin-form">
  	<div style="font-size:20px;"class="container">

       <form class="form-signin" method="post" id="login-form">
		<center><h1><span style="color:rgb(4, 19, 102)"><b>User Feedback</b></span></h1>
		<hr/>
         <h2 class="form-signin-heading"></h2></center>
		 
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
			<p>1. Is Test time sufficient</p>
            <div class="form-group">
                 <input type="radio" name="time" <?php if (isset($time) && $time=="Yes") echo "checked";?> value="Yes">Yes
				 <input type="radio" name="time" <?php if (isset($time) && $time=="No") echo "checked";?> value="No">No
            </div>
			
			<p>2. Wants to participate again?</p>
			 <div class="form-group">
                 <input type="radio" name="again" <?php if (isset($again) && $again=="Yes") echo "checked";?> value="Yes">Yes
				 <input type="radio" name="again" <?php if (isset($again) && $again=="No") echo "checked";?> value="No">No
            </div>
			
			<p>3. From where you listen about Exastic?</p>
			 <div class="form-group">
                <input type="radio" name="exastic" <?php if (isset($exastic) && $exastic=="Facebook") echo "checked";?> value="Facebook">Facebook
				 <input type="radio" name="exastic" <?php if (isset($exastic) && $exastic=="Friend") echo "checked";?> value="Friend">Friend
				  <input type="radio" name="exastic" <?php if (isset($exastic) && $exastic=="Other") echo "checked";?> value="Other">Other
            </div><br>
			 Any Suggestion: 
			 <textarea name="comment" rows="5" cols="40"></textarea>
            <hr />

            <div style="align:right" class="form-group">
                 <center><button type="submit" class="btn btn-default" name="btn-submit" id="btn-login">
    		              <span class="glyphicon glyphicon-log-in"></span> &nbsp; Submit
			             </button></center>

        </div>
    </form>
  </div>
</div>
<!--Start JS code -->
<script type='text/javascript'>
 $(document).ready(function() { 
   $('input[name=paid]').change(function(){
        $('form').submit();
   });
  });
</script>
<!--End JS Code -->
</body>
</html>
<?php ob_end_flush(); ?>