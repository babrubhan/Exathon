<?php 
session_start();
include_once 'dbconfig.php';

$qnum = $_POST['qnum'];
$candidate_name = $_POST['candidate_name'];
$user_name_id = $candidate_name.$_SESSION['user'];
$mark_rev_btn = $_POST['mark_rev_btn'];

$sql = "SELECT mark_rev FROM `$user_name_id` WHERE questID = $qnum";
 //$sql="UPDATE `$user_name_id` SET mark_rev = 1 WHERE questID = $qnum";
 if($sql){
    

     $con=$link1->query($sql);
     $row = $con->fetch_assoc();
     
     if($mark_rev_btn == "mark1"){
    if($row['mark_rev'] == 1){
    
     $sql="UPDATE `$user_name_id` SET mark_rev = 0 WHERE questID = $qnum";
     echo "Mark of Review";
      }
    else{
        $sql="UPDATE `$user_name_id` SET mark_rev = 1 WHERE questID = $qnum";
        echo "Unmark";
    }
     $con=$link1->query($sql);
     }
     else{
       if($row['mark_rev'] == 1){
        echo "Unmark";
        }
        else{
            echo "Mark of Review";
        }
     }
    
    /*if($con)
        echo 'Saved';
    else
        echo 'not saved';
        
       echo $candidate_name;
       
echo "Success!!";*/
$link1->close();
}
?>