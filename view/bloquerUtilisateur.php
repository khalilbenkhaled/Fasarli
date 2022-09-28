<?php
include_once 'C:\xampp\htdocs\Fassarli/Model/User.php';
include_once 'C:\xampp\htdocs\Fassarli/Controller/UserC.php';

    $bdd=  new PDO('mysql:host=localhost;dbname=bd_fassarli', 'root', '');
    $updateEtat= $bdd->prepare('UPDATE users SET Etat = ? WHERE ID_user = ? ');
    $updateEtat->execute(array(0,$_GET['ID_user']));
    header('Location:afficherUser.php');
?>