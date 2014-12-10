<?php /* Smarty version Smarty-3.1.1, created on 2014-12-03 10:51:40
         compiled from "modules\CRUDActualite\tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11006546c90c14c91c6-12945819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6be7da5e06823066b155344f601b0ee781222dd6' => 
    array (
      0 => 'modules\\CRUDActualite\\tpl\\index.tpl',
      1 => 1417006177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11006546c90c14c91c6-12945819',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_546c90c154a06',
  'variables' => 
  array (
    'data' => 0,
    'donnees' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546c90c154a06')) {function content_546c90c154a06($_smarty_tpl) {?>
<h2>Liste des articles</h2>
	<p class="text-right">
		<a href='?module=CRUD&action=ajouter' class='btn btn-success glyphicon glyphicon-plus'> Ajouter</a>
	</p>
<h3>Liste</h3>
	<table class='table table-striped'>
		<thead>
			<th>ID_Article</th><th>Titre_Article</th><th>Date_Article</th><th>Actions</th>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['donnees'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['donnees']->_loop = false;
 $_smarty_tpl->tpl_vars['ligne'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['donnees']->key => $_smarty_tpl->tpl_vars['donnees']->value){
$_smarty_tpl->tpl_vars['donnees']->_loop = true;
 $_smarty_tpl->tpl_vars['ligne']->value = $_smarty_tpl->tpl_vars['donnees']->key;
?>
			<tr class='table-striped'>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['ID_Article'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['Titre_Article'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['Date_Article'];?>
</td>
				<td></td>
			</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['donnees']->_loop) {
?>	
			<tr><td colspan='3'>Aucune donnée</td></tr>
		<?php } ?>
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
</div><?php }} ?>