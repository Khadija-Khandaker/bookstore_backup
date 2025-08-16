<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="css/sidebar.css">

</head>
<body>
   
<header class="header">
   <div class="flex">
      <a href="admin_page.html" class="logo">Admin<span>Panel</span></a>
      <div class="icons">
         <div id="user-btn" class="fas fa-user"></div>
      </div>
      <div class="account-box">
         <p>username : <span>Admin Name</span></p>
         <p>email : <span>admin@example.com</span></p>
         <a href="logout.html" class="delete-btn">logout</a>
         <div>new <a href="login.html">login</a> | <a href="register.html">register</a></div>
      </div>
   </div>
</header> 

<!-- sidebar start -->
<div class="sidebar">
   <a href="admin_page.php"><i class="fas fa-home"></i> Home</a>
   <a href="admin_products.php"><i class="fas fa-box"></i> Products</a>
   <a href="admin_orders.php"><i class="fas fa-shopping-cart"></i> Orders</a>
   <a href="admin_users.php"><i class="fas fa-users"></i> Users</a>
   <a href="admin_contacts.php"><i class="fas fa-envelope"></i> Messages</a>
</div>
<!-- sidebar end -->

<!-- admin dashboard section starts  -->
<section class="dashboard">
   <h1 class="title">dashboard</h1>

   <div class="box-container">
      <div class="box">
         <h3>$250/-</h3>
         <p>total pendings</p>
      </div>
      <div class="box">
         <h3>$500/-</h3>
         <p>completed payments</p>
      </div>
      <div class="box">
         <h3>10</h3>
         <p>order placed</p>
      </div>
      <div class="box">
         <h3>15</h3>
         <p>products added</p>
      </div>
      <div class="box">
         <h3>8</h3>
         <p>normal users</p>
      </div>
      <div class="box">
         <h3>2</h3>
         <p>admin users</p>
      </div>
      <div class="box">
         <h3>10</h3>
         <p>total accounts</p>
      </div>
      <div class="box">
         <h3>4</h3>
         <p>new messages</p>
      </div>
   </div>
</section>
<!-- admin dashboard section ends -->

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>
