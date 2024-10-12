<?php
/* Smarty version 5.4.1, created on 2024-10-07 14:50:06
  from 'file:emails/notification_email.txt' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_6703f51ebaf4f8_25438683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e29db2b800f38953c42ec28927d641731acaf09' => 
    array (
      0 => 'emails/notification_email.txt',
      1 => 1707307788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6703f51ebaf4f8_25438683 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates/emails';
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Hi");?>
 <?php echo $_smarty_tpl->getValue('receiver')['name'];?>
,

<?php if (!$_smarty_tpl->getValue('notification')['system_notification']) {
echo $_smarty_tpl->getValue('user')->_data['name'];
}?> <?php echo $_smarty_tpl->getValue('notification')['message'];?>

<?php echo $_smarty_tpl->getValue('notification')['url'];?>


<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('system')['system_title']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Team");
}
}
