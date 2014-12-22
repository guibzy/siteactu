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
		$err=true;
		$form=$this->session->formulaire;
		$ok=1;
		
		$date_verif=explode("/",$this->req->daten);
		$compte=count($date_verif);
		if($compte==3)
		 {
			if($date_verif[0]<1905 OR $date_verif[0]>2013){
				$err=false;
				$raison="annee incorrecte";}
			elseif($date_verif[1]<0 OR $date_verif[1]>12){
				$err=false;
				$raison="mois incorrecte";}
			elseif($date_verif[2]<0 OR $date_verif[2]>31){
				$err=false;
				$raison="jour incorrecte";
			}
		}
		 else{
		 $raison="Veuillez préciez chaque champ";
			 $err=false;
		 }

		$ok = $form->check();
		
		if((!$ok) OR (!$err)){
			if(!$err){$this->site->ajouter_message('Mauvaise date : '.$raison,ALERTE);}
			$form->populate();
			$this->set_tpl_name("index");
			$this->tpl->assign('form',$form);
			
		}
		else
		{
			$this->site->effacer_messages();
			$date_ok=implode("-",$date_verif);
			$m=new Membre();
			$m->login=$this->req->login;
			$m->mail=$this->req->email;
			$m->pass=md5($this->req->pass);
			$m->redacteur=0;
			$m->date_ne=$date_ok;
			$m->code_act=$this->req->activite;
			
			MembreManager::creer($m);
		
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