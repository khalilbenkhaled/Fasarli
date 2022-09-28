<?php
include_once 'C:\xampp\htdocs\Fassarli/Model/User.php';
include_once 'C:\xampp\htdocs\Fassarli/Controller/UserC.php';
session_start();

if(isset($_POST['Codemdp']))
{
  $bdd=  new PDO('mysql:host=localhost;dbname=bd_fassarli', 'root', '');
  if($_POST['Codemdp'] !== ""){
  $recupUser=$bdd->prepare('SELECT * FROM users WHERE CodeMDP= ?');
  $recupUser->execute(array($_POST['Codemdp']));
  if ($recupUser->rowCount()>0){
    $UserInfo= $recupUser->fetch();
    echo $UserInfo['AdresseMail_user'];
   /* if($UserInfo['Etat']!= 1){
      $updateCode= $bdd->prepare('UPDATE users SET Etat = ? WHERE Code = ? ');
      $updateCode->execute(array(1,$_POST['Code']));
    }*/
    //header('Location: modifierMDP.php');
  }
  else
  {
     header('Location: codemdp.php?erreur=1'); // code incorrect
  }
}
else
{
 header('Location: codemdp.php?erreur=2'); // code vide
}
}

    /*// connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'bd_fassarli';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $Code = mysqli_real_escape_string($db,htmlspecialchars($_POST['Code'])); 
    
    
    if($Code !== "")
    {
        $requete = "SELECT count(*) FROM users where 
              Code = '".$Code."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // code trouvé
        {
           
           header('Location: Accueil.php');
        }
        else
        {
           header('Location: codemail.php?erreur=1'); // code incorrect
        }
    }
    else
    {
       header('Location: codemail.php?erreur=2'); // code vide
    }
}
else
{
   header('Location: codemail.php');
}
mysqli_close($db); // fermer la connexion*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit password </title>
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
                    <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                    <p class="text-center small">Enter your new password to edit your account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="modifierMDP.php">
                   <!-- <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" placeholder="First Name" required>  
                      <input type="text" name="name" class="form-control" id="yourName" placeholder="Last Name" required> 
                      <div class="invalid-feedback">Please, enter your name!</div>-->
                    
                      <div class="col-12">
                      <label for="Email" class="form-label">Email</label>
                      <input type="email" name="Email" class="form-control" id="yourEmail" value="<?php echo $UserInfo['AdresseMail_user']; ?>" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>


                    <div class="col-12">
                      <label for="Password" class="form-label">Password</label>
                      <input type="password" name="Password" class="form-control" id="yourPassword"  required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="Confirm Password" class="form-label">Confirm Password</label>
                      <input type="password" name="PasswordC" class="form-control" id="yourPassword"  required>
                      <div class="invalid-feedback">Please Confirm your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Submit</button>
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
  <script src="assets/js/main.js"></script>
  
  
</body>

</html>


