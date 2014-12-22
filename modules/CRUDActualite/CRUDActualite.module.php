<?php
	class CRUDActualite extends Module
	{
		public function action_index()
		{
			if($this->session->user->redacteur==1)
			{
				$this->set_title("Administration des articles");
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
				
				$data2=array("" => "Sélectionnez la catégorie")+$data;
				
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
							'type'=>'select',
							'name'=>'note',
							'id'=>'note',
							'label'=>'Note/10 éventuelle du produit',
							'options'=>array(""=>"Votre note",1=>"1",2=>"2",3=>"3",4=>"4",5=>"5",6=>"6",7=>"7",8=>"8",9=>"9",10=>"10")
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
				$actu->ID_SousCategorie=$this->req->souscat;
				if($this->req->note!=""){
					$actu->Note_Redacteur=$this->req->note;
				}else{
					$actu->Note_Redacteur=null;
				}
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
			if($this->session->user->redacteur==1){
				$this->set_title("Modification article");		

				$data=SouscatManager::lister(); //importation des activites pour la liste déroulante
				
				$data2=array("" => "Modifier la catégorie")+$data;
				
				//construction d'un formulaire manuellement
				//chaque champ est ajouté par appel de fonction
				$f=new Form("?module=CRUDActualite&action=validemodif&id=".$this->req->id,"form2");
				
				$monActu=ActualiteManager::chercherParId($this->req->id);
				
				
				//construction sous forme de tableau
				//chaque champ est déclaré sous la forme d'un tableau de paramètres
				$f->build_from_array(array(
					array(
							'type'=>'text',
							'name'=>'titre',
							'id'=>'titre',
							'label'=>'Titre de l\'article',
							'required'=>true,
							'validation'=>'required',
							'value'=>$monActu['Titre_Article']
						),
						
					array(
							'type'=>'select',
							'name'=>'souscat',
							'id'=>'souscat',
							'label'=>'Sélectionnez une catégorie',
							'required'=>true,
							'value'=>$monActu['ID_SousCategorie'],
							'options'=>$data2
											
						),
					array(
							'type'=>'textarea',
							'name'=>'contenu',
							'id'=>'contenu',
							'label'=>'Contenu de l\'article',
							'required'=>true,
							'value'=>$monActu['Contenu_Article'],
							'validation'=>'required|min-length:5'
						),
						
						array(
							'type'=>'select',
							'name'=>'note',
							'id'=>'note',
							'label'=>'Note/10 éventuelle du produit',
							'value'=>$monActu['Note_Redacteur'],
							'options'=>array(""=>"Votre note",1=>"1",2=>"2",3=>"3",4=>"4",5=>"5",6=>"6",7=>"7",8=>"8",9=>"9",10=>"10")
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
		
	public function action_validemodif(){
		if($this->session->user->redacteur==1)
		{
			$this->set_title("Modification d'un article");
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
				$actu->ID_Article=$this->req->id;
				$actu->Titre_Article=$this->req->titre;
				$actu->Date_Article=date("Y-m-d");
				$actu->Contenu_Article=$this->req->contenu;
				$actu->ID_Utilisateur=$this->session->user->id;
				$actu->ID_SousCategorie=$this->req->souscat;
				if($this->req->note!=""){
					$actu->Note_Redacteur=$this->req->note;
				}else{
					$actu->Note_Redacteur=null;
				}
				ActualiteManager::modifier($actu);
				
				//rediriger vers une autre page
				$this->site->ajouter_message("Modifications effectuées",var_dump($actu));	
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
		
		public function action_supprimer()
		{
			if($this->session->user->redacteur==1)
			{
				CommentaireManager::supprimerParArt($this->req->id);
				ActualiteManager::supprimer($this->req->id);
				$this->site->ajouter_message("Article supprimé");	
				$this->site->redirect("CRUDActualite","index");
			}
			else{
				$this->site->ajouter_message("Accès administrateur");	
				$this->site->redirect("index");
			}
		}
}
?>