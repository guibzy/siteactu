<?php /* Smarty version Smarty-3.1.1, created on 2014-12-22 15:33:51
         compiled from "modules\AffichageArticles\tpl\detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1684454895711cff621-72329647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5211bfb3d807a9b793ee3f12f04c4060d4ef9a27' => 
    array (
      0 => 'modules\\AffichageArticles\\tpl\\detail.tpl',
      1 => 1419258829,
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
</b></p><?php }} ?>