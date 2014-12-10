<?php 
	class ActualiteManager{
		
		public static function lister(){
			
			
			$stmt = DB::get_instance()->prepare("SELECT * from article");
			//echo "ça marche 1";
			
			$stmt->execute();
			
			//echo " ça marche 2";
			$res_req=array();
			$res_req=$stmt->fetchAll();		
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
			$sql="DELETE * from article WHERE ID_Article=:id";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->bindParam(':id', $id_article);
			$stmt->execute();
		}
		
		public static function editerDonnees($id_article){
		
		
		}
		
		public static function creer(){
		
		
		}
		
	}
?>