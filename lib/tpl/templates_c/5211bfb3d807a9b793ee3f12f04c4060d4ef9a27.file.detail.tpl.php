<?php /* Smarty version Smarty-3.1.1, created on 2014-12-22 18:50:08
         compiled from "modules\AffichageArticles\tpl\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1684454895711cff621-72329647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5211bfb3d807a9b793ee3f12f04c4060d4ef9a27' => 
    array (
      0 => 'modules\\AffichageArticles\\tpl\\detail.tpl',
      1 => 1419270598,
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
    'com' => 0,
    'donnee' => 0,
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
&displayModuleInDialog=1'>
Commenter</a>

<h3> Commentaires :</h3>
<?php if ($_smarty_tpl->tpl_vars['com']->value==false){?>
<p>Aucun commentaire pour le moment</p>
<?php }else{ ?>
	<?php  $_smarty_tpl->tpl_vars['donnee'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['donnee']->_loop = false;
 $_smarty_tpl->tpl_vars['ligne'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['com']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['donnee']->key => $_smarty_tpl->tpl_vars['donnee']->value){
$_smarty_tpl->tpl_vars['donnee']->_loop = true;
 $_smarty_tpl->tpl_vars['ligne']->value = $_smarty_tpl->tpl_vars['donnee']->key;
?>
	<div class='jumbotron'>
	<p><?php echo $_smarty_tpl->tpl_vars['donnee']->value['Contenu_Commentaire'];?>
</p>
	Ecrit le <b><?php echo $_smarty_tpl->tpl_vars['donnee']->value['Date_Commentaire'];?>
</b> par <b><?php echo $_smarty_tpl->tpl_vars['donnee']->value['Pseudo_Utilisateur'];?>
</b>
	</div>
	<?php } ?>
<?php }?>

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