
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script >
</script>
</head>
<body>
<div class="home-head">
<h1>Welcome to IEEE Sangathan For Applied Suddhikaran</h1>

</div>
<div class="login">
	<h1>Sign Up</h1>
    <form method="post" enctype="multipart/form-data">
    	<input type="text" name="uname" placeholder="Username" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
           <input type="file" class="" name="dp" value="Post">
        <button type="submit" name="signin" class="btn btn-primary btn-block btn-large">Submit</button>
		<a href="index.php" style="color:white;">Home</a>
    </form>
</div>
</body>
</html>
<?php


if(isset($_POST['signin'])){
	include('config.php');
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	$imgname = $_FILES['dp']['name'];
	$tempimg = $_FILES['dp']['tmp_name'];
	move_uploaded_file($tempimg,"images/$imgname");
	$qry = "INSERT INTO `mysangathan`(`name`, `password`, `dp`) VALUES ('$username','$password','$imgname')";
	$run =mysqli_query($con,$qry);
	;
	if($run== true){
		?>
		<script>alert('Account created! ');
		window.open('signup.php','_self');
		</script>
		<?php
	}
}
	?>