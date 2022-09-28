<?php
    
    include_once 'C:\xampp\htdocs\Fassarli/Model/User.php';
    include_once 'C:\xampp\htdocs\Fassarli/Controller/UserC.php';
   /* //Import PHPMailer classes into the global namespace 
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    require "PHPMailer/src/Exception.php";

    //Load Composer's autoloader
    require 'C:\xampp\phpMyAdmin\vendor\autoload.php';*/
   
    $error = "";

    // create utilisateur
    $User = null;


    // create an instance of the controller
    $UserC = new UserC();

    if (
      
		    isset($_POST["First_name"]) &&
        isset($_POST["Last_name"]) &&		
        isset($_POST["Email"]) &&
		    isset($_POST["Password"]) && 
        isset($_POST["Role"])
       
       ) 
         {
            $Verification_code= substr(number_format(time()* rand(), 0,'',''), 0, 6);
            
            $User = new User(
                null,
    		        $_POST['First_name'],
                $_POST['Last_name'],
                $_POST['Email'], 
			        	md5($_POST['Password']),
                $_POST['Role'],
                null,
                $Verification_code,
                null,
            );

            
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
                $subj = 'Confirmation de compte Fassarli';
                $msg = 'The confirmation code of your Fassarli account is: <b style="font_size: 30px;">'.$Verification_code . '</b> ';
                
                $error=smtpmailer($to,$from, $name ,$subj, $msg);
                
            
            
           /* $mail= new PHPMailer(true);
           //set a host
              $mail->Host="smtp.gmail.com";
              $mail->SMTPDebug=3;
           //enable smtp
              $mail->isSMTP();
           //set authentification to true  
              $mail->SMTPAuth= true;

              $mail->Username="mariemmiladi2001@gmail.com";
              $mail->Password="Miladoc73.";

           //set type protection
              $mail->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port=587;
              $mail->setFrom("mariemmiladi2001@gmail.com","moula site");

           //set where we are sending email
              $mail->addAddress($_POST['Email']);

              $mail->isHTML(true);
              $verification_code= substr(number_format(time()* rand(), 0,'',''), 0, 6);
              $mail->subject = "Email verification";
              $mail->Body ='<p> Your verification code is: <b style="font_size: 30px;">'.$verification_code . '</b></p>';
              $mail->send(); 
              $encrypted_password= password_hash($Password, PASSWORD_DEFAULT);
              if ($mail->send()) {
                echo "email is sent";
                //header('Location: page off.php');
    
            } else {
                echo "something wrong happened " . $mail->ErrorInfo;;
            }*/
           

            $UserC->ajouterUtilisateur($User);
            //header('Location:afficherUser.php');
            //header('Location:Accueil.php');
            header ('Location:codemail.php');
        }
        
        else
            $error = "Missing information";
    

    
?>
<!--**<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherUser.php">Retour à la liste des utilisateurs</a></button>
        <hr>
        
        <div id="error">
            
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID_user">ID Utilisateur:
                        </label>
                    </td>
                    <td><input type="text" name="ID_user" id="ID_user" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Name">Name:
                        </label>
                    </td>
                    <td><input type="text" class="form-control" placeholder="First name" aria-label="First name"></td>
                    <td><input type="text" class="form-control" placeholder="First name" aria-label="First name"></td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>-->
                <!-- **</tr>
                <tr>
                    <td>
                        <label for="Email">Email:
                        </label>
                    </td>
                    <td><input type="text" name="Email" id="Email" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Password">Password:
                        </label>
                    </td>
                    <td>
                        <input type="Password" name="Password" id="Password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Role">Role:
                        </label>
                    </td>
                    <td>
                    <select id="Role" class="form-select" >
                        <option value="">Student</option>
                        <option value="">Professor</option>
                        <option value="" selected>  </option>
                       </select>
                    </td>
                </tr>
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>**-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fassarli / Register </title>
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
          <li><a  href="about.php">About</a></li>
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
              <a href="Login.php" class="bi bi-person-circle">
                <!--class="nav-link text-body font-weight-bold px-0">-->
                <i class="fa fa-user me-sm-1" aria-hidden="true"></i>
                <span class="d-sm-inline d-none">Login </span>
              </a>
            </li>
          
        <li class="nav-item d-flex align-items-center">
              <a class="active" href="ajouterUtilisateur.php" class="bi bi-person-circle">
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
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="">
                   <!-- <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" placeholder="First Name" required>  
                      <input type="text" name="name" class="form-control" id="yourName" placeholder="Last Name" required> 
                      <div class="invalid-feedback">Please, enter your name!</div>-->
                    
                      <div class="row">
                        <label for="Name" class="form-label">Name</label>
                        <div class="col">
                          <input type="text" name="First_name" class="form-control" placeholder="First name" aria-label="First name"  required>
                        </div>
                        <div class="col">
                          <input type="text" name="Last_name" class="form-control" placeholder="Last name" aria-label="Last name"  required>
                        </div>
                      </div>
                     <div class="invalid-feedback">Please, enter your name!</div>
                    

                    <div class="col-12">
                      <label for="Email" class="form-label">Email</label>
                      <input type="email" name="Email" class="form-control" id="yourEmail" placeholder="example@email.com" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                   <!-- <div class="col-12">
                      <label for="yourPassword" class="form-label">Your Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>-->

                    <div class="col-12">
                      <label for="Password" class="form-label">Password</label>
                      <input type="password" name="Password" class="form-control" id="yourPassword" placeholder="Password" minlength=8  required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="Confirm Password" class="form-label">Confirm Password</label>
                      <input type="password" name="Passwordc" class="form-control" id="yourPassword" placeholder="Confirm Password" minlength=8 required>
                      <div class="invalid-feedback">Please Confirm your password!</div>
                    
                    </div>
                    
                    <div class="col-12">
                      <label for="Role" class="form-label">You are ..? </label>
                      <select id="Role" class="form-select" name="Role">
                        <option value="Student">Student</option>
                        <option value="Professor">Professor</option>
                        <option value="" selected>  </option>
                       </select>
                    </div>
                    

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="Login.php">Log in</a></p>
                    </div>
                  </form>

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