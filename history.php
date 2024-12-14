<?php 
    include('config.php');
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:FormLogin.php");
        exit();
    } 

    $user_id = $_SESSION['user_id']; // Use the session user ID consistently

    $sql = "SELECT * FROM appointment WHERE user_id=$user_id";
    $result = mysqli_query($db, $sql);

    $appointments = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $appointments[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickDoc - Appointment History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        a { text-decoration: none; }
        .button-green {
            background-color: #007E85;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            border: none;
        }
        .button-green:hover { background-color: #005C63; }
        .form-login {
            background-color: white;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label.form-label { margin-bottom: 2px; }
        p.form-control-plaintext { margin-top: 0; }
    </style>
</head>
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="help.php">Help</a></li>
                </ul>
                <span class="navbar-text d-flex gap-3 align-items-center">
                    <?php if(isset($_SESSION['id'])): ?>
                        <p class="mb-0">Selamat datang, <?=$_SESSION['nama']?></p>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </nav>

    <h1 class="text-center mb-4">Appointment History</h1>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
        <?php if (!empty($appointments)): ?>
            <?php foreach ($appointments as $appointment): ?>
                <form action="FormEditAppointment.php" method="GET" class="form-login col-md-4 mb-4">
                    <input type="hidden" name="id" value="<?= $appointment['id'] ?>">
                        <label class="form-label fw-semibold fs-5">Name:</label>
                        <input id="nama" name="nama" class="form-control-plaintext" value="<?= htmlspecialchars($appointment['nama']) ?>" readonly>

                        <label class="form-label fw-semibold fs-5">Email Address:</label>
                        <input id="email" name="email" class="form-control-plaintext" value="<?= htmlspecialchars($appointment['email']) ?>" readonly>

                        <label class="form-label fw-semibold fs-5">Department:</label>
                        <input id="department" name="department" class="form-control-plaintext" value="<?= htmlspecialchars($appointment['department']) ?>" readonly>

                        <label class="form-label fw-semibold fs-5">Time:</label>
                        <input id="time" name="waktu" class="form-control-plaintext" value="<?= htmlspecialchars($appointment['waktu']) ?>" readonly>
                    <button type="submit" name="get_appointment" class="button-green text-light text-center border-0 mt-3">Edit Appointment</button>
            </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No appointments found.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
