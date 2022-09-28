<?php
    include_once 'C:\xampp\htdocs\Fassarli/Model/User.php';
    include_once 'C:\xampp\htdocs\Fassarli/Controller/UserC.php';

    $error = "";

    // create utilisateur
    $User = null;

    // create an instance of the controller
    $UserC = new UserC();
    if (
      isset($_POST["ID_user"]) &&
      isset($_POST["First_name"]) &&		
      isset($_POST["Last_name"]) &&
      isset($_POST["Email"]) && 
      isset($_POST["Password"]) && 
      isset($_POST["Role"])
  ) {
      if (
          !empty($_POST["ID_user"]) && 
    !empty($_POST['First_name']) &&
          !empty($_POST["Last_name"]) && 
    !empty($_POST["Email"]) && 
          !empty($_POST["Password"]) && 
          !empty($_POST["Role"])
      ) {
          $User = new User(
              $_POST['ID_user'],
              $_POST['First_name'],
              $_POST['Last_name'], 
              $_POST['Email'],
              $_POST['Password'],
              $_POST['Role']
          );
          $UserC->modifierUtilisateur($User, $_POST["ID_user"]);
          header('Location:afficherUser.php');
      }
      else
          $error = "Missing information";
  }    
           
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register </title>
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
                    <h5 class="card-title text-center pb-0 fs-4">Edit your Account</h5>
                    <p class="text-center small">Enter your personal details to edit your account</p>
                  </div>
                  <?php
			      if (isset($_GET['ID_user'])){
				  $User = $UserC->recupererUtilisateur($_GET['ID_user']);
            
			      ?>

                  <form class="row g-3 needs-validation" method="POST" action="">
                   <!-- <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" placeholder="First Name" required>  
                      <input type="text" name="name" class="form-control" id="yourName" placeholder="Last Name" required> 
                      <div class="invalid-feedback">Please, enter your name!</div>-->
                    
                     <div class="col-12">
                      <label for="ID" class="form-label">ID</label>
                      <input type="text" name="ID_user" class="form-control" id="yourID" value="<?php echo $User['ID_user']; ?>" required>
                      <div class="invalid-feedback">Please enter a valid ID!</div>
                    </div>

                      <div class="row">
                        <label for="Name" class="form-label">Name</label>
                        <div class="col">
                          <input type="text" name="First_name" class="form-control" value="<?php echo $User['Prenom_user']; ?>" required >
                        </div>
                        <div class="col">
                          <input type="text" name="Last_name" class="form-control" value="<?php echo $User['Nom_user']; ?>" required>
                        </div>
                      </div>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    

                    <div class="col-12">
                      <label for="Email" class="form-label">Email</label>
                      <input type="email" name="Email" class="form-control" id="yourEmail" value="<?php echo $User['AdresseMail_user']; ?>" required>
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
                      <input type="password" name="Password" class="form-control" id="yourPassword" value="<?php echo $User['MDP_user']; ?>" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="Confirm Password" class="form-label">Confirm Password</label>
                      <input type="password" name="PasswordC" class="form-control" id="yourPassword" value="<?php echo $User['MDP_user']; ?>" required>
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
                      <button class="btn btn-primary w-100" type="submit">Edit Account</button>
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
  <?php
	}
  ?>
</body>

</html>