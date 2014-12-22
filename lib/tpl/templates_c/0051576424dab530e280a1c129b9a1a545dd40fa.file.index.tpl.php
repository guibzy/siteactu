<?php /* Smarty version Smarty-3.1.1, created on 2014-12-22 22:10:26
         compiled from "modules\AffichageArticles\tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136595489570be7acb3-20399611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0051576424dab530e280a1c129b9a1a545dd40fa' => 
    array (
      0 => 'modules\\AffichageArticles\\tpl\\index.tpl',
      1 => 1419282624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136595489570be7acb3-20399611',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5489570c15f5b',
  'variables' => 
  array (
    'fsearch' => 0,
    'data' => 0,
    'donnees' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5489570c15f5b')) {function content_5489570c15f5b($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->tpl_vars['fsearch']->value;?>

<h2>Liste des articles</h2>

	<table class='table table-striped'>
		<thead>
			<th>Numéro article</th><th>Titre_Article</th><th>Date_Article</th>
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
				<td><a href='?module=AffichageArticles&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['donnees']->value['ID_Article'];?>
'> Articles numéro <?php echo $_smarty_tpl->tpl_vars['donnees']->value['ID_Article'];?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['Titre_Article'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['donnees']->value['Date_Article'];?>
</td>
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
</div><?php }} ?>