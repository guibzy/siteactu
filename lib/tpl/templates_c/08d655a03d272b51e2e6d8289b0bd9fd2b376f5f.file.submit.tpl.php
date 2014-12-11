<?php /* Smarty version Smarty-3.1.1, created on 2014-12-11 09:33:21
         compiled from "templates\champs\submit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7574548956d14f0905-75116750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08d655a03d272b51e2e6d8289b0bd9fd2b376f5f' => 
    array (
      0 => 'templates\\champs\\submit.tpl',
      1 => 1415065536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7574548956d14f0905-75116750',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'f_error' => 0,
    'f_required' => 0,
    'f_id' => 0,
    'f_label' => 0,
    'f_name' => 0,
    'f_value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_548956d1594a3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548956d1594a3')) {function content_548956d1594a3($_smarty_tpl) {?><div class='form-group <?php echo $_smarty_tpl->tpl_vars['f_error']->value;?>
'>
<label class='col-sm-6 control-label <?php echo $_smarty_tpl->tpl_vars['f_error']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['f_required']->value;?>
' for='<?php echo $_smarty_tpl->tpl_vars['f_id']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['f_label']->value;?>
</label>
<div class='col-sm-2'>
<input type='submit' name='<?php echo $_smarty_tpl->tpl_vars['f_name']->value;?>
' id='<?php echo $_smarty_tpl->tpl_vars['f_id']->value;?>
' class='form-control' value='<?php echo $_smarty_tpl->tpl_vars['f_value']->value;?>
'>
</div>
<div class='form-group <?php echo $_smarty_tpl->tpl_vars['f_error']->value;?>
'><?php }} ?>