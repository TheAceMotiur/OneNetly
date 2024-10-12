<?php
/* Smarty version 4.5.1, created on 2024-08-31 08:31:07
  from '/home/onenetly/public_html/content/themes/default/templates/emails/notification_email.txt' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2d4cb4597c4_37773340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de845303fe96e5c629c2565fd9896b2bda0ca19c' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/emails/notification_email.txt',
      1 => 1707307788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d2d4cb4597c4_37773340 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hi" ));?>
 <?php echo $_smarty_tpl->tpl_vars['receiver']->value['name'];?>
,

<?php if (!$_smarty_tpl->tpl_vars['notification']->value['system_notification']) {
echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];
}?> <?php echo $_smarty_tpl->tpl_vars['notification']->value['message'];?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value['url'];?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['system_title'] ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Team" ));
}
}
