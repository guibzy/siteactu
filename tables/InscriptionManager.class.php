<?php 
	class InscriptionManager{
		
		public static function create_user($login,$pass,$email,$metier,$date_n)
		{
			else
				$stmt = DB::get_instance()->prepare("INSERT INTO utilisateur ('Pseudo_Utilisateur','Mot_De_Passe','Adresse_Mail',Redacteur,'Code_Activite' VALUES (null, $login,$pass,$email,false,$metier)");
		}
		getdate(); //permet de récupérer la date du jour ! Je ne sais pas trop où ni comment l'insérer dans la db !
		$stmt->exec()
	}
?>

/*finir l'insertion des résultats dans la base pareil pour le CRUDActualite*/