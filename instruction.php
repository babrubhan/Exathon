<?php 
session_start();
 require_once 'dbconfig.php';
 // require_once 'index.php';
if ( !isset($_SESSION['user'])){
    echo 'hello';
header("Location: index.php");
         exit;
 }
 else
  //echo 'bye';
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Exastic Online Contest Information</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
  
 <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css" />-->

</head>

<body>

  <div id="w">
 
  <div id="getting-started" class="cntdwn"></div>
         
   <a href="logout.php?logout"><button id="logout_btn" style="float:right;">Leave</button></a>       
  <button id="testbtn">START TEST</button>
  
    
    <div style="font-size:12px; color:white; background-color:rgb(4, 19, 102);" id="content">
      <nav id="stickynav">
        <ul id="nav" class="clearfix">
          <li><a href="#topbar">Overview</a></li>
          <li><a href="#about">Instructions</a></li>
          <li><a href="#contact">Test Guidelines</a></li>
          <li><a href="#photos">Pattern</a></li>
		 
        </ul>
      </nav>
      
      <div class="container">
    <div id="navbar" class="navbar-collapse collapse">
    	
   	<div style="color:white; background-color:rgb(4, 19, 102);" id="topbar">  <!--Overview is not working without it-->
  </div> 
 
 <!--  <a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a> -->
           
        </div>
   </div>

      <h1><span style="color:yellow">Overview</span></h1>
      
      <p>- The online contest test is simple to get through.</p>
	  
      <p>- We assume that the applicant taking the Test has a basic familiarity with Computer Science field.</p>
	  
	  <p>- If your system gets hanged or you face any other problem in internet connectivity, 
	  "Don't Worry, kindly close the window of the Test and you can resume your test from where you had left." </p>
	  <!--Of course, we assure you, it is most unlikely.</p>-->
	  
	  <p>- If there are any discrepancies, please do not hesitate to bring it to our notice at <a href="http://www.exastic.com"><span style="color:#b0f442">contact@exastic.com</span></a> OR <a href="#"><span style="color:#b0f442">+919813759214 / +917618830599 / +917844953558</span></a>.</p>
      
      <section id="about" class="section">
      <h1><span style="color:yellow">Instructions</span></h1>
		<p>- The USERID and PASSWORD for the online test have been sent to the candidate on their respective email-Id.</p>
		<p>- If you did not received it, immediately get in touch with <a href="http://www.exastic.com"><span style="color:#b0f442">EXASTIC</span>.</a></p>
		<p>- Please remember,  <a href="http://www.exastic.com"><span style="color:#b0f442">EXASTIC</span></a> is not responsible for non-receipt of password through email, especially if you have specified an incorrect email address, or an email address you no longer use.</p>
		
      <section id="contact" class="section">  
		<h1><span style="color:yellow">Test Guidelines</span></h1>
		<p>- A Number list of all questions appears at the left hand side of the window. You can access the questions in any order by clicking on the question number given on the number list.</p>
		
		<p>- You can unmark your answer by clicking on the "CLEAR RESPONSE" button.</p>
		
		
		
		<p>- Do not click the button "SUBMIT" before completing the test. A test once submitted cannot be resumed.</p>
		
		
	 </section>
	  
       <section id="photos" class="section">
        <h1><span style="color:yellow">Pattern</span></h1>
		 <p>- The test consists of multiple choice questions (MCQ type). In this, for each given question, the applicant must choose the right, or the closest, answer from among the choices given.</p>
		<p>- The test is a half hours (30 minutes) long.</p>
		
		<p>- It consists of 25 questions carrying 100 marks.</p>
		
		 <p>- There is no negative marking.</p>
	  
	     <p>- Unanswered questions will receive no marks.</p>		
      </section>
     
     <hr />
   <center><button style="position:relative; top:20px; " type="button" class="btn">All The Very Best!!</button></center>
      </div>
           <br><br><br><br><br><br> 
    </div><!-- @end #content -->
  </div><!-- @end #w -->
<script type="text/javascript">
$(function(){
  $("#nav a").click(function(e){
    e.preventDefault();
    $('html,body').scrollTo(this.hash,this.hash); 
  });
});
</script>


</body>
  <script type="text/javascript" src="js/online_exam_config.js"></script>
   
   <script type="text/javascript" src="js/countdown.js"></script>
</html>