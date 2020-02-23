<?php
require_once('header.php');
?>
<li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>
</ul>
</nav>
    <div class="container">
        <div class="page-header">
            <p class="lead text-center">
                <i class="glyphicon glyphicon-log-in"></i> Registration
            </p>
        </div>
        <form class="form-horizontal col-md-4 col-xs-12 col-md-offset-4" role="form" method="post" action="registration.php">
             <div class="form-group">
                <label for="userid">USER ID</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input type="text" class="form-control" id="" placeholder="USER ID" name="userid" required>
                </div>
                
            </div>
            <div class="form-group">
                <label for="FullName">Full Name</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input type="text" class="form-control" id="FullName" placeholder="Full Name" name="username" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation="length" data-validation-length="1-100" data-validation-error-msg-container="#ErrorName" required>
                </div>
                <span id="ErrorName"></span>
            </div>
            <div class="form-group">
                <label for="Email">Email Address</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </div>
                    <input type="email" class="form-control" id="Email" placeholder="Email Address" name="email" data-validation="email" data-validation-error-msg-container="#ErrorEmail" required>
                </div>
                <span id="ErrorEmail"></span>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                    </div>
                    <input type="password" class="form-control" id="Password" placeholder="Password" name="pass1" data-validation="length" data-validation-length="min8" data-validation-error-msg-container="#ErrorPassword" required>
                </div>
                <span id="ErrorPassword"></span>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary" name="register" value="Sign Up">Sign Up</button> 
            </div>
            
        </form>
    </div>
    <!-- Container -->
<?php
 require_once('footer.php');
require_once('dbconfig.php');
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $userid = $_POST['userid'];
  $email = $_POST['email'];
  $password = $_POST['pass1'];  
  $qry = "INSERT INTO `users`(`userid`, `fullname`, `email`, `password`) VALUES ('$userid','$username','$email','$password')";;
  $run =mysqli_query($con,$qry);
  if($run==true){
    ?>
    <script>alert('Account created! ');
    window.open('login.php','_self');
    </script>
    <?php
  }
}
?>