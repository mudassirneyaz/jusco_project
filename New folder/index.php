<?php
session_start();
if(isset($_SESSION['un'])){
	header('location:welcome.php');
}
?>

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
	<h1>Login</h1>
    <form method="post">
    	<input type="text" name="uname" placeholder="Username" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Let me in.</button>
		<a href="signup.php" name="signin" style="color:white;">New User?</a>
    </form>
</div>
</body>
</html>
<?php

include('config.php');
if(isset($_POST['login'])){
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	
	
	$qry = "SELECT * FROM `mysangathan` WHERE name='$username' AND password= '$password'";
	$run =mysqli_query($con,$qry);
	$row = mysqli_num_rows($run);
	if($row<1){
		?>
		<script>alert('username or password is incorrect');
		window.open('index.php','_self');
		</script>
		<?php
	}
	else{
		$data=mysqli_fetch_assoc($run);
		$user=$data['name'];		
		$_SESSION['un']=$user;
		$key=$data['password'];		
		$_SESSION['p']=$key;
			
	}
	}

?>