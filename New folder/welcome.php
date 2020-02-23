<?php
session_start();
include('config.php');
if(isset($_SESSION['un'])){
	
	$name=$_SESSION['un'];
	$key=$_SESSION['p'];
	$qry = "SELECT * FROM `mysangathan` WHERE name='$name' AND password='$key'";
	$run = mysqli_query($con,$qry);
	$row = mysqli_num_rows($run);
	if($row>0){
		$data=mysqli_fetch_assoc($run);
		$showimage=$data['dp'];
		
	
		
	}
}
	?>
	<html>
	<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="css/bootstrap.css" rel="stylesheet">
			<link href="css/style.css" rel="stylesheet" >
	</head>
	<body>
		<nav class="navbar navbar-default ">
  			<div class="container-fluid">
   			 <div class="navbar-header">
   		   <a class="navbar-brand" href="#">IEEE Sangathan</a>
   			 </div>
    		<ul class="nav navbar-nav" style="float:right;">
    			  <li class="active"><a href="#">Home</a></li>
    			  <li><a href="#">Forum</a></li>
   				   <li><a href="#">Members</a></li>
   				   <li> <a href="logout.php" >Logout</a></li>
  		  </ul>
 			 </div>
		</nav>
     
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-md-3 ">		
      		<div class="profile">
      			<img height="200" width="200px"  src="images/<?php echo $showimage; ?>" / >  <br><br>
      			<?php echo $name;?>
      		</div>		
      					    				
       		</div>
       		<div class="col-md-9 text-box">
       			
       			<div class="container-fluid">
       				<form action="welcome.php" method="post">
       				<div class="form-group">
       					Post:<br>
       				<textarea cols="60" rows="10" type="text" name="status_sent" placeholder="write here..." required></textarea><br>
       				<input type="submit" name="submit" >
       			</div>
       			</form>
       			</div>      			
       		</div>
      		
      	</div>
      	
      </div>
      <?php
     
include('config.php');
 	if(isset($_POST['submit'])){
      		$status=$_POST['status_sent'];
      		$query="INSERT INTO `posts`(`author`,`status`) VALUES ('$name','$status')";
      		if($query==FALSE){
                echo mysqli_error($con);
                die;
            }
      		$res = mysqli_query($con,$query);
      		echo $res;
			$row = mysqli_num_rows($res);
			echo $row;
      		 	

      	}

      ?>
 
</body>
</html>

           
