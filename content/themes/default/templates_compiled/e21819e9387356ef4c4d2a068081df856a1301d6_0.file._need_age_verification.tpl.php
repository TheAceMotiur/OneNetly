<?php
/* Smarty version 4.5.1, created on 2024-08-31 08:24:22
  from '/home/onenetly/public_html/content/themes/default/templates/_need_age_verification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2d3361d61f3_19438895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e21819e9387356ef4c4d2a068081df856a1301d6' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/_need_age_verification.tpl',
      1 => 1706437040,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
),false)) {
function content_66d2d3361d61f3_19438895 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- need age verification -->
<div class="text-center text-muted">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"adult",'class'=>"main-icon mb20",'width'=>"56px",'height'=>"56px"), 0, false);
?>
  <div class="text-md">
    <span style="padding: 8px 20px; background: #ececec; border-radius: 18px; font-weight: bold; font-size: 13px;">
      <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_adult']) {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You must be 18+ to view this content" ));?>

      <?php } else { ?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your age must be verified to view this content" ));?>

      <?php }?>
    </span>
  </div>
</div>
<!-- need age verification --><?php }
}
