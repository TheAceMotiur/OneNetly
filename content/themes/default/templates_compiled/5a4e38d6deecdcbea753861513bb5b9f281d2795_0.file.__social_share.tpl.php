<?php
/* Smarty version 4.5.1, created on 2024-08-31 09:08:42
  from '/home/onenetly/public_html/content/themes/default/templates/__social_share.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2dd9ad99ab3_34281880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a4e38d6deecdcbea753861513bb5b9f281d2795' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/__social_share.tpl',
      1 => 1710340214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 7,
  ),
),false)) {
function content_66d2dd9ad99ab3_34281880 (Smarty_Internal_Template $_smarty_tpl) {
?><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['_link']->value;?>
" class="btn-icon-social">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'width'=>"24px",'height'=>"24px"), 0, false);
?>
</a>
<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $_smarty_tpl->tpl_vars['_link']->value;?>
" class="btn-icon-social">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'width'=>"24px",'height'=>"24px"), 0, true);
?>
</a>
<a href="https://vk.com/share.php?url=<?php echo $_smarty_tpl->tpl_vars['_link']->value;?>
" class="btn-icon-social" target="_blank">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'width'=>"24px",'height'=>"24px"), 0, true);
?>
</a>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $_smarty_tpl->tpl_vars['_link']->value;?>
" class="btn-icon-social" target="_blank">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'width'=>"24px",'height'=>"24px"), 0, true);
?>
</a>
<a href="https://api.whatsapp.com/send?text=<?php echo $_smarty_tpl->tpl_vars['_link']->value;?>
" class="btn-icon-social d-none d-sm-inline-block" target="_blank">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"whatsapp",'width'=>"24px",'height'=>"24px"), 0, true);
?>
</a>
<a href="https://reddit.com/submit?url=<?php echo $_smarty_tpl->tpl_vars['_link']->value;?>
" class="btn-icon-social" target="_blank">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"reddit",'width'=>"24px",'height'=>"24px"), 0, true);
?>
</a>
<a href="https://pinterest.com/pin/create/button/?url=<?php echo $_smarty_tpl->tpl_vars['_link']->value;?>
" class="btn-icon-social" target="_blank">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pinterest",'width'=>"24px",'height'=>"24px"), 0, true);
?>
</a><?php }
}
