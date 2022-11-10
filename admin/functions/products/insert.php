<?php

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$description = $_POST['description'];
$category = $_POST['category'];

$imgName = $_FILES['img']['name'];
$temp = $_FILES['img']['tmp_name'];

/**
 * 1 - if there is an image upload
 * 2 - specify extension -- images 
 * 3 - check file size < 2mb
 * 4 - rename the image with unique random name
 * 5 - move uploaded image to the server -- with new name
 * 6 - insert image name into the datase  -- new name
 */

// 1 - if there is an image upload
if ($_FILES['img']['error'] == 0) {

  //2 - specify extension -- images
  $extensions = ['jpg', 'png', 'gif', 'jpeg'];
  $ext = pathinfo($imgName, PATHINFO_EXTENSION);
  if (in_array($ext, $extensions)) {

    // 3 - check file size < 2mb
    if ($_FILES['img']['size'] < 2000000) {

      // 4 - rename the image with unique random name
      $newName = md5(uniqid()) .".". $ext;

      // 5 - move uploaded image to the server -- with new name
      move_uploaded_file($temp , "../../images/$newName");
      

    } else {
      echo "file size is too big";
      exit();
    }
  } else {
    echo "wrong file extension";
    exit();
  }
} else {

  echo 'you must upload an image';
  exit();
}


include "../connect.php";

$insert = "INSERT INTO products 
          (name , price , sale , description , cat_id , img) 
          VALUES 
          ('$name','$price' , '$sale','$description' , '$category' , '$newName' )";

if ($conn->query($insert)) {

  header("location: ../../products.php");
} else {

  echo $conn->error;
}
