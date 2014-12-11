<?php /* Smarty version Smarty-3.1.1, created on 2014-12-11 11:17:26
         compiled from "modules\CRUD\tpl\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2058754896f36a67605-44881879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f043512596bdb0c8761ebf79aa6ead9810cc610' => 
    array (
      0 => 'modules\\CRUD\\tpl\\detail.tpl',
      1 => 1418291080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2058754896f36a67605-44881879',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'reference' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_54896f36af9dd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54896f36af9dd')) {function content_54896f36af9dd($_smarty_tpl) {?>
<div class="alert alert-info"><h2>Aperçu de <?php echo $_smarty_tpl->tpl_vars['reference']->value;?>
</h2></div>

<div class='jumbotron'>
	<p>Afficher les détails de l'enregistrement...</p>
	<a href="#" class='btn btn-danger'>Supprimer</a>
	<a href="#" class='btn btn-default'>Modifier</a>
</div><?php }} ?>