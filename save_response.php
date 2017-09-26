<?php 
session_start();
include_once 'dbconfig.php';
$q_ans_no = $_POST['q_ans_no'];
$qnum = $_POST['qnum'];

$candidate_name = $_POST['candidate_name'];
$user_name_id = $candidate_name.$_SESSION['user'];

    $sql="UPDATE `$user_name_id` SET solv_q = $q_ans_no WHERE questID = $qnum";
    echo "Success!!";

 if($sql){
    

     $con=$link1->query($sql);
    /*if($con)
        echo 'Saved';
    else
        echo 'not saved';
        
       //echo $candidate_name;*/
     

}
?>