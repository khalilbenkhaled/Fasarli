<?php

class Group{

    private $nom,$liste;  

    public function __construct( $nom){
        $this->nom = $nom;            
    }

    public function getNom(){
        return $this->nom;
    }
    public function getListe(){
        return $this->liste;
    }
}

class Message{
    private  $content, $user, $group; 


    public function __construct($content){
        $this->content = $content;            
    }

    public function getContent(){
        return $this->content;
    }
    public function getUser(){
        return $this->user;
    }
    public function getGroup(){
        return $this->group;
    }

    

}