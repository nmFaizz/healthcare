<?php
session_start();

include('config.php');

$query = "SELECT * FROM dokter";
$result = mysqli_query($db, $query);

$doctors = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;  
    }
}

$doctors_json = json_encode($doctors);
echo "<script>console.log(" . $doctors_json . ");</script>";
echo "<script>const doctorsData = " . $doctors_json . ";</script>";


mysqli_free_result($result);
mysqli_close($db);

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
        color: white;
    }
    #footer a:hover{
        color: black;
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

    li{
        list-style: none;
    }

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
        margin-right: 50px;
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

    /* ----  Service We Provide ----*/

    #service-list{
        padding-bottom: 50px;
        margin-top: 80px;
        margin-bottom: 80px;
    }
    .card {
        width: 390px;
        border: none;
    }   
    .card img{
        height: 220px;
    }

    /* ---- Customer Review ---- */
    #customer-review .card{
        width: 300px;
    }
    #customer-review .card .stars{
        width: 130px;
        height: 22px;
    }
    #customer-review .card .user-profile{
        width: 50px;
        height: 50px;
    }

    /* ---- FAQ ---- */
    #faq .card{
        width: 300px;
        height: 150px;
    }
    #faq .arrow{
        width: 8px;
        height: 17px;
    }

    .doctor-result {
      margin-top: 20px;
    }
    .doctor-card {
      border: 1px solid #ccc;
      padding: 10px;
      margin: 5px;
    }

    @media (max-width: 1000px) {
        .form-appointment{
            margin-right: 0;
        }
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ComingSoon.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ComingSoon.php">Help</a>
                    </li>
                </ul>
                <div class="navbar-text d-flex gap-3 align-items-center justify-content-center">
                    <?php if(isset($_SESSION['id'])): ?>
                        <p class="mb-0">Selamat datang, <?=$_SESSION['nama']?></p>
                        <a href="Logout.php" class="button-transparent">Logout</a>
                        <a href="history.php"><img src="images/history-svgrepo-com.svg" alt="" width="20"></a>
                    <?php else: ?>
                        <a class="button-transparent" href="FormRegistrasi.php">Sign Up</a>
                        <a class="button-green text-light" href="FormLogin.php">Log In</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    
    <div class="container-fluid py-5 d-flex flex-column flex-lg-row justify-content-center bg-hero" id="service">
        <div class="flex-fill p-5 lc-block jumbotron-content">
            <div class="lc-block">
                <div editable="rich">
                    <h2 class="fw-bolder display-3">Meet the Best <br/> Hospital</h2>
                </div>
            </div>
            <div class="lc-block mt-5">
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
        <form action="Appointment.php" id="appointment-form" method="POST" class="flex-fill form-appointment d-flex flex-column text-black fw-semibold">
            <h1>Book Appointment</h1>
            <div class="appointment-input d-flex flex-column gap-2">
                <?php if(isset($_SESSION['id'])): ?>
                    <input style="visibility: hidden;" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">    
                <?php endif; ?>
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name *" required>
                
                <label for="age" class="form-label">Age *</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Your Age *" required>

                <label for="disease" class="form-label">Disease *</label>
                <textarea class="form-control" name="disease" id="disease" required rows="3" style="resize: none;"> </textarea>
                
                <label for="doctor" class="form-label">Doctor *</label>
                <select class="form-select form-select-sm" name="doctor" id="doctor" required>
                    <option value="" selected disabled>Choose Your Doctor</option>
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?= htmlspecialchars($doctor['id']); ?>">
                            <?= htmlspecialchars($doctor['nama']) . " - " . htmlspecialchars($doctor['speciality']); ?>
                        </option>
                    <?php endforeach; ?>
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
        <form id="doctor-form" class="d-flex flex-column flex-lg-row gap-3 mt-4">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="find-doctor-name" name="nama" placeholder="Name">
                    <label for="find-doctor-name">Name</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="find-doctor-speciality" name="speciality" placeholder="Speciality">
                    <label for="find-doctor-speciality">Speciality</label>
                </div>
            </div>
            <div>
                <button type="submit" id="find-doctor" class="button-green text-white border-0 search-button fw-semibold">Search</button>
            </div>
        </form>

        <div id="doctor-results" class="mt-5">
            
        </div>
    </div>

    <!-------- Services We Provide --------->
    <section>
        <div class="container" id="service-list">
            <h1 style="color: #007E85" class="text-center">Services We Provide</h1>
            <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipiscing elit semper dalar <br> elementum tempus hac tellus libero accumsan. </p>
            <div class="row gap-4 mb-3 d-flex justify-content-center">
                <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                    <img src="./images/img1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dental treatments</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consecte tur adipiscing elit semper dalaracc lacus vel facilisis volutpat est velitolm.</p>
                    </div>
                </div>
            
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/img2.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Eye Care</h5>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto quibusdam eaque laboriosam modi libero vitae dolorum nobis, dicta suscipit, aliquam vel nihil aut reiciendis eum sit fuga ab. Autem, quam?</p>
                </div>
            </div>
            
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/img3.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Surgery</h5>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio tenetur in soluta hic, consectetur, rem provident harum rerum similique animi obcaecati ducimus fuga reprehenderit laborum porro laudantium. Dolore, quisquam expedita.</p>
                </div>
            </div>
            </div>
            
            <div class="row gap-4 d-flex justify-content-center">
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/img4.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Cardiology</h5>
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae ad illo cupiditate sequi dolore incidunt exercitationem aliquam, provident animi deleniti saepe? Error culpa cumque natus minus enim inventore iusto numquam.</p>
                </div>
            </div>
            
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/img5.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Diagnosis</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. A perspiciatis doloremque rerum quae perferendis! Unde recusandae voluptate quis quibusdam corrupti blanditiis, beatae fuga consectetur sed eius id natus commodi rem!</p>
                </div>
            </div>
            
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/img6.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bones treatments</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eos soluta quasi voluptatibus incidunt quisquam temporibus quaerat nihil reprehenderit quo at facere consequatur, repellendus eligendi quis cumque velit est eveniet.</p>
                </div>
            </div>
            </div>        
        </div>
    </section>
    <!-------- End Services We Provide --------->


    <!------- Customer Reviews------->
    <section>
        <div class="container pb-5" id="customer-review">
            <h1 style="color: #007E85" class="text-center">What Our Customer Say</h1>
            <p class="text-center mb-5">Problems trying to resolve the conflict between the two major realms of <br> Classical physics: Newtonian mechanics </p>
            <div class="row gap-5 mb-3 d-flex justify-content-center">
                <div class="card col-sm-6 col-lg-4 p-4">
                    <img class="stars mb-3" src="./images/stars.png" alt="">
                    <p>Slate helps you see how many 
                    more days you need to work to 
                    reach your financial goal.</p>
                    <img class="user-profile" src="./images/user1.jpg" alt="user">
                </div>
                <div class="card col-sm-6 col-lg-4 p-4">
                    <img class="stars mb-3" src="./images/stars.png" alt="">
                    <p>Slate helps you see how many 
                    more days you need to work to 
                    reach your financial goal.</p>
                    <img class="user-profile" src="./images/user2.jpg" alt="user">
                </div>
                <div class="card col-sm-6 col-lg-4 p-4">
                    <img class="stars mb-3" src="./images/stars.png" alt="user">
                    <p>Slate helps you see how many 
                    more days you need to work to 
                    reach your financial goal.</p>
                    <img class="user-profile" src="./images/user3.jpg" alt="user">
                </div>
            </div>
        </div>
        
    </section>
    <!------- End Customer Reviews------->

    <!------- FAQ------->         
    <section>
        <div class="container mt-5" id="faq">
            <h1 class="text-center">FAQ</h1>
            <p class="text-center mb-5">Problems trying to resolve the conflict between the two major realms of <br> Classical physics: Newtonian mechanics </p>
            <div class="row gap-5 mb-3 d-flex justify-content-center">
                <div class="card col-sm-6 col-lg-4 p-4 d-flex flex-row ">
                    <img class="arrow me-3" src="./images/icn arrow-right icn-xs.png" alt="">
                    <div>
                        <p class="fw-bold">The Quick Fox Jumps Over The 
                        Lazy Dog</p>
                        <p>Things on a very small scale 
                        behave like nothing </p>  
                    </div>
                </div>
                <div class="card col-sm-6 col-lg-4 p-4 d-flex flex-row">
                    <img class="arrow me-3" src="./images/icn arrow-right icn-xs.png" alt="">
                    <div>
                        <p class="fw-bold">The Quick Fox Jumps Over The 
                        Lazy Dog</p>
                        <p>Things on a very small scale 
                        behave like nothing </p>  
                    </div>
                </div>
                <div class="card col-sm-6 col-lg-4 p-4 d-flex flex-row">
                    <img class="arrow me-3" src="./images/icn arrow-right icn-xs.png" alt="">
                    <div>
                        <p class="fw-bold">The Quick Fox Jumps Over The 
                        Lazy Dog</p>
                        <p>Things on a very small scale 
                        behave like nothing </p>  
                    </div>
                </div>
                <div class="card col-sm-6 col-lg-4 p-4 d-flex flex-row">
                    <img class="arrow me-3" src="./images/icn arrow-right icn-xs.png" alt="">
                    <div>
                        <p class="fw-bold">The Quick Fox Jumps Over The 
                        Lazy Dog</p>
                        <p>Things on a very small scale 
                        behave like nothing </p>  
                    </div>
                </div>
                <div class="card col-sm-6 col-lg-4 p-4 d-flex flex-row">
                    <img class="arrow me-3" src="./images/icn arrow-right icn-xs.png" alt="">
                    <div>
                        <p class="fw-bold">The Quick Fox Jumps Over The 
                        Lazy Dog</p>
                        <p>Things on a very small scale 
                        behave like nothing </p>  
                    </div>
                </div>
                <div class="card col-sm-6 col-lg-4 p-4 d-flex flex-row">
                    <img class="arrow me-3" src="./images/icn arrow-right icn-xs.png" alt="">
                    <div>
                        <p class="fw-bold">The Quick Fox Jumps Over The 
                        Lazy Dog</p>
                        <p>Things on a very small scale 
                        behave like nothing </p>  
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!------- End FAQ------->

    <!------- Footer -------->
    <section class="mt-5">
        <div style="background-color: #007E85;" class="text-white py-4" id="footer">
            <div class="container p-5 d-flex flex-wrap justify-content-between">
                <div class="mb-4 me-4">
                    <a class="navbar-brand" href="#">
                        <img src="./images/logofooter.png" alt="logo" width="200">
                    </a>
                    <p>Copyright © 2022 BRIX Templates <br> | All Rights Reserved </p>
                </div>
                <div class="mb-4 me-4">
                    <h5 class="fw-bold mb-4" >Product</h5>
                    <li class="d-flex flex-column">
                        <a href="#" >Features</a>
                        <a href="#" >Pricing</a>
                        <a href="#" >Case Studies</a>
                        <a href="#" >Reviews</a>
                        <a href="#" >Updates</a>
                    </li>
                </div>
                <div class="mb-4 me-4">
                    <h5 class="fw-bold mb-4" >Company</h5>
                    <li class="d-flex flex-column">
                        <a href="#" >About</a>
                        <a href="#" >Contact Us</a>
                        <a href="#" >Careers</a>
                        <a href="#" >Cultures</a>
                        <a href="#" >Blog</a>
                    </li>
                </div>
                <div class="mb-4 me-4">
                    <h5 class="fw-bold mb-4" >Support</h5>
                    <li class="d-flex flex-column">
                        <a href="#" >Getting Started</a>
                        <a href="#" >Help Center</a>
                        <a href="#" >Server Status</a>
                        <a href="#" >Report a Bug</a>
                        <a href="#" >Chat Support</a>
                    </li>
                </div>
                <div class="mb-4 me-4">
                    <h5 class="fw-bold mb-4" >Support</h5>
                    <li class="d-flex flex-column">
                        <a href="#" >
                            <img src="./images/icon-Facebook.png" alt="">
                            Facebook
                        </a>
                        <a href="#" >
                            <img src="./images/Twitter.png" alt="">
                            Twitter
                        </a>
                        <a href="#" >
                            <img src="./images/Instagram.png" alt="">
                            Instagram
                        </a>
                        <a href="#" >
                            <img src="./images/LinkedIn.png" alt="">
                            LinkedIn
                        </a>
                        <a href="#" >
                            <img src="./images/icon-YouTube.png" alt="">
                            Youtube
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </section>
    <!------- End Footer -------->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    doctorsData.forEach(doctor => {
        console.log(`Nama Dokter: ${doctor.nama}, Spesialisasi: ${doctor.speciality}`);
    });

    document.getElementById("doctor-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent form submission
    const nameInput = document.getElementById("find-doctor-name").value.toLowerCase();
    const specialityInput = document.getElementById("find-doctor-speciality").value.toLowerCase();
    const resultsContainer = document.getElementById("doctor-results");
    resultsContainer.innerHTML = ""; // Clear previous results

    const filteredDoctors = doctorsData.filter(doctor => {
        const nameMatch = nameInput ? doctor.nama.toLowerCase().includes(nameInput) : true;
        const specialityMatch = specialityInput ? doctor.speciality.toLowerCase().includes(specialityInput) : true;
        return nameMatch && specialityMatch;
    });

    if (filteredDoctors.length) {
        filteredDoctors.forEach(doctor => {
            const card = `
                <div class="doctor-card">
                    <h5>${doctor.nama}</h5>
                    <p>Speciality: ${doctor.speciality}</p>
                    <p>Email: ${doctor.email}</p>
                </div>
            `;
            resultsContainer.innerHTML += card;
        });
    } else {
        resultsContainer.innerHTML = "<p>No doctors found.</p>";
    }
});


</script>

</body>
</html>