
<h2>Liste des articles</h2>
	<p class="text-right">
		<a href='?module=CRUDActualite&action=creer' class='btn btn-success glyphicon glyphicon-plus'> Ajouter</a>
	</p>
<h3>Liste</h3>
	<table class='table table-striped'>
		<thead>
			<th>ID_Article</th><th>Titre_Article</th><th>Date_Article</th><th>Actions</th>
		</thead>
		<tbody>
		{foreach $data as $ligne=>$donnees}
			<tr class='table-striped'>
				<td>{$donnees.ID_Article}</td>
				<td>{$donnees.Titre_Article}</td>
				<td>{$donnees.Date_Article}</td>
				<td></td>
			</tr>
		{foreachelse}	
			<tr><td colspan='3'>Aucune donnée</td></tr>
		{/foreach}
		</tbody>
	</table>
	
	
	
	
	
	
<!-- boite de dialogue confirmation -->
<!-- exemple du site getbootstrap -->
<div class="modal fade" ID_Article="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hID_Articleden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hID_Articleden="true">&times;</button>
        <h4 class="modal-title" ID_Article="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        Êtes vous sûr de vouloir supprimer l'enregistrement ? 
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-default" data-dismiss="modal">Fermer</a>
        <a href="#" class="btn btn-primary" ID_Article='go'>Confirmer</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	
	
<!-- boite de dialogue inclusion-->
<div class="modal fade" ID_Article="inclusionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hID_Articleden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	    Contenu vID_Articlee remplacé par le module...
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>