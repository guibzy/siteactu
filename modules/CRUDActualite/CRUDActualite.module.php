<?php
	class CRUDActualite extends Module
	{
		public function action_index()
		{
			if($this->session->user->redacteur==1)
			{
				$data=array();
				$data=ActualiteManager::lister();
				$this->tpl->assign('data',$data);
			}
			else{
				$this->site->ajouter_message("Accès administrateur");	
				$this->site->redirect("index");
			}
			
		}
		
		public function action_creer(){
			if($this->session->user->redacteur==1){
				$this->set_title("Création article");		

				$data=SouscatManager::lister(); //importation des activites pour la liste déroulante
				
				$data2=array("" => "Sélectionnez votre activité")+$data;
				
				//construction d'un formulaire manuellement
				//chaque champ est ajouté par appel de fonction
				$f=new Form("?module=CRUDActualite&action=valide","form2");

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
							'validation'=>'required|min-length:5'
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
			else{
				$this->site->ajouter_message("Accès administrateur");	
				$this->site->redirect("index");
			}
	}

	public function action_valide(){
		if($this->session->user->redacteur==1)
		{
			$this->set_title("Création d'un article");
			$err=false;
			
			//on récupère la structure du formulaire précédemment stocké dans la session
			$form=$this->session->formulaire;
			
			$ok = $form->check();
			
			if(!$ok){ 
				//re-remplir le forumulaire		
				$form->populate();
				//choisir d'afficher le template index (plutot que "valide")
				//c'est une solution qui permet d'avoir un seul template pour les deux actions
				$this->set_tpl_name("creer");
				//assigner le formulaire à la variable de template
				$this->tpl->assign('form',$form);			
				
			}else{

				$actu = new Actualite();
				$actu->Titre_Article=$this->req->titre;
				$actu->Date_Article=date("Y-m-d");
				$actu->Contenu_Article=$this->req->contenu;
				$actu->ID_Utilisateur=$this->session->user->id;
				$actu->ID_SousCategorie=$_GET['id'];
				ActualiteManager::creer($actu);
				
				//rediriger vers une autre page
				$this->site->ajouter_message("Création confirmée");	
				$this->site->redirect("CRUDActualite");
				//ne pas laisser le framework continuer le traitement 
				exit;
				
			}
		}
		else{
				$this->site->ajouter_message("Accès administrateur");	
				$this->site->redirect("index");
			}

	}
	
	public function action_detail()
		{
			if($this->session->user->redacteur==1)
			{
				//$id=$_GET['id'];
				$id = $this->req->id;
				$data=array();
				$data=ActualiteManager::chercherParId($id);
				$this->set_title($data['Titre_Article']);
				$this->tpl->assign('data',$data);
				
				
			}
			else{
				$this->site->ajouter_message("Accès administrateur");	
				$this->site->redirect("index");
			}
			
		}
		
		public function action_modifier()
		{
		}
		
		public function action_supprimer()
		{
		}
}
?>