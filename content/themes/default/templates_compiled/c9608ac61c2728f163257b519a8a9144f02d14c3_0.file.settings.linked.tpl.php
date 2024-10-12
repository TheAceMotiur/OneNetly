<?php
/* Smarty version 4.5.1, created on 2024-09-05 10:41:24
  from '/home/onenetly/public_html/content/themes/default/templates/settings.linked.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d98ad496dbd7_46798941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9608ac61c2728f163257b519a8a9144f02d14c3' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/settings.linked.tpl',
      1 => 1710333026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 7,
  ),
),false)) {
function content_66d98ad496dbd7_46798941 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-header with-icon">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linked_accounts",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
?>
  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Linked Accounts" ));?>

</div>
<div class="card-body">
  <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled']) {?>
    <div class="form-table-row">
      <div class="avatar">
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'width'=>"40px",'height'=>"40px"), 0, true);
?>
      </div>
      <div>
        <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook" ));?>
</div>
        <div class="form-text d-none d-sm-block">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['facebook_connected']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is connected to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook" ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect your account to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook" ));?>

          <?php }?>
        </div>
      </div>
      <div class="text-end">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['facebook_connected']) {?>
          <a class="btn btn-sm btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/revoke/facebook"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disconnect" ));?>
</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/facebook"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect" ));?>
</a>
        <?php }?>
      </div>
    </div>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['system']->value['google_login_enabled']) {?>
    <div class="form-table-row">
      <div class="avatar">
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"google",'width'=>"40px",'height'=>"40px"), 0, true);
?>
      </div>
      <div>
        <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google" ));?>
</div>
        <div class="form-text d-none d-sm-block">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['google_connected']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is connected to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google" ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect your account to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google" ));?>

          <?php }?>
        </div>
      </div>
      <div class="text-end">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['google_connected']) {?>
          <a class="btn btn-sm btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/revoke/google"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disconnect" ));?>
</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/google"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect" ));?>
</a>
        <?php }?>
      </div>
    </div>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled']) {?>
    <div class="form-table-row">
      <div class="avatar">
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'width'=>"40px",'height'=>"40px"), 0, true);
?>
      </div>
      <div>
        <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twitter" ));?>
</div>
        <div class="form-text d-none d-sm-block">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['twitter_connected']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is connected to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twitter" ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect your account to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twitter" ));?>

          <?php }?>
        </div>
      </div>
      <div class="text-end">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['twitter_connected']) {?>
          <a class="btn btn-sm btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/revoke/twitter"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disconnect" ));?>
</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/twitter"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect" ));?>
</a>
        <?php }?>
      </div>
    </div>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled']) {?>
    <div class="form-table-row">
      <div class="avatar">
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'width'=>"40px",'height'=>"40px"), 0, true);
?>
      </div>
      <div>
        <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Linkedin" ));?>
</div>
        <div class="form-text d-none d-sm-block">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['linkedin_connected']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is connected to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Linkedin" ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect your account to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Linkedin" ));?>

          <?php }?>
        </div>
      </div>
      <div class="text-end">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['linkedin_connected']) {?>
          <a class="btn btn-sm btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/revoke/linkedin"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disconnect" ));?>
</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/linkedin"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect" ));?>
</a>
        <?php }?>
      </div>
    </div>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
    <div class="form-table-row">
      <div class="avatar">
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'width'=>"40px",'height'=>"40px"), 0, true);
?>
      </div>
      <div>
        <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte" ));?>
</div>
        <div class="form-text d-none d-sm-block">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['vkontakte_connected']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is connected to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte" ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect your account to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte" ));?>

          <?php }?>
        </div>
      </div>
      <div class="text-end">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['vkontakte_connected']) {?>
          <a class="btn btn-sm btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/revoke/vkontakte"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disconnect" ));?>
</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/vkontakte"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect" ));?>
</a>
        <?php }?>
      </div>
    </div>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>
    <div class="form-table-row">
      <div class="avatar">
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wordpress",'width'=>"40px",'height'=>"40px"), 0, true);
?>
      </div>
      <div>
        <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Wordpress" ));?>
</div>
        <div class="form-text d-none d-sm-block">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['wordpress_connected']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is connected to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "wordpress" ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect your account to" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "wordpress" ));?>

          <?php }?>
        </div>
      </div>
      <div class="text-end">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['wordpress_connected']) {?>
          <a class="btn btn-sm btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/revoke/wordpress"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disconnect" ));?>
</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/connect/wordpress"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect" ));?>
</a>
        <?php }?>
      </div>
    </div>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['system']->value['sngine_login_enabled']) {?>
    <div class="form-table-row">
      <div class="avatar">
        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_icon'];?>
" width="40" height="40" alt="<?php ob_start();
echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_name'];
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_prefixVariable1 ));?>
">
      </div>
      <div>
        <div class="form-label h6 mb5"><?php ob_start();
echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_name'];
$_prefixVariable2 = ob_get_clean();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_prefixVariable2 ));?>
</div>
        <div class="form-text d-none d-sm-block">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['sngine_connected']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is connected to" ));?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_name'];
$_prefixVariable3 = ob_get_clean();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_prefixVariable3 ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect your account to" ));?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_name'];
$_prefixVariable4 = ob_get_clean();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_prefixVariable4 ));?>

          <?php }?>
        </div>
      </div>
      <div class="text-end">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['sngine_connected']) {?>
          <a class="btn btn-sm btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/revoke/sngine"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disconnect" ));?>
</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="https://<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_domain'];?>
/api/oauth?app_id=<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_appid'];?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Connect" ));?>
</a>
        <?php }?>
      </div>
    </div>
  <?php }?>
</div><?php }
}
