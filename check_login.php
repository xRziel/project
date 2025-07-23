<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "" || $password == "") {
  echo "<script>
          alert('กรุณากรอก username หรือ password');
          location.href='login.php';
        </script>";
} else {

  require 'connect.php';

  $sql = "SELECT * FROM narak WHERE username='$username' AND password='$password'";
  $result = $con->query($sql);
  $num = $result->num_rows;
  $row = mysqli_fetch_array($result);
  if ($num == 0) {
    echo "<script>
            alert('username or password invalid');
            location.href='login.php';
          </script>";
  } else {
    $_SESSION['username'] = $row['username'];
    $_SESSION['fullname'] = $row['fullname'];
    header('location:dist/');
  }
}