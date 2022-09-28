<?php
	include 'C:\xampp\htdocs\fassarli/config.php';
	include_once 'C:\xampp\htdocs\Fassarli/Model/User.php';
	class UserC {
		function afficherUser(){
			$sql="SELECT * FROM users";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerUtilisateur($ID_user){
			$sql="DELETE FROM users WHERE ID_user=:ID_user";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':ID_user', $ID_user);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterUtilisateur($User){
			
			$sql="INSERT INTO users 
			VALUES (null, '$User->First_name' ,'$User->Last_name', '$User->Email','$User->Password','$User->Role','$User->Etat','$User->Verification_code','$user->Reset_password')";
			$db = config::getConnexion();
			try{
				 $db->query($sql);		
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererUtilisateur($ID_user){
			$sql="SELECT * from users where ID_user=$ID_user";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$User=$query->fetch();
				return $User;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierUtilisateur($User, $ID_user){
			try {
				$db = config::getConnexion();

				$sql = "UPDATE users 
				SET 
				ID_user= $User->ID_user,
				Prenom_user='$User->First_name', 
				Nom_user= '$User->Last_name', 
				AdresseMail_user= '$User->Email', 
				MDP_user= '$User->Password'
			WHERE ID_user = '$ID_user'";
				
				$db->query($sql);
			
				
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function search($key){

			$db=config::getConnexion();
			$sql = "SELECT * FROM users where Nom_user LIKE '%$key%' or Prenom_user LIKE '%$key%' ORDER BY ID_user DESC";
			try{
				$liste = $db->query($sql);
				return $list;
				//return $liste->fetchAll();
				}
			catch (Exception $e){
				die('ERREUR'. $e->getMessage());
				}
	     	}
		
	}
?>