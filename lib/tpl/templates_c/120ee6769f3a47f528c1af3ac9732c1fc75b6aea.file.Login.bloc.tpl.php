<?php /* Smarty version Smarty-3.1.1, created on 2014-12-11 09:33:00
         compiled from "blocs\Login.bloc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9038548956bc7e4559-67815884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '120ee6769f3a47f528c1af3ac9732c1fc75b6aea' => 
    array (
      0 => 'blocs\\Login.bloc.tpl',
      1 => 1415065536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9038548956bc7e4559-67815884',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_548956bc8c300',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548956bc8c300')) {function content_548956bc8c300($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['login']->value)){?>	
<ul class="nav navbar-nav navbar-right">
	<li><a href='?module=Connexion&action=deconnect'><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
 | Se déconnecter</a></li>
</ul>


<?php }else{ ?>
	<form class="navbar-form navbar-right" role="form" method='POST' action="index.php?module=Connexion&action=login">
		<div class="form-group">
			<input name='Login' type="text" placeholder="Identifiant" class="form-control">
		</div>
		<div class="form-group">
			<input name='Pass' type="password" placeholder="Pass" class="form-control">
		</div>
	<input type="submit" class="btn btn-success" value='Connexion'>
	</form>
<?php }?>
</div>
<?php }} ?>