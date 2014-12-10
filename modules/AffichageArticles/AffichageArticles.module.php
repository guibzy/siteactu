<?php 
class AffichageArticles extends Module
	{
		public function action_index()
		{
			$data=array();
			$data=ActualiteManager::lister();
			
			$this->tpl->assign('data',$data);
		}
		
		public function action_detail()
		{
			$id=$_GET['id'];
			$data=array();
			$data=ActualiteManager::chercherParId($id);
			$this->set_title($data['Titre_Article']);
			$this->tpl->assign('data',$data);
		}
	}
?>