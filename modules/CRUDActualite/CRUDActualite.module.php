<?php
	class CRUDActualite extends Module
	{
		public function action_index()
		{
			$data=array();
			$data=ActualiteManager::lister();
			$this->tpl->assign('data',$data);
		}
		
		public function action_creer(){

		$this->set_title("Création article");		

		$data=SouscatManager::lister(); //importation des activites pour la liste déroulante
		
		$data2=array("" => "Sélectionnez la catégorie")+$data;
		
		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=CRUDActualite&action=creer&action=valide","form1");

		//construction sous forme de tableau
		//chaque champ est déclaré sous la forme d'un tableau de paramètres
		$f->build_from_array(array(
			array(
					'type'=>'text',
					'name'=>'titre',
					'id'=>'titre',
					'label'=>'Titre de l\'article',
					'required'=>true,
					'validation'=>'required'
				),
				
			array(
					'type'=>'select',
					'name'=>'souscat',
					'id'=>'souscat',
					'label'=>'Sélectionnez une catégorie',
					'required'=>true,
					'validation'=>'required',
					'options'=>$data2
									
				),
			array(
					'type'=>'textarea',
					'name'=>'contenu',
					'id'=>'contenu',
					'label'=>'Contenu de l\'article',
					'required'=>true,
					'validation'=>'required'
				),

			array(
					'type'=>'submit',
					'name'=>'sub',
					'id'=>'sub',
					'value'=>'Valider'
				)
		));

		//passe le formulaire dans le template sous le nom "form"
		$this->tpl->assign("form",$f);	
		
		//stocke la structure du formulaire dans la session sous le nom "form"
		//pour une éventuelle réutilisation
		$this->session->formulaire = $f;		

	}

	public function action_valide(){

		$this->set_title("Création d'un article");
		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->formulaire;
		
		//attention, suite à certaines remarques vues en TD, 
		//le nom de la fonction a changé (valid-->check)
		//retourne true si OK, false sinon
		//cf sur git : class Form.class.php
		$ok = $form->check();
		
		if(!$ok){ //__get('metier')!=0
			//re-remplir le forumulaire		
			$form->populate();
			//choisir d'afficher le template index (plutot que "valide")
			//c'est une solution qui permet d'avoir un seul template pour les deux actions
			$this->set_tpl_name("index");
			//assigner le formulaire à la variable de template
			$this->tpl->assign('form',$form);			
			
		}else{

			
			//rediriger vers une autre page
			$this->site->ajouter_message("Création confirmée");	
			$this->site->redirect("CRUDActualite","confirme");
			//ne pas laisser le framework continuer le traitement 
			exit;
			
			//on pourrait choisir d'afficher simplement un autre template
			//mais on ne doit pas rester sur la page dans laquelle un traitement de BD
			//a eu lieu (INSERT, DELETE, UPDATE...)
			
			
		}

	}
	
	public function action_confirme(){
		//pas de traitement particulier, on passe la main au template		
	}
	}
?>