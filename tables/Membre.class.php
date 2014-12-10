<?php
//exemple de table Membre
/*
//structure SQL : 
CREATE TABLE `Membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
*/



//exemple de classe en relation avec la table
class Membre{
		
		public $id;
		public $mail;
		public $login;
		public $pass;
		public $redacteur;
		public $date_ne;
		public $code_act;
		
		public function __construct($id=NULL, $login=NULL, $mail=NULL, $pass=NULL, $redacteur=NULL, $date_ne=NULL, $code_act=NULL){
			$this->id = $id;			
			$this->login=$login;
			$this->mail=$mail;
			$this->pass=$pass;
			$this->redacteur=$redacteur;
			$this->date_ne=$date_ne;
			$this->code_act=$code_act;
			
		}
		
		
		//éventuellement setters et getters
		
		
}

?>