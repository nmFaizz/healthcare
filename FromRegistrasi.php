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
    <h1>Registrasi</h1>
        <form action="Registrasi.php" method="post">
            username : <br /> 
            <input type="text" name="nama" class="form-control" placeholder="username" required>
            Password : <br />
            <input type="password" name="pwd" class="form-control" placeholder="password" required>
            email : <br />
            <input type="text" name="email" class="form-control" placeholder="email" required>
            <br />
            Umur : <br />
            <input type="number" name="umur" class="form-control" placeholder="umur" required>
            <br />
            Jenis Kelamin: <br />
            <input type="radio" name="gender" id="laki-laki" value="laki-laki">
            <label for="laki-laki">Laki-laki</label>

            <input type="radio" name="gender" id="perempuan" value="perempuan">
            <label for="perempuan">Perempuan</label>
            <br />
            role: <br />
            <input type="radio" name="roles" id="pasien" value="pasien">
            <label for="laki-laki">pasien</label>

            <input type="radio" name="roles" id="dokter" value="dokter">
            <label for="perempuan">dokter</label>

            <button type="submit" name="registrasi" class="btn btn-primary">Sign Up</button>
        </form>

        <a href="FormLogin.php">Login</a>
    </div>
</body>
</html>