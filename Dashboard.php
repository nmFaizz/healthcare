<?php 
    include('config.php');
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:FormLogin.php");
    }
    $dokter_id = $_SESSION['dokter_id'];
include('config.php'); 

$sql = "SELECT COUNT(*) AS total_rows FROM appointment WHERE dokter_id=$dokter_id";  

$result = mysqli_query($db, $sql);  

$total_rows;



if ($result) {
    $row = mysqli_fetch_assoc($result);  
    $total_rows = $row['total_rows'];  

} else {
    echo "Error: " . mysqli_error($db);
}

$sql_unapprove = "SELECT COUNT(*) AS unapproved_rows 
                  FROM appointment 
                  WHERE dokter_id = $dokter_id AND approve = 0";

$result_unapprove = mysqli_query($db, $sql_unapprove);

$unapproved_rows = 0; 
if ($result_unapprove) {
    $row_unapprove = mysqli_fetch_assoc($result_unapprove);
    $unapproved_rows = $row_unapprove['unapproved_rows'];
} else {
    echo "Error fetching unapproved rows: " . mysqli_error($db);
}

$sql_approve = "SELECT COUNT(*) AS unapproved_rows 
                  FROM appointment 
                  WHERE dokter_id = $dokter_id AND approve = 1";

$result_approve = mysqli_query($db, $sql_approve);

$approved_rows = 0; 
if ($result_approve) {
    $row_approve = mysqli_fetch_assoc($result_approve);
    $approved_rows = $row_approve['unapproved_rows'];
} else {
    echo "Error fetching unapproved rows: " . mysqli_error($db);
}


$sql_appointments_approve = "SELECT * FROM appointment WHERE dokter_id = $dokter_id AND approve = 0 ORDER BY waktu DESC";
$result_appointments_approve = mysqli_query($db, $sql_appointments_approve);

if (!$result_appointments_approve) {
    die("Error fetching appointments: " . mysqli_error($db));
}

$sql_get_approved = "SELECT * FROM appointment WHERE dokter_id = $dokter_id AND approve = 1 ORDER BY waktu DESCgi";
$result_get_approved = mysqli_query($db, $sql_get_approved);

if (!$result_get_approved) {
    die("Error fetching appointments: " . mysqli_error($db));
}


if (isset($_GET['approved'])) {
    $app_id = $_GET['app_id'];

    $app_sql = "UPDATE appointment SET approve = 1 WHERE id = $app_id";
    if (mysqli_query($db, $app_sql)) {
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Error approving: " . mysqli_error($db);
    }
}



if (isset($_GET['delete'])) {
    $app_id = $_GET['app_id'];

    $delete_sql = "DELETE FROM appointment WHERE id = $app_id";
    if (mysqli_query($db, $delete_sql)) {
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Error approving: " . mysqli_error($db);
    }
}




mysqli_close($db);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard | Healthcare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .text-d-green {
        color: #005C63 !important;
    }

    .text-green {
        color: #007E85 !important;
    }   

    .bg-d-green {
        background-color: #005C63 !important;
    }

    .bg-green {
        background-color: #007E85 !important;
    }

    .button-transparent {
        background-color: transparent;
        color: #005C63 !important;
        padding: 10px 20px;
        border-radius: 5px;
        margin-right: 10px;
        text-align: center;
    }

    .button-transparent:hover {
        background-color: whitesmoke;
        color: #007E85 !important;
    }

    .button-green {
        background-color: #007E85;
        padding: 10px 20px;
        border-radius: 5px;
        color: white !important;
        text-align: center;
        height: max-content;
    }

    .button-green:hover {
        background-color: #005C63;
    }

    #profile {
        width: 60px;
        height: 60px;
        background-color: #007E85;
        border-radius: 50%;
    }

    .stat-card {
        padding: 20px;
        border-radius: 10px;
        height: 150px;
    }

    .unapproved-date {
        font-size: 14px;
    }
</style>
<body class="bg-body-tertiary">
    <main class="container-md min-vh-100 py-5">
        <div class="d-flex flex-md-row align-items-center justify-content-between gap-4">
            <div class="d-flex align-items-center gap-4">
                <figure id="profile" class="bg-black">
        
                </figure>
                <div>
                    <h5>Selamat Datang, Dr. <?= $_SESSION["nama"] ?></h5>
                    <a href="Logout.php">Logout</a>
                </div>
            </div>
        </div>
        <section class="d-flex flex-column flex-md-row gap-4 mt-3">
            <div class="stat-card d-flex flex-column justify-content-center align-items-center flex-fill bg-white">
                <?php echo "<h1>$total_rows</h1>" ?>
                <p>Appointment</p>
            </div>
            <div class="stat-card d-flex flex-column justify-content-center align-items-center flex-fill bg-white">
                <h1><?= $unapproved_rows ?></h1>
                <p>Unapproved</p>
            </div>
            <div class="stat-card d-flex flex-column justify-content-center align-items-center flex-fill bg-white">
                <h1><?= $approved_rows ?></h1>
                <p>Approved</p>
            </div>
        </section>
        
        <section class="d-flex flex-md-row flex-column gap-4">
            <div id="appointment-list" class="mt-5 flex-fill rounded">
                <h5>Appointment Request</h5>
                <?php if (mysqli_num_rows($result_appointments_approve) > 0): ?>
                    <?php while ($appointment = mysqli_fetch_assoc($result_appointments_approve)): ?>
                        <div class="mt-4 bg-white p-3 rounded">
                            <div class="d-flex gap-3 align-items-center">
                                <p class="fw-semibold"><?= htmlspecialchars($appointment['nama']); ?></p>
                                <p class="unapproved-date">
                                    <?= date('d F Y - H A', strtotime($appointment['waktu'] . ' ' . $appointment['waktu'])); ?>
                                </p>
                            </div>
                            <p><?= htmlspecialchars($appointment['disease']); ?></p>
                            <div class="mt-4">
                                <?php if ($appointment['approve'] == 0): ?>
                                    <a type="button" href="Dashboard.php?approved=true&app_id=<?= $appointment['id']; ?>" class="button-green">Approve</a>
                                <?php endif; ?>
                                <a href="Dashboard.php?delete=true&app_id=<?= $appointment['id']; ?>" class="button-transparent">Delete</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-muted">No appointments available.</p>
                <?php endif; ?>
            </div>



            <div id="appointment-schedule" class="mt-5 flex-fill">
                <h5>Appointment Schedule</h5>
                
                <?php if (mysqli_num_rows($result_get_approved) > 0): ?>
                    <?php while ($appointment = mysqli_fetch_assoc($result_get_approved)): ?>
                        <div class="mt-4 bg-white p-3 rounded">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="text-green"><?= date('d F Y - H A', strtotime($appointment['waktu'] . ' ' . $appointment['waktu'])); ?></h5>
                                    <p class="fw-semibold"><?= htmlspecialchars($appointment['nama']); ?></p>
                                    <p><?= htmlspecialchars($appointment['disease']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>