<?php
include '../config.php';
include_once '../Model/publication.php';
class publicationC{
    function AfficherPub(){
        $sql="SELECT * FROM pub ";
        $db=config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
            }
        catch (Exeception $e){
        die('ERREUR'. $e->getMessage());
            }
    }

    function ajouterPub ( string $title, string $contenu )
    {
        

                $sql= "INSERT  INTO pub  (idPub,title,contenu,datePub)   VALUES (NULL,'$title','$contenu',NULL";
                $db=config::getconnexion();
                try{
                    $query->$db->prepare($sql);
                    $query->execute();
                }
                catch (Exeception $e){
                    die('ERREUR'. $e->getMessage());
                } 
            }  

            function recupererpub($idPub){
                $sql="SELECT * from pub where idPub=$idPub";
                $db = config::getConnexion();
                try{
                    $query=$db->prepare($sql);
                    $query->execute();
    
                    $publication=$query->fetch();
                    return $publication;
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }

  function modifierpub($pub, $idPub){
                    try {
                        $db = config::getConnexion();
                        $query = $db->prepare(
                            'UPDATE pub SET 
                                title= :title, 
                                contenu= :contenu,  
                                datePub= :datePub
                            WHERE idPub= :idPub'
                        );
                        $query->execute([
                            'title' => $pub->gettitle(),
                            'contenu' => $pub->getcontenu(),
                            'datePub' => $pub->getdatePub(),
                            'idPub' => $idPub
                        ]);
                        echo $query->rowCount() . " records UPDATED successfully <br>";
                    } catch (PDOException $e) {
                        $e->getMessage();
                    }
                }

    
}


?>