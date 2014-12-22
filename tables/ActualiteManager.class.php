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
		
		public static function listerParCat($cat){
			$stmt = DB::get_instance()->prepare("SELECT * from article,souscategorie WHERE article.ID_SousCategorie = souscategorie.ID_SousCategorie AND souscategorie.ID_Categorie=?");
			$stmt->execute(array($cat));
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
					ID_SousCategorie=?, Note_Redacteur=? WHERE ID_Article=?";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->execute(array($actu->Titre_Article, $actu->Date_Article
								, $actu->Contenu_Article, $actu->ID_Utilisateur
								, $actu->ID_SousCategorie, $actu->Note_Redacteur
								, $actu->ID_Article));
		}
		
		public static function creer($actu){
			$sql="INSERT into article (Titre_Article, Date_Article, Contenu_Article, ID_Utilisateur, ID_SousCategorie, Note_Redacteur) VALUES(?,?,?,?,?,?)";
			$stmt=DB::get_instance()->prepare($sql);
			$stmt->execute(array($actu->Titre_Article,
								$actu->Date_Article, 
								$actu->Contenu_Article,
								$actu->ID_Utilisateur,
								$actu->ID_SousCategorie,
								$actu->Note_Redacteur));
		
		}
		
		public static function rechercherParCat($recherche,$cat)
		{
				$sql="SELECT * from article,souscategorie WHERE article.ID_SousCategorie = souscategorie.ID_SousCategorie AND souscategorie.ID_Categorie=:cat AND ";
				$t_termes=explode(" ",$recherche);
				$tokens=array();
				foreach($t_termes as $i => $t)
				{
					$cond[]="article.Titre_Article LIKE :t".$i." or article.Contenu_Article LIKE :t".$i;
					$x=":t".$i;
					$tokens[$x]="%".$t."%";
					$cond_fin=implode(" or ",$cond);
				}
				$sql=$sql.$cond_fin." group by article.ID_Article";
				$stmt = DB::get_instance()->prepare($sql);
			
				$stmt -> bindParam(':cat',$cat);
				
				foreach($tokens as $v => $u)
				{
					$stmt -> bindParam($v,$u);
				}
				$stmt -> execute();
				$res_req=$stmt->fetchAll();	
				
			return $res_req;
		}
	}
?>