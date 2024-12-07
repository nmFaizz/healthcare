<?php 
    include("config.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
        $username = $_POST['user'];
        $pwd = md5($_POST['pwd']);

        $sql = "SELECT * FROM user WHERE nama='$username' AND pwd='$pwd' LIMIT 1";

        $query = mysqli_query($db, $sql) or die("SQL error, $sql");

        $jmldata=mysqli_num_rows($query);
        if($jmldata>0){
            $data = mysqli_fetch_assoc($query);
            session_start();

            $_SESSION['id']=session_id();
            $_SESSION['nama']=$data['nama'];
            $_SESSION['email']=$data['email'];
            $_SESSION['roles']=$data['roles'];

            header("location:Home.php");

        }else{
            echo "<script> alert('login tidak berhasil, coba lagi!'); window.location.assign('FormLogin.php');</script>";
        }
    }
?>