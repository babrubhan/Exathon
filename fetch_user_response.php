<?php
session_start();
include_once 'dbconfig.php';
$candidate_name = $_POST['candidate_name'];
$user_name_id = $candidate_name.$_SESSION['user'];
$qnum = $_POST['qnum'];

$sql = "SELECT  *  FROM `$user_name_id`";
    
     $result = $link1->query($sql); 
     for($i=0; $i<$result->num_rows;$i++)
     {
        $row = $result->fetch_assoc();
        if($row['questID'] == $qnum){
           $visited_q= $row["visited_q"];
            $solv_q=$row["solv_q"];
            $mark_rev=$row["mark_rev"];
            
           echo json_encode(array($visited_q,$solv_q,$mark_rev));
           
           }
            
     }
    

$link->close();
?>