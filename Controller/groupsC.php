<?php
// include_once '../config.php';
// include_once '../model/model.php';

include_once 'C:\xampp\htdocs\communication\fassarli\khalil\config.php';
include_once 'C:\xampp\htdocs\communication\fassarli\khalil\model\model.php';




class GroupC{

    
    public static function afficher($idU){

        $db=config::getConnexion();

        $sql = "SELECT id_grp FROM relation WHERE id_user=$idU";
        try{
            $liste = $db->query($sql);
            $groups = Array(); 
            foreach ($liste as $l){
                $sql2 = 'SELECT * FROM grp WHERE id=' . $l["id_grp"];
                $resultat = $db->query($sql2);
                foreach($resultat as $r){
                    $groups[] = $r;
                    
                    }
                

                
                
                } 
                return $groups; 
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }
    }

    static function afficherT(){

        $db=config::getConnexion();
        $sql = "SELECT * FROM grp ";
        try{
            $liste = $db->query($sql);
            return $liste;
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }



    }
    static function nUsers($id){
        $db=config::getConnexion();
        $sql = "SELECT count(id) as number FROM relation Where id_grp=$id";
        try{
            $liste = $db->query($sql);
            return $liste->fetch();
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }
    }


    static function chercher($key){

        $db=config::getConnexion();
        $sql = "SELECT * FROM grp where nom LIKE '%$key%'";
        try{
            $liste = $db->query($sql);
            return $liste->fetchAll();
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }



    }


    public static function ajouter($nom){
        $db=config::getConnexion();
        $sql = "INSERT INTO grp VALUES (null, '$nom')";
        try{
            $db->query($sql);
            
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }

    }

    public static function supprimer($id){
        $db=config::getConnexion();
        $sql="DELETE FROM grp WHERE id=$id";
        try{
            $db->query($sql);

        }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }

    }

    public static function afficherContenu($id_group){ 

        $db=config::getConnexion();
        $sql = "SELECT * FROM msg WHERE grp=$id_group";
        try{
            $liste = $db->query($sql);
            return $liste;
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }
        }




        
    

    
}

class MessageC{

    public static function ajouter($content, $user, $group){
        $db=config::getConnexion();
        $sql = "INSERT INTO msg  VALUES (null, '$content', '$user', '$group')";
        try{
            $db->query($sql);
            
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }

    }

    public static function modifier($id){
        $db=config::getConnexion();
        $sql = "UPDATE msg SET content='message supprimé' WHERE id=$id";
        try{
            $db->query($sql);
            
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }



    }


    

}

class UserC{

    public static function getName($id){
        $db=config::getConnexion();
        $sql = "SELECT prenom FROM user WHERE id=$id " ;

        try{
            
            $liste = $db->query($sql);
            return $liste->fetch();
            }
        catch (Exception $e){
            die('ERREUR'. $e->getMessage());
            }
    }



}
