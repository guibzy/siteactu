<h2> {$data['Titre_Article']}</h2></br>

<p>{$data['Contenu_Article']}</p>
{if $data['Note_Redacteur'] eq null}{else} <b>Note du produit :</b> {$data['Note_Redacteur']} {/if}
</br><p>Ecrit le <b>{$data['Date_Article']}</b> par <b>{$user->login}</b></p>

<a class='btn btn-success glyphicon glyphicon' 
						data-toggle="modal" 
						data-target="#inclusionModal"
						href='?module=AffichageArticles&action=comment&id_art={$data['ID_Article']}&id_user={$user->id}&displayModuleInDialog=1'>
Commenter</a>
	
<!-- boite de dialogue confirmation -->
<!-- exemple du site getbootstrap -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        Êtes vous sûr de vouloir supprimer l'enregistrement ? 
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Fermer</a>
        <a href="#" class="btn btn-primary" id='go'>Confirmer</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	
	
<!-- boite de dialogue inclusion-->
<div class="modal fade" id="inclusionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	    Contenu vide remplacé par le module...
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>