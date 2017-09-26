<?php

  $DBhost = "localhost";
  $DBuser = "root";
  $DBpass = "";
  $DBname = "fake";
  $DBname1 = "candidate";
  
  
  $link = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
     $link1 = new MySQLi($DBhost,$DBuser,$DBpass,$DBname1);
  
    
     if ($link->connect_errno || $link1->connect_error) {
         die("ERROR : -> ".$link->connect_error);
     }