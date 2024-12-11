

<?php session_start() ?>


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

    #customer-review .card{
        width: 250px;
    }
    #customer-review .card img{
        height: 170px;
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
                <?php if(isset($_SESSION['id'])): ?>
                    <span class="navbar-text">
                        <p>Halo, <?=$_SESSION['nama']?> </p>
                    </span>
                <?php endif; ?>
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
        <div class="form-appointment d-flex flex-column text-black fw-semibold">
            <h1>Book Appointment</h1>
            <div class="appointment-input d-flex flex-column gap-2">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name *">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com">
                <label for="department" class="form-label">Department *</label>
                <select class="form-select form-select-sm" aria-label="Small select example" name="department" id="department">
                    <option selected>Please Select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="time" class="form-label" id="time">Time *</label>
                <select class="form-select form-select-sm" aria-label="Small select example" name="time" id="time">
                    <option selected>4:00 Available</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <button class="button-green text-light text-center border-0" href="#">Book Appointment</button>
        </div>
    </div>

    <section>
        <div class="container my-5 find-doctor bg-white rounded-4 p-5">
            <h1>Find A Doctor</h1>
            <div class="d-flex flex-column flex-lg-row gap-3 mt-4">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control border-green" id="find-doctor-name" placeholder="Name">
                        <label for="floatingInputGrid">Name</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control border-green" id="find-doctor-speciality" placeholder="Speciality">
                        <label for="floatingInputGrid">Speciality</label>
                    </div>
                </div>
                <button class="button-green text-white border-0 search-button fw-semibold">Search</button>
            </div>
        </div>
    </section>
    

    <!------- Services we Prodivide -------->
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
    <!------- End Services we Provide -------->
    
    <!------- Customer Reviews------->
    <section>
    <div class="container" id="customer-review">
        <h1 style="color: #007E85" class="text-center">What Our Customer Say</h1>
        <p class="text-center mb-5">Problems trying to resolve the conflict between the two major realms of <br> Classical physics: Newtonian mechanics </p>
        <div class="row gap-5 mb-3 d-flex justify-content-center">
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/icn bxs-star.png" alt="">
                <img src="./images/card-content.png" class="card-img-top" alt="...">
            </div>
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/card-content.png" class="card-img-top" alt="...">
                
            </div>
            <div class="card col-sm-6 col-lg-4 pt-3 rounded-4">
                <img src="./images/card-content.png" class="card-img-top" alt="...">
            </div>
        </div>
        
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>