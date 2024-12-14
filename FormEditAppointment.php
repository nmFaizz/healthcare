<?php 
    include('config.php');
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['get_appointment'])) {
        // Retrieve GET data
        $id = $_GET['id'];
        $nama = $_GET['nama'];
        $dokter = $_GET['dokter'];
        $umur = $_GET['umur'];
        $disease = $_GET['disease'];
        $waktu = $_GET['waktu'];
    
        // Prepare data for display
        $data = [
            'id' => htmlspecialchars($id),
            'nama' => htmlspecialchars($nama),
            'dokter' => htmlspecialchars($dokter),
            'umur' => htmlspecialchars($umur),
            'disease' => htmlspecialchars($disease),
            'waktu' => htmlspecialchars($waktu),
        ];
    }

    $query = "SELECT * FROM dokter";
    $result = mysqli_query($db, $query);

    $doctors = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $doctors[] = $row;  
        }
    }


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column  ;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-appointment {
            background-color: white;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
        }
        .button-green {
            background-color: #007E85;
            padding: 10px 15px;
            border-radius: 5px;
            color: white;
            border: none;
        }
        .button-green:hover {
            background-color: #005C63;
        }
    </style>
</head>
<body>
    <form action="Appointment.php" method="POST" class="form-appointment d-flex flex-column text-black fw-semibold">
        <h1>Edit Appointment</h1>
        <div class="appointment-input d-flex flex-column gap-3">
            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id'] ?? '') ?>">

            <label for="nama" class="form-label">Name *</label>
            <input type="text" class="form-control" name="name" id="nama" value="<?= htmlspecialchars($data['nama'] ?? '') ?>" placeholder="Full Name *" required>

            <label for="email" class="form-label">Age *</label>
            <input type="number" class="form-control" name="age" id="umur" value="<?= htmlspecialchars($data['umur'] ?? '') ?>" placeholder="example@gmail.com" required>

            <label for="dokter" class="form-label">Doctor *</label>
            <select class="form-select form-select-sm" name="doctor_id" id="doctor_id" required>
                    <?php foreach ($doctors as $doctor): ?>
                        <option <?php echo ($dokter==$doctor['id']) ? "selected" : " " ?>   value="<?= htmlspecialchars($doctor['id']); ?>">
                            <?= htmlspecialchars($doctor['nama']) . " - " . htmlspecialchars($doctor['speciality']); ?>
                        </option>
                    <?php endforeach; ?>
            </select>

            <label for="disease" class="form-label">Disease *</label>
            <input type="text" class="form-control" name="disease" id="disease" value="<?= htmlspecialchars($data['disease'] ?? '') ?>" required>


            <label for="waktu" class="form-label">Time *</label>
            <input type="datetime-local" class="form-control" name="time" id="waktu" value="<?= htmlspecialchars($data['waktu'] ?? '') ?>" required>
        </div>
        <button type="submit" name="edit_appointment" class="button-green text-light text-center border-0 mt-3">Save Changes</button>
    </form>
    <a class="text-danger text-decoration-none" href="history.php">cancel</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

