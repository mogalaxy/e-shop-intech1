<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:MainPage1.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link href="assets/vendor/google-css.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <style>
      input{
         text-align: center;
      }
   </style>
</head>
<body background="assets/my-img/203519.jpg">

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<script src="C:\xampp\htdocs\e-shop intech\assets\vendor\bootstrap\js\bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body align="center">
   <div id="template-bg-1">
    <div
        class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="card p-4 text-light bg-dark mb-5">
            <div class="card-header">
                <h3>Sign In</h3>
            </div>
            <div class="card-body w-100">
                <form name="login" action="" method="post">
                    <div class="input-group form-group mt-3">
                        <div class="bg-secondary rounded-start">
                            <span class="m-3"><i
                                class="fas fa-user mt-2"></i></span>
                        </div>
                        <input type="email" class="form-control"
                            placeholder="email" name="email">
                    </div>
                    <div class="input-group form-group mt-3">
                        <div class="bg-secondary rounded-start">
                            <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                        </div>
                        <input type="password" class="form-control"
                            placeholder="password" name="password">
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" value="Login"
                            class="btn bg-secondary float-end text-white w-100"
                            name="login-btn">
                    </div>
                </form>
			</div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <div class="text-primary">If you are a registered
                        user, login here.</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</body>
</html>