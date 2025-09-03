<?php
include 'config.php';

if(isset($_POST['add_product'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $check = mysqli_query($conn, "SELECT name FROM `products` WHERE name='$name'") or die('query failed');
    if(mysqli_num_rows($check) > 0){
        $message[] = 'Product name already exists';
    } else {
        $insert = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name','$price','$image')") or die('query failed');
        if($insert){
            if($image_size > 2000000){
                $message[] = 'Image size too large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Product added successfully!';
            }
        } else {
            $message[] = 'Failed to add product!';
        }
    }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $img_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id='$delete_id'") or die('query failed');
    $img_data = mysqli_fetch_assoc($img_query);
    unlink('uploaded_img/'.$img_data['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id='$delete_id'") or die('query failed');
    header('location:admin_products.php');
}

if(isset($_POST['update_product'])){
    $id = $_POST['update_p_id'];
    $name = $_POST['update_name'];
    $price = $_POST['update_price'];
    $old_image = $_POST['update_old_image'];

    mysqli_query($conn, "UPDATE `products` SET name='$name', price='$price' WHERE id='$id'") or die('query failed');

    $new_image = $_FILES['update_image']['name'];
    if(!empty($new_image)){
        $size = $_FILES['update_image']['size'];
        $tmp_name = $_FILES['update_image']['tmp_name'];
        $folder = 'uploaded_img/'.$new_image;
        if($size < 2000000){
            mysqli_query($conn, "UPDATE `products` SET image='$new_image' WHERE id='$id'") or die('query failed');
            move_uploaded_file($tmp_name, $folder);
            unlink('uploaded_img/'.$old_image);
        } else {
            $message[] = 'New image size too large';
        }
    }
    header('location:admin_products.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Products</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

<?php include 'admin_header.php'; ?>

<!-- Add Product Section -->
<section class="add-products">
    <h1 class="title">Manage Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Add New Product</h3>
        <input type="text" name="name" placeholder="Product Name" class="box" required>
        <input type="number" min="0" name="price" placeholder="Product Price" class="box" required>
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" name="add_product" value="Add Product" class="btn">
    </form>
</section>

<!-- Show Products Section -->
<section class="show-products">
    <div class="box-container">
        <?php
        $products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
        if(mysqli_num_rows($products) > 0){
            while($p = mysqli_fetch_assoc($products)){
        ?>
        <div class="box">
            <img src="uploaded_img/<?php echo $p['image']; ?>" alt="">
            <h3><?php echo $p['name']; ?></h3>
            <p>Price: <span><?php echo $p['price']; ?>/-</span></p>
            <a href="admin_products.php?update=<?php echo $p['id']; ?>" class="option-btn">Update</a>
            <a href="admin_products.php?delete=<?php echo $p['id']; ?>" class="delete-btn" onclick="return confirm('Delete this product?');">Delete</a>
        </div>
        <?php } } else { ?>
        <p class="empty">No products added yet!</p>
        <?php } ?>
    </div>
</section>

<!-- Edit Product Form -->
<section class="edit-product-form">
<?php
if(isset($_GET['update'])){
    $id = $_GET['update'];
    $up = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$id'") or die('query failed');
    if(mysqli_num_rows($up) > 0){
        $data = mysqli_fetch_assoc($up);
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="update_p_id" value="<?php echo $data['id']; ?>">
    <input type="hidden" name="update_old_image" value="<?php echo $data['image']; ?>">
    <img src="uploaded_img/<?php echo $data['image']; ?>" alt="">
    <input type="text" name="update_name" value="<?php echo $data['name']; ?>" class="box" required>
    <input type="number" name="update_price" value="<?php echo $data['price']; ?>" min="0" class="box" required>
    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
    <input type="submit" name="update_product" value="Update" class="btn">
    <input type="reset" value="Cancel" id="close-update" class="option-btn">
</form>
<?php } } ?>
</section>

<script src="js/admin_script.js"></script>
</body>
</html>
