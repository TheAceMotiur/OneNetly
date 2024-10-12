<?php
/* Smarty version 4.5.1, created on 2024-09-02 05:06:16
  from '/home/onenetly/public_html/content/themes/default/templates/emails/forget_password_email.txt' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d547c8112936_71958356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0f8f05f4430b83c0f62b23b55618be6862ea650' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/emails/forget_password_email.txt',
      1 => 1693733141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d547c8112936_71958356 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hi" ));?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "To complete the reset password process, please copy this token" ));?>
:

<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Token" ));?>
: <?php echo $_smarty_tpl->tpl_vars['reset_key']->value;?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['system_title'] ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Team" ));
}
}
