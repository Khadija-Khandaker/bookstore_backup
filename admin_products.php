<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

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

<!-- Main content -->
<main class="dashboard">

   <!-- Add Product Form -->
   <section class="add-products">
      <h1 class="title">Shop Products</h1>

      <form action="#" method="post" enctype="multipart/form-data">
         <h3>Add Product</h3>
         <input type="text" name="name" class="box" placeholder="Enter product name" required>
         <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required>
         <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
         <input type="submit" value="Add Product" class="btn">
      </form>
   </section>

   <!-- Show Products -->
   <section class="show-products">
      <div class="box-container">

         <div class="box">
            <img src="uploaded_img/book1.jpg" alt="">
            <div class="name">Book A</div>
            <div class="price">$25/-</div>
            <a href="#" class="option-btn">Update</a>
            <a href="#" class="delete-btn">Delete</a>
         </div>

         <div class="box">
            <img src="uploaded_img/book2.jpg" alt="">
            <div class="name">Book B</div>
            <div class="price">$30/-</div>
            <a href="#" class="option-btn">Update</a>
            <a href="#" class="delete-btn">Delete</a>
         </div>

         <div class="box">
            <img src="uploaded_img/book3.jpg" alt="">
            <div class="name">Book C</div>
            <div class="price">$15/-</div>
            <a href="#" class="option-btn">Update</a>
            <a href="#" class="delete-btn">Delete</a>
         </div>

      </div>
   </section>

   <!-- Edit Product Form (hidden by default) -->
   <section class="edit-product-form" style="display:none;">
      <form action="#" method="post" enctype="multipart/form-data">
         <input type="hidden" name="update_p_id">
         <input type="hidden" name="update_old_image">
         <img src="uploaded_img/book1.jpg" alt="">
         <input type="text" name="update_name" value="Book A" class="box" required placeholder="Enter product name">
         <input type="number" name="update_price" value="25" min="0" class="box" required placeholder="Enter product price">
         <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
         <input type="submit" value="Update" class="btn">
         <input type="reset" value="Cancel" id="close-update" class="option-btn">
      </form>
   </section>

</main>

<script src="js/admin_script.js"></script>
</body>
</html>
