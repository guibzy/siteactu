<?php
class Inscription extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Inscription");		
		
		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=Inscription&action=valide","form1");

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
					'validation'=>'requirec|equals-field:pass'
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
					'name'=>'metier',
					'id'=>'metier',
					'label'=>'Sélectionnez une activité',
					'required'=>true,
					'options'=>array(
						''=>'Choisir une activité',
						'1'=>'Agriculture, chasse, sylviculture',
						'2'=>'Pêche, aquaculture',
						'3'=>'Industries extractives',
						'4'=>'Industrie manufacturière',
						'5'=>'Construction',
						'6'=>'Commerce',
						'7'=>'Communication',
						'8'=>'Hôtels et restaurants',
						'9'=>'Transports et communications',
						'10'=>'Activités financières',
						'11'=>'Immobilier, location et services aux entreprises',
						'12'=>'Administration publique',
						'13'=>'Education',
						'14'=>'Santé et action sociale',
						'15'=>'Services collectifs, sociaux et personnels',
						'16'=>'Services domestiques',
						'17'=>'Activités extra-territoriales',
						'18'=>'Etudiant',
						'19'=>'Informatique',
						'20'=>'Autres')
				),

			array(
					'type'=>'text',
					'name'=>'date_naissance',
					'id'=>'date_naissance',
					'label'=>'Date de naissance YYYY-MM-DD',
					'required'=>false,
					'validation'=>'max-length:10|min-length=10'
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

		$this->set_title("Inscription");
		$err=false;
		$form=$this->session->formulaire;
		
		$ok = $form->check();
		
		if(!$ok){
			$form->populate();
			$this->set_tpl_name("index");
			$this->tpl->assign('form',$form);
			
		}
		else
		{
		//var_dump($_POST);
			if ($_POST['date_naissance']!=null)
			{
				InscriptionManager::create_user($_POST('login'),md5($_POST('pass')), $_POST('email'),$_POST('metier'),$_POST('date_naissance'));
			}
		 	else
			{
				InscriptionManager::create_user($_POST('login'),md5($_POST('pass')), $_POST('email'),$_POST('metier'));
			}

			$this->site->ajouter_message('Envoi des données pour l\'inscription.');
			$this->site->redirect("inscription","confirme");
			exit;
		}

	}
	
	public function action_confirme(){
		//pas de traitement particulier, on passe la main au template		
	}

}
?>