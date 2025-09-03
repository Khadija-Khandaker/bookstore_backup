<?php
include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['confirmPassword']));
   $role = $_POST['role'];

   $select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO users(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$role')") or die('query failed');
         $message[] = 'Registered successfully!';
         header('location:login.php');
         exit;
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link rel="stylesheet" href="register.css" />
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '<div class="message"><span>'.$msg.'</span></div>';
   }
}
?>

<div class="container">
  <div class="left-panel"></div>

  <div class="right-panel">
    <div class="content">
      <h1 class="brand">BookNest</h1>
      <h2 class="register-title">Create your account</h2>

      <form class="register-form" action="" method="post">
        <input type="text" name="name" placeholder="Full Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirmPassword" placeholder="Confirm Password" required />
        
        <!-- User Role select box -->
        <select name="role" required>
          <option value="" disabled selected>Select Role</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>

        <button type="submit" name="submit">Register</button>
        <p class="login-text">Already have an account? <a href="login.php">Login here</a></p>
      </form>
    </div>
  </div>
</div>

</body>
</html>
