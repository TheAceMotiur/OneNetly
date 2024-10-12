<?php
/* Smarty version 5.4.1, created on 2024-09-30 04:53:36
  from 'file:signup_social.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fa2ed00b9ca5_34575276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1395d1a821e8283883c9b9008a1fb2831dcb739' => 
    array (
      0 => 'signup_social.tpl',
      1 => 1721819090,
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
function content_66fa2ed00b9ca5_34575276 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
$_smarty_tpl->renderSubTemplate('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<!-- page header -->
<div class="page-header">
  <img class="floating-img d-none d-md-block" src="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->getValue('system')['theme'];?>
/images/headers/undraw_product_teardown_elol.svg">
  <div class="circle-2"></div>
  <div class="circle-3"></div>
  <div class="inner">
    <h2><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Getting Started");?>
</h2>
    <p class="text-xlg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("This information will let us know more about you");?>
</p>
  </div>
</div>
<!-- page header -->

<!-- page content -->
<div class="<?php if ($_smarty_tpl->getValue('system')['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?>" style="margin-top: -25px;">
  <div class="row">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-md-auto">
      <div class="card px-4 py-4 shadow">
        <h3 class="mb20 text-center"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Welcome");?>
 <span class="text-primary"><?php echo $_smarty_tpl->getValue('user_profile')->displayName;?>
</span></h3>
        <div class="text-center">
          <img class="img-thumbnail rounded-circle" src="<?php echo $_smarty_tpl->getValue('user_profile')->photoURL;?>
" width="99" height="99">
        </div>
        <form class="js_ajax-forms" data-url="core/signup_social.php">
          <?php if ($_smarty_tpl->getValue('system')['invitation_enabled']) {?>
            <div class="form-group">
              <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invitation Code");?>
</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-handshake fa-fw"></i></span>
                <input name="invitation_code" type="text" class="form-control" required autofocus>
              </div>
            </div>
          <?php }?>
          <div class="form-group">
            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("First name");?>
</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
              <input name="first_name" type="text" class="form-control" value="<?php echo $_smarty_tpl->getValue('user_profile')->firstName;?>
" required autofocus>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Last name");?>
</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
              <input name="last_name" type="text" class="form-control" value="<?php echo $_smarty_tpl->getValue('user_profile')->lastName;?>
" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Username");?>
</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-globe fa-fw"></i></span>
              <input name="username" type="text" class="form-control" value="<?php echo $_smarty_tpl->getValue('user_profile')->username;?>
" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Email");?>
</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-envelope fa-fw"></i></span>
              <input name="email" type="email" class="form-control" value="<?php echo $_smarty_tpl->getValue('user_profile')->email;?>
" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Password");?>
</label>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-key fa-fw"></i></span>
                <input name="password" type="password" class="form-control" required>
              </div>
            </div>
          </div>
          <?php if (!$_smarty_tpl->getValue('system')['genders_disabled']) {?>
            <div class="form-group">
              <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("I am");?>
</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-mars fa-fw"></i></span>
                <select class="form-select" name="gender" required>
                  <option value="none"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Sex");?>
:</option>
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('genders'), 'gender');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('gender')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('gender')['gender_id'];?>
"><?php echo $_smarty_tpl->getValue('gender')['gender_name'];?>
</option>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
              </div>
            </div>
          <?php }?>
          <?php if ($_smarty_tpl->getValue('system')['select_user_group_enabled'] && $_smarty_tpl->getValue('user_groups')) {?>
            <!-- user group -->
            <div class="form-group">
              <label class="form-label mb5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("User Group");?>
</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-users fa-fw"></i></span>
                <select class="form-select" name="custom_user_group">
                  <option value="0"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select User Group");?>
:</option>
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('user_groups'), 'user_group');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user_group')->value) {
$foreach1DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('user_group')['user_group_id'];?>
"><?php echo $_smarty_tpl->getValue('user_group')['user_group_title'];?>
</option>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
              </div>
            </div>
            <!-- user group -->
          <?php }?>
          <!-- newsletter consent -->
          <?php if ($_smarty_tpl->getValue('system')['newsletter_consent']) {?>
            <div class="form-check mb10">
              <input type="checkbox" class="form-check-input" name="newsletter_agree" id="newsletter_agree">
              <label class="form-check-label" for="newsletter_agree">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("I expressly agree to receive the newsletter");?>

              </label>
            </div>
          <?php }?>
          <!-- newsletter consent -->
          <div class="form-check mb10">
            <input type="checkbox" class="form-check-input" name="privacy_agree" id="privacy_agree">
            <label class="form-check-label" for="privacy_agree">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("By creating your account, you agree to our");?>
 <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/static/terms" target="_blank"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Terms");?>
</a> & <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/static/privacy" target="_blank"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Privacy Policy");?>
</a>
            </label>
          </div>
          <div class="d-grid form-group">
            <input value="<?php echo $_smarty_tpl->getValue('user_profile')->photoURL;?>
" name="avatar" type="hidden">
            <input value="<?php echo $_smarty_tpl->getValue('provider');?>
" name="provider" type="hidden">
            <button type="submit" class="btn btn-success bg-gradient-green border-0 rounded-pill"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sign Up");?>
</button>
          </div>
          <!-- error -->
          <div class="alert alert-danger mt15 mb0 x-hidden"></div>
          <!-- error -->
        </form>
      </div>
    </div>
  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->renderSubTemplate('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
