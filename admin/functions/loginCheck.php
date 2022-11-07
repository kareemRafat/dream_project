<?php
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

include "connect.php";

// login logic

$check = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$query = $conn->query($check);

if ($query->num_rows > 0) {

  // user exist

  // fetch user id  -- unique
  $user = $query->fetch_assoc();
  $id = $user['id'];

  // go to index.php
  $_SESSION['login_id'] = $id;
  header("location: ../index.php");
} else {

  // user dosn`t exist
  // go to login.php
  $_SESSION['login_error'] = "<div class='alert alert-danger'>wrong credentials</div>";
  header("location: ../login.php");
}
