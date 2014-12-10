<?php
class Connexion extends Module{
			

	public function action_login(){
		
		if(MembreManager::chercherParLogin($this->req->Login))
		{
			$membre_auth=new Membre();
			$membre_auth=MembreManager::chercherParLogin($this->req->Login);
			
			if($membre_auth->pass == $this->req->Pass)
			{	
				$this->session->ouvrir($membre_auth); 
				$this->tpl->assign('login',$this->req->Login);
				
				$this->site->ajouter_message("Vous êtes connecté en tant que ".$membre_auth->login);
				
			}
			else
			{
				
				$this->site->ajouter_message("Mauvais identifiants et/ou mot de passe ",ALERTE);
			}
		}
		$this->site->ajouter_message("Mauvais identifiants et/ou mot de passe ",ALERTE);
		$this->site->redirect("index");
	}

	public function action_deconnect(){		
		$this->site->ajouter_message('Vous êtes déconnecté');							
		$this->session->fermer(); 			
		$this->site->redirect("index");
	}

}
?>