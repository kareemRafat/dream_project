<?php 


include "connect.php";

echo $id = $_GET['id'];

$del = "DELETE FROM users WHERE id = $id";

$query = $conn -> query($del);

if ($query) {

  header('location: ../users.php');

} else {

  echo $conn -> error ;

}