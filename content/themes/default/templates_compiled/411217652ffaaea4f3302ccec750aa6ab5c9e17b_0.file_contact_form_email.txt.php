<?php
/* Smarty version 5.4.1, created on 2024-09-30 07:25:09
  from 'file:emails/contact_form_email.txt' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fa5255866f23_69802537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '411217652ffaaea4f3302ccec750aa6ab5c9e17b' => 
    array (
      0 => 'emails/contact_form_email.txt',
      1 => 1693733139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66fa5255866f23_69802537 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates/emails';
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Hi");?>
,

<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You have a new email message");?>


<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Email Subject");?>
: <?php echo $_smarty_tpl->getValue('subject');?>


<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sender Name");?>
: <?php echo $_smarty_tpl->getValue('name');?>


<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sender Email");?>
: <?php echo $_smarty_tpl->getValue('email');?>


<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Email Message");?>
: <?php echo $_smarty_tpl->getValue('message');?>


<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('system')['system_title']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Team");
}
}
