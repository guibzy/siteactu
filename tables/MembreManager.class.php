<?php
//exemple de table Membre
/*
//structure SQL : 
CREATE TABLE `Membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
*/



//classe de gestion des entités Membre
class MembreManager{
	

		public static function creer($m){
			
			$sql = "INSERT INTO utilisateur VALUES (null,?, ?, ?, ?, ?, ?)";
			$res = DB::get_instance()->prepare($sql); //design patter singleton
			$res -> execute(array($m->login, $m->pass, $m->mail,$m->redacteur,$m->date_ne,$m->code_act));
			//$m->id=DB::get_instance()->lastInsertId();
			return $res;
			
		}


		public static function chercherParID($id){
			$sql="SELECT * from utilisateur WHERE ID_Utilisateur=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($id));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;
			}
			$m= $res->fetch();			
			$membre=new Membre();
			$membre->id=$m['ID_Utilisateur'];
			$membre->login=$m['Pseudo_Utilisateur'];
			$membre->mail=$m['Adresse_Mail'];
			$membre->pass=$m['Mot_De_Passe'];
			$membre->redacteur=$m['Redacteur'];
			$membre->date_ne=$m['DateNaissance'];
			$membre->code_act=$m['Code_Activite'];
			return $membre;
		}



		public static function chercherParLogin($login){
			$sql="SELECT * from utilisateur WHERE Pseudo_Utilisateur=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($login));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				return false;
			}
			
			$m=$res->fetch();			
			$membre=new Membre();
			$membre->id = $m[0];			
			$membre->login=$m[1];
			$membre->pass=$m[2];
			$membre->mail=$m[3];
			$membre->redacteur=$m[4];
			$membre->date_ne=$m[5];
			$membre->code_act=$m[6];											
			return $membre;
		}
		
		
		//autres exemples de fonctions possibles
		public static function liste(){
			
		}   		

		public static function desactiver(){
			
		}
		public static function activer(){
			
		}
}

?>