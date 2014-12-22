<?php 
	class CommentaireManager{
	
		public static function creer($com)
		{
			$sql = "INSERT INTO commentaire VALUES (null,?, ?, ?, ?)";
			$res = DB::get_instance()->prepare($sql); //design patter singleton
			$res -> execute(array($com->contenu, $com->date_e, $com->ID_Utilisateur,$com->ID_Article));
			return $res;			
		}
	
	
	}
?>