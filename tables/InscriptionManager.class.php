<?php 
	class InscriptionManager{
		
		public static function create_user($login,$pass,$email,$metier,$date_n)
		{
			if nb_param =5
			$stmt = DB::get_instance()->prepare("INSERT INTO utilisateur VALUES (null, $login,$pass,$email,false,$date_naissance,$metier)";
			else
				$stmt = DB::get_instance()->prepare("INSERT INTO utilisateur ('Pseudo_Utilisateur','Mot_De_Passe','Adresse_Mail',Redacteur,'Code_Activite' VALUES (null, $login,$pass,$email,false,$metier)");
		
		}
	}
?>