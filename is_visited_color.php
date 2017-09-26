<?php
session_start();
include_once 'dbconfig.php';

$candidate_name = $_POST['candidate_name'];
$user_name_id = $candidate_name.$_SESSION['user'];
$ident=$_POST['ident'];
if($ident=="allv"){
$sql = "SELECT visited_q,solv_q,mark_rev FROM `$user_name_id`";

     $result = $link1->query($sql); 
      $is_visited_array = "";
     for($i=0; $i<$result->num_rows;$i++)
     {
        $row = $result->fetch_assoc();
        $check1 = $row["solv_q"];
        $check2 = $row["visited_q"];
         $check3 = $row["mark_rev"];
        if($check3 == 1 && $check1 != 0)
       $is_visited_array[$i] = 3;       //for selected mark of review
       
        else if($check3 == 1 && $check1 == 0)
       $is_visited_array[$i] = 4;       //for mark of review
       
        else if($check1 != 0)
       $is_visited_array[$i] = 1;   //for selected
      
       else if($check2 == 1)
       $is_visited_array[$i] = 2;  //for visited
       else
       $is_visited_array[$i] = 0;    
                
    }
   // echo $is_visited_array;
      echo json_encode($is_visited_array);   
}
else if($ident=="alls"){
    $b_status = $_POST['b_status'];
$sql = "SELECT visited_q,solv_q,mark_rev FROM `$user_name_id` WHERE questID = $b_status";

     $result = $link1->query($sql); 
      $is_visited = "";
    
        $row = $result->fetch_assoc();
        $check1 = $row["solv_q"];
        $check2 = $row["visited_q"];
        $check3 = $row["mark_rev"];
      /*  if($check1 != 0)
       $is_visited = 1;   
       else if($check2 == 1)
       $is_visited = 2;  
       else
       $is_visited = 0;   */
       
       if($check3 == 1 && $check1 != 0)
      $is_visited = 3;       //for selected mark of review
       
        else if($check3 == 1 && $check1 == 0)
      $is_visited= 4;       //for mark of review
       
        else if($check1 != 0)
      $is_visited = 1;   //for selected
      
       else if($check2 == 1)
       $is_visited = 2;  //for visited
       else
      $is_visited = 0;  
                
   
   // echo $is_visited_array;
      echo json_encode(array($b_status,$is_visited)); 
}



?>