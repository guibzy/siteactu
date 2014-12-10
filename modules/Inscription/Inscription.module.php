<?php
class Inscription extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Inscription");		
		$this->site->effacer_messages();
		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=Inscription&action=valide","form1");

		$data=ActiviteManager::lister(); //importation des activites pour la liste déroulante
		
		$data2=array("" => "Sélectionnez la catégorie")+$data;
		//construction sous forme de tableau
		//chaque champ est déclaré sous la forme d'un tableau de paramètres
		$f->build_from_array(array(
			array(
					'type'=>'text',
					'name'=>'login',
					'id'=>'login',
					'label'=>'Identifiant',
					'required'=>true,
					'validation'=>'required'
				),

			array(
					'type'=>'password',
					'name'=>'pass',
					'id'=>'pass',
					'label'=>'Passe',
					'required'=>true,
					'validation'=>'required|min-length:6'

				),
			
			array(
					'type'=>'password',
					'name'=>'passverif',
					'id'=>'passverif',
					'label'=>'Vérification du mot de passe',
					'required'=>true,
					'validation'=>'required|equals-field:pass'
				),
		
			array(
					'type'=>'text',
					'name'=>'email',
					'id'=>'email',
					'label'=>'E-m@il',
					'required'=>true
				),

			array(
					'type'=>'select',
					'name'=>'activite',
					'id'=>'activite',
					'label'=>'Sélectionnez une activité',
					'required'=>true,
					'options'=>$data2
				),
			
			array(
					'type'=>'text',
					'name'=>'daten',
					'id'=>'daten',
					'label'=>'Date de naissance',
					'required'=>true,
					'value' => 'aaaa/mm/jj'
				),
				
			array(
					'type'=>'submit',
					'name'=>'sub',
					'id'=>'sub',
					'value'=>'Valider'
				)
		));

		$this->tpl->assign("form",$f);	
		
		$this->session->formulaire = $f;		
	}

	public function action_valide(){
		$this->site->effacer_messages();
		$this->set_title("Inscription");
		$err=false;
		$form=$this->session->formulaire;
		
		$ok = $form->check();
		
		$date_verif=explode("/",$this->req->daten);
		var_dump($date_verif);
		if(count($date_verif)==3)
		 {
			if($date_verif[0]<1905 or $date_verif[0]>2013)$ok=0;
			if($date_verif[1]<0 or $date_verif[1]>12)$ok=0;
			if($date_verif[1]<0 or $date_verif[1]>31)$ok=0;
			
		 }
		 else{$ok=0;
		 $this->req->daten="";}
		 $this->site->ajouter_message('Date incorrecte : aaaa/mm/jj',ALERTE);
		 
		if(!$ok){
			$form->populate();
			$this->set_tpl_name("index");
			$this->tpl->assign('form',$form);
			
		}
		else
		{
		$this->site->effacer_messages();
		$date_ok=implode("-",$date_verif);
		var_dump($date_ok);
		$m=new Membre();
		$m->login=$this->req->login;
		$m->mail=$this->req->email;
		$m->pass=$this->req->pass;
		$m->redacteur=0;
		$m->date_ne=$date_ok;
		$m->code_act=$this->req->activite;
		
		MembreManager::creer($m);
	
			$this->site->ajouter_message('Envoi des données pour l\'inscription.');
			$this->site->redirect("inscription","confirme");
			exit;
		}

	}
	
	public function action_confirme(){
		$this->site->ajouter_message('Inscription confirmée');
		$this->site->redirect("index");
	}
}
?>