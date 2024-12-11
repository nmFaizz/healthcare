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

        <?php if($_SESSION['roles']=='pasien'): ?>
            <p>Halo, <?= $_SESSION['nama']?></p>
            <a href="service.php">Make an appointment</a>
            <br />
        <?php endif; ?>

        <?php if($_SESSION['roles']=='dokter'): ?>
            <p>Halo dokter <?= $_SESSION['nama']?></p>
        <?php endif; ?>

        <a href="Logout.php">Keluar app</a>
    </div>
</body>
</html>