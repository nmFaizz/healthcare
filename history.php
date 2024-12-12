<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickDoc - Appointment History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<style>
    a {
        text-decoration: none;
    }

    .button-green {
        background-color: #007E85;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .button-green:hover {
        background-color: #005C63;
    }

    .button-transparent {
        background-color: transparent;
        color: wheat;
        padding: 10px 20px;
        border-radius: 5px;
        margin-right: 10px;
    }

    .button-transparent:hover {
        background-color: whitesmoke;
        color: #007E85;
    }

    .form-login {
        background-color: white;
        padding: 40px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    label.form-label {
        display: block;
        margin-bottom: 5px; /* Jarak antara label dan input */
        font-weight: 600;
        font-size: 1rem;
    }

    input.form-control-plaintext {
        display: block;
        margin-bottom: 15px; /* Jarak antar input */
        padding: 5px 0; /* Tambahkan sedikit padding untuk input */
        font-size: 1rem;
        border: none;
        background: transparent;
    }
</style>
<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-md">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="logo" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="help.php">Help</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="button-transparent" href="FormRegistrasi.php">Sign Up</a>
                    <a class="button-green text-light" href="FormLogin.php">Log In</a>
                </span>
            </div>
        </div>
    </nav>

    <h1 class="text-center mb-4">Appointment History</h1>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="form-login col-md-4">
            <form>
                <label class="form-label" for="name">Name:</label>
                <input type="text" id="name" class="form-control-plaintext" value="KING & GOD" readonly>

                <label class="form-label" for="email">Email Address:</label>
                <input type="text" id="email" class="form-control-plaintext" value="rusdiansyah@example.com" readonly>

                <label class="form-label" for="department">Department:</label>
                <input type="text" id="department" class="form-control-plaintext" value="Muani" readonly>

                <label class="form-label" for="time">Time:</label>
                <input type="text" id="time" class="form-control-plaintext" value="4:00 PM" readonly>
            </form>
            <button class="button-green text-light text-center border-0 mt-3">Edit Appointment</button>
            <button class="button-green text-light text-center border-0 mt-3 ms-3">Delete Appointment</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
