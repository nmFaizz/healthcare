<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form login | quickdoc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
    <h1>Form login</h1>
    <?php
        if (isset($_GET['message']) && $_GET['message'] === 'success') {
            echo '<div class="alert alert-success" role="alert">Registrasi berhasil! Silakan login.</div>';
        }
    ?>

        <form action="Login.php" method="post">
            username : <br /> 
            <input type="text" name="user" class="form-control" placeholder="username" required>
            Password : <br />
            <input type="password" name="pwd" class="form-control" placeholder="password" required>
            <br />
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>

        <a href="FromRegistrasi.php">Sign Up</a>
    </div>
</body>
</html>