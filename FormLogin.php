<?php 
    $message = $_GET["message"] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login | QuickDoc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: whitesmoke;
            font-family: 'Lato', sans-serif;
        }
        .form-login {
            background-color: white;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-green {
            background-color: #007E85;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-green:hover {
            background-color: #005C63;
        }
        a {
            color: #007E85;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="form-login col-md-6">
            <h1 class="text-center mb-4">Login</h1>
            <?php
                if (isset($_GET['message']) && $_GET['message'] === 'success') {
                    echo '<div class="alert alert-success" role="alert">Registrasi berhasil! Silakan login.</div>';
                }
            ?>
            <form action="Login.php" method="post">
                <div class="mb-3">
                    <label for="user" class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" id="user" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter your password" required>
                </div>
                <?php if ($message): ?>
                    <p style="color: red;">Error: <?php echo htmlspecialchars("Incorrect Username or Password"); ?></p>
                <?php endif; ?>
                <div class="d-grid">
                    <button type="submit" name="login" class="btn-green">Login</button>
                </div>
            </form>
            <p class="mt-3 text-center">
                Don't have an account? <a href="FormRegistrasi.php">Sign Up</a>
            </p>
        </div>
    </div>
</body>
</html>
