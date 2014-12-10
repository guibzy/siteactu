<?php
class Connexion extends Module{
			

	public function action_login(){

		// A FAIRE
		// verifier les donnees de connexion
		//charger le membre
		//$user=Membre::chercherParId(/*mettre l'id*/);
		//$this->session->ouvrir($user);
		
		//code de demo
		
		if(MembreManager::chercherParLogin($this->req->Login))
		{
			$membre_auth= new Membre();
			$membre_auth=MembreManager::chercherParLogin($this->req->Login);
			
			if($membre_auth->pass == $this->req->Pass)
			{
				$this->session->user=$membre_auth;
				$this->tpl->assign('login',$membre_auth->login);
				$this->site->ajouter_message("Vous êtes connecté en tant que ".$membre_auth->login);
				$this->site->redirect("index");
			}
			else
			{
			
				$this->site->redirect("index");
				$this->site->ajouter_message("Mauvais identifiants et/ou mot de passe ");
				
			}
		}
		
		
		
	}

	public function action_deconnect(){		
		$this->site->ajouter_message('Vous êtes déconnecté');							
		$this->session->fermer(); 			
		$this->site->redirect("index");
	}

}
?>