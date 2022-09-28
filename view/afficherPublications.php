
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>Publications:</h1>
    <?php 
include '../controller/PublicationC.php';
    $liste = PublicationC::AfficherPub();
 foreach ($liste as $publication){
?>
   

<div class="container-text-center">

     <div class="card" style="width: 18rem;" >

  <div class="card-body">
    <h5 class="card-title"><?php  echo $publication["title"]; ?> </h5>
    <p class="card-text"><?php  echo $publication["contenu"];?></p>
    <p class="card-text"><?php  echo $publication["datePub"];?></p>
   <div class="icon">
   <i class="far fa-thumbs-up"></i>
   <i class="fas fa-comments"></i>
   

   </div>
</span>
    <a href="modifierpub.php" class="btn btn-primary">Modifier</a>
    <a href="#" class="btn btn-danger">Supprimer</a>

  </div>
</div>

<?php
 }
 ?>

 <a class="btn btn-secondary"  href="index.php">Retour</a>
 </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>