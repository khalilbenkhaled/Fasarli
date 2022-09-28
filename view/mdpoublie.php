<?php

include_once 'C:\xampp\htdocs\Fassarli/Model/User.php';
include_once 'C:\xampp\htdocs\Fassarli/Controller/UserC.php';

$error = "";
if (isset($_POST["Email"])){
$Reset_password=substr(number_format(time()* rand(), 0,'',''), 0, 6);   
$bdd=  new PDO('mysql:host=localhost;dbname=bd_fassarli', 'root', '');
$updateCodemdp= $bdd->prepare('UPDATE users SET CodeMDP = ? WHERE AdresseMail_user = ? ');
$updateCodemdp->execute(array($Reset_password,$_POST['Email']));

require "PHPMailer/PHPMailerAutoload.php";
    function smtpmailer($to, $from, $from_name, $subject, $body)
                {
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true; 
             
                    $mail->SMTPSecure = 'ssl'; 
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465;  
                    $mail->Username = 'mariemmiladi2001@gmail.com';
                    $mail->Password = 'Miladoc73.';   
               
               //   $path = 'reseller.pdf';
               //   $mail->AddAttachment($path);
               
                    $mail->IsHTML(true);
                    $mail->From="mariemmiladi2001@gmail.com";
                    $mail->FromName=$from_name;
                    $mail->Sender=$from;
                    $mail->AddReplyTo($from, $from_name);
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->AddAddress($to);
                    if(!$mail->Send())
                    {
                        $error ="Please try Later, Error Occured while Processing...";
                        return $error; 
                    }
                    else 
                    {
                        $error = "Thanks You !! Your email is sent.";  
                        return $error;
                    }
                }
                
                $to   = $_POST['Email'];
                $from = 'mariemmiladi2001@gmail.com';
                $name = 'Fassarli';
                $subj = 'Reset Password Fassarli account';
                $msg = 'The verification code of your Fassarli account is : <b style="font_size: 30px;">'.$Reset_password . '</b>. Enter it to reset your password. ';
                
                $error=smtpmailer($to,$from, $name ,$subj, $msg);
                header ('Location: codemdp.php');
              }
              
              else
                  $error = "Missing information";
               
              
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fassarli / Verification </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="Accueil.php">Fassarli</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="Accueil.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="courses.html">Courses</a></li>
          <li><a href="trainers.html">Trainers</a></li>
          <li><a href="events.html">Events</a></li>
          <li><a href="pricing.html">Pricing</a></li>

          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <li class="nav-item d-flex align-items-center">
              <a class="active" href="Login.php" class="bi bi-person-circle">
                <!--class="nav-link text-body font-weight-bold px-0">-->
                <i class="fa fa-user me-sm-1" aria-hidden="true"></i>
                <span class="d-sm-inline d-none">Login </span>
              </a>
            </li>
          
        <li class="nav-item d-flex align-items-center">
              <a  href="ajouterUtilisateur.php" class="bi bi-person-circle">
                <!--class="nav-link text-body font-weight-bold px-0">-->
                <i class="fa fa-user me-sm-1" aria-hidden="true"></i>
                <span class="d-sm-inline d-none">Register </span>
              </a>
        </li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!--<a href="Register.html" class="get-started-btn">Get Started</a>
          <a href="Profile.php" class="bi bi-person-circle"> </a>-->
  <!--<ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Profile</span>
              </a>
          </li>-->
          
  </ul>
    </div>
  </header><!-- End Header -->
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="Accueil.html" class="logo d-flex align-items-center w-auto">
                  <img src="logo site web.png" alt="">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Account information to reset password </h5>
                    <p class="text-center small">We need your Email to sent a verification code. Enter it below to reset your password</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="">
                  <div class="col-12">
                      <label for="yourMail" class="form-label">Email address</label>
                      <div class="input-group has-validation">
                        <!--<span class="input-group-text" id="inputGroupPrepend">@</span>-->
                        <input type="email" name="Email" class="form-control" id="yourEmail" placeholder="example@email.com"  required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>
                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Submit to reset Password</button>
                      <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 )
                        echo "<p style='color:red'>Code de vérification incorrect</p>";
                }
                ?>
                     
                    </div>

                </div>
              </div>

              <!-- <div class="credits">-->
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>-->

            </div>
          </div>
        </div>

      </section>
      </div>
  </main><!-- End #main -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>-

</body>

</html>