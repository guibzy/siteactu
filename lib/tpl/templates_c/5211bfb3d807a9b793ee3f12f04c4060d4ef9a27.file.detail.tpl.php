<?php /* Smarty version Smarty-3.1.1, created on 2014-12-11 09:34:25
         compiled from "modules\AffichageArticles\tpl\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1684454895711cff621-72329647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '1684454895711cff621-72329647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_54895711d9ba5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54895711d9ba5')) {function content_54895711d9ba5($_smarty_tpl) {?><h2> <?php echo $_smarty_tpl->tpl_vars['data']->value['Titre_Article'];?>
</h2>

<p><?php echo $_smarty_tpl->tpl_vars['data']->value['Contenu_Article'];?>
</p>

<p>Ecrit le <?php echo $_smarty_tpl->tpl_vars['data']->value['Date_Article'];?>
</p><?php }} ?>