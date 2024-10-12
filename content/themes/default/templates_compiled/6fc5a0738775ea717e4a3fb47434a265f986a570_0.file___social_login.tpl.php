<?php
/* Smarty version 5.4.1, created on 2024-09-29 11:54:13
  from 'file:__social_login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f93fe5c73ba1_11494879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fc5a0738775ea717e4a3fb47434a265f986a570' => 
    array (
      0 => '__social_login.tpl',
      1 => 1710769901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 6,
  ),
))) {
function content_66f93fe5c73ba1_11494879 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
if ($_smarty_tpl->getValue('system')['facebook_login_enabled'] || $_smarty_tpl->getValue('system')['google_login_enabled'] || $_smarty_tpl->getValue('system')['twitter_login_enabled'] || $_smarty_tpl->getValue('system')['linkedin_login_enabled'] || $_smarty_tpl->getValue('system')['vkontakte_login_enabled'] || $_smarty_tpl->getValue('system')['wordpress_login_enabled'] || $_smarty_tpl->getValue('system')['sngine_login_enabled']) {?>
  <?php if ($_smarty_tpl->getValue('_or_pos') != 'bottom') {?>
    <div class="hr-heading mt5 mb10">
      <div class="hr-heading-text">
        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("or");?>

      </div>
    </div>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('system')['facebook_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/connect/facebook" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign in with Facebook");?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('system')['google_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/connect/google" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"google",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign in with Google");?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('system')['twitter_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/connect/twitter" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign in with X");?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('system')['linkedin_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/connect/linkedin" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign in with LinkedIn");?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('system')['vkontakte_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/connect/vkontakte" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign in with VK");?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('system')['wordpress_login_enabled']) {?>
    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/connect/wordpress" class="d-block mb5 btn btn-social">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wordpress",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign in with WordPress");?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('system')['sngine_login_enabled']) {?>
    <a href="https://<?php echo $_smarty_tpl->getValue('system')['sngine_app_domain'];?>
/api/oauth?app_id=<?php echo $_smarty_tpl->getValue('system')['sngine_appid'];?>
" class="d-block mb5 btn btn-social">
      <img src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('system')['sngine_app_icon'];?>
" width="24" height="24" alt="<?php ob_start();
echo $_smarty_tpl->getValue('system')['sngine_app_name'];
$_prefixVariable1 = ob_get_clean();
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_prefixVariable1);?>
" class="mr5">
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign in with");?>
 <?php echo $_smarty_tpl->getValue('system')['sngine_app_name'];?>

    </a>
  <?php }?>
  <?php if ($_smarty_tpl->getValue('_or_pos') == 'bottom') {?>
    <div class="hr-heading mt20 mb20">
      <div class="hr-heading-text">
        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("or");?>

      </div>
    </div>
  <?php }
}
}
}
