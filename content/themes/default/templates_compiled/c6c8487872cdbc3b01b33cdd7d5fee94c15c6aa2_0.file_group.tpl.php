<?php
/* Smarty version 5.4.1, created on 2024-09-29 11:05:27
  from 'file:group.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f93477efb188_14554901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6c8487872cdbc3b01b33cdd7d5fee94c15c6aa2' => 
    array (
      0 => 'group.tpl',
      1 => 1727262508,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__svg_icons.tpl' => 52,
    'file:_ads.tpl' => 1,
    'file:__feeds_user.tpl' => 7,
    'file:__feeds_photo.tpl' => 2,
    'file:_footer_mini.tpl' => 2,
    'file:_publisher.tpl' => 1,
    'file:_pinned_post.tpl' => 1,
    'file:_posts.tpl' => 3,
    'file:_chatbox.tpl' => 1,
    'file:_need_subscription.tpl' => 6,
    'file:__feeds_album.tpl' => 1,
    'file:_album.tpl' => 1,
    'file:__feeds_video.tpl' => 2,
    'file:__feeds_product.tpl' => 1,
    'file:_no_data.tpl' => 1,
    'file:__feeds_review.tpl' => 1,
    'file:__categories.recursive_options.tpl' => 1,
    'file:__custom_fields.tpl' => 1,
    'file:_footer.links.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
))) {
function content_66f93477efb188_14554901 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
$_smarty_tpl->renderSubTemplate('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->getValue('system')['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> sg-offcanvas">
  <div class="row">

    <!-- side panel -->
    <div class="col-12 d-block d-md-none sg-offcanvas-sidebar mt20">
      <?php $_smarty_tpl->renderSubTemplate('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>
    <!-- side panel -->

    <!-- content panel -->
    <div class="col-12 sg-offcanvas-mainbar">
      <!-- profile-header -->
      <div class="profile-header">
        <!-- profile-cover -->
        <div class="profile-cover-wrapper">
          <?php if ($_smarty_tpl->getValue('group')['group_cover_id']) {?>
            <!-- full-cover -->
            <img class="js_position-cover-full x-hidden" src="<?php echo $_smarty_tpl->getValue('group')['group_cover_full'];?>
">
            <!-- full-cover -->

            <!-- cropped-cover -->
            <img class="js_position-cover-cropped js_lightbox" data-init-position="<?php echo $_smarty_tpl->getValue('group')['group_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->getValue('group')['group_cover_id'];?>
" data-image="<?php echo $_smarty_tpl->getValue('group')['group_cover_full'];?>
" data-context="album" src="<?php echo $_smarty_tpl->getValue('group')['group_cover'];?>
" alt="<?php echo $_smarty_tpl->getValue('group')['group_title'];?>
">
            <!-- cropped-cover -->
          <?php }?>

          <?php if ($_smarty_tpl->getValue('group')['i_admin']) {?>
            <!-- buttons -->
            <div class="profile-cover-buttons">
              <div class="profile-cover-change">
                <i class="fa fa-camera" data-bs-toggle="dropdown" data-display="static"></i>
                <div class="dropdown-menu action-dropdown-menu">
                  <!-- upload -->
                  <div class="dropdown-item pointer js_x-uploader" data-handle="cover-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                    <div class="action">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"camera",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Upload Photo");?>

                    </div>
                    <div class="action-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Upload a new photo");?>
</div>
                  </div>
                  <!-- upload -->
                  <!-- select -->
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="users/photos.php?filter=cover&type=group&id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                    <div class="action">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Photo");?>

                    </div>
                    <div class="action-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select a photo");?>
</div>
                  </div>
                  <!-- select -->
                </div>
              </div>
              <div class="profile-cover-position <?php if (!$_smarty_tpl->getValue('group')['group_cover']) {?>x-hidden<?php }?>">
                <input class="js_position-picture-val" type="hidden" name="position-picture-val">
                <i class="fa fa-crop-alt js_init-position-picture" data-handle="group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
"></i>
              </div>
              <div class="profile-cover-position-buttons">
                <i class="fa fa-check fa-fw js_save-position-picture"></i>
              </div>
              <div class="profile-cover-position-buttons">
                <i class="fa fa-times fa-fw js_cancel-position-picture"></i>
              </div>
              <div class="profile-cover-delete <?php if (!$_smarty_tpl->getValue('group')['group_cover']) {?>x-hidden<?php }?>">
                <i class="fa fa-trash js_delete-cover" data-handle="cover-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
"></i>
              </div>
            </div>

            <!-- loaders -->
            <div class="profile-cover-change-loader">
              <div class="progress x-progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="profile-cover-position-loader">
              <i class="fa fa-arrows-alt mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Drag to reposition cover");?>

            </div>
            <!-- loaders -->
          <?php }?>
        </div>
        <!-- profile-cover -->

        <!-- profile-avatar -->
        <div class="profile-avatar-wrapper">
          <img <?php if ($_smarty_tpl->getValue('group')['group_picture_id']) {?> class="js_lightbox" data-id="<?php echo $_smarty_tpl->getValue('group')['group_picture_id'];?>
" data-context="album" data-image="<?php echo $_smarty_tpl->getValue('group')['group_picture_full'];?>
" <?php } elseif (!$_smarty_tpl->getValue('group')['group_picture_default']) {?> class="js_lightbox-nodata" data-image="<?php echo $_smarty_tpl->getValue('group')['group_picture'];?>
" <?php }?> src="<?php echo $_smarty_tpl->getValue('group')['group_picture'];?>
" alt="<?php echo $_smarty_tpl->getValue('group')['group_title'];?>
">

          <?php if ($_smarty_tpl->getValue('group')['i_admin']) {?>
            <!-- buttons -->
            <div class="profile-avatar-change">
              <i class="fa fa-camera" data-bs-toggle="dropdown" data-display="static"></i>
              <div class="dropdown-menu action-dropdown-menu">
                <!-- upload -->
                <div class="dropdown-item pointer js_x-uploader" data-handle="picture-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                  <div class="action">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"camera",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Upload Photo");?>

                  </div>
                  <div class="action-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Upload a new photo");?>
</div>
                </div>
                <!-- upload -->
                <!-- select -->
                <div class="dropdown-item pointer" data-toggle="modal" data-url="users/photos.php?filter=avatar&type=group&id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                  <div class="action">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Photo");?>

                  </div>
                  <div class="action-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select a photo");?>
</div>
                </div>
                <!-- select -->
              </div>
            </div>
            <div class="profile-avatar-crop <?php if ($_smarty_tpl->getValue('group')['group_picture_default']) {?>x-hidden<?php }?>">
              <i class="fa fa-crop-alt js_init-crop-picture" data-image="<?php echo $_smarty_tpl->getValue('group')['group_picture_full'];?>
" data-handle="group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
"></i>
            </div>
            <div class="profile-avatar-delete <?php if ($_smarty_tpl->getValue('group')['group_picture_default']) {?>x-hidden<?php }?>">
              <i class="fa fa-trash js_delete-picture" data-handle="picture-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
"></i>
            </div>
            <!-- buttons -->
            <!-- loaders -->
            <div class="profile-avatar-change-loader">
              <div class="progress x-progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <!-- loaders -->
          <?php }?>
        </div>
        <!-- profile-avatar -->

        <!-- profile-name -->
        <div class="profile-name-wrapper">
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
"><?php echo $_smarty_tpl->getValue('group')['group_title'];?>
</a>
          <?php if ($_smarty_tpl->getValue('group')['group_privacy'] == "public") {?>
            <i data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Public Group");?>
' class="fa fa-globe fa-fw privacy-badge"></i>
          <?php } elseif ($_smarty_tpl->getValue('group')['group_privacy'] == "closed") {?>
            <i data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Closed Group");?>
' class="fa fa-unlock-alt fa-fw privacy-badge"></i>
          <?php } elseif ($_smarty_tpl->getValue('group')['group_privacy'] == "secret") {?>
            <i data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Secret Group");?>
' class="fa fa-lock fa-fw privacy-badge"></i>
          <?php }?>
        </div>
        <!-- profile-name -->

        <!-- profile-buttons -->
        <div class="profile-buttons-wrapper">
          <!-- join -->
          <?php if ($_smarty_tpl->getValue('group')['i_joined'] == "approved") {?>
            <button type="button" class="btn btn-md btn-success btn-delete rounded-pill js_leave-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->getValue('group')['group_privacy'];?>
">
              <i class="fa fa-check"></i>
              <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Joined");?>
</span>
            </button>
          <?php } elseif ($_smarty_tpl->getValue('group')['i_joined'] == "pending") {?>
            <button type="button" class="btn btn-md btn-warning rounded-pill js_leave-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->getValue('group')['group_privacy'];?>
">
              <i class="fa fa-clock"></i>
              <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Pending");?>
</span>
            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-md btn-success rounded-pill js_join-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-privacy="<?php if ($_smarty_tpl->getValue('group')['i_admin']) {?>public<?php } else {
echo $_smarty_tpl->getValue('group')['group_privacy'];
}?>">
              <i class="fa fa-user-plus"></i>
              <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Join");?>
</span>
            </button>
          <?php }?>
          <!-- join -->

          <!-- review -->
          <?php if ($_smarty_tpl->getValue('system')['groups_reviews_enabled']) {?>
            <?php if (!$_smarty_tpl->getValue('group')['i_admin']) {?>
              <button type="button" class="btn btn-md rounded-pill btn-light" data-toggle="modal" data-url="modules/review.php?do=review&id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
&type=group">
                <i class="fa fa-star"></i>
                <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Review");?>
</span>
              </button>
            <?php }?>
          <?php }?>
          <!-- review -->

          <!-- report menu -->
          <div class="d-inline-block dropdown ml5">
            <button type="button" class="btn btn-icon rounded-pill btn-light" data-bs-toggle="dropdown" data-display="static">
              <i class="fa fa-ellipsis-v fa-fw"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end action-dropdown-menu">
              <!-- share -->
              <div class="dropdown-item pointer" data-toggle="modal" data-url="modules/share.php?node_type=group&node_username=<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
">
                <div class="action">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"share",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share");?>

                </div>
                <div class="action-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share this group");?>
</div>
              </div>
              <!-- share -->
              <?php if ($_smarty_tpl->getValue('user')->_logged_in) {?>
                <?php if (!$_smarty_tpl->getValue('group')['i_admin']) {?>
                  <!-- report -->
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="data/report.php?do=create&handle=group&id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                    <div class="action">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"report",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Report");?>

                    </div>
                    <div class="action-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Report this to admins");?>
</div>
                  </div>
                  <!-- report -->
                  <!-- manage -->
                  <?php if ($_smarty_tpl->getValue('user')->_is_admin) {?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/admincp/groups/edit_group/<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit in Admin Panel");?>

                    </a>
                  <?php } elseif ($_smarty_tpl->getValue('user')->_is_moderator) {?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/modcp/groups/edit_group/<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit in Moderator Panel");?>

                    </a>
                  <?php }?>
                  <!-- manage -->
                <?php } else { ?>
                  <!-- settings -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/settings">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Settings");?>

                  </a>
                  <!-- settings -->
                <?php }?>
              <?php }?>
            </div>
          </div>
          <!-- report menu -->
        </div>
        <!-- profile-buttons -->

      </div>
      <!-- profile-header -->

      <!-- profile-tabs -->
      <div class="profile-tabs-wrapper d-flex justify-content-evenly">
        <?php if ($_smarty_tpl->getValue('group')['group_privacy'] == "closed" && $_smarty_tpl->getValue('group')['i_joined'] != "approved" && !$_smarty_tpl->getValue('group')['i_admin'] && !$_smarty_tpl->getValue('user')->_is_admin && !$_smarty_tpl->getValue('user')->_is_moderator) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"info",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("About");?>
</span>
          </a>
        <?php } else { ?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
" <?php if ($_smarty_tpl->getValue('view') == '') {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Timeline");?>
</span>
          </a>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/photos" <?php if ($_smarty_tpl->getValue('view') == "photos" || $_smarty_tpl->getValue('view') == "albums" || $_smarty_tpl->getValue('view') == "album") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</span>
          </a>
          <?php if ($_smarty_tpl->getValue('system')['videos_enabled']) {?>
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/videos" <?php if ($_smarty_tpl->getValue('view') == "videos" || $_smarty_tpl->getValue('view') == "reels") {?>class="active" <?php }?>>
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
              <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>
</span>
            </a>
          <?php } elseif ($_smarty_tpl->getValue('system')['reels_enabled']) {?>
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/reels" <?php if ($_smarty_tpl->getValue('view') == "reels") {?>class="active" <?php }?>>
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"reels",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
              <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>
</span>
            </a>
          <?php }?>
          <?php if ($_smarty_tpl->getValue('system')['market_enabled']) {?>
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/products" <?php if ($_smarty_tpl->getValue('view') == "products") {?>class="active" <?php }?>>
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
              <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Store");?>
</span>
            </a>
          <?php }?>
          <?php if ($_smarty_tpl->getValue('system')['groups_reviews_enabled']) {?>
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/reviews" <?php if ($_smarty_tpl->getValue('view') == "reviews") {?>class="active" <?php }?>>
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
              <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reviews");?>
 <?php if ($_smarty_tpl->getValue('group')['group_rate']) {?><span class="badge bg-light text-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('group')['group_rate'],1);?>
</span><?php }?></span>
            </a>
          <?php }?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/members" <?php if ($_smarty_tpl->getValue('view') == "members" || $_smarty_tpl->getValue('view') == "invites") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>
</span>
          </a>
        <?php }?>
      </div>
      <!-- profile-tabs -->

      <!-- profile-content -->
      <div class="row">
        <!-- view content -->
        <?php if ($_smarty_tpl->getValue('view') == '') {?>

          <!-- left panel -->
          <div class="<?php if ($_smarty_tpl->getValue('system')['chat_enabled'] && $_smarty_tpl->getValue('group')['chatbox_enabled']) {?>col-lg-3 order-3 order-lg-1<?php } else { ?>col-lg-4 order-2 order-lg-1<?php }?>">
            <!-- ads -->
            <?php $_smarty_tpl->renderSubTemplate('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <!-- ads -->

            <!-- subscribe -->
            <?php if ($_smarty_tpl->getValue('user')->_logged_in && !$_smarty_tpl->getValue('group')['i_admin'] && $_smarty_tpl->getValue('group')['has_subscriptions_plans']) {?>
              <div class="d-grid">
                <button class="btn btn-primary rounded rounded-pill mb20" data-toggle="modal" data-url="monetization/controller.php?do=get_plans&node_id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
&node_type=group" data-size="large">
                  <i class="fa fa-money-check-alt mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("SUBSCRIBE");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("STARTING FROM");?>
 (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('group')['group_monetization_min_price'],2));?>
)
                </button>
              </div>
            <?php }?>
            <!-- subscribe -->

            <!-- panel [about] -->
            <div class="card">
              <div class="card-body">
                <?php if (!$_smarty_tpl->getSmarty()->getModifierCallback('is_empty')($_smarty_tpl->getValue('group')['group_description'])) {?>
                  <div class="about-bio">
                    <div class="js_readmore overflow-hidden">
                      <?php echo nl2br((string) $_smarty_tpl->getValue('group')['group_description'], (bool) 1);?>

                    </div>
                  </div>
                <?php }?>
                <ul class="about-list">
                  <!-- privacy -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"unhide",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php if ($_smarty_tpl->getValue('group')['group_privacy'] == "public") {?>
                        <i class="fa fa-globe fa-fw"></i>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Public Group");?>

                      <?php } elseif ($_smarty_tpl->getValue('group')['group_privacy'] == "closed") {?>
                        <i class="fa fa-unlock-alt fa-fw"></i>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Closed Group");?>

                      <?php } elseif ($_smarty_tpl->getValue('group')['group_privacy'] == "secret") {?>
                        <i class="fa fa-lock fa-fw"></i>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Secret Group");?>

                      <?php }?>
                    </div>
                  </li>
                  <!-- privacy -->
                  <!-- members -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/members"><?php echo $_smarty_tpl->getValue('group')['group_members'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("members");?>
</a>
                    </div>
                  </li>
                  <!-- members -->
                  <!-- posts -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('group')['posts_count']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Posts");?>

                    </div>
                  </li>
                  <!-- posts -->
                  <!-- photos -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('group')['photos_count']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>

                    </div>
                  </li>
                  <!-- photos -->
                  <?php if ($_smarty_tpl->getValue('system')['videos_enabled']) {?>
                    <!-- videos -->
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('group')['videos_count']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>

                      </div>
                    </li>
                    <!-- videos -->
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('system')['groups_reviews_enabled']) {?>
                    <!-- reviews -->
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('group')['reviews_count']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reviews");?>

                        <?php if ($_smarty_tpl->getValue('group')['group_rate']) {?>
                          <span class="review-stars small ml5">
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 1) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 2) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 3) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 4) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 5) {?>checked<?php }?>"></i>
                          </span>
                          <span class="badge bg-light text-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('group')['group_rate'],1);?>
</span>
                        <?php }?>
                      </div>
                    </li>
                    <!-- reviews -->
                  <?php }?>
                  <!-- category -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"tag",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('group')['group_category_name']);?>

                    </div>
                  </li>
                  <!-- category -->
                </ul>
              </div>
            </div>
            <!-- panel [about] -->

            <!-- custom fields [basic] -->
            <?php if ($_smarty_tpl->getValue('custom_fields')['basic']) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"info",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Info");?>
</strong>
                </div>
                <div class="card-body">
                  <ul class="about-list">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('custom_fields')['basic'], 'custom_field');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('custom_field')->value) {
$foreach0DoElse = false;
?>
                      <?php if ($_smarty_tpl->getValue('custom_field')['value']) {?>
                        <li>
                          <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('custom_field')['label']);?>
</strong><br>
                          <?php if ($_smarty_tpl->getValue('custom_field')['type'] == "textbox" && $_smarty_tpl->getValue('custom_field')['is_link']) {?>
                            <a href="<?php echo $_smarty_tpl->getValue('custom_field')['value'];?>
"><?php echo $_smarty_tpl->getValue('custom_field')['value'];?>
</a>
                          <?php } elseif ($_smarty_tpl->getValue('custom_field')['type'] == "multipleselectbox") {?>
                            <?php echo $_smarty_tpl->getValue('custom_field')['value_string'];?>

                          <?php } else { ?>
                            <?php echo $_smarty_tpl->getValue('custom_field')['value'];?>

                          <?php }?>
                        </li>
                      <?php }?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>
                </div>
              </div>
            <?php }?>
            <!-- custom fields [basic] -->

            <!-- subscribers -->
            <?php if ($_smarty_tpl->getValue('group')['subscribers_count'] > 0) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/subscribers"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribers");?>
</a></strong>
                  <span class="badge rounded-pill bg-info ml5"><?php echo $_smarty_tpl->getValue('group')['subscribers_count'];?>
</span>
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['subscribers'], '_subscriber');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_subscriber')->value) {
$foreach1DoElse = false;
?>
                      <div class="col-3 col-lg-4">
                        <div class="circled-user-box">
                          <a class="user-box" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('_subscriber')['user_name'];?>
">
                            <img src="<?php echo $_smarty_tpl->getValue('_subscriber')['user_picture'];?>
" />
                            <div class="name">
                              <?php if ($_smarty_tpl->getValue('system')['show_usernames_enabled']) {
echo $_smarty_tpl->getValue('_subscriber')['user_name'];
} else {
echo $_smarty_tpl->getValue('_subscriber')['user_firstname'];?>
 <?php echo $_smarty_tpl->getValue('_subscriber')['user_lastname'];
}?>
                            </div>
                          </a>
                        </div>
                      </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- subscribers -->

            <!-- invite friends -->
            <?php if ($_smarty_tpl->getValue('group')['i_joined'] == "approved" && $_smarty_tpl->getValue('group')['invites']) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <div class="float-end">
                    <small><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/invites"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See All");?>
</a></small>
                  </div>
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/invites"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invite Friends");?>
</a></strong>
                </div>
                <div class="card-body">
                  <ul>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['invites'], '_user');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach2DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_small'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>
                </div>
              </div>
            <?php }?>
            <!-- invite friends -->

            <!-- search -->
            <div class="card">
              <div class="card-header bg-transparent">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"search",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
</strong>
              </div>
              <div class="card-body">
                <form action="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/search" method="get">
                  <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
" <?php if ($_smarty_tpl->getValue('query')) {?>value="<?php echo $_smarty_tpl->getValue('query');?>
" <?php }?>>
                    <button type="submit" class="btn btn-primary">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>

                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- search -->

            <!-- photos -->
            <?php if ($_smarty_tpl->getValue('group')['photos']) {?>
              <div class="card panel-photos">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a></strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['photos'], 'photo');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('photo')->value) {
$foreach3DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>"photos",'_small'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>
            <?php }?>
            <!-- photos -->

            <!-- mini footer -->
            <?php $_smarty_tpl->renderSubTemplate('file:_footer_mini.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <!-- mini footer -->
          </div>
          <!-- left panel -->

          <!-- right panel -->
          <div class="<?php if ($_smarty_tpl->getValue('system')['chat_enabled'] && $_smarty_tpl->getValue('group')['chatbox_enabled']) {?>col-lg-6 order-1 order-lg-2<?php } else { ?>col-lg-8 order-1 order-lg-2<?php }?>">

            <!-- super admin alert -->
            <?php if ($_smarty_tpl->getValue('user')->_data['user_group'] < 3 && ($_smarty_tpl->getValue('group')['group_privacy'] == "secret" || $_smarty_tpl->getValue('group')['group_privacy'] == "closed") && ($_smarty_tpl->getValue('group')['i_joined'] != "approved" && !$_smarty_tpl->getValue('group')['i_admin'])) {?>
              <div class="alert alert-warning">
                <button type="button" class="btn-close float-end" data-dismiss="alert" aria-label="Close"></button>
                <div class="icon"><i class="fa fa-info-circle fa-2x"></i></div>
                <div class="text align-middle">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You can access this as your account is system admin account!");?>

                </div>
              </div>
            <?php }?>
            <!-- super admin alert -->

            <?php if ($_smarty_tpl->getValue('get') == "posts_group") {?>
              <!-- group requests -->
              <?php if ($_smarty_tpl->getValue('group')['i_admin'] && $_smarty_tpl->getValue('group')['total_requests'] > 0) {?>
                <div class="alert alert-light">
                  <button type="button" class="btn-close float-end" data-dismiss="alert" aria-label="Close"></button>
                  <div class="icon"><i class="fa fa-users fa-lg"></i></div>
                  <div class="text align-middle">
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/settings/requests" class="alert-link">
                      <span class="badge bg-secondary mr5"><?php echo $_smarty_tpl->getValue('group')['total_requests'];?>
</span><?php if ($_smarty_tpl->getValue('group')['total_requests'] == 1) {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("person");
} else {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("persons");
}?> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("wants to join this group");?>

                    </a>
                  </div>
                </div>
              <?php }?>
              <!-- group requests -->

              <!-- group pending posts -->
              <?php if ($_smarty_tpl->getValue('group')['pending_posts'] > 0) {?>
                <div class="alert alert-light">
                  <button type="button" class="btn-close float-end" data-dismiss="alert" aria-label="Close"></button>
                  <div class="icon"><i class="fa fa-comments fa-lg"></i></div>
                  <div class="text align-middle">
                    <a href="?pending" class="alert-link">
                      <?php if ($_smarty_tpl->getValue('group')['i_admin']) {?>
                        <span class="badge bg-secondary mr5"><?php echo $_smarty_tpl->getValue('group')['pending_posts'];?>
</span><?php if ($_smarty_tpl->getValue('group')['pending_posts'] == 1) {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("post");
} else {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("posts");
}?> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("pending needs your approval");?>

                      <?php } else { ?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You have");?>
<span class="badge bg-secondary mlr5"><?php echo $_smarty_tpl->getValue('group')['pending_posts'];?>
</span><?php if ($_smarty_tpl->getValue('group')['pending_posts'] == 1) {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("post");
} else {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("posts");
}?> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("pending");?>

                      <?php }?>
                    </a>
                  </div>
                </div>
              <?php }?>
              <!-- group pending posts -->

              <!-- publisher -->
              <?php if ($_smarty_tpl->getValue('group')['i_joined'] == "approved" && ($_smarty_tpl->getValue('group')['group_publish_enabled'] || (!$_smarty_tpl->getValue('group')['group_publish_enabled'] && $_smarty_tpl->getValue('group')['i_admin']))) {?>
                <?php $_smarty_tpl->renderSubTemplate('file:_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"group",'_id'=>$_smarty_tpl->getValue('group')['group_id'],'_node_can_monetize_content'=>$_smarty_tpl->getValue('group')['can_monetize_content'],'_node_monetization_enabled'=>$_smarty_tpl->getValue('group')['group_monetization_enabled'],'_node_monetization_plans'=>$_smarty_tpl->getValue('group')['group_monetization_plans']), (int) 0, $_smarty_current_dir);
?>
              <?php }?>
              <!-- publisher -->

              <!-- pinned post -->
              <?php if ($_smarty_tpl->getValue('pinned_post')) {?>
                <?php $_smarty_tpl->renderSubTemplate('file:_pinned_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post'=>$_smarty_tpl->getValue('pinned_post'),'_get'=>"posts_group"), (int) 0, $_smarty_current_dir);
?>
              <?php }?>
              <!-- pinned post -->

              <!-- posts -->
              <?php $_smarty_tpl->renderSubTemplate('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_group",'_id'=>$_smarty_tpl->getValue('group')['group_id']), (int) 0, $_smarty_current_dir);
?>
              <!-- posts -->
            <?php } else { ?>
              <!-- posts -->
              <?php $_smarty_tpl->renderSubTemplate('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>$_smarty_tpl->getValue('get'),'_id'=>$_smarty_tpl->getValue('group')['group_id'],'_title'=>$_smarty_tpl->getSmarty()->getModifierCallback('__')("Pending Posts")), (int) 0, $_smarty_current_dir);
?>
              <!-- posts -->
            <?php }?>
          </div>
          <!-- right panel -->

          <!-- chatbox -->
          <?php if ($_smarty_tpl->getValue('system')['chat_enabled'] && $_smarty_tpl->getValue('group')['chatbox_enabled']) {?>
            <div class="col-lg-3 order-2 order-lg-3">
              <?php $_smarty_tpl->renderSubTemplate('file:_chatbox.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_node_type'=>"group",'_node'=>$_smarty_tpl->getValue('group')), (int) 0, $_smarty_current_dir);
?>
            </div>
          <?php }?>
          <!-- chatbox -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "photos") {?>
          <!-- photos -->
          <div class="col-12">
            <?php if ($_smarty_tpl->getValue('group')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'group','node_id'=>$_smarty_tpl->getValue('group')['group_id'],'price'=>$_smarty_tpl->getValue('group')['group_monetization_min_price']), (int) 0, $_smarty_current_dir);
?>
            <?php } else { ?>
              <div class="card panel-photos">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/albums"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Albums");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('group')['photos']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['photos'], 'photo');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('photo')->value) {
$foreach4DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>"photos"), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="photos" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-type='group'>
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have photos");?>

                    </p>
                  <?php }?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- photos -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "albums") {?>
          <!-- albums -->
          <div class="col-12">
            <?php if ($_smarty_tpl->getValue('group')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'group','node_id'=>$_smarty_tpl->getValue('group')['group_id'],'price'=>$_smarty_tpl->getValue('group')['group_monetization_min_price']), (int) 0, $_smarty_current_dir);
?>
            <?php } else { ?>
              <div class="card">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/albums"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Albums");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('group')['albums']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['albums'], 'album');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('album')->value) {
$foreach5DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('group')['albums']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="albums" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-type='group'>
                        <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have albums");?>

                    </p>
                  <?php }?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- albums -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "album") {?>
          <!-- albums -->
          <div class="col-12">
            <?php if ($_smarty_tpl->getValue('group')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'group','node_id'=>$_smarty_tpl->getValue('group')['group_id'],'price'=>$_smarty_tpl->getValue('group')['group_monetization_min_price']), (int) 0, $_smarty_current_dir);
?>
            <?php } else { ?>
              <div class="card panel-photos">
                <div class="card-header with-icon with-nav">
                  <!-- back to albums -->
                  <div class="float-end">
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/albums" class="btn btn-md btn-light">
                      <i class="fa fa-arrow-circle-left mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Back to Albums");?>

                    </a>
                  </div>
                  <!-- back to albums -->

                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/albums"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Albums");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php $_smarty_tpl->renderSubTemplate('file:_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- albums -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "videos") {?>
          <!-- videos -->
          <div class="col-12">
            <?php if ($_smarty_tpl->getValue('group')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'group','node_id'=>$_smarty_tpl->getValue('group')['group_id'],'price'=>$_smarty_tpl->getValue('group')['group_monetization_min_price']), (int) 0, $_smarty_current_dir);
?>
            <?php } else { ?>
              <div class="card panel-videos">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/videos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>
</a>
                    </li>
                    <?php if ($_smarty_tpl->getValue('system')['reels_enabled']) {?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/reels"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>
</a>
                      </li>
                    <?php }?>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('group')['videos']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['videos'], 'video');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('video')->value) {
$foreach6DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="videos" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-type='group'>
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have videos");?>

                    </p>
                  <?php }?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- videos -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "reels") {?>
          <!-- reels -->
          <div class="col-12">
            <?php if ($_smarty_tpl->getValue('group')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'group','node_id'=>$_smarty_tpl->getValue('group')['group_id'],'price'=>$_smarty_tpl->getValue('group')['group_monetization_min_price']), (int) 0, $_smarty_current_dir);
?>
            <?php } else { ?>
              <div class="card panel-videos">
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"reels",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <?php if ($_smarty_tpl->getValue('system')['videos_enabled']) {?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/videos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>
</a>
                      </li>
                    <?php }?>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/reels"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('group')['reels']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['reels'], 'video');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('video')->value) {
$foreach7DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_is_reel'=>true), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="videos_reels" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-type='group'>
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have reels");?>

                    </p>
                  <?php }?>
                </div>
              </div>
            <?php }?>
          </div>
          <!-- reels -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "products") {?>
          <!-- products -->
          <div class="col-12">
            <?php if ($_smarty_tpl->getValue('profile')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'group','node_id'=>$_smarty_tpl->getValue('group')['group_id'],'price'=>$_smarty_tpl->getValue('group')['group_monetization_min_price']), (int) 0, $_smarty_current_dir);
?>
            <?php } else { ?>
              <!-- search -->
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"search",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
</strong>
                </div>
                <div class="card-body">
                  <form action="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/search" method="get">
                    <div class="input-group">
                      <input type="text" name="query" class="form-control" placeholder="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
">
                      <input type="hidden" name="filter" value="product">
                      <button type="submit" class="btn btn-primary">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>

                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- search -->

              <?php if ($_smarty_tpl->getValue('posts')) {?>
                <ul class="row">
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach8DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>

                <!-- see-more -->
                <div class="alert alert-post see-more js_see-more" data-get="products_group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                  <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                  <div class="loader loader_small x-hidden"></div>
                </div>
                <!-- see-more -->
              <?php } else { ?>
                <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
              <?php }?>
            <?php }?>
          </div>
          <!-- products -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "reviews") {?>
          <!-- reviews -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                <div>
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reviews");?>

                  <?php if ($_smarty_tpl->getValue('group')['group_rate']) {?>
                    <span class="review-stars small ml5">
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 1) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 2) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 3) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 4) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('group')['group_rate'] >= 5) {?>checked<?php }?>"></i>
                    </span>
                    <span class="badge bg-light text-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('group')['group_rate'],1);?>
</span>
                  <?php }?>
                </div>
                <!-- panel title -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->getValue('group')['reviews_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['reviews'], '_review');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_review')->value) {
$foreach9DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_review.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>
                  <?php if ($_smarty_tpl->getValue('group')['reviews_count'] >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="reviews" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-type="group">
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have reviews");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- reviews -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "members") {?>
          <!-- members -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>

                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/members">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>

                      <span class="badge rounded-pill bg-info"><?php echo $_smarty_tpl->getValue('group')['group_members'];?>
</span>
                    </a>
                  </li>
                  <?php if ($_smarty_tpl->getValue('group')['has_subscriptions_plans']) {?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/subscribers"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribers");?>
</a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('group')['i_joined'] == "approved") {?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/invites"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invites");?>
</a>
                    </li>
                  <?php }?>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->getValue('group')['group_members'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['members'], '_user');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach10DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>

                  <?php if ($_smarty_tpl->getValue('group')['group_members'] >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="group_members" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have members");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- members -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "subscribers") {?>
          <!-- subscribers -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribers");?>

                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/members"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>
</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/subscribers">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribers");?>

                      <span class="badge rounded-pill bg-info"><?php echo $_smarty_tpl->getValue('group')['subscribers_count'];?>
</span>
                    </a>
                  </li>
                  <?php if ($_smarty_tpl->getValue('group')['i_joined'] == "approved") {?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/invites"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invites");?>
</a>
                    </li>
                  <?php }?>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->getValue('group')['subscribers_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['subscribers'], '_user');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach11DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('group')['subscribers']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="subscribers" data-uid="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
" data-type="group">
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have subscribers");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- subscribers -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "invites") {?>
          <!-- invites -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon with-nav">
                <!-- panel title -->
                <div class="mb20">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invites");?>

                </div>
                <!-- panel title -->

                <!-- panel nav -->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/members"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>
</a>
                  </li>
                  <?php if ($_smarty_tpl->getValue('group')['has_subscriptions_plans']) {?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/subscribers"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribers");?>
</a>
                    </li>
                  <?php }?>
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/invites">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invites");?>

                    </a>
                  </li>
                </ul>
                <!-- panel nav -->
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->getValue('group')['invites']) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['invites'], '_user');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach12DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>

                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('group')['invites']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="group_invites" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("No friends to invite");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- invites -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "search") {?>

          <!-- left panel -->
          <div class="col-lg-4 order-2 order-lg-1">

            <!-- search -->
            <div class="card">
              <div class="card-header bg-transparent">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"search",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
</strong>
              </div>
              <div class="card-body">
                <form action="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/search" method="get">
                  <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
" <?php if ($_smarty_tpl->getValue('query')) {?>value="<?php echo $_smarty_tpl->getValue('query');?>
" <?php }?>>
                    <button type="submit" class="btn btn-primary">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>

                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- search -->

            <!-- mini footer -->
            <?php $_smarty_tpl->renderSubTemplate('file:_footer_mini.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <!-- mini footer -->
          </div>
          <!-- left panel -->

          <!-- right panel -->
          <div class="col-lg-8 order-1 order-lg-2">

            <!-- posts -->
            <?php $_smarty_tpl->renderSubTemplate('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_group",'_id'=>$_smarty_tpl->getValue('group')['group_id'],'_title'=>$_smarty_tpl->getSmarty()->getModifierCallback('__')("Search Results"),'_query'=>$_smarty_tpl->getValue('query'),'_filter'=>$_smarty_tpl->getValue('filter')), (int) 0, $_smarty_current_dir);
?>
            <!-- posts -->

          </div>
          <!-- right panel -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "settings") {?>
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body with-nav">
                <ul class="side-nav">
                  <li <?php if ($_smarty_tpl->getValue('sub_view') == '') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/settings">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group Settings");?>

                    </a>
                  </li>
                  <?php if ($_smarty_tpl->getValue('group')['group_privacy'] != "public") {?>
                    <li <?php if ($_smarty_tpl->getValue('sub_view') == "requests") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/settings/requests">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Join Requests");?>

                      </a>
                    </li>
                  <?php }?>
                  <li <?php if ($_smarty_tpl->getValue('sub_view') == "members") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/settings/members">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>

                    </a>
                  </li>
                  <?php if ($_smarty_tpl->getValue('user')->_data['can_monetize_content']) {?>
                    <li <?php if ($_smarty_tpl->getValue('sub_view') == "monetization") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/settings/monetization">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('user')->_data['user_id'] == $_smarty_tpl->getValue('group')['group_admin']) {?>
                    <li <?php if ($_smarty_tpl->getValue('sub_view') == "delete") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
/settings/delete">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete Group");?>

                      </a>
                    </li>
                  <?php }?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <?php if ($_smarty_tpl->getValue('sub_view') == '') {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group Settings");?>

                </div>
                <form class="js_ajax-forms" data-url="modules/create.php?type=group&do=edit&edit=settings&id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label" for="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Name Your Group");?>
</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Name of your group");?>
' value="<?php echo $_smarty_tpl->getValue('group')['group_title'];?>
">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="username"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group Username");?>
</label>
                      <div class="input-group">
                        <span class="input-group-text d-none d-sm-block"><?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/</span>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $_smarty_tpl->getValue('group')['group_name'];?>
">
                      </div>
                      <div class="form-text">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Can only contain alphanumeric characters (A–Z, 0–9) and periods ('.')");?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="privacy"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Privacy");?>
</label>
                      <select class="form-select" name="privacy">
                        <option <?php if ($_smarty_tpl->getValue('group')['group_privacy'] == "public") {?>selected<?php }?> value="public"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Public Group");?>
</option>
                        <option <?php if ($_smarty_tpl->getValue('group')['group_privacy'] == "closed") {?>selected<?php }?> value="closed"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Closed Group");?>
</option>
                        <option <?php if ($_smarty_tpl->getValue('group')['group_privacy'] == "secret") {?>selected<?php }?> value="secret"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Secret Group");?>
</option>
                      </select>
                      <div class="form-text">
                        (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Note: Change group privacy to public will approve any pending join requests");?>
)
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Category");?>
</label>
                      <select class="form-select" name="category" id="category">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach13DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach13DoElse = false;
?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('data_category'=>$_smarty_tpl->getValue('group')['group_category']), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="country"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Country");?>
</label>
                      <select class="form-select" name="country">
                        <option value="none"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Country");?>
</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('countries'), 'country');
$foreach14DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach14DoElse = false;
?>
                          <option value="<?php echo $_smarty_tpl->getValue('country')['country_id'];?>
" <?php if ($_smarty_tpl->getValue('group')['group_country'] == $_smarty_tpl->getValue('country')['country_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('country')['country_name'];?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="description"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("About");?>
</label>
                      <textarea class="form-control" name="description" id="description"><?php echo $_smarty_tpl->getValue('group')['group_description'];?>
</textarea>
                    </div>
                    <!-- custom fields -->
                    <?php if ($_smarty_tpl->getValue('custom_fields')['basic']) {?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->getValue('custom_fields')['basic'],'_registration'=>false), (int) 0, $_smarty_current_dir);
?>
                    <?php }?>
                    <!-- custom fields -->

                    <div class="divider"></div>

                    <?php if ($_smarty_tpl->getValue('system')['chat_enabled']) {?>
                      <div class="form-table-row">
                        <div class="avatar">
                          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
                        </div>
                        <div>
                          <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Chat Box");?>
</div>
                          <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Enable chat box for this group");?>
</div>
                        </div>
                        <div class="text-end">
                          <label class="switch" for="chatbox_enabled">
                            <input type="checkbox" name="chatbox_enabled" id="chatbox_enabled" <?php if ($_smarty_tpl->getValue('group')['chatbox_enabled']) {?>checked<?php }?>>
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>

                      <div class="divider"></div>
                    <?php }?>

                    <div class="form-table-row">
                      <div>
                        <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members Can Publish Posts?");?>
</div>
                        <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members can publish posts or only group admins");?>
</div>
                      </div>
                      <div class="text-end">
                        <label class="switch" for="group_publish_enabled">
                          <input type="checkbox" name="group_publish_enabled" id="group_publish_enabled" <?php if ($_smarty_tpl->getValue('group')['group_publish_enabled']) {?>checked<?php }?>>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>

                    <div class="form-table-row">
                      <div>
                        <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Post Approval");?>
</div>
                        <div class="form-text d-none d-sm-block">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("All posts must be approved by a group admin");?>
<br>
                          (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Note: Disable it will approve any pending posts");?>
)
                        </div>
                      </div>
                      <div class="text-end">
                        <label class="switch" for="group_publish_approval_enabled">
                          <input type="checkbox" name="group_publish_approval_enabled" id="group_publish_approval_enabled" <?php if ($_smarty_tpl->getValue('group')['group_publish_approval_enabled']) {?>checked<?php }?>>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>

                    <!-- error -->
                    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
                    <!-- error -->
                  </div>
                  <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
</button>
                  </div>
                </form>
              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "requests") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Member Requests");?>

                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('group')['requests']) {?>
                    <ul>
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['requests'], '_user');
$foreach15DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach15DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>

                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('group')['requests']) >= $_smarty_tpl->getValue('system')['max_results']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="group_requests" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                        <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("No Requests");?>

                    </p>
                  <?php }?>
                </div>
              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "members") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>

                </div>
                <div class="card-body">
                  <!-- admins -->
                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Admins");?>
 <span class="text-muted">(<?php echo $_smarty_tpl->getValue('group')['group_admins_count'];?>
)</span>
                  </div>
                  <div class="pl-md-4">
                    <?php if ($_smarty_tpl->getValue('group')['group_admins']) {?>
                      <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['group_admins'], '_user');
$foreach16DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach16DoElse = false;
?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </ul>

                      <?php if ($_smarty_tpl->getValue('group')['group_admins_count'] >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                        <!-- see-more -->
                        <div class="alert alert-post see-more js_see-more" data-get="group_admins" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                          <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                          <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                      <?php }?>
                    <?php } else { ?>
                      <p class="text-center text-muted mt10">
                        <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have admins");?>

                      </p>
                    <?php }?>
                  </div>
                  <!-- admins -->

                  <div class="divider"></div>

                  <!-- members -->
                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("All Members");?>
 <span class="text-muted">(<?php echo $_smarty_tpl->getValue('group')['group_members'];?>
)</span>
                  </div>
                  <div class="pl-md-4">
                    <?php if ($_smarty_tpl->getValue('group')['group_members'] > 0) {?>
                      <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('group')['members'], '_user');
$foreach17DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach17DoElse = false;
?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </ul>

                      <?php if ($_smarty_tpl->getValue('group')['group_members'] >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                        <!-- see-more -->
                        <div class="alert alert-post see-more js_see-more" data-get="group_members_manage" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                          <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                          <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                      <?php }?>
                    <?php } else { ?>
                      <p class="text-center text-muted mt10">
                        <?php echo $_smarty_tpl->getValue('group')['group_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have members");?>

                      </p>
                    <?php }?>
                  </div>
                  <!-- members -->
                </div>
              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "monetization") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization");?>

                </div>
                <div class="card-body">
                  <div class="alert alert-primary">
                    <div class="text">
                      <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization");?>
</strong><br>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Now you can earn money from your content. Via paid posts or subscriptions plans.");?>

                      <br>
                      <?php if ($_smarty_tpl->getValue('system')['monetization_commission'] > 0) {?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("There is commission");?>
 <strong><span class="badge rounded-pill bg-warning"><?php echo $_smarty_tpl->getValue('system')['monetization_commission'];?>
%</span></strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("will be deducted");?>
.
                        <br>
                      <?php }?>
                      <?php if ($_smarty_tpl->getValue('system')['monetization_money_withdraw_enabled']) {?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You can");?>
 <a class="alert-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/settings/monetization/payments" target="_blank"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("withdraw your money");?>
</a>
                      <?php }?>
                      <?php if ($_smarty_tpl->getValue('system')['monetization_money_transfer_enabled']) {?>
                        <?php if ($_smarty_tpl->getValue('system')['monetization_money_withdraw_enabled']) {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("or");?>
 <?php }?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You can transfer your money to your");?>
 <a class="alert-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/wallet" target="_blank"><i class="fa fa-wallet"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("wallet");?>
</a>
                      <?php }?>
                    </div>
                  </div>

                  <div class="alert alert-info">
                    <div class="icon">
                      <i class="fa fa-info-circle fa-2x"></i>
                    </div>
                    <div class="text pt5">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Only super admin can manage monetization and money goes to his monetization money balance");?>
.
                    </div>
                  </div>

                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization Settings");?>

                  </div>
                  <div class="pl-md-4">
                    <form class="js_ajax-forms" data-url="modules/create.php?type=group&do=edit&edit=monetization&id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                      <div class="form-table-row">
                        <div class="avatar">
                          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
                        </div>
                        <div>
                          <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization");?>
</div>
                          <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Enable or disable monetization for your content");?>
</div>
                        </div>
                        <div class="text-end">
                          <label class="switch" for="group_monetization_enabled">
                            <input type="checkbox" name="group_monetization_enabled" id="group_monetization_enabled" <?php if ($_smarty_tpl->getValue('group')['group_monetization_enabled']) {?>checked<?php }?>>
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 form-label">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscriptions Plans");?>

                        </label>
                        <div class="col-md-9">
                          <div class="payment-plans">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('monetization_plans'), 'plan');
$foreach18DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('plan')->value) {
$foreach18DoElse = false;
?>
                              <div class="payment-plan">
                                <div class="text-xxlg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('plan')['title']);?>
</div>
                                <div class="text-xlg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getValue('plan')['price']);?>
 / <?php if ($_smarty_tpl->getValue('plan')['period_num'] != '1') {
echo $_smarty_tpl->getValue('plan')['period_num'];
}?> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getSmarty()->getModifierCallback('ucfirst')($_smarty_tpl->getValue('plan')['period']));?>
</div>
                                <?php ob_start();
echo $_smarty_tpl->getValue('plan')['custom_description'];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
                                  <div><?php echo $_smarty_tpl->getValue('plan')['custom_description'];?>
</div>
                                <?php }?>
                                <div class="mt10">
                                  <span class="text-link mr10 js_monetization-deleter" data-id="<?php echo $_smarty_tpl->getValue('plan')['plan_id'];?>
">
                                    <i class="fa fa-trash-alt mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete");?>

                                  </span>
                                  |
                                  <span data-toggle="modal" data-url="monetization/controller.php?do=edit&id=<?php echo $_smarty_tpl->getValue('plan')['plan_id'];?>
" class="text-link ml10">
                                    <i class="fa fa-pen mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit");?>

                                  </span>
                                </div>
                              </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            <div data-toggle="modal" data-url="monetization/controller.php?do=add&node_id=<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
&node_type=group" class="payment-plan new"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add new plan");?>
 </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                          <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
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
                  </div>

                  <div class="divider"></div>

                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization Balance");?>

                  </div>
                  <div class="pl-md-4">
                    <div class="row">
                      <!-- subscribers -->
                      <div class="col-sm-6">
                        <div class="section-title mb20">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group Subscribers");?>

                        </div>
                        <div class="stat-panel bg-gradient-info">
                          <div class="stat-cell">
                            <i class="fa fas fa-users bg-icon"></i>
                            <div class="h3 mtb10">
                              <?php echo $_smarty_tpl->getValue('subscribers_count');?>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- subscribers -->

                      <!-- money balance -->
                      <div class="col-sm-6">
                        <div class="section-title mb20">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization Money Balance");?>

                        </div>
                        <div class="stat-panel bg-gradient-primary">
                          <div class="stat-cell">
                            <i class="fa fa-donate bg-icon"></i>
                            <div class="h3 mtb10">
                              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('user')->_data['user_monetization_balance'],2));?>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- monetization balance -->
                    </div>
                  </div>
                </div>
              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "delete") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete Group");?>

                </div>
                <div class="card-body">
                  <div class="alert alert-warning">
                    <div class="icon">
                      <i class="fa fa-exclamation-triangle fa-2x"></i>
                    </div>
                    <div class="text pt5">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Once you delete your group you will no longer can access it again");?>

                    </div>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-danger js_delete-group" data-id="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete Group");?>

                    </button>
                  </div>
                </div>
              <?php }?>
            </div>
          </div>

        <?php }?>
        <!-- view content -->
      </div>
      <!-- profile-content -->

      <!-- footer links -->
      <?php if ($_smarty_tpl->getValue('view') != '') {?>
        <?php $_smarty_tpl->renderSubTemplate('file:_footer.links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
      <?php }?>
      <!-- footer links -->
    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->renderSubTemplate('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
