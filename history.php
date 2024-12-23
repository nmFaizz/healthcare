<?php 
    include('config.php');
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:FormLogin.php");
        exit();
    } 

    $user_id = $_SESSION['user_id']; 
    $sql = "SELECT * FROM appointment WHERE user_id = $user_id ORDER BY id DESC";
    $result = mysqli_query($db, $sql);

    // $appointments = [];
    // if (mysqli_num_rows($result) > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $appointments[] = $row;
    //     }
    // }

    $sql_dokter = "SELECT * FROM dokter";
    $result_dokter = mysqli_query($db, $sql_dokter);

    $dokter = [];
    if(mysqli_num_rows($result_dokter)>0){
        while($row_dokter = mysqli_fetch_assoc($result_dokter)){
            $dokter[] = $row_dokter;
        }
    }

    function getDoctorName($dokter, $dokter_id) {
        foreach ($dokter as $d) {
            if ($d['id'] == $dokter_id) {
                return $d['nama'];
            }
        }
        return "Unknown Doctor"; 
    }

    if (isset($_GET['delete_appointment'])) {
        $appointment_id = $_GET['appointment_id'];
    
        $delete_sql = "DELETE FROM appointment WHERE id = $appointment_id";
        if (mysqli_query($db, $delete_sql)) {
            header("Location: history.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($db);
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

        .button-transparent {
            background-color: transparent;
            color: #005C63 !important;
            padding: 10px 20px;
            border-radius: 5px;
            margin-right: 10px;
            text-align: center;
        }

        .button-delete {
            background-color: #FF0000;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
        }

        .button-delete:hover {
            background-color: #FF3333;
        }

        .button-transparent:hover {
            background-color: whitesmoke;
            color: #007E85 !important;
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
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($appointment = mysqli_fetch_assoc($result)): ?>
                <form action="FormEditAppointment.php" method="GET" class="form-login col-md-4 mb-4">
                    <input type="hidden" name="id" value="<?= $appointment['id'] ?>">
                    <label class="form-label fw-semibold fs-5">Name:</label>
                    <input id="nama" name="nama" class="form-control-plaintext" value="<?= htmlspecialchars($appointment['nama']) ?>" readonly>

                    <label class="form-label fw-semibold fs-5">Age:</label>
                    <input id="email" name="umur" class="form-control-plaintext" value="<?= htmlspecialchars($appointment['umur']) ?>" readonly>

                    <label class="form-label fw-semibold fs-5">Doctor:</label>
                    <input id="department" name="dokter" class="form-control-plaintext" value="<?= htmlspecialchars(getDoctorName($dokter, $appointment['dokter_id'])) ?>" readonly>


                    <label class="form-label fw-semibold fs-5">Disease:</label>
                    <input id="department" name="disease" class="form-control-plaintext" value="<?= htmlspecialchars($appointment['disease']) ?>" readonly>

                    <label class="form-label fw-semibold fs-5">Approve:</label>
                    <?php if($appointment['approve']==TRUE): ?>
                        <p class="text-success">APPROVE</p>
                    <?php else: ?>
                        <p class="text-danger">NOT APPROVED</p>
                    <?php endif; ?>

                    <label class="form-label fw-semibold fs-5">Time:</label>
                    <input id="time" name="waktu" class="form-control-plaintext mb-3" value="<?= htmlspecialchars($appointment['waktu']) ?>" readonly>
                    <?php if($appointment['approve']==0): ?>
                        <button type="submit" name="get_appointment" class="button-green text-light text-center border-0">Edit Appointment</button>
                    <?php endif; ?>
                    <a href="history.php?delete_appointment=true&appointment_id=<?= $appointment['id'] ?>" class="button-delete text-light text-center">Cancel</a>
                </form>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No appointments found.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
