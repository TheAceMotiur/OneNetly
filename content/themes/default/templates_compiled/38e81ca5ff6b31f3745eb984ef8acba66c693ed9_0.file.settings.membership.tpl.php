<?php
/* Smarty version 4.5.1, created on 2024-09-21 07:23:16
  from '/home/onenetly/public_html/content/themes/default/templates/settings.membership.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66ee7464aa1dd0_96468811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38e81ca5ff6b31f3745eb984ef8acba66c693ed9' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/settings.membership.tpl',
      1 => 1700499708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
),false)) {
function content_66ee7464aa1dd0_96468811 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="card-header with-icon">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"membership",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
?>
  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Membership" ));?>

</div>
<div class="card-body">
  <div class="alert alert-info">
    <div class="text">
      <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Membership" ));?>
</strong><br>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Choose the Plan That's Right for You" ));?>
, <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Check the package from" ));?>
 <a class="alert-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Here" ));?>
</a>
    </div>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
    <div class="heading-small mb20">
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Package Details" ));?>

    </div>
    <div class="pl-md-4">
      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Package" ));?>

        </label>
        <div class="col-md-9">
          <p class="form-control-plaintext">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['user']->value->_data['package_name'] ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['user']->value->_data['price'] ));?>

            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['period'] == "life") {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Life Time" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "per" ));?>
 <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['period_num'] != '1') {
echo $_smarty_tpl->tpl_vars['user']->value->_data['period_num'];
}?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['user']->value->_data['period'] )) ));
}?>)
          </p>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Subscription Date" ));?>

        </label>
        <div class="col-md-9">
          <p class="form-control-plaintext">
            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->_data['user_subscription_date'],"%e %B %Y");?>

          </p>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Expiration Date" ));?>

        </label>
        <div class="col-md-9">
          <p class="form-control-plaintext">
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['period'] == "life") {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Life Time" ));?>

            <?php } else { ?>
              <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->_data['subscription_end'],"%e %B %Y");?>
 (<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['subscription_timeleft'] > 0) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remaining" ));?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['subscription_timeleft'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Days" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Expired" ));
}?>)
            <?php }?>
          </p>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Boosted Posts" ));?>

        </label>
        <div class="col-md-9">
          <p class="form-control-plaintext">
            <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_boosted_posts'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['boost_posts'];?>
 (<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/boosted/posts"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Manage" ));?>
</a>)
          </p>

          <div class="progress mb5">
            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['boost_posts'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['user']->value->_data['user_boosted_posts']/$_smarty_tpl->tpl_vars['user']->value->_data['boost_posts'])*100;
}?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['boost_posts'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['user']->value->_data['user_boosted_posts']/$_smarty_tpl->tpl_vars['user']->value->_data['boost_posts'])*100;
}?>%"></div>
          </div>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Boosted Pages" ));?>

        </label>
        <div class="col-md-9">
          <p class="form-control-plaintext">
            <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_boosted_pages'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['boost_pages'];?>
 (<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/boosted/pages"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Manage" ));?>
</a>)
          </p>

          <div class="progress mb5">
            <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['boost_pages'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['user']->value->_data['user_boosted_pages']/$_smarty_tpl->tpl_vars['user']->value->_data['boost_pages'])*100;
}?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['boost_pages'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['user']->value->_data['user_boosted_pages']/$_smarty_tpl->tpl_vars['user']->value->_data['boost_pages'])*100;
}?>%"></div>
          </div>
        </div>
      </div>

      <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['can_pick_categories']) {?>
        <div class="row form-group">
          <div class="col-md-9 offset-md-3">
            <button type="button" class="btn btn-danger js_unsubscribe-package">
              <i class="fa fa-trash-alt mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unsubscribe" ));?>

            </button>
          </div>
        </div>
      <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_pick_categories']) {?>
        <form class="js_ajax-forms" data-url="users/settings.php?edit=membership">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['allowed_videos_categories'] > 0) {?>
            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Videos Categories" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="js_tagify-ajax" data-handle="video_categories" name="package_videos_categories" value='<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_package_videos_categories'];?>
'>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can select" ));?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['allowed_videos_categories'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "categories" ));?>

                </div>
              </div>
            </div>
          <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['allowed_blogs_categories'] > 0) {?>
            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Blogs Categories" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="js_tagify-ajax" data-handle="blogs_categories" name="package_blogs_categories" value='<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_package_blogs_categories'];?>
'>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can select" ));?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['allowed_blogs_categories'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "categories" ));?>

                </div>
              </div>
            </div>
          <?php }?>

          <div class="row">
            <div class="col-md-9 offset-md-3">
              <button type="button" class="btn btn-danger js_unsubscribe-package">
                <i class="fa fa-trash-alt mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unsubscribe" ));?>

              </button>
              <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
            </div>
          </div>

          <!-- success -->
          <div class="alert alert-success mt15 mb0 x-hidden"></div>
          <!-- success -->

          <!-- error -->
          <div class="alert alert-danger mt15 mb0 x-hidden"></div>
          <!-- error -->
        </form>
      <?php }?>
    </div>
    <div class="divider"></div>
    <div class="heading-small mb20">
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Upgrade Package" ));?>

    </div>
    <div class="pl-md-4">
      <div class="text-center">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="btn btn-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Upgrade Package" ));?>
</a>
      </div>
    </div>
  <?php } else { ?>
    <div class="text-center">
      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="btn btn-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Upgrade to Pro" ));?>
</a>
    </div>
  <?php }?>
</div><?php }
}
