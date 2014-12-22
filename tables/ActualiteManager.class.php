<?php 
	class ActualiteManager{
		
		public static function lister(){
			
			$stmt = DB::get_instance()->prepare("SELECT * from article");
			
			$stmt->execute();
			$res_req=array();
			$res_req=$stmt->fetchAll();		
			return $res_req;
			
		}
		
		public static function listerParSousCat($souscat){
			$stmt = DB::get_instance()->prepare("SELECT * from article WHERE ID_SousCategorie=?");
			$stmt->execute(array($souscat));
			$res_req=array();
			$res_req=$stmt->fetchAll();		
			return $res_req;
			
		}
		
		public static function chercherParId($id){
			$stmt = DB::get_instance()->prepare("SELECT * from article WHERE ID_Article=?");
			$stmt->execute(array($id));
			$res_req=array();
			$res_req=$stmt->fetch();		
			return $res_req;
			
		}
		
		public static function chercherNomSousCatParId($id){
			
			$sql="SELECT * from souscategorie WHERE ID_SousCategorie=:id";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$res=array();
			$res=$stmt->fetchAll();
			$tabFinal=array();
			$tabFinal=$res[0];
			return $tabFinal['Nom_SousCategorie'];
			
		}
		
		public static function chercherIdCategorieParIdSousCategorie($id){
			
			$sql="SELECT * from souscategorie WHERE ID_SousCategorie=:id";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$res=array();
			$res=$stmt->fetchAll();
			$tabFinal=array();
			$tabFinal=$res[0];
			return $tabFinal['ID_Categorie'];
			
		}
		
		public static function chercherNomCatParId($id){
			
			$sql="SELECT * from categorie WHERE ID_Categorie=:id";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$res=array();
			$res=$stmt->fetchAll();
			$tabFinal=array();
			$tabFinal=$res[0];
			return $tabFinal['Nom_Categorie'];
			
		}
		
		public static function supprimer($id_article){
			$sql="DELETE from article WHERE ID_Article=:id";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->bindParam(':id', $id_article);
			$stmt->execute();
		}
		
		public static function modifier($actu){
			$sql="UPDATE article SET Titre_Article=?, Date_Article=?,
					Contenu_Article=?, ID_Utilisateur=?, 
					ID_SousCategorie=? WHERE ID_Article=?";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->execute(array($actu->Titre_Article, $actu->Date_Article
								, $actu->Contenu_Article, $actu->ID_Utilisateur
								, $actu->ID_SousCategorie, $actu->ID_Article));
		}
		
		public static function creer($actu){
			$sql="INSERT into article (Titre_Article, Date_Article, Contenu_Article, ID_Utilisateur, ID_SousCategorie) VALUES(?,?,?,?,?)";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->execute(array($actu->Titre_Article,
								$actu->Date_Article, 
								$actu->Contenu_Article,
								$actu->ID_Utilisateur,
								$actu->ID_SousCategorie));
		
		}
		
	}
?>