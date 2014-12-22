<?php /* Smarty version Smarty-3.1.1, created on 2014-12-22 17:33:43
         compiled from "modules\AffichageArticles\tpl\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1684454895711cff621-72329647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5211bfb3d807a9b793ee3f12f04c4060d4ef9a27' => 
    array (
      0 => 'modules\\AffichageArticles\\tpl\\detail.tpl',
      1 => 1419266020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1684454895711cff621-72329647',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_54895711d9ba5',
  'variables' => 
  array (
    'data' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54895711d9ba5')) {function content_54895711d9ba5($_smarty_tpl) {?><h2> <?php echo $_smarty_tpl->tpl_vars['data']->value['Titre_Article'];?>
</h2></br>

<p><?php echo $_smarty_tpl->tpl_vars['data']->value['Contenu_Article'];?>
</p>
<?php if ($_smarty_tpl->tpl_vars['data']->value['Note_Redacteur']==null){?><?php }else{ ?> <b>Note du produit :</b> <?php echo $_smarty_tpl->tpl_vars['data']->value['Note_Redacteur'];?>
 <?php }?>
</br><p>Ecrit le <b><?php echo $_smarty_tpl->tpl_vars['data']->value['Date_Article'];?>
</b> par <b><?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
</b></p>

<a class='btn btn-success glyphicon glyphicon' 
						data-toggle="modal" 
						data-target="#inclusionModal"
						href='?module=AffichageArticles&action=comment&id_art=<?php echo $_smarty_tpl->tpl_vars['data']->value['ID_Article'];?>
&id_user=<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
&displayModuleInDialog=1'>
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
</div><?php }} ?>