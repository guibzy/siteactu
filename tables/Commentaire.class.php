<?php
class Commentaire{
		
		public $id;
		public $contenu;
		public $date;
		public $id_user;
		public $id_art;
		
		
		public function __construct($id,$contenu,$date,$id_user,$id_art){
			$this->id = $id;			
			$this->date_e=$date;
			$this->contenu=$contenu;
			$this->ID_Utilisateur=$id_user;
			$this->ID_Article=$id_art;
		}

}

?>