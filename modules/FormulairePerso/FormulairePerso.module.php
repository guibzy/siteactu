<?php
	class FormulairePerso extends Module
	{
		public function action_index()
		{
			$f=new Form("?module=FormulairePerso&action=verif","form1");
				$f->add_text("login","login","Login")->set_required()
													->set_validation("required");
				$f->add_text("nom","nom","Nom")->set_required()
													->set_validation("required");		
				$f->add_text("prénom","prénom","Prénom")->set_required()
													->set_validation("required");
				$f->add_text("mail","mail","M@il")->set_required()
													->set_validation("mail|required");		
				$f->add_password("pass1","pass1","Mot de passe")->set_required()
													->set_validation("required");		
				$f->add_password("pass2","pass2","Vérification mot de passe")->set_required()
													->set_validation("equals-field:pass1|required");
				
			$f->add_submit("Valider","bnt_val")->set_value('Valider');
			
			$this->tpl->assign("form",$f);	
		}
		
		public function action_verif()
		{
		 $f=$this->session->form;
		 $err=$f->valid();
		 
		 if(MembreManager::ChercherParLogin($f->requete->login)!==FALSE)
		 {
			le membre existe déjà
			$err=true;
		 }
		 
		 if($err){
		 $f->populate();
		 $this->tpl->assign("form",$f);
		 }
		 else{
		 $m=new Membre();
		 
		 MembreManager::creer($m);
		 rediriger vers autre page
		 }
		
		}
	}
?>