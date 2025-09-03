<?php
include 'config.php';

$id = $_GET['id'] ?? '';
$source = $_GET['source'] ?? 'db';

if(!$id){
   echo "No book selected!";
   exit;
}

$book = [];

if($source == 'api'){
   // API থেকে ডিটেইলস আনবে
   $api_url = "https://www.googleapis.com/books/v1/volumes/{$id}";
   $response = file_get_contents($api_url);
   if($response){
      $data = json_decode($response, true);
      $book = [
         'title' => $data['volumeInfo']['title'] ?? 'No Title',
         'authors' => implode(', ', $data['volumeInfo']['authors'] ?? []),
         'description' => $data['volumeInfo']['description'] ?? 'No Description Available',
         'publisher' => $data['volumeInfo']['publisher'] ?? 'Unknown',
         'publishedDate' => $data['volumeInfo']['publishedDate'] ?? '',
         'pageCount' => $data['volumeInfo']['pageCount'] ?? '',
         'thumbnail' => $data['volumeInfo']['imageLinks']['thumbnail'] ?? 'no-image.png'
      ];
   }
}else{
   // ডাটাবেজ থেকে ডিটেইলস আনবে
   $result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id' LIMIT 1");
   if(mysqli_num_rows($result) > 0){
      $data = mysqli_fetch_assoc($result);
      $book = [
         'title' => $data['name'],
         'authors' => 'Unknown', // যদি DB তে না থাকে
         'description' => 'No Description Available',
         'publisher' => 'Unknown',
         'publishedDate' => '',
         'pageCount' => '',
         'thumbnail' => 'uploaded_img/'.$data['image']
      ];
   }else{
      echo "Book not found!";
      exit;
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $book['title']; ?></title>
   <link rel="stylesheet" href="details.css">
</head>
<body>
  <div class="book-details-container">
  <div class="book-header">
     <img src="<?php echo $book['thumbnail']; ?>" alt="">
    <div class="book-info">
      <h1><?php echo $book['title']; ?></h1>
       <p><strong>Authors:</strong> <?php echo $book['authors']; ?></p>
   <p><strong>Publisher:</strong> <?php echo $book['publisher']; ?></p>
   <p><strong>Published:</strong> <?php echo $book['publishedDate']; ?></p>
   <p><strong>Pages:</strong> <?php echo $book['pageCount']; ?></p>
    </div>
  </div>

  <div class="book-description">
    <p><?php echo $book['description']; ?></p>
  </div>

  <a href="shop.php" class="back-btn">Back To Shop</a>
</div>

</body>
</html>
  