<?php 

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$description = $_POST['description'];
$category = $_POST['category'];


include "../connect.php";

$insert = "INSERT INTO products 
          (name , price , sale , description , cat_id) 
          VALUES 
          ('$name','$price' , '$sale','$description' , '$category' )";

if ($conn -> query($insert)) {

  header("location: ../../products.php");

} else {

  echo $conn -> error ;

}