<?php
/* Smarty version 5.4.1, created on 2024-09-29 10:32:46
  from 'file:ajax.lightbox.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f92cce7b3681_15209979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbe781f3b45da3d5f8014a6a5facba7bf0e1524a' => 
    array (
      0 => 'ajax.lightbox.tpl',
      1 => 1647975801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_post_photo.tpl' => 1,
  ),
))) {
function content_66f92cce7b3681_15209979 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
$_smarty_tpl->assign('post', $_smarty_tpl->getValue('photo')['post'], false, NULL);?>

<div class="lightbox-post" data-id="<?php if ($_smarty_tpl->getValue('photo')['is_single']) {
echo $_smarty_tpl->getValue('post')['post_id'];
} else {
echo $_smarty_tpl->getValue('photo')['photo_id'];
}?>">
  <div class="js_scroller" data-slimScroll-height="100%">
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_post_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_lightbox'=>true), (int) 0, $_smarty_current_dir);
?>
  </div>
</div><?php }
}
