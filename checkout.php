<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Checkout</h3>
</div>

<section class="checkout">
   <div class="checkout-container">
      <form action="" method="post">
         <h3>Place Your Order</h3>
         <div class="flex">
            <div class="inputBox">
               <span>Name</span>
               <input type="text" name="name" required placeholder="Enter your name">
            </div>
            <div class="inputBox">
               <span>Number</span>
               <input type="number" name="number" required placeholder="Enter your number">
            </div>
            <div class="inputBox">
               <span>Email</span>
               <input type="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="inputBox">
               <span>Payment Method</span>
               <select name="method">
                  <option value="cash on delivery">Cash on delivery</option>
                  <option value="credit card">Credit card</option>
                  <option value="paypal">Bkash</option>
               </select>
            </div>
            <div class="inputBox">
               <span>Flat No.</span>
               <input type="number" name="flat" required placeholder="e.g. 12">
            </div>
            <div class="inputBox">
               <span>Street</span>
               <input type="text" name="street" required placeholder="Street name">
            </div>
            <div class="inputBox">
               <span>District</span>
               <input type="text" name="city" required placeholder="e.g. Dhaka">
            </div>
            <div class="inputBox">
               <span>City</span>
               <input type="text" name="state" required placeholder="City name">
            </div>
            <div class="inputBox">
               <span>Country</span>
               <input type="text" name="country" required placeholder="Country">
            </div>
            <div class="inputBox">
               <span>Pin Code</span>
               <input type="number" name="pin_code" required placeholder="e.g. 123456">
            </div>
         </div>
         <input type="submit" value="Order Now" class="btn" name="order_btn">
      </form>
   </div>
</section>

<?php include 'footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>
