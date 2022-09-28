<?php
session_start();
if(isset($_POST['Email']) && isset($_POST['Password']))
{
   $Pass=md5($_POST['Password']);
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'bd_fassarli';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $Email = mysqli_real_escape_string($db,htmlspecialchars($_POST['Email'])); 
    $Pass = mysqli_real_escape_string($db,htmlspecialchars(md5($_POST['Password'])));
    
    if($Email !== "" && $Pass !== "")
    {
        
        $requete = "SELECT count(*) FROM users where 
              AdresseMail_user = '".$Email."' and MDP_user = '".$Pass."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['Email'] = $Email;
           $_SESSION['ID_user']=$ID_user;
        
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>