<?php
include_once 'dbconfig.php';

$sql = "SELECT  *  FROM quest_ans";
    $qnum=$_POST['qnum']-1;
     $result = $link->query($sql); 
     for($i=0; $i<$result->num_rows;$i++)
     {
        $row = $result->fetch_assoc();
        if($i==$qnum){
            $question= $row["quest"];
            $ans1=$row["ans1"];
            $ans2=$row["ans2"];
            $ans3=$row["ans3"];
            $ans4=$row["ans4"];
           echo json_encode(array($question,$ans1,$ans2,$ans3,$ans4));
           }
            
     }
    

$link->close();
?>