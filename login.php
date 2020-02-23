<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
<div class="auth">
  <?php
  require_once('header.php');
  ?>
  </ul>
</nav>
  <div class="auth__body">
    <form class="auth__form"  action="login.php" method="POST">
      <div class="auth__form_body">
        <h3 class="auth__form_title">Sign in</h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" name="pass" placeholder="Password">
          </div>
        <!--   <a href="#">Forgot Password</a> -->
        </div>
      </div>
      <div class="auth__form_actions">
        <button class="btn btn-lg btn-block btn-primary" type="submit" name="login">
          LOGIN
        </button>
        
      </div>
    </form>
  </div>
</div>
  <?php
        require_once('footer.php');

        include('dbconfig.php');
        if(isset($_POST['login'])){
        $username = $_POST['email'];
        $password = $_POST['pass'];
  
  
         $qry = "SELECT * FROM `users` WHERE email='$username' AND password= '$password'";
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
          $user=$data['fullname'];    
         $_SESSION['un']=$user;
          $key=$data['password'];   
          $_SESSION['p']=$key;

          if(isset($_SESSION['un'])){
           header('location:index.php');
}
      
  }
  }

?>