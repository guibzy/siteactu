<?php /* Smarty version Smarty-3.1.1, created on 2014-12-11 11:17:26
         compiled from "templates\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199254896f36b34758-48886337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7435ae762f8460e495e837a98aa0b8c1506fed66' => 
    array (
      0 => 'templates\\modal.tpl',
      1 => 1415065536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199254896f36b34758-48886337',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titre' => 0,
    'bloc_contenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_54896f36b78d1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54896f36b78d1')) {function content_54896f36b78d1($_smarty_tpl) {?><!-- boite de dialogue -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h4>
      </div>
      <div class="modal-body">
        <?php echo $_smarty_tpl->tpl_vars['bloc_contenu']->value;?>

      </div>
<?php }} ?>