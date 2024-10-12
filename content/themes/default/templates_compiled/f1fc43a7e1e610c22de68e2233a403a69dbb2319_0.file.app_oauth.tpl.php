<?php
/* Smarty version 4.5.1, created on 2024-09-25 11:51:13
  from '/home/onenetly/public_html/content/themes/default/templates/app_oauth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66f3f93178aca6_59952177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1fc43a7e1e610c22de68e2233a403a69dbb2319' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/app_oauth.tpl',
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
),false)) {
function content_66f3f93178aca6_59952177 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt30">
  <div class="row">
    <div class="col-md-6 col-lg-5 mx-md-auto">
      <div class="card-ouath-overlay"></div>
      <div class="card card-ouath">
        <div class="card-body text-center">
          <!-- app icon -->
          <div style="width: 120px; height: 120px; margin: 0 auto;">
            <div class="circled-user-box">
              <a class="user-box" href="#">
                <img alt="<?php echo $_smarty_tpl->tpl_vars['app']->value['app_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['app']->value['app_icon'];?>
" />
              </a>
            </div>
          </div>
          <!-- app icon -->

          <!-- app name -->
          <div>
            <h3 class="mb5"><span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['app']->value['app_name'];?>
</span></h3>
            <p><?php echo $_smarty_tpl->tpl_vars['app']->value['app_domain'];?>
</p>
          </div>
          <!-- app name -->

          <!-- app permissions -->
          <div class="divider"></div>
          <div class="text-xlg">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Will receive your" ));?>
:<br>
            <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Name" ));?>
</span> <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Address" ));?>
</span> <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Profile Picture" ));?>
</span>
          </div>
          <div class="divider"></div>
          <!-- app permissions -->

          <div class="d-grid plr30">
            <button type="button" class="btn btn-primary mb10 js_developers-oauth-app" data-id="<?php echo $_smarty_tpl->tpl_vars['app']->value['app_auth_id'];?>
">
              <i class="fas fa-check-circle mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Continue as" ));?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['name'];?>

            </button>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="btn btn-light mr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Cancel" ));?>
</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
