<?php

$link=mysqli_connect('127.0.0.1','root','','xyz');

$qTextBox=$_POST['qTextBox'];
$aTextBox1=$_POST['aTextBox1'];
$aTextBox2=$_POST['aTextBox2'];
$aTextBox3=$_POST['aTextBox3'];
$aTextBox4=$_POST['aTextBox4'];


if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $sql = "INSERT INTO `quest_ans`(`quest`, `ans1`, `ans2`, `ans3`, `ans4`) VALUES ('$qTextBox','$aTextBox1','$aTextBox2','$aTextBox3','$aTextBox4')";
   $result = $link->query($sql);
    if($result)
        echo 'Saved';
    else
        echo 'not saved';
}
$link->close();
?>