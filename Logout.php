<?php 
    session_start();
    if(isset($_SESSION['id'])){
        session_destroy();

        header("location:FormLogin.php");
    }else{
        header("Location:FormLogin.php");
    }

?>