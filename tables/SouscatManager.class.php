<?php 
	class SouscatManager{
		
		public static function lister(){
			$stmt = DB::get_instance()->prepare("SELECT ID_SousCategorie,Nom_SousCategorie from souscategorie");

			$stmt->execute();
			$res_req=array();
			$res_req=$stmt->fetchALL();
			$tab_final=array();
			
			foreach($res_req as $key1 => $tab1 )
			{
				$tab_final[$tab1[0]]=$tab1[1];
			}
			return $tab_final;
		}
	
		public static function chercherParId($id){
			$stmt = DB::get_instance()->prepare("SELECT ID_SousCategorie,Nom_SousCategorie from souscategorie where ID_SousCategorie=?");
			$stmt->execute(array($id));
			$res_req=$stmt->fetch();
			return $res_req;
		}	
	}
?>