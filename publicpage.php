<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .btn-primary {
      background-color: #ff6b6b;
      color: #fff;
      padding: 10px 20px;
      border-radius: 50px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
      margin-top: 38px;
    }
  
    .btn-primary:hover {
      background-color: #e96060;
    }
  </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jesie's Website</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Jesie Llanes</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.facebook.com/jesiesllanes?mibextid=ZbWKwL" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
      <a href="login.php" class="btn btn-primary">Log In</a>
      <a href="registration.php" class="btn btn-primary">Register</a>
      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
    <style>
  .btn-primary {
    background-color: #ff6b6b;
    color: #fff;
    padding: 10px 20px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #e96060;
  }
</style>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Jesie Llanes</h1>
      <p>I'm a <span class="typed" data-typed-items="Student, Developer, Freelancer"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p>Welcome to my portfolio! My name is Jesie, and I am a passionate student pursuing a Bachelor's degree in Computer Engineering. Through my projects and experiences, I aim to contribute to the advancement of technology and make a positive impact on society. </p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Web Developer.</h3>
            <p class="fst-italic">
              
I am Jesie, a dedicated student of Computer Engineering, driven by a passion for technology and a desire to make a positive impact through innovation.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>4 March 2002</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>https://embedded-2020510.000webhostapp.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+63 921 3398 171</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Lipa, Batangas</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>21</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Bachelor's</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>llanesjesies@gmail.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p>
              With a strong foundation in programming and problem-solving, I am constantly seeking new challenges to expand my knowledge and skills in the field of technology. I believe in the power of innovation and its potential to transform the world we live in. Join me on this exciting journey as I explore the endless possibilities of the digital realm.<br><br><br><br>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    

    
    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p align= "justify">Thank you for taking the time to visit my portfolio. I am excited to connect with you and discuss any opportunities, collaborations, or inquiries you may have. Whether you have a question about my work, want to explore a potential project together, or simply wish to say hello, please feel free to reach out to me using the contact information provided below. I am eager to hear from you and engage in meaningful conversations. Let's connect and create something remarkable together!</p>
        <br></div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Bugtong na Pulo, Lipa City, Batangas</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>llanesjesies@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+63 921 3398 171</p>
              </div>
            </div>

          </div>

          

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>