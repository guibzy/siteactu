<?php 
class AffichageArticles extends Module
	{
		public function action_index()
		{
			$data=array();
			$data=ActualiteManager::listerParCat($this->req->num_cat);
			$maCat=CatManager::chercherParId($this->req->num_cat);
			$this->set_title("Actualité ".$maCat['Nom_Categorie']);
			$this->tpl->assign('data',$data);
		}
		
		public function action_detail()
		{
			$id=$this->req->id;
			$data=array();
			$data=ActualiteManager::chercherParId($id);
			$masouscat=SouscatManager::chercherParId($data['ID_SousCategorie']);
			
			$this->set_title($masouscat['Nom_SousCategorie']);
			$user=MembreManager::chercherParID($data['ID_Utilisateur']);
			$this->tpl->assign('data',$data);
			$this->tpl->assign('user',$user);
		}
	}
?>