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
			$this->set_title($data['Titre_Article']);
			$this->tpl->assign('data',$data);
		}
	}
?>