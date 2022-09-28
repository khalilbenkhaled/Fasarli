<?php
	class User{
		public $ID_user=null;
		public $First_name=null;
        public $Last_name=null;
		public $Email=null;
		public $Password=null;
		public $Role=null;
		public $Etat=null;
		public $Verification_code=null;
		public $Reset_password=null;
		

		function __construct($ID_user, $First_name,$Last_name, $Email, $Password, $Role, $Etat, $Verification_code, $Reset_password){
			$this->ID_user=$ID_user;
			$this->First_name=$First_name;
            $this->Last_name=$Last_name;
			$this->Email=$Email;
			$this->Password=$Password;
			$this->Role=$Role;
			$this->Etat=$Etat;
			$this->Verification_code=$Verification_code;
			$this->Reset_password=$Reset_password;
		}
		function getIDuser(){
			return $this->ID_user;
		}
		function getFirstname(){
			return $this->First_name;
		}
        function getLastname(){
			return $this->Last_name;
		}
	
		function getEmail(){
			return $this->Email;
		}

		function getPassword(){
			return $this->Password;
		}

		function getRole(){
			return $this->Role;
		}

		function getEtat(){
			return $this->Etat;
		}

		function getVerificationcode(){
			return $this->Verification_code;
		}
		function getResetPassword(){
			return $this->Reset_password;
		}
		
		function setFirstname(string $First_name){
			$this->First_name=$First_name;
		}

        function setLastname(string $Last_name){
			$this->Last_name=$Last_name;
		}
		
		
		function setEmail(string $Email){
			$this->Email=$Email;
		}
        function setPassword(string $Password){
			$this->Password=$Password;
		}
        function setRole(string $Role){
			$this->Role=$Role;
		}
	
		
	}


?>