<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registration | QuickDoc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: whitesmoke;
        }

        .form-registration {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button-green {
            background-color: #007E85;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            border: none;
            font-weight: bold;
        }

        .button-green:hover {
            background-color: #005C63;
        }

        input, select, label {
            margin-bottom: 15px;
        }

        .form-radio-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-registration">
            <h1 class="text-center mb-4">Registrasi</h1>
            <form action="Registrasi.php" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Username *</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password *</label>
                    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="umur" class="form-label">Umur *</label>
                    <input type="number" id="umur" name="umur" class="form-control" placeholder="Umur" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin *</label>
                    <div class="form-radio-group">
                        <input type="radio" id="laki-laki" name="gender" value="laki-laki" required>
                        <label for="laki-laki">Laki-laki</label>
                        <input type="radio" id="perempuan" name="gender" value="perempuan" required>
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" name="registrasi" class="button-green">Sign Up</button>
                    <a href="FormLogin.php" class="text-primary">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
