<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

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

<section class="orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <!-- Example static order -->
      <div class="box">
         <p> user id : <span>1</span> </p>
         <p> placed on : <span>2025-08-15</span> </p>
         <p> name : <span>John Doe</span> </p>
         <p> number : <span>+880123456789</span> </p>
         <p> email : <span>john@example.com</span> </p>
         <p> address : <span>123, Example Street, Dhaka</span> </p>
         <p> total products : <span>Book A (2), Book B (1)</span> </p>
         <p> total price : <span>$45/-</span> </p>
         <p> payment method : <span>Cash on Delivery</span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="1">
            <select name="update_payment">
               <option value="" selected disabled>pending</option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="#" class="delete-btn">delete</a>
         </form>
      </div>

      <!-- Another static order -->
      <div class="box">
         <p> user id : <span>2</span> </p>
         <p> placed on : <span>2025-08-14</span> </p>
         <p> name : <span>Jane Smith</span> </p>
         <p> number : <span>+880987654321</span> </p>
         <p> email : <span>jane@example.com</span> </p>
         <p> address : <span>456, Another Road, Chittagong</span> </p>
         <p> total products : <span>Book C (1), Book D (3)</span> </p>
         <p> total price : <span>$75/-</span> </p>
         <p> payment method : <span>Online Payment</span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="2">
            <select name="update_payment">
               <option value="" selected disabled>completed</option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="#" class="delete-btn">delete</a>
         </form>
      </div>

   </div>

</section>

<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>
