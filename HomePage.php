<?php 

    session_start();
    if(!isset($_SESSION['id'])){
        header("location:FormLogin.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | quickdoc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2>Welcome to QuickDoc</h2>
        <h2>Selamat bergabung, <?=$_SESSION['nama']?> | <?=$_SESSION['email']?> </h2>

        
        <p>Halo, <?= $_SESSION['nama']?></p>
        <a href="Service.php">Make an appointment</a>
        <br />


        <a href="Logout.php">Keluar app</a>
    </div>
</body>
</html>