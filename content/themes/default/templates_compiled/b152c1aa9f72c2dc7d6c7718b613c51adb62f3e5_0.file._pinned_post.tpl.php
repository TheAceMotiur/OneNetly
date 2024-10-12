<?php
/* Smarty version 4.5.1, created on 2024-09-02 13:48:42
  from '/home/onenetly/public_html/content/themes/default/templates/_pinned_post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d5c23ac21516_75832687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b152c1aa9f72c2dc7d6c7718b613c51adb62f3e5' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/_pinned_post.tpl',
      1 => 1647975699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_post.tpl' => 1,
  ),
),false)) {
function content_66d5c23ac21516_75832687 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- posts-filter -->
<div class="posts-filter">
  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pinned Post" ));?>
</span>
</div>
<!-- posts-filter -->

<?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('standalone'=>true,'pinned'=>true), 0, false);
}
}
