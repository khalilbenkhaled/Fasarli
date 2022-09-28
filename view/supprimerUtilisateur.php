<?php
	include 'C:\xampp\htdocs\Fassarli/Controller/UserC.php';
	$UserC=new UserC();
	$UserC->supprimerUtilisateur($_GET["ID_user"]);
	header('Location:afficherUser.php');
?>