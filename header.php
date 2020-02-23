<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
 <body>
<div class="container-fluid ">
<div class="row">
  <div class="col-md-12">
    <h1 class="heading">MEDIA TRACKING SYSTEM </h1>
    
  </div>
</div>
</div>

<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <?php
    
    include('dbconfig.php');
    if(isset($_SESSION['un'])){
      echo "<p style='color:white;'>"."Welcome ".$_SESSION['un']."</p>";    
  }

  ?>
 <ul class="navbar-nav ml-auto ">
    <li class="nav-item">
      <a class="nav-link" href="logout.php">[ Sign Out ]</a>
    </li>
  </ul>
</nav>


<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
 <ul class="navbar-nav ">
    <li class="nav-item ">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="registration.php">Sign Up</a>
    </li>

     <?php
    
    include('dbconfig.php');
    if(isset($_SESSION['un'])){
      ?>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Master
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="printmediamaster.php">Print Media Master</a>
        <a class="dropdown-item" href="publicmaster.php">Publication Master</a>
        <a class="dropdown-item" href="tonemaster.php">Tone Master</a>
        <a class="dropdown-item" href="placementmaster.php">Placement Master</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Input
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="newentry.php">New Entry</a>
      </div>
    </li>
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Output
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="output.php">Selection Report</a>
      </div>
    </li>
    <?php
      
  }

  ?>
    
   

     