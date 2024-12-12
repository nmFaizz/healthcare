<?php
include('config.php');

// Query to fetch all doctors
$query = "SELECT * FROM dokter";
$result = mysqli_query($db, $query);

// Create an array to store doctor details
$doctors = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;  // Store each doctor in the array
    }
}

// Free the result set and close the connection
mysqli_free_result($result);
mysqli_close($db);

// Get search parameters from the form (if any)
$searchName = isset($_GET['name']) ? $_GET['name'] : '';
$searchSpeciality = isset($_GET['speciality']) ? $_GET['speciality'] : '';

// Filter doctors based on the search parameters
$filteredDoctors = array_filter($doctors, function($doctor) use ($searchName, $searchSpeciality) {
    $matchName = stripos($doctor['name'], $searchName) !== false;  
    $matchSpeciality = stripos($doctor['speciality'], $searchSpeciality) !== false; 
    return $matchName && $matchSpeciality;
});

// Pass the filtered doctors to JavaScript by encoding it to JSON
$doctorsJson = json_encode(array_values($filteredDoctors));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickDoc - Make appointment easy.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<style>
    body{
        background-color: whitesmoke;
    }
    /* -------------- Nav ----------------- */
    a {
        text-decoration: none;
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

    .button-green {
        background-color: #007E85;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .button-green:hover {
        background-color: #005C63;
    }

    ul li a:hover {
        color: #007E85 !important;
    }
    /* -------------- End Nav ----------------- */


    #service{
        color: white;
    }
    #service h1{
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        line-height: 32px; /* 133.333% */
        letter-spacing: 0.1px;
    }
    .bg-hero{
        background:linear-gradient(0deg, rgba(23, 23, 23, 0.19), rgba(23, 23, 23, 0.19)), url('images/national-cancer-institute-1c8sj2IO2I4-unsplash.jpg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .bg-hero img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    .form-appointment{
        background-color: white;
        padding: 30px 40px;
        border-radius: 10px;
        gap: 30px;
    }
    .border-green{
        border: 2px solid #007E85;
    }
    .jumbotron-content .border-green:hover{
        background-color: #007E85;
    }
    input{
        border: 1px solid black;
    }
    .search-button{
        width: 200px;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-md">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="logo" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <!-- Center the navbar items -->
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
                <div class="navbar-text d-flex align-items-center justify-content-center">
                    <?php if(isset($_SESSION['id'])): ?>
                        <p class="mb-0">Halo, <?=$_SESSION['nama']?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    
    <div class="container-fluid py-5 d-flex flex-column flex-lg-row justify-content-center bg-hero" id="service">
        <div class="p-5 lc-block col-xxl-7 col-lg-8 col-12 jumbotron-content">
            <div class="lc-block">
                <div editable="rich">
                    <h2 class="fw-bolder display-3">Meet the Best <br/> Hospital</h2>
                </div>
            </div>
            <div class="lc-block col-md-8 mt-5">
                <div editable="rich">
                    <p class="lead fw-normal">
                        We know how large objects will act, 
                        but things on a small scale.
                    </p>
                </div>
            </div>
            <div class="d-flex gap-3 mt-5">
                <a class="button-green text-light text-center rounded-pill fw-semibold" href="#">Get Quote Now</a>
                <a class="button-transparent text-light text-center rounded-pill fw-semibold border-green" href="#">Learn More</a>
            </div>
        </div>
        <form action="Appointment.php" method="POST" class="form-appointment d-flex flex-column text-black fw-semibold">
            <h1>Book Appointment</h1>
            <div class="appointment-input d-flex flex-column gap-2">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name *" required>
                
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" required>
                
                <label for="department" class="form-label">Department *</label>
                <select class="form-select form-select-sm" name="department" id="department" required>
                    <option value="" selected disabled>Please Select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                
                <label for="time" class="form-label">Time *</label>
                <input type="datetime-local" class="form-control" name="time" id="time" required>
            </div>
            <button type="submit" name="book_appointment" class="button-green text-light text-center border-0">Book Appointment</button>
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <p class="text-success">Appointment successfully made!</p>
            <?php endif; ?>
        </form>

    </div>

    
                
    <!-- Form to input search criteria -->
    <div class="container my-5 find-doctor bg-white rounded-4 p-5">
        <h1>Find A Doctor</h1>
        <div class="d-flex flex-column flex-lg-row gap-3 mt-4">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="find-doctor-name" name="name" placeholder="Name" value="<?= htmlspecialchars($searchName) ?>">
                    <label for="find-doctor-name">Name</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="find-doctor-speciality" name="speciality" placeholder="Speciality" value="<?= htmlspecialchars($searchSpeciality) ?>">
                    <label for="find-doctor-speciality">Speciality</label>
                </div>
            </div>
            <form action="service.php" method="GET">
                <button type="submit" class="button-green text-white border-0 search-button fw-semibold">Search</button>
            </form>
        </div>

        <div id="doctor-results" class="mt-5">
            <!-- Doctors will be displayed here -->
            <?php if (count($filteredDoctors) > 0): ?>
                <?php foreach ($filteredDoctors as $doctor): ?>
                    <div class="doctor-item">
                        <h5><?= htmlspecialchars($doctor['name']) ?></h5>
                        <p>Speciality: <?= htmlspecialchars($doctor['speciality']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No doctors found.</p>
            <?php endif; ?>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>