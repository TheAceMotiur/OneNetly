<?php
/* Smarty version 4.5.1, created on 2024-09-09 12:22:55
  from '/home/onenetly/public_html/content/themes/default/templates/emails/contact_form_email.txt' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66dee89fb153b2_39824228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '748acca93d881c19b6b4e05d239eb7bb9454e8d1' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/emails/contact_form_email.txt',
      1 => 1693733139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66dee89fb153b2_39824228 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hi" ));?>
,

<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You have a new email message" ));?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Subject" ));?>
: <?php echo $_smarty_tpl->tpl_vars['subject']->value;?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sender Name" ));?>
: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sender Email" ));?>
: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Message" ));?>
: <?php echo $_smarty_tpl->tpl_vars['message']->value;?>


<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['system_title'] ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Team" ));
}
}
