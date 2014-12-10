<?php 
	
	class Actualite{
		
		public $id;
		public $titre;
		public $date;
		public $contenu;
		public $note;
		public $id_user;
		public $id_souscat;
		
		public function __construct($id=NULL, $titre=NULL, $date=NULL, $contenu=NULL, $note=NULL, $id_user=NULL, $id_souscat=NULL){
			$this->ID_Article = $id;			
			$this->Titre_Article=$titre;
			$this->Date_Article= $date;
			$this->Contenu_Article=$contenu;
			$this->Note_Redacteur=$note;
			$this->ID_Utilisateur=$id_user;
			$this->ID_SousCategorie=$id_souscat;
			
		}
		
		
		
		
}
?>