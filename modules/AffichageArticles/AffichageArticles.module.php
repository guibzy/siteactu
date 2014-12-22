<?php 
class AffichageArticles extends Module
	{
		public function action_index()
		{
			$data=array();
			$data=ActualiteManager::listerParCat($this->req->num_cat);
			$maCat=CatManager::chercherParId($this->req->num_cat);
			$this->set_title("Actualité ".$maCat['Nom_Categorie']);
			$this->tpl->assign('data',$data);
		}
		
		public function action_detail()
		{
			$id=$this->req->id;
			
			$data=ActualiteManager::chercherParId($id);
			$masouscat=SouscatManager::chercherParId($data['ID_SousCategorie']);
			
			$this->set_title($masouscat['Nom_SousCategorie']);
			$user=MembreManager::chercherParID($data['ID_Utilisateur']);
			
			$com=CommentaireManager::listerParIdArticle($id);
			$this->tpl->assign('data',$data);
			$this->tpl->assign('user',$user);
			$this->tpl->assign('com',$com);
		}
		
		public function action_comment()
		{
			if(isset($this->session->user))
			{
				$this->set_title("Commenter l'article");		

				//construction d'un formulaire manuellement
				//chaque champ est ajouté par appel de fonction
				$f=new Form("?module=AffichageArticles&action=commentvalide&id_art=".$this->req->id_art."&id_user=".$this->req->id_user,"form2");

				//construction sous forme de tableau
				//chaque champ est déclaré sous la forme d'un tableau de paramètres
				$f->build_from_array(array(
					array(
							'type'=>'textarea',
							'name'=>'contenu',
							'id'=>'contenu',
							'label'=>'Votre commentaire',
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
				
				
				//stocke la structure du formulaire dans la session sous le nom "form"
				//pour une éventuelle réutilisation
				$this->session->formulaire = $f;
			}
			else
			{
				$this->set_title("Commenter l'article");
				$f="Seules les utilisateurs connectés peuvent commenter";
			}
			$this->tpl->assign("form",$f);
		}
		
		public function action_commentvalide()
		{
			//$this->set_title("Commenter l'article");
			$err=false;
			
			//on récupère la structure du formulaire précédemment stocké dans la session
			$form=$this->session->formulaire;
			
			$ok = $form->check();
			
			if(!$ok){ 
				//re-remplir le forumulaire		
				$form->populate();
				//choisir d'afficher le template index (plutot que "valide")
				//c'est une solution qui permet d'avoir un seul template pour les deux actions
				$this->set_tpl_name("comment");
				//assigner le formulaire à la variable de template
				$this->tpl->assign('form',$form);			
				
			}else{

				$com = new Commentaire(null,$this->req->contenu,date("Y-m-d")
										,$this->req->id_user,$this->req->id_art);
				CommentaireManager::creer($com);
				
				//rediriger vers une autre page
				$this->site->ajouter_message("Commentaire ajouté");	
				$this->site->redirect("AffichageArticles","detail&id=".$this->req->id_art);
				//ne pas laisser le framework continuer le traitement 
				exit;
				
			}
		}
	}
?>