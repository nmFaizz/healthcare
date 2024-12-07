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
    .appointment-input{
        gap: 5px;
    }
    .jumbotron-content .button-transparent{
        border: 2px solid #007E85;
    }
    .jumbotron-content .button-transparent:hover{
        background-color: #007E85;
    }
    input{
        border: 1px solid black;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
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
                <span class="navbar-text">
                    <a class="button-transparent" href="#">Sign Up</a>
                    <a class="button-green text-light" href="#">Log In</a>
                </span>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid py-5 d-flex  flex-column flex-lg-row justify-content-center bg-hero" id="service">
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
                <a class="button-transparent text-light text-center rounded-pill fw-semibold" href="#">Learn More</a>
            </div>
        </div>
        <div class="form-appointment d-flex flex-column text-black fw-semibold">
            <h1>Book Appointment</h1>
            <div class="appointment-input d-flex flex-column">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" id="name" placeholder="Full Name *">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                <label for="department" class="form-label">Department *</label>
                <select class="form-select form-select-sm" aria-label="Small select example" id="department">
                    <option selected>Please Select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="time" class="form-label">Time *</label>
                <select class="form-select form-select-sm" aria-label="Small select example" id="time">
                    <option selected>4:00 Available</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <a class="button-green text-light text-center" href="#">Book Appointment</a>
        </div>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>