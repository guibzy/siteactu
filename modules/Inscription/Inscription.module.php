<?php
class Inscription extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Inscription");		
		
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
					'name'=>'metier',
					'id'=>'metier',
					'label'=>'Sélectionnez une activité',
					'required'=>true,
					'options'=>$data2
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
		var_dump($_POST);
		/*Y'a une couille, en dessous !*/
			InscriptionManager::create_user('$_POST('login')','md5($_POST('pass'))', '$_POST('email')','$_POST('metier')');
	
			$this->site->ajouter_message('Envoi des données pour l\'inscription.');
			$this->site->redirect("inscription","confirme");
			exit;
		}

	}
}
?>