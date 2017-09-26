<?php 
session_start();
include_once 'dbconfig.php';

$qnum = $_POST['qnum'];
$candidate_name = $_POST['candidate_name'];
$user_name_id = $candidate_name.$_SESSION['user'];
 $sql="UPDATE `$user_name_id` SET visited_q = 1 WHERE questID = $qnum";
 if($sql){
    

     $con=$link1->query($sql);
   /* if($con)
        echo 'Saved';
    else
        echo 'not saved';
        
       echo $candidate_name;
       
echo "Success!!";*/
}
?>