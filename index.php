
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
    a {
        text-decoration: none;
        color: inherit;
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

    .form-appointment{
        background-color: white;
        padding: 30px 40px;
        border-radius: 10px;
        gap: 30px;
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
    }

    .button-green:hover {
        background-color: #005C63;
    }

    .mt-7 {
        margin-top: 5rem;
    }

    .mt-10 {
        margin-top: 10rem;
    }

    #hero-img {
        width: 500px;
    }

    #hero h1 span {
        color: #007E85 !important;
    }

    #cta {
        gap: 10rem;
    }

    #service-list{
        padding-bottom: 50px;
        margin-top: 10rem;
        margin-bottom: 80px;
    }
    
    .card {
        width: 390px;
        border: none;
    }   
    .card img{
        height: 220px;
    }

    #customer-review .card{
        width: 250px;
    }
    #customer-review .card img{
        height: 170px;
    }

    #team-list .doctor-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: black;
        margin: 0 auto;
    }

    #testimonials .profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: black;
    }

    .navbar-text {
        display: flex;
        justify-content: start;
        align-items: center;
    }

    .navbar-text p {
        margin: 0;
    }

    ul li a:hover {
        color: #007E85 !important;
    }

    @media screen and (max-width: 1000px) {
        #hero-img {
            width: 300px;
        }

        #cta {
            gap: 5rem;
        }

        #hero h1 {
            font-size: 1.8rem;
        }
        
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
                        <a class="nav-link" href="ComingSoon.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ComingSoon.php">Help</a>
                    </li>
                </ul>
                <span class="navbar-text d-flex flex-row gap-3">
                    <?php if(isset($_SESSION['nama'])): ?>
                        <p>Selamat datang, <?= $_SESSION['nama'] ?></p>
                        <a href="Logout.php" class="button-transparent">Logout</a>
                        <a href="history.php"><img src="images/history-svgrepo-com.svg" alt="" width="20"></a>
                    <?php else: ?>
                        <a class="button-transparent" href="FormRegistrasi.php">Sign Up</a>
                        <a class="button-green text-light" href="FormLogin.php">Log In</a>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </nav>

    <!-- hero -->
    <main>
        <section id="hero" class="container-md py-5 d-flex gap-5 flex-column flex-sm-row align-items-center">
            <div class="flex-fill d-flex flex-column text-center text-sm-start align-items-center align-items-sm-start">
                <h1>Providing Quality <span>Healthcare</span> for a <span>Brighter</span> and <span>Healthy</span> Future</h1>
                <p>At our hospital, we are dedicated to providing exceptional medical care to our patients and their families. Our experienced team of medical professionals, cutting-edge technology, and compassionate approach make us a leader in the healthcare industry</p>

                <div class="mt-5">
                    <a href="#" class="button-green">About Us</a>
                </div>
            </div>
            <div class="flex-fill">
                <img id="hero-img" src="./images/hero-img.png" alt="hero">
            </div>
        </section>

        <div class="container-md my-5 find-doctor bg-white rounded-4 p-5">
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

        <section id="stat" class="container-md mt-7">
            <h1 class="text-center text-green">Our Results In Numbers</h1>
            <div class="d-flex flex-column flex-md-row gap-5 mt-5">
                    <div class="flex-fill text-center">
                        <h3 class="text-green fs-1 fw-bold">
                            99%
                        </h3>
                        <p class="fw-bold">Customer Satisfaction</p>
                    </div>
                    <div class="flex-fill text-center">
                        <h3 class="text-green fs-1 fw-bold">
                            15k
                        </h3>
                        <p class="fw-bold">Online Patients</p>
                    </div>
                    <div class="flex-fill text-center">
                        <h3 class="text-green fs-1 fw-bold">
                            12k
                        </h3>
                        <p class="fw-bold">Patients Recovered</p>
                    </div>
                    <div class="flex-fill text-center">
                        <h3 class="text-green fs-1 fw-bold">
                            240%
                        </h3>
                        <p class="fw-bold">Company Growth</p>
                    </div>
                </div>
        </section>

        <section id="cta" class="d-flex align-items-center flex-column flex-md-row container-md mt-10">
            <div class="flex-1">
                <h1 class="text-green">You have lots of reason to choose us</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam.</p>

                <div class="d-flex gap-3 mt-5">
                    <a href="#" class="button-green rounded-pill">Get Started</a>
                    <a href="#" class="button-transparent rounded-pill">Talk to Sales</a>
                </div>
            </div>
            <div class="flex-1">
                <img src="./images/surgery.png" alt="surgery" class="img-fluid">
            </div>
        </section>

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

        <section class="container-md" id="team-list">
            <h1 style="color: #007E85" class="text-center">Meet Our Team</h1>
            <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipiscing elit semper dalar <br> elementum tempus hac tellus libero accumsan. </p>

            <div class="row d-flex justify-content-center gap-4">
                <div class="card col-4 bg-white px-4 py-5 rounded-4">
                    <figure class="doctor-img d-flex justify-content-center align-items-center">
                        <img src="./images/doc1.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="text-center mt-5">
                        <h5 class="text-green">John Carter</h5>
                        <h6>CEO & CO-FOUNDER</h6>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>
                    </div>
                </div>
                <div class="card col-4 bg-white px-4 py-5 rounded-4">
                    <figure class="doctor-img d-flex justify-content-center align-items-center">
                        <img src="./images/doc2.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="text-center mt-5">
                        <h5 class="text-green">Sophie Moore</h5>
                        <h6>DENTAL SPECIALIST</h6>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>
                    </div>
                </div>
                <div class="card col-4 bg-white px-4 py-5 rounded-4">
                    <figure class="doctor-img d-flex justify-content-center align-items-center">
                        <img src="./images/doc3.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="text-center mt-5">
                        <h5 class="text-green">Matt Cannon</h5>
                        <h6>ORTHOPEDIC</h6>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>
                    </div>
                </div>
                <div class="card col-4 bg-white px-4 py-5 rounded-4">
                    <figure class="doctor-img d-flex justify-content-center align-items-center">
                        <img src="./images/doc4.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="text-center mt-5">
                        <h5 class="text-green">Andy Smith</h5>
                        <h6>BRAIN SURGEON</h6>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>
                    </div>
                </div>
                <div class="card col-4 bg-white px-4 py-5 rounded-4">
                    <figure class="doctor-img d-flex justify-content-center align-items-center">
                        <img src="./images/doc5.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="text-center mt-5">
                        <h5 class="text-green">Lily Woods</h5>
                        <h6>HEART SPECIALIST</h6>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>
                    </div>
                </div>
                <div class="card col-4 bg-white px-4 py-5 rounded-4">
                    <figure class="doctor-img d-flex justify-content-center align-items-center">
                        <img src="./images/doc6.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="text-center mt-5">
                        <h5 class="text-green">Patrick Meyer</h5>
                        <h6>EYE SPECIALIST</h6>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>
                    </div>
                </div>
        </section>

        <section id="testimonials" class="container-md mt-7">
            <h1 style="color: #007E85" class="text-center">Testimonials</h1>
            <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipiscing elit semper dalar <br> elementum tempus hac tellus libero accumsan. </p>
            <div class="row d-flex justify-content-center gap-4">
                <div class="card col-6 bg-white p-5 rounded-4">
                    <figure class="profile-img d-flex justify-content-start align-items-start">
                        <img src="./images/testi1.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="mt-2">
                        <h5>“An amazing service”</h5>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>

                        <h6 class="text-green mt-5">John Carter</h6>
                        <p>CEO at Google</p>
                    </div>
                    
                </div>
                <div class="card col-6 bg-white p-5 rounded-4">
                    <figure class="profile-img d-flex justify-content-start align-items-start">
                        <img src="./images/testi2.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="mt-2">
                        <h5>“One of a kind service”</h5>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>

                        <h6 class="text-green mt-5">Monroe</h6>
                        <p>MD at Facebook</p>
                    </div>
                    
                </div>
                <div class="card col-6 bg-white p-5 rounded-4">
                    <figure class="profile-img d-flex justify-content-start align-items-start">
                        <img src="./images/testi3.png" alt="doc1" class="object-fit-cover" style="width: 100%; height: 100%; object-fit: cover;">
                    </figure>

                    <div class="mt-2">
                        <h5>“The best service</h5>
                        <p>Lorem ipsum dolor sit amet consecte adipiscing elit amet hendrerit pretium nulla sed enim iaculis mi.</p>

                        <h6 class="text-green mt-5">Andy Smith</h6>
                        <p>CEO Dot Austere</p>
                    </div>
                    
                </div>
            </div>
        </section>

        <section id="companies" class="container-md mt-7 mb-5">
            <h1 class="text-green text-center">Trusted by 10,000+ companies around the world</h1>

            <div class="d-flex flex-wrap gap-5 justify-content-center mt-5">
                <img src="./images/google2.png" alt="Google">
                <img src="./images/facebook1.png" alt="facebook">
                <img src="./images/Twitch.png" alt="twitch">
                <img src="./images/Webflow.png" alt="webflow">
                <img src="./images/YouTube.png" alt="youtube">
            </div>
        </section>

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
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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