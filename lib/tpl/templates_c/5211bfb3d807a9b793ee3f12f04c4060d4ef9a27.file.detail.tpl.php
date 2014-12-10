<?php /* Smarty version Smarty-3.1.1, created on 2014-12-10 18:01:05
         compiled from "modules\AffichageArticles\tpl\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2763654887c51c6dd13-30883161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5211bfb3d807a9b793ee3f12f04c4060d4ef9a27' => 
    array (
      0 => 'modules\\AffichageArticles\\tpl\\detail.tpl',
      1 => 1418230329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2763654887c51c6dd13-30883161',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_54887c51d3ae6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54887c51d3ae6')) {function content_54887c51d3ae6($_smarty_tpl) {?><h2> <?php echo $_smarty_tpl->tpl_vars['data']->value['Titre_Article'];?>
</h2>

<p><?php echo $_smarty_tpl->tpl_vars['data']->value['Contenu_Article'];?>
</p>

<p>Ecrit le <?php echo $_smarty_tpl->tpl_vars['data']->value['Date_Article'];?>
</p><?php }} ?>