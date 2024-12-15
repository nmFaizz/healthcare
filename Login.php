<?php 
    include("config.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
        $username = $_POST['user'];
        $pwd = md5($_POST['pwd']);

        $sql_pasien = "SELECT * FROM pasien WHERE nama='$username' AND pwd='$pwd' LIMIT 1";

        $sql_dokter = "SELECT * FROM dokter WHERE nama='$username' AND pwd='$pwd' LIMIT 1";

        $query_pasien = mysqli_query($db, $sql_pasien) or die("SQL error, $sql");

        $query_dokter = mysqli_query($db, $sql_dokter) or die("SQL error, $sql");

        if($sql_pasien){
            $jmldata=mysqli_num_rows($query_pasien);
            if($jmldata>0){
                $data = mysqli_fetch_assoc($query_pasien);
                session_start();

                $_SESSION['id']=session_id();
                $_SESSION['role']='pasien';
                $_SESSION['nama']=$data['nama'];
                $_SESSION['email']=$data['email'];
                $_SESSION['user_id']=$data['id'];

                header("location:index.php");
            } else {
                echo "<script>alert('username or password is incorrect')</script>";
                header("location:FormLogin.php?message=failed");
            }
        }

        if($sql_dokter){
            $jmldata=mysqli_num_rows($query_dokter);
            if($jmldata>0){
                $data = mysqli_fetch_assoc($query_dokter);
                session_start();

                $_SESSION['id']=session_id();
                $_SESSION['role']='dokter';
                $_SESSION['nama']=$data['nama'];
                $_SESSION['email']=$data['email'];
                $_SESSION['dokter_id']=$data['id'];


                header("location:Dashboard.php");
            }
        }

        else{
            echo "<script>alert('username or password is incorrect')</script>";
        }
    }
?>