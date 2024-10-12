<?php
/* Smarty version 5.4.1, created on 2024-09-30 10:11:43
  from 'file:app_oauth.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fa795fb60b16_93303138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '802ee1b4f6e42a1de9574b0d305ea0f48d981725' => 
    array (
      0 => 'app_oauth.tpl',
      1 => 1688317318,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
))) {
function content_66fa795fb60b16_93303138 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
$_smarty_tpl->renderSubTemplate('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->getValue('system')['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt30">
  <div class="row">
    <div class="col-md-6 col-lg-5 mx-md-auto">
      <div class="card-ouath-overlay"></div>
      <div class="card card-ouath">
        <div class="card-body text-center">
          <!-- app icon -->
          <div style="width: 120px; height: 120px; margin: 0 auto;">
            <div class="circled-user-box">
              <a class="user-box" href="#">
                <img alt="<?php echo $_smarty_tpl->getValue('app')['app_name'];?>
" src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('app')['app_icon'];?>
" />
              </a>
            </div>
          </div>
          <!-- app icon -->

          <!-- app name -->
          <div>
            <h3 class="mb5"><span class="text-primary"><?php echo $_smarty_tpl->getValue('app')['app_name'];?>
</span></h3>
            <p><?php echo $_smarty_tpl->getValue('app')['app_domain'];?>
</p>
          </div>
          <!-- app name -->

          <!-- app permissions -->
          <div class="divider"></div>
          <div class="text-xlg">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Will receive your");?>
:<br>
            <span class="badge bg-info"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Name");?>
</span> <span class="badge bg-info"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Email Address");?>
</span> <span class="badge bg-info"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Profile Picture");?>
</span>
          </div>
          <div class="divider"></div>
          <!-- app permissions -->

          <div class="d-grid plr30">
            <button type="button" class="btn btn-primary mb10 js_developers-oauth-app" data-id="<?php echo $_smarty_tpl->getValue('app')['app_auth_id'];?>
">
              <i class="fas fa-check-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Continue as");?>
 <?php echo $_smarty_tpl->getValue('user')->_data['name'];?>

            </button>
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
" class="btn btn-light mr5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Cancel");?>
</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->renderSubTemplate('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
