<?php
session_start();
$_SESSION['sesi'] = NULL;

include "koneksi.php";
if( isset($_POST['submit'])){
    $username    =  isset($_POST['username'])? $_POST['username'] : "";
    $pass        =  isset($_POST ['password'])? $_POST['password'] : "";
    // query data dari databases
    $strQuery = "SELECT * FROM user WHERE  username='$username'";
    $qry    = mysqli_query($con,$strQuery);
    $sesi   = mysqli_num_rows($qry);
    // pr login menggunakan passowrd verify
    if ($sesi == 1){
        while($row = mysqli_fetch_assoc($qry)){
            if(password_verify($pass, $row['pass'])){
                $_SESSION['sesi'] = $username;
                // echo "<script> alert('Anda berhasil Log In');</script>";
                // header('../homepage.php');
                header("Location:../dist/homepage.php");
                echo "<meta http-equiv='refresh' content='0; url=../dist/homepage.php'>";
            }else{
            
                echo "<script>alert('Email atau Password salah');</script>";
            }
        }
    }else{
        echo "<script>alert('Email atau Password salah');</script>";
    }
}
?>