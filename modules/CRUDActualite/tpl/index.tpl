{literal}
<script>
//demande confirmation sur click d'un bouton supprimer
$(function() {
	//sur click d'un bouton de suppression
	$('a.glyphicon-remove').click(function(ev){
		//récupérer le href du lien
		//et l'utiliser pour le bouton de confirmation
		$('#go').attr("href",$(this).attr('href'))	

		//afficher la boite de dialogue
		$('#myModal').modal();
	
		//supprimer le comportement par défaut du lien d'origine
		ev.preventDefault();				
	})


//efface les données de la boite de dialogue après affichage
	$('body').on('hidden.bs.modal', '.modal', function () {
    	$(this).removeData('bs.modal');
    });	
	
	
});
</script>
{/literal}

<h2>Liste des articles</h2>
	<p class="text-right">
		<a href='?module=CRUDActualite&action=creer' class='btn btn-success glyphicon glyphicon-plus'> Ajouter</a>
	</p>
<h3>Liste</h3>
	<table class='table table-striped'>
		<thead>
			<th>Numéro article</th><th>Titre de l'article</th><th>Date de l'article</th><th>Actions</th>
		</thead>
		<tbody>
		{foreach $data as $ligne=>$donnees}
			<tr class='table-striped'>
				<td>{$donnees.ID_Article}</td>
				<td>{$donnees.Titre_Article}</td>
				<td>{$donnees.Date_Article}</td>
				<td>
					<!--voir le détail-->
					<a class='glyphicon glyphicon-search' 
						data-toggle="modal" 
						data-target="#inclusionModal" 
						href='?module=CRUDActualite&action=detail&id={$donnees.ID_Article}&displayModuleInDialog=1'>
					</a> 
					
					<!--modifier-->
					<a class='glyphicon glyphicon-pencil' 
						data-toggle="modal" 
						data-target="#inclusionModal"
						href='?module=CRUDActualite&action=modifier&id={$donnees.ID_Article}&displayModuleInDialog=1'>
					</a>

					<!--supprimer-->
					<!--supprimer-->
					<a class='glyphicon glyphicon-remove' title='{$donnees.Titre_Article}' 
						href='?module=CRUDActualite&action=supprimer&id={$donnees.ID_Article}'></a>	
				</td>
			</tr>
		{foreachelse}	
			<tr><td colspan='3'>Aucune donnée</td></tr>
		{/foreach}
		</tbody>
	</table>
	
	
	
	
	
	
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