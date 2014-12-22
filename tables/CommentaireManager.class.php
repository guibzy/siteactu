<?php 
	class CommentaireManager{
	
		public static function creer($com)
		{
			$sql = "INSERT INTO commentaire VALUES (null,?, ?, ?, ?)";
			$res = DB::get_instance()->prepare($sql); //design patter singleton
			$res -> execute(array($com->contenu, $com->date_e, $com->ID_Utilisateur,$com->ID_Article));
			return $res;			
		}
	
		public static function listerParIdArticle($id_art){
			$stmt = DB::get_instance()->prepare("SELECT * from commentaire, utilisateur WHERE commentaire.ID_Utilisateur = utilisateur.ID_Utilisateur AND commentaire.ID_Article=? ORDER by commentaire.Date_Commentaire DESC");
			$stmt->execute(array($id_art));
			if($stmt->rowCount()==0){
				return false;
			}
			$res_req=array();
			$res_req=$stmt->fetchAll();		
			return $res_req;
			
		}
		
		public static function supprimerParArt($id_article){
			$sql="DELETE from commentaire WHERE ID_Article=:id";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->bindParam(':id', $id_article);
			$stmt->execute();
		}
	}
?>