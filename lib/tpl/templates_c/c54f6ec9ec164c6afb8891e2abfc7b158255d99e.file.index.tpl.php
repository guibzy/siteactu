<?php /* Smarty version Smarty-3.1.1, created on 2014-10-21 17:24:53
         compiled from "modules\Essai\tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:939054467757f3b0d3-11731670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c54f6ec9ec164c6afb8891e2abfc7b158255d99e' => 
    array (
      0 => 'modules\\Essai\\tpl\\index.tpl',
      1 => 1413905090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '939054467757f3b0d3-11731670',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5446775821d3e',
  'variables' => 
  array (
    'tab' => 0,
    'ligne' => 0,
    'donnees' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446775821d3e')) {function content_5446775821d3e($_smarty_tpl) {?><p>
	<?php  $_smarty_tpl->tpl_vars['donnees'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['donnees']->_loop = false;
 $_smarty_tpl->tpl_vars['ligne'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tab']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['donnees']->key => $_smarty_tpl->tpl_vars['donnees']->value){
$_smarty_tpl->tpl_vars['donnees']->_loop = true;
 $_smarty_tpl->tpl_vars['ligne']->value = $_smarty_tpl->tpl_vars['donnees']->key;
?>
			<dl>
				<dd><?php echo $_smarty_tpl->tpl_vars['ligne']->value;?>
</dd>
				<dd><?php echo $_smarty_tpl->tpl_vars['donnees']->value;?>
</dd>
			</dl>
	<?php } ?>
</p><?php }} ?>