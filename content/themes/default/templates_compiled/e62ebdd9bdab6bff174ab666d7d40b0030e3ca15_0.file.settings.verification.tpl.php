<?php
/* Smarty version 4.5.1, created on 2024-09-02 13:32:47
  from '/home/onenetly/public_html/content/themes/default/templates/settings.verification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d5be7fd82e02_37483627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e62ebdd9bdab6bff174ab666d7d40b0030e3ca15' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/settings.verification.tpl',
      1 => 1706105476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 4,
  ),
),false)) {
function content_66d5be7fd82e02_37483627 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-header with-icon">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verification" ));?>

</div>
<?php if ($_smarty_tpl->tpl_vars['case']->value == "verified") {?>
  <div class="card-body">
    <div class="text-center">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon mb10",'width'=>"60px",'height'=>"60px"), 0, true);
?>
      <h4><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Congratulations" ));?>
</h4>
      <p class="mt20"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "This account is verified" ));?>
</p>
    </div>
  </div>
<?php } elseif ($_smarty_tpl->tpl_vars['case']->value == "pending") {?>
  <div class="card-body">
    <div class="text-center">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pending",'class'=>"main-icon mb10",'width'=>"60px",'height'=>"60px"), 0, true);
?>
      <h4><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pending" ));?>
</h4>
      <p class="mt20"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your verification request is still awaiting admin approval" ));?>
</p>
    </div>
  </div>
<?php } elseif ($_smarty_tpl->tpl_vars['case']->value == "request" || "declined") {?>
  <form class="js_ajax-forms" data-url="users/verify.php?node=user">
    <div class="card-body">
      <?php if ($_smarty_tpl->tpl_vars['case']->value == "declined") {?>
        <div class="text-center">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"declined",'class'=>"main-icon mb10",'width'=>"60px",'height'=>"60px"), 0, true);
?>
          <h4><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sorry" ));?>
</h4>
          <p class="mt20"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your verification request has been declined by the admin" ));?>
</p>
        </div>
        <div class="divider"></div>
      <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_docs_required']) {?>
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verification Documents" ));?>

          </label>
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-6">
                <div class="section-title mb20">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Photo" ));?>

                </div>
                <div class="x-image full">
                  <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'>

                  </button>
                  <div class="x-image-loader">
                    <div class="progress x-progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <i class="fa fa-camera fa-2x js_x-uploader" data-handle="x-image"></i>
                  <input type="hidden" class="js_x-image-input" name="photo" value="">
                </div>

              </div>
              <div class="col-sm-6">
                <div class="section-title mb20">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Passport or National ID" ));?>

                </div>
                <div class="x-image full">
                  <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'>

                  </button>
                  <div class="x-image-loader">
                    <div class="progress x-progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <i class="fa fa-camera fa-2x js_x-uploader" data-handle="x-image"></i>
                  <input type="hidden" class="js_x-image-input" name="passport" value="">
                </div>
              </div>
            </div>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Please attach your photo and your Passport or National ID" ));?>

            </div>
          </div>
        </div>
      <?php }?>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Additional Information" ));?>

        </label>
        <div class="col-md-9">
          <textarea class="form-control" name="message"></textarea>
          <div class="form-text">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Please share why your account should be verified" ));?>

          </div>
        </div>
      </div>

      <!-- success -->
      <div class="alert alert-success mt15 mb0 x-hidden"></div>
      <!-- success -->

      <!-- error -->
      <div class="alert alert-danger mt15 mb0 x-hidden"></div>
      <!-- error -->
    </div>
    <div class="card-footer text-end">
      <button type="submit" class="btn btn-primary">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Send" ));?>

      </button>
    </div>
  </form>
<?php }
}
}
