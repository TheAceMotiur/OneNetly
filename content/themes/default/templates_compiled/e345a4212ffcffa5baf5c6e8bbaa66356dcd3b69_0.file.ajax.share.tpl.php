<?php
/* Smarty version 4.5.1, created on 2024-09-03 13:12:09
  from '/home/onenetly/public_html/content/themes/default/templates/ajax.share.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d70b291ebfd6_14556926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e345a4212ffcffa5baf5c6e8bbaa66356dcd3b69' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/ajax.share.tpl',
      1 => 1710340419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
    'file:__social_share.tpl' => 1,
  ),
),false)) {
function content_66d70b291ebfd6_14556926 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
  <h6 class="modal-title">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"share",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, false);
?>
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Share" ));?>

  </h6>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

  <div style="margin: 25px auto;">
    <div class="input-group">
      <input type="text" disabled class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['share_link']->value;?>
">
      <button type="button" class="btn btn-light js_clipboard" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['share_link']->value;?>
" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Copy" ));?>
'>
        <i class="fas fa-copy"></i>
      </button>
    </div>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['system']->value['social_share_enabled']) {?>
    <div class="post-social-share border-bottom-0">
      <?php $_smarty_tpl->_subTemplateRender('file:__social_share.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_link'=>$_smarty_tpl->tpl_vars['share_link']->value), 0, false);
?>
    </div>
  <?php }?>

</div><?php }
}
