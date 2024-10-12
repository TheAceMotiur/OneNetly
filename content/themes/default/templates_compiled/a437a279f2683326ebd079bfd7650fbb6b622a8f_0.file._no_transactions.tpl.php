<?php
/* Smarty version 4.5.1, created on 2024-09-02 09:21:16
  from '/home/onenetly/public_html/content/themes/default/templates/_no_transactions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d5838cdd3608_38173589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a437a279f2683326ebd079bfd7650fbb6b622a8f' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/_no_transactions.tpl',
      1 => 1685400829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
),false)) {
function content_66d5838cdd3608_38173589 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- no transaction -->
<div class="text-center text-muted">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"transaction",'class'=>"mb20",'width'=>"56px",'height'=>"56px"), 0, false);
?>
  <div class="text-md">
    <span class="no-data"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Looks like you don't have any transaction yet" ));?>
</span>
  </div>
</div>
<!-- no transaction --><?php }
}
