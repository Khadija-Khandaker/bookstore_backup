<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

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



<section class="messages">

   <h1 class="title">messages</h1>

   <div class="box-container">

      <!-- Example static message box -->
      <div class="box">
         <p> user id : <span>1</span> </p>
         <p> name : <span>John Doe</span> </p>
         <p> number : <span>+880123456789</span> </p>
         <p> email : <span>john@example.com</span> </p>
         <p> message : <span>Hello, this is a test message.</span> </p>
         <a href="#" class="delete-btn">delete message</a>
      </div>

      <div class="box">
         <p> user id : <span>2</span> </p>
         <p> name : <span>Jane Smith</span> </p>
         <p> number : <span>+880987654321</span> </p>
         <p> email : <span>jane@example.com</span> </p>
         <p> message : <span>Hi, I have a question about my order.</span> </p>
         <a href="#" class="delete-btn">delete message</a>
      </div>

   </div>

</section>

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>
