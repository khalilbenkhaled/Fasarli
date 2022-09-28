<?php
include_once 'C:\xampp\htdocs\Fassarli/Model/User.php';
include_once 'C:\xampp\htdocs\Fassarli/Controller/UserC.php';
session_start();

if(isset($_POST['Code']))
{
  $bdd=  new PDO('mysql:host=localhost;dbname=bd_fassarli', 'root', '');
  if($_POST['Code'] !== ""){
  $recupUser=$bdd->prepare('SELECT * FROM users WHERE Code= ?');
  $recupUser->execute(array($_POST['Code']));
  if ($recupUser->rowCount()>0){
    $UserInfo= $recupUser->fetch();
    if($UserInfo['Etat']!= 1){
      $updateCode= $bdd->prepare('UPDATE users SET Etat = ? WHERE Code = ? ');
      $updateCode->execute(array(1,$_POST['Code']));
    }
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