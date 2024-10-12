<?php
/* Smarty version 4.5.1, created on 2024-09-02 05:00:21
  from '/home/onenetly/public_html/content/themes/default/templates/emails/activation_email.txt' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d54665eb4a57_42216330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fe3fec37bc456bd5b8a4ea8e620f9674b802f91' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/emails/activation_email.txt',
      1 => 1693733137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d54665eb4a57_42216330 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hi" ));?>
 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
,

<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "To complete the activation process, please follow this link" ));?>
:
<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/activation/<?php echo $_smarty_tpl->tpl_vars['email_verification_code']->value;?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Activiation Code" ));?>
: <?php echo $_smarty_tpl->tpl_vars['email_verification_code']->value;?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Welcome to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['system_title'] ));?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['system_title'] ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Team" ));
}
}
