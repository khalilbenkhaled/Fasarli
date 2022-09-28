<?php
session_start();
if(isset($_POST['Password']) && (isset($_POST['PasswordC'])))
{
   $Pass=md5($_POST['Password']);
   $bdd=  new PDO('mysql:host=localhost;dbname=bd_fassarli', 'root', '');
   $recupUser=$bdd->prepare('SELECT * FROM users WHERE AdresseMail_user= ?');
   $recupUser->execute(array($_POST['Email']));
  if ($recupUser->rowCount()>0){
    $UserInfo= $recupUser->fetch();
   echo $UserInfo['MDP_user'];
    $updateMDP= $bdd->prepare('UPDATE users SET MDP_user = ? WHERE AdresseMail_user = ? ');
    $updateMDP->execute(array($Pass,$_POST['Email']));
    header('Location:Login.php');
}
  

}

?>