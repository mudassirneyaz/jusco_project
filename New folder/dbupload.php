<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<a href="logout.php" style="float:right;margin:30px;color:white;">Logout</a>
<div class="login">
	<h1>Let me know you</h1>
	<form method="post" action="dbupload.php" enctype="multipart/form-data">
    	<input type="text" name="name" placeholder="Your Name" required="required" />
        <input type="text" name="dept" placeholder="Stream here" required="required" />
        
		<input type="file" name="img" placeholder="image upload" required="required" />
        <button type="submit" name="submit" Value="Upload" class="btn btn-primary btn-block btn-large">Upload</button>
		<a href="welcome.php" style="margin:30px;color:white;">Get Back</a>
		
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$imgname = $_FILES['img']['name'];
	$tempimg = $_FILES['img']['tmp_name'];
	$con=mysqli_connect('localhost','root','','sangathan') or die(mysqli_error());
	move_uploaded_file($tempimg,"images/$imgname");
	$sql ="INSERT INTO `storedata`(`name`, `department`, `image`) VALUES ('$name','$dept','$imgname')";
	$run = mysqli_query($con,$sql);
	echo "Files Uploaded";
	
}
?>