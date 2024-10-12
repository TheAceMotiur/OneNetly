<?php
/* Smarty version 4.5.1, created on 2024-08-31 08:23:23
  from '/home/onenetly/public_html/content/themes/default/templates/__social_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2d2fb18b1f4_33990437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cf07d95aa27ac3c81a6cb1e7a7434999f0c2330' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/__social_login.tpl',
      1 => 1710769901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 6,
  ),
),false)) {
function content_66d2d2fb18b1f4_33990437 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['google_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['sngine_login_enabled']) {?>
  <?php if ($_smarty_tpl->tpl_vars['_or_pos']->value != 'bottom') {?>
    <div class="hr-heading mt5 mb10">
      <div class="hr-heading-text">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "or" ));?>

      </div>
    </div>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/facebook" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), 0, false);
?>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sign in with Facebook" ));?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['google_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/google" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"google",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sign in with Google" ));?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/twitter" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sign in with X" ));?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/linkedin" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sign in with LinkedIn" ));?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/vkontakte" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sign in with VK" ));?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/wordpress" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wordpress",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sign in with WordPress" ));?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['system']->value['sngine_login_enabled']) {?>
    <a href="https://<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_domain'];?>
/api/oauth?app_id=<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_appid'];?>
" class="d-block mb5 btn btn-social">
      <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_icon'];?>
" width="24" height="24" alt="<?php ob_start();
echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_name'];
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_prefixVariable1 ));?>
" class="mr5">
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sign in with" ));?>
 <?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_name'];?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['_or_pos']->value == 'bottom') {?>
    <div class="hr-heading mt20 mb20">
      <div class="hr-heading-text">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "or" ));?>

      </div>
    </div>
  <?php }
}
}
}
