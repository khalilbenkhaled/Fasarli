<?php
class publication{
   public   $idPub;
    public  $title,$cotenu,$datePub;
    public function __construct(int $idPub, string $title, string $contenu, string $datePub){

    $this->idPub=$idPub;
    $this->title=$title;
    $this->contenu=$contenu;
    $this->datePub=$datePub;
    }
   public  function getidPub(){
       return $this->idPub;
   }
   public   function gettitle(){
         return $this->title;
    }
   public  function getcontenu(){
        return $this->contenu;
    }
    public function getdatePub(){
        return $this->datePub;
    }
}

 
?>