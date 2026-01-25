<?php

include('koneksi.php');

if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $query = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($query);

  if($data){
    if($data['password'] == $password){
      session_start();
      $_SESSION['username'] = $username;
      if($data['status'] == 'admin'){
        echo "1";
      }else if($data['status'] == 'kasir'){
        echo "2";
      }else{
        echo "3";
      }
    }else{
      echo "4";
    }
  }else{
    echo "5";
  }
}
?>