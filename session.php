<?php

session_start();
  
  if(!isset($_SESSION['User_Id'],$_SESSION['Role_Id']))
  {
    header('location:login.php?lmsg=true');
    exit;
  } 
  include('header.php');
 
?>