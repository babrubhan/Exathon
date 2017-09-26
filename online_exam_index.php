<?php
 session_start();
 require_once 'dbconfig.php';
 if ( !isset($_SESSION['user'])){
  
header("Location: index.php");
      exit();  
 }
?>


<html>
<head>
<link href="css/online_exam_config.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="main_heading">
    <h1><strong>EXASTIC</strong><span style="font-size:22px;">  ONLINE TEST PORTAL</span></h1>
</div>

<h3 class="stopwatch">Total Time Remain : </h3>
	

 <?php
    $user_id = $_SESSION['user'];
    $sql = "SELECT  quest_num  FROM online_exam_config";
    $sql1 = "SELECT userName  FROM register WHERE userID = $user_id";   
   $result = $link->query($sql);
    $result1 = $link->query($sql1);
    if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();  
    } 
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_name =$row1['userName'];
    $user_name_id = $user_name.$user_id;
    //echo $user_name_id;
        ?>
        
         <div class="question_container">
         <h3 class="candidate_name"><?php echo $user_name; ?></h3>
        <?php
        for($i=1;$i<=$row["quest_num"];$i++)
            echo "<input type='button' class='quest_num_sub_div' id='$i' value='$i'\>";
       ?>
       
    <!--  <input style="float: right;margin-top:50px;cursor: pointer;" type="button" value="Submit" /> -->
    
       
  <table style="height:100px; border-spacing: 10px;margin-top:40px">
      
       <tr>
      <td style="border: 1px solid green; background-color:green;">
      </td>
      <td>Answered</td>
      </tr>
      
      
      <tr>
      <td style="border: 1px solid red; background-color:red;">
      </td>
      <td>Not Answered</td>
      </tr>
      
       <tr>
      <td style="border: 1px solid white; background-color:white;">
      </td>
      <td>Not Visited</td>
      </tr>
      
       <tr>
      <td style="border: 1px solid blue; background-color:blue;">
      </td>
      <td>Marked</td>
      </tr>
 
      
       <tr>
      <td style="border: 4px solid black; background-color:blue;"> 
      </td>
      <td>Answered & Marked for Review</td>
      </tr>
      
  </table>
       
       </div>
       <?php
        
   } else {
         echo "0 results";
}

?>

  <div class="quest_num"></div>
<div class="quest_pannel">
    
    </div>
    <div class="ans_div">
    <input type="radio" name="ans" id="radio1" class="1"/><span class="radio1" ></span>
    <br /><br /> 
  <input type="radio" name="ans" id="radio2" class="2"/><span class="radio2"></span>
  <br /><br/>
  <input type="radio" name="ans" id="radio3" class="3"/><span class="radio3"></span>
    <br /><br /> 
  <input type="radio" name="ans"  id="radio4" class="4"/><span class="radio4"></span><br /><br />
  
  
  </div>
<?php
$link->close();

?>
<div class="btn_div">
<button id="deselect">Clear Response</button>
<input type="button" value="Mark Of Review" id="mrk_rview" />
<button id="sav_next">Save and Next</button>

</div>
<button id="submit_final" style="float:right;position:relative; top:400px;margin-right: 100px;"> Submit Test </button>

</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/questconfig.js"></script>
<script type="text/javascript" src="js/dissable.js"></script>

</html>

