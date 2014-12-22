<?php /* Smarty version Smarty-3.1.1, created on 2014-12-22 11:09:24
         compiled from "modules\CRUDActualite\tpl\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3693548985af602640-09147044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d9208a0734dbfa55a0e54aa92e892479f1d531c' => 
    array (
      0 => 'modules\\CRUDActualite\\tpl\\detail.tpl',
      1 => 1419107368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3693548985af602640-09147044',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_548985af69ea5',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548985af69ea5')) {function content_548985af69ea5($_smarty_tpl) {?><div class='jumbotron'>
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['Contenu_Article'];?>
</p>
<p>Ecrit le <?php echo $_smarty_tpl->tpl_vars['data']->value['Date_Article'];?>
</p>
</div><?php }} ?>