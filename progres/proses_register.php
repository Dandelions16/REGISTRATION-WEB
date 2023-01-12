<?php

include ('koneksi.php');

if (isset ($_POST['daftar'])){
    $user = ($_POST['user']);
    $email =($_POST['email']);
    $no_tlp = ($_POST ['phone_number']);
    // password menggunakan hash
    $pass = ($_POST['pass']);
    $password = password_hash($pass, PASSWORD_BCRYPT,['cost' => 12]);
    // Validasi data
    $cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE username='$user' AND email='$email'"));
    if($cek){
      echo "<script>alert('Email our User already exists');</script>";
      echo "<meta http-equiv='refresh' content='0; url=../register.php'>";
    }else{
      // Memasukkan data ke table user
      mysqli_query($con,"INSERT INTO user (id, username, email, no_tlp, pass) VALUES (NULL, '$user', '$email','$no_tlp','$password')");
      echo "<script>alert('Data Added');</script>";
      echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
    }
}else{
  include "../register.php";
}
?>