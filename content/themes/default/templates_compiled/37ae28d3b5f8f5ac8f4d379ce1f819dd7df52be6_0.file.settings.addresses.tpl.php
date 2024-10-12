<?php
/* Smarty version 4.5.1, created on 2024-09-02 09:21:34
  from '/home/onenetly/public_html/content/themes/default/templates/settings.addresses.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d5839e279129_50105784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37ae28d3b5f8f5ac8f4d379ce1f819dd7df52be6' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/settings.addresses.tpl',
      1 => 1688837635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
    'file:_addresses.tpl' => 1,
  ),
),false)) {
function content_66d5839e279129_50105784 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-header with-icon">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
?>
  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Addresses" ));?>

</div>
<div class="card-body">
  <?php $_smarty_tpl->_subTemplateRender('file:_addresses.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div><?php }
}
