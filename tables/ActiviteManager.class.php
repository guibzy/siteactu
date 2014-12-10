<?php 
	class ActiviteManager{
		
		public static function lister(){
			$stmt = DB::get_instance()->prepare("SELECT Code_Activite, Nom_Activite from activite");

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
		
	}
?>