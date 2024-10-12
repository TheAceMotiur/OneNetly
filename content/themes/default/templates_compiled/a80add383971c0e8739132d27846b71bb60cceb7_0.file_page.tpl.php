<?php
/* Smarty version 5.4.1, created on 2024-09-29 11:58:22
  from 'file:page.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f940de0681a6_29694925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a80add383971c0e8739132d27846b71bb60cceb7' => 
    array (
      0 => 'page.tpl',
      1 => 1727262498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__svg_icons.tpl' => 85,
    'file:_ads.tpl' => 1,
    'file:__feeds_photo.tpl' => 2,
    'file:__feeds_user.tpl' => 7,
    'file:__feeds_event.tpl' => 2,
    'file:_footer_mini.tpl' => 2,
    'file:_publisher.tpl' => 1,
    'file:_pinned_post.tpl' => 1,
    'file:_posts.tpl' => 2,
    'file:_need_subscription.tpl' => 6,
    'file:__feeds_album.tpl' => 1,
    'file:_album.tpl' => 1,
    'file:__feeds_video.tpl' => 2,
    'file:__feeds_product.tpl' => 1,
    'file:_no_data.tpl' => 3,
    'file:__feeds_review.tpl' => 1,
    'file:__feeds_activity.tpl' => 1,
    'file:__categories.recursive_options.tpl' => 1,
    'file:__custom_fields.tpl' => 1,
    'file:_footer.links.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
))) {
function content_66f940de0681a6_29694925 (\Smarty\Template $_smarty_tpl) {
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
          <?php if ($_smarty_tpl->getValue('spage')['page_cover_id']) {?>
            <!-- full-cover -->
            <img class="js_position-cover-full x-hidden" src="<?php echo $_smarty_tpl->getValue('spage')['page_cover_full'];?>
">
            <!-- full-cover -->

            <!-- cropped-cover -->
            <img class="js_position-cover-cropped js_lightbox" data-init-position="<?php echo $_smarty_tpl->getValue('spage')['page_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_cover_id'];?>
" data-image="<?php echo $_smarty_tpl->getValue('spage')['page_cover_full'];?>
" data-context="album" src="<?php echo $_smarty_tpl->getValue('spage')['page_cover'];?>
" alt="<?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
">
            <!-- cropped-cover -->
          <?php }?>

          <?php if ($_smarty_tpl->getValue('spage')['i_admin']) {?>
            <!-- buttons -->
            <div class="profile-cover-buttons">
              <div class="profile-cover-change">
                <i class="fa fa-camera" data-bs-toggle="dropdown" data-display="static"></i>
                <div class="dropdown-menu action-dropdown-menu">
                  <!-- upload -->
                  <div class="dropdown-item pointer js_x-uploader" data-handle="cover-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="users/photos.php?filter=cover&type=page&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
              <div class="profile-cover-position <?php if (!$_smarty_tpl->getValue('spage')['page_cover']) {?>x-hidden<?php }?>">
                <input class="js_position-picture-val" type="hidden" name="position-picture-val">
                <i class="fa fa-crop-alt js_init-position-picture" data-handle="page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
"></i>
              </div>
              <div class="profile-cover-position-buttons">
                <i class="fa fa-check fa-fw js_save-position-picture"></i>
              </div>
              <div class="profile-cover-position-buttons">
                <i class="fa fa-times fa-fw js_cancel-position-picture"></i>
              </div>
              <div class="profile-cover-delete <?php if (!$_smarty_tpl->getValue('spage')['page_cover']) {?>x-hidden<?php }?>">
                <i class="fa fa-trash js_delete-cover" data-handle="cover-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
"></i>
              </div>
            </div>
            <!-- buttons -->

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
          <img <?php if (!$_smarty_tpl->getValue('spage')['page_picture_default']) {?> class="js_lightbox" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_picture_id'];?>
" data-image="<?php echo $_smarty_tpl->getValue('spage')['page_picture_full'];?>
" data-context="album" <?php }?> src="<?php echo $_smarty_tpl->getValue('spage')['page_picture'];?>
" alt="<?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
">

          <?php if ($_smarty_tpl->getValue('spage')['i_admin']) {?>
            <!-- buttons -->
            <div class="profile-avatar-change">
              <i class="fa fa-camera" data-bs-toggle="dropdown" data-display="static"></i>
              <div class="dropdown-menu action-dropdown-menu">
                <!-- upload -->
                <div class="dropdown-item pointer js_x-uploader" data-handle="picture-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
                <div class="dropdown-item pointer" data-toggle="modal" data-url="users/photos.php?filter=avatar&type=page&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
            <div class="profile-avatar-crop <?php if ($_smarty_tpl->getValue('spage')['page_picture_default']) {?>x-hidden<?php }?>">
              <i class="fa fa-crop-alt js_init-crop-picture" data-image="<?php echo $_smarty_tpl->getValue('spage')['page_picture_full'];?>
" data-handle="page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
"></i>
            </div>
            <div class="profile-avatar-delete <?php if ($_smarty_tpl->getValue('spage')['page_picture_default']) {?>x-hidden<?php }?>">
              <i class="fa fa-trash js_delete-picture" data-handle="picture-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
"><?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
</a>
          <?php if ($_smarty_tpl->getValue('spage')['page_verified']) {?>
            <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Verified Page");?>
'>
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
            </span>
          <?php }?>
        </div>
        <!-- profile-name -->

        <!-- profile-buttons -->
        <div class="profile-buttons-wrapper">
          <!-- like -->
          <?php if ($_smarty_tpl->getValue('spage')['i_like']) {?>
            <button type="button" class="btn btn-md rounded-pill btn-primary js_unlike-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
              <i class="fa fa-heart"></i>
              <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Unlike");?>
</span>
            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-md rounded-pill btn-primary js_like-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
              <i class="fa fa-heart"></i>
              <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Like");?>
</span>
            </button>
          <?php }?>
          <!-- like -->

          <!-- custom button -->
          <?php if ($_smarty_tpl->getValue('spage')['page_action_text'] && $_smarty_tpl->getValue('spage')['page_action_url']) {?>
            <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_action_url'];?>
" class="btn btn-md rounded-pill btn-<?php echo $_smarty_tpl->getValue('spage')['page_action_color'];?>
"><?php echo $_smarty_tpl->getValue('spage')['page_action_text'];?>
</a>
          <?php }?>
          <!-- custom button -->

          <!-- boost -->
          <?php if ($_smarty_tpl->getValue('system')['packages_enabled'] && $_smarty_tpl->getValue('spage')['i_admin']) {?>
            <?php if ($_smarty_tpl->getValue('user')->_data['can_boost_pages']) {?>
              <?php if ($_smarty_tpl->getValue('spage')['page_boosted']) {?>
                <button type="button" class="btn btn-md rounded-pill btn-danger js_unboost-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                  <i class="fa fa-bolt"></i>
                  <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Unboost");?>
</span>
                </button>
              <?php } else { ?>
                <button type="button" class="btn btn-md rounded-pill btn-danger js_boost-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                  <i class="fa fa-bolt"></i>
                  <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Boost");?>
</span>
                </button>
              <?php }?>
            <?php } else { ?>
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/packages" class="btn btn-md rounded-pill btn-danger">
                <i class="fa fa-bolt"></i>
                <span class="d-none d-xxl-inline-block ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Boost Page");?>
</span>
              </a>
            <?php }?>
          <?php }?>
          <!-- boost -->

          <!-- review -->
          <?php if ($_smarty_tpl->getValue('system')['pages_reviews_enabled']) {?>
            <?php if (!$_smarty_tpl->getValue('spage')['i_admin']) {?>
              <button type="button" class="btn btn-md rounded-pill btn-light" data-toggle="modal" data-url="modules/review.php?do=review&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
&type=page">
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
              <div class="dropdown-item pointer" data-toggle="modal" data-url="modules/share.php?node_type=page&node_username=<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
">
                <div class="action">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"share",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share");?>

                </div>
                <div class="action-desc"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share this page");?>
</div>
              </div>
              <!-- share -->
              <?php if ($_smarty_tpl->getValue('user')->_logged_in) {?>
                <?php if (!$_smarty_tpl->getValue('spage')['i_admin']) {?>
                  <!-- report -->
                  <div class="dropdown-item pointer" data-toggle="modal" data-url="data/report.php?do=create&handle=page&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
/admincp/pages/edit_page/<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit in Admin Panel");?>

                    </a>
                  <?php } elseif ($_smarty_tpl->getValue('user')->_is_moderator) {?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/modcp/pages/edit_page/<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
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
        <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
" <?php if ($_smarty_tpl->getValue('view') == '') {?>class="active" <?php }?>>
          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
          <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Timeline");?>
</span>
        </a>
        <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/photos" <?php if ($_smarty_tpl->getValue('view') == "photos" || $_smarty_tpl->getValue('view') == "albums" || $_smarty_tpl->getValue('view') == "album") {?>class="active" <?php }?>>
          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
          <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</span>
        </a>
        <?php if ($_smarty_tpl->getValue('system')['videos_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/videos" <?php if ($_smarty_tpl->getValue('view') == "videos" || $_smarty_tpl->getValue('view') == "reels") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>
</span>
          </a>
        <?php } elseif ($_smarty_tpl->getValue('system')['reels_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/reels" <?php if ($_smarty_tpl->getValue('view') == "reels") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"reels",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>
</span>
          </a>
        <?php }?>
        <?php if ($_smarty_tpl->getValue('spage')['can_sell_products']) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/products" <?php if ($_smarty_tpl->getValue('view') == "products") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Store");?>
</span>
          </a>
        <?php }?>
        <?php if ($_smarty_tpl->getValue('system')['pages_reviews_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/reviews" <?php if ($_smarty_tpl->getValue('view') == "reviews") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reviews");?>
 <?php if ($_smarty_tpl->getValue('spage')['page_rate']) {?><span class="badge bg-light text-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('spage')['page_rate'],1);?>
</span><?php }?></span>
          </a>
        <?php }?>
        <?php if ($_smarty_tpl->getValue('system')['events_enabled'] && $_smarty_tpl->getValue('system')['pages_events_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/events" <?php if ($_smarty_tpl->getValue('view') == "events") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Events");?>
</span>
          </a>
        <?php }?>
        <?php if ($_smarty_tpl->getValue('system')['pages_activities_enabled'] && $_smarty_tpl->getValue('spage')['page_activities_enabled']) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/activities" <?php if ($_smarty_tpl->getValue('view') == "activities") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"activities",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Activities");?>
</span>
          </a>
        <?php }?>
        <?php if ($_smarty_tpl->getValue('spage')['i_like']) {?>
          <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/invites" <?php if ($_smarty_tpl->getValue('view') == "invites") {?>class="active" <?php }?>>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <span class="ml5 d-none d-xl-inline-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invite Friends");?>
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
          <div class="col-lg-4 order-2 order-lg-1">
            <!-- ads -->
            <?php $_smarty_tpl->renderSubTemplate('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <!-- ads -->

            <!-- subscribe -->
            <?php if ($_smarty_tpl->getValue('user')->_logged_in && !$_smarty_tpl->getValue('spage')['i_admin'] && $_smarty_tpl->getValue('spage')['has_subscriptions_plans']) {?>
              <div class="d-grid">
                <button class="btn btn-primary rounded rounded-pill mb20" data-toggle="modal" data-url="monetization/controller.php?do=get_plans&node_id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
&node_type=page" data-size="large">
                  <i class="fa fa-money-check-alt mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("SUBSCRIBE");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("STARTING FROM");?>
 (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('spage')['page_monetization_min_price'],2));?>
)
                </button>
              </div>
            <?php }?>
            <!-- subscribe -->

            <!-- tips -->
            <?php if ($_smarty_tpl->getValue('user')->_logged_in && !$_smarty_tpl->getValue('spage')['i_admin'] && $_smarty_tpl->getValue('spage')['can_receive_tips'] && $_smarty_tpl->getValue('spage')['page_tips_enabled']) {?>
              <div class="d-grid">
                <button type="button" class="btn bg-red rounded-pill mb20" data-toggle="modal" data-url="#send-tip" data-options='{ "id": "<?php echo $_smarty_tpl->getValue('spage')['page_admin'];?>
"}'>
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"tip",'class'=>"white-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Send a Tip");?>

                </button>
              </div>
            <?php }?>
            <!-- tips -->

            <!-- panel [about] -->
            <div class="card">
              <div class="card-body">
                <?php if (!$_smarty_tpl->getSmarty()->getModifierCallback('is_empty')($_smarty_tpl->getValue('spage')['page_description'])) {?>
                  <div class="about-bio">
                    <div class="js_readmore overflow-hidden">
                      <?php echo nl2br((string) $_smarty_tpl->getValue('spage')['page_description'], (bool) 1);?>

                    </div>
                  </div>
                <?php }?>
                <ul class="about-list">
                  <!-- PBID -->
                  <?php if ($_smarty_tpl->getValue('system')['pages_pbid_enabled'] && $_smarty_tpl->getValue('spage')['page_pbid']) {?>
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"info",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("PBID");?>
: <?php echo $_smarty_tpl->getValue('spage')['page_pbid'];?>

                      </div>
                    </li>
                  <?php }?>
                  <!-- PBID -->
                  <!-- likes -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getValue('spage')['page_likes'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("people like this");?>

                    </div>
                  </li>
                  <!-- likes -->
                  <!-- posts -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('spage')['posts_count']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Posts");?>

                    </div>
                  </li>
                  <!-- posts -->
                  <!-- photos -->
                  <li>
                    <div class="about-list-item">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('spage')['photos_count']);?>
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
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('spage')['videos_count']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>

                      </div>
                    </li>
                    <!-- videos -->
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('system')['pages_reviews_enabled']) {?>
                    <!-- reviews -->
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('spage')['reviews_count']);?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reviews");?>

                        <?php if ($_smarty_tpl->getValue('spage')['page_rate']) {?>
                          <span class="review-stars small ml5">
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 1) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 2) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 3) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 4) {?>checked<?php }?>"></i>
                            <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 5) {?>checked<?php }?>"></i>
                          </span>
                          <span class="badge bg-light text-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('spage')['page_rate'],1);?>
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
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('spage')['page_category_name']);?>

                    </div>
                  </li>
                  <!-- category -->
                  <!-- info -->
                  <?php if ($_smarty_tpl->getValue('spage')['page_company']) {?>
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getValue('spage')['page_company'];?>

                      </div>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_phone']) {?>
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getValue('spage')['page_phone'];?>

                      </div>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_website']) {?>
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"website",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_website'];?>
"><?php echo $_smarty_tpl->getValue('spage')['page_website'];?>
</a>
                      </div>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_location']) {?>
                    <li>
                      <div class="about-list-item">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getValue('spage')['page_location'];?>

                      </div>
                    </li>
                    <?php if ($_smarty_tpl->getValue('system')['geolocation_enabled']) {?>
                      <div style="margin-left: -20px; margin-right: -20px;">
                        <iframe width="100%" frameborder="0" style="border:0;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $_smarty_tpl->getValue('system')['geolocation_key'];?>
&amp;q=<?php echo $_smarty_tpl->getValue('spage')['page_location'];?>
&amp;language=en"></iframe>
                      </div>
                    <?php }?>
                  <?php }?>
                  <!-- info -->
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

            <!-- social links -->
            <?php if ($_smarty_tpl->getValue('spage')['page_social_facebook'] || $_smarty_tpl->getValue('spage')['page_social_twitter'] || $_smarty_tpl->getValue('spage')['page_social_youtube'] || $_smarty_tpl->getValue('spage')['page_social_instagram'] || $_smarty_tpl->getValue('spage')['page_social_linkedin'] || $_smarty_tpl->getValue('spage')['page_social_vkontakte']) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"social_share",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Social Links");?>
</strong>
                </div>
                <div class="card-body text-center">
                  <?php if ($_smarty_tpl->getValue('spage')['page_social_facebook']) {?>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_social_facebook'];?>
" class="btn-icon-social">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_social_twitter']) {?>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_social_twitter'];?>
" class="btn-icon-social">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_social_youtube']) {?>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_social_youtube'];?>
" class="btn-icon-social">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"youtube",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_social_instagram']) {?>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_social_instagram'];?>
" class="btn-icon-social">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"instagram",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_social_twitch']) {?>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_social_twitch'];?>
" class="btn-icon-social">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitch",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_social_linkedin']) {?>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_social_linkedin'];?>
" class="btn-icon-social">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('spage')['page_social_vkontakte']) {?>
                    <a target="_blank" href="<?php echo $_smarty_tpl->getValue('spage')['page_social_vkontakte'];?>
" class="btn-icon-social">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    </a>
                  <?php }?>
                </div>
              </div>
            <?php }?>
            <!-- social links -->

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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
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
            <?php if ($_smarty_tpl->getValue('spage')['photos']) {?>
              <div class="card panel-photos">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a></strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['photos'], 'photo');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('photo')->value) {
$foreach1DoElse = false;
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

            <!-- subscribers -->
            <?php if ($_smarty_tpl->getValue('spage')['subscribers_count'] > 0) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/subscribers"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribers");?>
</a></strong>
                  <span class="badge rounded-pill bg-info ml5"><?php echo $_smarty_tpl->getValue('spage')['subscribers_count'];?>
</span>
                </div>
                <div class="card-body ptb10 plr10">
                  <div class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['subscribers'], '_subscriber');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_subscriber')->value) {
$foreach2DoElse = false;
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
            <?php if ($_smarty_tpl->getValue('spage')['i_like'] && $_smarty_tpl->getValue('spage')['invites']) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <div class="float-end">
                    <small><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/invites"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See All");?>
</a></small>
                  </div>
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/invites"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invite Friends");?>
</a></strong>
                </div>
                <div class="card-body">
                  <ul>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['invites'], '_user');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach3DoElse = false;
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

            <!-- page events -->
            <?php if ($_smarty_tpl->getValue('spage')['events']) {?>
              <div class="card">
                <div class="card-header bg-transparent">
                  <div class="float-end">
                    <small><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/events"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See All");?>
</a></small>
                  </div>
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/events"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Events");?>
</a></strong>
                </div>
                <div class="card-body with-list">
                  <ul>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['events'], '_event');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_event')->value) {
$foreach4DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_small'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>
                </div>
              </div>
            <?php }?>
            <!-- page events -->

            <!-- mini footer -->
            <?php $_smarty_tpl->renderSubTemplate('file:_footer_mini.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <!-- mini footer -->
          </div>
          <!-- left panel -->

          <!-- right panel -->
          <div class="col-lg-8 order-1 order-lg-2">

            <!-- publisher -->
            <?php if ($_smarty_tpl->getValue('spage')['i_admin']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"page",'_id'=>$_smarty_tpl->getValue('spage')['page_id'],'_avatar'=>$_smarty_tpl->getValue('spage')['page_picture'],'_node_can_monetize_content'=>$_smarty_tpl->getValue('spage')['can_monetize_content'],'_node_monetization_enabled'=>$_smarty_tpl->getValue('spage')['page_monetization_enabled'],'_node_monetization_plans'=>$_smarty_tpl->getValue('spage')['page_monetization_plans']), (int) 0, $_smarty_current_dir);
?>
            <?php }?>
            <!-- publisher -->

            <!-- pinned post -->
            <?php if ($_smarty_tpl->getValue('pinned_post')) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_pinned_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post'=>$_smarty_tpl->getValue('pinned_post')), (int) 0, $_smarty_current_dir);
?>
            <?php }?>
            <!-- pinned post -->

            <!-- posts -->
            <?php $_smarty_tpl->renderSubTemplate('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_page",'_id'=>$_smarty_tpl->getValue('spage')['page_id']), (int) 0, $_smarty_current_dir);
?>
            <!-- posts -->

          </div>
          <!-- right panel -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "photos") {?>
          <!-- photos -->
          <div class="col-12">
            <?php if ($_smarty_tpl->getValue('spage')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'page','node_id'=>$_smarty_tpl->getValue('spage')['page_id'],'price'=>$_smarty_tpl->getValue('spage')['page_monetization_min_price']), (int) 0, $_smarty_current_dir);
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/albums"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Albums");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('spage')['photos']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['photos'], 'photo');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('photo')->value) {
$foreach5DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>"photos"), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="photos" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
" data-type='page'>
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
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
            <?php if ($_smarty_tpl->getValue('spage')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'page','node_id'=>$_smarty_tpl->getValue('spage')['page_id'],'price'=>$_smarty_tpl->getValue('spage')['page_monetization_min_price']), (int) 0, $_smarty_current_dir);
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/albums"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Albums");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('spage')['albums']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['albums'], 'album');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('album')->value) {
$foreach6DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('spage')['albums']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="albums" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
" data-type='page'>
                        <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
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
            <?php if ($_smarty_tpl->getValue('spage')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'page','node_id'=>$_smarty_tpl->getValue('spage')['page_id'],'price'=>$_smarty_tpl->getValue('spage')['page_monetization_min_price']), (int) 0, $_smarty_current_dir);
?>
            <?php } else { ?>
              <div class="card panel-photos">
                <div class="card-header with-icon with-nav">
                  <!-- back to albums -->
                  <div class="float-end">
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/photos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photos");?>
</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
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
            <?php if ($_smarty_tpl->getValue('spage')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'page','node_id'=>$_smarty_tpl->getValue('spage')['page_id'],'price'=>$_smarty_tpl->getValue('spage')['page_monetization_min_price']), (int) 0, $_smarty_current_dir);
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/videos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>
</a>
                    </li>
                    <?php if ($_smarty_tpl->getValue('system')['reels_enabled']) {?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/reels"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>
</a>
                      </li>
                    <?php }?>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('spage')['videos']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['videos'], 'video');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('video')->value) {
$foreach7DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="videos" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
" data-type='page'>
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
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
            <?php if ($_smarty_tpl->getValue('spage')['needs_subscription']) {?>
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'page','node_id'=>$_smarty_tpl->getValue('spage')['page_id'],'price'=>$_smarty_tpl->getValue('spage')['page_monetization_min_price']), (int) 0, $_smarty_current_dir);
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/videos"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Videos");?>
</a>
                      </li>
                    <?php }?>
                    <li class="nav-item">
                      <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/reels"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>
</a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>
                <div class="card-body">
                  <?php if ($_smarty_tpl->getValue('spage')['reels']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['reels'], 'video');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('video')->value) {
$foreach8DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_is_reel'=>true), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="videos_reels" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
" data-type='page'>
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php } else { ?>
                    <p class="text-center text-muted mt10">
                      <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
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
              <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>'page','node_id'=>$_smarty_tpl->getValue('spage')['page_id'],'price'=>$_smarty_tpl->getValue('spage')['page_monetization_min_price']), (int) 0, $_smarty_current_dir);
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
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
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach9DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>

                <!-- see-more -->
                <div class="alert alert-post see-more js_see-more" data-get="products_page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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

                  <?php if ($_smarty_tpl->getValue('spage')['page_rate']) {?>
                    <span class="review-stars small ml5">
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 1) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 2) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 3) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 4) {?>checked<?php }?>"></i>
                      <i class="fa fa-star <?php if ($_smarty_tpl->getValue('spage')['page_rate'] >= 5) {?>checked<?php }?>"></i>
                    </span>
                    <span class="badge bg-light text-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('spage')['page_rate'],1);?>
</span>
                  <?php }?>
                </div>
                <!-- panel title -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->getValue('spage')['reviews_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['reviews'], '_review');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_review')->value) {
$foreach10DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_review.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>
                  <?php if ($_smarty_tpl->getValue('spage')['reviews_count'] >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="reviews" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
" data-type="page">
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have reviews");?>

                  </p>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- reviews -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "events") {?>
          <!-- events -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Events");?>

                <!-- panel title -->

                <?php if ($_smarty_tpl->getValue('spage')['i_admin'] && $_smarty_tpl->getValue('system')['events_enabled'] && $_smarty_tpl->getValue('system')['pages_events_enabled']) {?>
                  <div class="float-end">
                    <button class="btn btn-md btn-primary d-none d-lg-block" data-toggle="modal" data-url="modules/add.php?type=event&page_id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <i class="fa fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Create Event");?>

                    </button>
                    <button class="btn btn-sm btn-icon btn-success d-block d-lg-none" data-toggle="modal" data-url="modules/add.php?type=event&page_id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <i class="fa fa-plus-circle"></i>
                    </button>
                  </div>
                <?php }?>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->getValue('spage')['events']) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['events'], '_event');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_event')->value) {
$foreach11DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>

                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('spage')['events']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="page_events" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- events -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "activities") {?>
          <!-- activities -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"activities",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Activities");?>

                <!-- panel title -->

                <?php if ($_smarty_tpl->getValue('spage')['activities_permission'] == "editor") {?>
                  <div class="float-end">
                    <button class="btn btn-md btn-primary d-none d-lg-block" data-toggle="modal" data-url="modules/activities.php?do=add&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <i class="fa fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Create Activity");?>

                    </button>
                    <button class="btn btn-sm btn-icon btn-success d-block d-lg-none" data-toggle="modal" data-url="modules/activities.php?do=add&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <i class="fa fa-plus-circle"></i>
                    </button>
                  </div>
                <?php }?>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->getValue('spage')['activities_permission']) {?>
                  <?php if ($_smarty_tpl->getValue('spage')['activities']) {?>
                    <ul class="row">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['activities'], 'activity');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('activity')->value) {
$foreach12DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_activity.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>

                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('spage')['activities']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                      <!-- see-more -->
                      <div class="alert alert-post see-more js_see-more" data-get="page_activities" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                        <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                      </div>
                      <!-- see-more -->
                    <?php }?>
                  <?php } else { ?>
                    <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                  <?php }?>
                <?php } else { ?>
                  <div class="alert alert-warning">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sorry, You don't have permission to view this page's activities");?>

                  </div>

                  <?php if ($_smarty_tpl->getValue('case') == "pending") {?>
                    <div class="text-center">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pending",'class'=>"main-icon mb10",'width'=>"60px",'height'=>"60px"), (int) 0, $_smarty_current_dir);
?>
                      <h4><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Pending");?>
</h4>
                      <p class="mt20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your request is still awaiting admin approval");?>
</p>
                    </div>
                  <?php } elseif ($_smarty_tpl->getValue('case') == "declined") {?>
                    <div class="text-center">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"report",'class'=>"danger-icon mb10",'width'=>"60px",'height'=>"60px"), (int) 0, $_smarty_current_dir);
?>
                      <h4><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Declined");?>
</h4>
                      <p class="mt20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your request has been declined by the admin");?>
</p>
                    </div>
                  <?php } else { ?>
                    <!-- request permission -->
                    <div class="text-center text-muted mb20">
                      <button class="btn btn-lg btn-primary js_activities-permission-request" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Request Permission");?>

                      </button>
                    </div>
                    <!-- request permission -->
                  <?php }?>
                <?php }?>
              </div>
            </div>
          </div>
          <!-- activities -->

        <?php } elseif ($_smarty_tpl->getValue('view') == "subscribers") {?>
          <!-- subscribers -->
          <div class="col-12">
            <div class="card">
              <div class="card-header with-icon">
                <!-- panel title -->
                <div>
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribers");?>

                </div>
                <!-- panel title -->
              </div>
              <div class="card-body pb0">
                <?php if ($_smarty_tpl->getValue('spage')['subscribers_count'] > 0) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['subscribers'], '_user');
$foreach13DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach13DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('spage')['subscribers']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more mt0 mb20 js_see-more" data-get="subscribers" data-uid="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
" data-type="page">
                      <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                  <?php }?>
                <?php } else { ?>
                  <p class="text-center text-muted mt10">
                    <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
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
              <div class="card-header with-icon">
                <!-- panel title -->
                <div>
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Invites");?>

                </div>
                <!-- panel title -->
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->getValue('spage')['invites']) {?>
                  <ul class="row">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['invites'], '_user');
$foreach14DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach14DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_darker'=>true), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </ul>

                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('spage')['invites']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="page_invites" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
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
            <?php $_smarty_tpl->renderSubTemplate('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_page",'_id'=>$_smarty_tpl->getValue('spage')['page_id'],'_title'=>$_smarty_tpl->getSmarty()->getModifierCallback('__')("Search Results"),'_query'=>$_smarty_tpl->getValue('query'),'_filter'=>$_smarty_tpl->getValue('filter')), (int) 0, $_smarty_current_dir);
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
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/settings">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page Settings");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->getValue('sub_view') == "info") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/settings/info">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"info",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page Information");?>

                    </a>
                  </li>
                  <li <?php if ($_smarty_tpl->getValue('sub_view') == "admins") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/settings/admins">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Admins");?>

                    </a>
                  </li>
                  <?php if ($_smarty_tpl->getValue('system')['pages_activities_enabled'] && $_smarty_tpl->getValue('spage')['page_activities_enabled']) {?>
                    <li <?php if ($_smarty_tpl->getValue('sub_view') == "activities") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/settings/activities">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"activities",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Activities");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('user')->_data['can_monetize_content']) {?>
                    <li <?php if ($_smarty_tpl->getValue('sub_view') == "monetization") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/settings/monetization">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('system')['verification_requests']) {?>
                    <li <?php if ($_smarty_tpl->getValue('sub_view') == "verification") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/settings/verification">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Verification");?>

                      </a>
                    </li>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('user')->_data['user_id'] == $_smarty_tpl->getValue('spage')['page_admin']) {?>
                    <li <?php if ($_smarty_tpl->getValue('sub_view') == "delete") {?>class="active" <?php }?>>
                      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
/settings/delete">
                        <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete Page");?>

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
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page Settings");?>

                </div>
                <form class="js_ajax-forms" data-url="modules/create.php?type=page&do=edit&edit=settings&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label" for="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Name Your Page");?>
</label>
                      <input type="text" class="form-control" name="title" id="title" value="<?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="username"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page Username");?>
</label>
                      <div class="input-group">
                        <span class="input-group-text d-none d-sm-block"><?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/</span>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $_smarty_tpl->getValue('spage')['page_name'];?>
">
                      </div>
                      <div class="form-text">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Can only contain alphanumeric characters (A–Z, 0–9) and periods ('.')");?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="category"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Category");?>
</label>
                      <select class="form-select" name="category" id="category">
                        <option><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Category");?>
</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach15DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach15DoElse = false;
?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('data_category'=>$_smarty_tpl->getValue('spage')['page_category']), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </select>
                    </div>
                    <?php if ($_smarty_tpl->getValue('user')->_data['can_receive_tip']) {?>
                      <div class="divider"></div>
                      <div class="form-table-row">
                        <div class="avatar">
                          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"tip",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
                        </div>
                        <div>
                          <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Tips Enabled");?>
</div>
                          <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Allow the send tips button on your page");?>
</div>
                        </div>
                        <div class="text-end">
                          <label class="switch" for="page_tips_enabled">
                            <input type="checkbox" name="page_tips_enabled" id="page_tips_enabled" <?php if ($_smarty_tpl->getValue('spage')['page_tips_enabled']) {?>checked<?php }?>>
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    <?php }?>

                    <?php if ($_smarty_tpl->getValue('system')['pages_activities_enabled']) {?>
                      <div class="divider"></div>
                      <div class="form-table-row">
                        <div class="avatar">
                          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"activities",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
                        </div>
                        <div>
                          <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Activities Enabled");?>
</div>
                          <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Allow the activities on your page");?>
</div>
                        </div>
                        <div class="text-end">
                          <label class="switch" for="page_activities_enabled">
                            <input type="checkbox" name="page_activities_enabled" id="page_activities_enabled" <?php if ($_smarty_tpl->getValue('spage')['page_activities_enabled']) {?>checked<?php }?>>
                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    <?php }?>

                    <!-- error -->
                    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
                    <!-- error -->
                  </div>
                  <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
</button>
                  </div>
                </form>

              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "info") {?>
                <div class="card-header with-icon with-nav">
                  <!-- panel title -->
                  <div class="mb20">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"info",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page Information");?>

                  </div>
                  <!-- panel title -->

                  <!-- panel nav -->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#basic" data-bs-toggle="tab">
                        <i class="fa fa-flag fa-fw mr5"></i><strong class="pr5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Basic");?>
</strong>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#action" data-bs-toggle="tab">
                        <i class="fa fa-magic fa-fw mr5"></i><strong class="pr5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action Button");?>
</strong>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#social" data-bs-toggle="tab">
                        <i class="fab fa-facebook fa-fw mr5"></i><strong class="pr5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Social Links");?>
</strong>
                      </a>
                    </li>
                  </ul>
                  <!-- panel nav -->
                </div>

                <!-- tab-content -->
                <div class="tab-content">
                  <!-- basic tab -->
                  <div class="tab-pane active" id="basic">
                    <form class="js_ajax-forms" data-url="modules/create.php?type=page&do=edit&edit=info&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label class="form-label" for="company"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Company");?>
</label>
                            <input type="text" class="form-control" name="company" id="company" value="<?php echo $_smarty_tpl->getValue('spage')['page_company'];?>
">
                          </div>
                          <div class="form-group col-md-6">
                            <label class="form-label" for="phone"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Phone");?>
</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $_smarty_tpl->getValue('spage')['page_phone'];?>
">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label class="form-label" for="website"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Website");?>
</label>
                            <input type="text" class="form-control" name="website" id="website" value="<?php echo $_smarty_tpl->getValue('spage')['page_website'];?>
">
                            <div class="form-text">
                              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Website link must start with http:// or https://");?>

                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label class="form-label" for="location"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Location");?>
</label>
                            <input type="text" class="form-control js_geocomplete" name="location" id="location" value="<?php echo $_smarty_tpl->getValue('spage')['page_location'];?>
">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="country"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Country");?>
</label>
                          <select class="form-select" name="country">
                            <option value="none"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Country");?>
</option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('countries'), 'country');
$foreach16DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach16DoElse = false;
?>
                              <option value="<?php echo $_smarty_tpl->getValue('country')['country_id'];?>
" <?php if ($_smarty_tpl->getValue('spage')['page_country'] == $_smarty_tpl->getValue('country')['country_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('country')['country_name'];?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="description"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("About");?>
</label>
                          <textarea class="form-control" name="description" id="description"><?php echo $_smarty_tpl->getValue('spage')['page_description'];?>
</textarea>
                        </div>
                        <!-- custom fields -->
                        <?php if ($_smarty_tpl->getValue('custom_fields')['basic']) {?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->getValue('custom_fields')['basic'],'_registration'=>false), (int) 0, $_smarty_current_dir);
?>
                        <?php }?>
                        <!-- custom fields -->

                        <!-- error -->
                        <div class="alert alert-danger mt15 mb0 x-hidden"></div>
                        <!-- error -->
                      </div>
                      <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
</button>
                      </div>
                    </form>
                  </div>
                  <!-- basic tab -->

                  <!-- action tab -->
                  <div class="tab-pane" id="action">
                    <form class="js_ajax-forms" data-url="modules/create.php?type=page&do=edit&edit=action&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <div class="card-body">
                        <div class="form-group">
                          <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action Button Text");?>
</label>
                          <input type="text" class="form-control" name="action_text" id="action_text" value="<?php echo $_smarty_tpl->getValue('spage')['page_action_text'];?>
">
                          <div class="form-text">
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For example: Subscribe, Get tickets, Preorder now or Shop now");?>

                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action Button Color");?>
</label>
                          <div class="mt10">
                            <div class="form-check form-check-inline">
                              <input type="radio" name="action_color" id="action_color_light" value="light" class="form-check-input" <?php if ($_smarty_tpl->getValue('spage')['page_action_color'] == "light") {?>checked<?php }?>>
                              <label class="form-check-label" for="action_color_light">
                                <button type="button" class="btn btn-sm btn-light"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action");?>
</button>
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="action_color" id="action_color_primary" value="primary" class="form-check-input" <?php if ($_smarty_tpl->getValue('spage')['page_action_color'] == "primary") {?>checked<?php }?>>
                              <label class="form-check-label" for="action_color_primary">
                                <button type="button" class="btn btn-sm btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action");?>
</button>
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="action_color" id="action_color_success" value="success" class="form-check-input" <?php if ($_smarty_tpl->getValue('spage')['page_action_color'] == "success") {?>checked<?php }?>>
                              <label class="form-check-label" for="action_color_success">
                                <button type="button" class="btn btn-sm btn-success"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action");?>
</button>
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="action_color" id="action_color_info" value="info" class="form-check-input" <?php if ($_smarty_tpl->getValue('spage')['page_action_color'] == "info") {?>checked<?php }?>>
                              <label class="form-check-label" for="action_color_info">
                                <button type="button" class="btn btn-sm btn-info"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action");?>
</button>
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="action_color" id="action_color_warning" value="warning" class="form-check-input" <?php if ($_smarty_tpl->getValue('spage')['page_action_color'] == "warning") {?>checked<?php }?>>
                              <label class="form-check-label" for="action_color_warning">
                                <button type="button" class="btn btn-sm btn-warning"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action");?>
</button>
                              </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input type="radio" name="action_color" id="action_color_danger" value="danger" class="form-check-input" <?php if ($_smarty_tpl->getValue('spage')['page_action_color'] == "danger") {?>checked<?php }?>>
                              <label class="form-check-label" for="action_color_danger">
                                <button type="button" class="btn btn-sm btn-danger"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action");?>
</button>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Action Button URL");?>
</label>
                          <input type="text" class="form-control" name="action_url" id="action_url" value="<?php echo $_smarty_tpl->getValue('spage')['page_action_url'];?>
">
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
                  </div>
                  <!-- action tab -->

                  <!-- social tab -->
                  <div class="tab-pane" id="social">
                    <form class="js_ajax-forms" data-url="modules/create.php?type=page&do=edit&edit=social&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Facebook Profile URL");?>
</label>
                            <div class="input-group">
                              <span class="input-group-text bg-transparent">
                                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'width'=>"22px",'height'=>"22px"), (int) 0, $_smarty_current_dir);
?>
                              </span>
                              <input type="text" class="form-control" name="facebook" value="<?php echo $_smarty_tpl->getValue('spage')['page_social_facebook'];?>
">
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Twitter Profile URL");?>
</label>
                            <div class="input-group">
                              <span class="input-group-text bg-transparent">
                                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'width'=>"22px",'height'=>"22px"), (int) 0, $_smarty_current_dir);
?>
                              </span>
                              <input type="text" class="form-control" name="twitter" value="<?php echo $_smarty_tpl->getValue('spage')['page_social_twitter'];?>
">
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("YouTube Profile URL");?>
</label>
                            <div class="input-group">
                              <span class="input-group-text bg-transparent">
                                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"youtube",'width'=>"22px",'height'=>"22px"), (int) 0, $_smarty_current_dir);
?>
                              </span>
                              <input type="text" class="form-control" name="youtube" value="<?php echo $_smarty_tpl->getValue('spage')['page_social_youtube'];?>
">
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Instagram Profile URL");?>
</label>
                            <div class="input-group">
                              <span class="input-group-text bg-transparent">
                                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"instagram",'width'=>"22px",'height'=>"22px"), (int) 0, $_smarty_current_dir);
?>
                              </span>
                              <input type="text" class="form-control" name="instagram" value="<?php echo $_smarty_tpl->getValue('spage')['page_social_instagram'];?>
">
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("LinkedIn Profile URL");?>
</label>
                            <div class="input-group">
                              <span class="input-group-text bg-transparent">
                                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'width'=>"22px",'height'=>"22px"), (int) 0, $_smarty_current_dir);
?>
                              </span>
                              <input type="text" class="form-control" name="linkedin" value="<?php echo $_smarty_tpl->getValue('spage')['page_social_linkedin'];?>
">
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Vkontakte Profile URL");?>
</label>
                            <div class="input-group">
                              <span class="input-group-text bg-transparent">
                                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'width'=>"22px",'height'=>"22px"), (int) 0, $_smarty_current_dir);
?>
                              </span>
                              <input type="text" class="form-control" name="vkontakte" value="<?php echo $_smarty_tpl->getValue('spage')['page_social_vkontakte'];?>
">
                            </div>
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
                  </div>
                  <!-- social tab -->
                </div>
                <!-- tab-content -->

              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "admins") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>

                </div>
                <div class="card-body">
                  <!-- admins -->
                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Admins");?>
 <span class="text-muted">(<?php echo $_smarty_tpl->getValue('spage')['page_admins_count'];?>
)</span>
                  </div>
                  <div class="pl-md-4">
                    <?php if ($_smarty_tpl->getValue('spage')['page_admins']) {?>
                      <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['page_admins'], '_user');
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

                      <?php if ($_smarty_tpl->getValue('spage')['page_admins_count'] >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                        <!-- see-more -->
                        <div class="alert alert-post see-more js_see-more" data-get="page_admins" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                          <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                          <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                      <?php }?>
                    <?php } else { ?>
                      <p class="text-center text-muted mt10">
                        <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have admins");?>

                      </p>
                    <?php }?>
                  </div>
                  <!-- admins -->

                  <div class="divider"></div>

                  <!-- members -->
                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("All Members");?>
 <span class="text-muted">(<?php echo $_smarty_tpl->getValue('spage')['page_likes'];?>
)</span>
                  </div>
                  <div class="pl-md-4">
                    <?php if ($_smarty_tpl->getValue('spage')['page_likes'] > 0) {?>
                      <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['members'], '_user');
$foreach18DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach18DoElse = false;
?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </ul>

                      <?php if ($_smarty_tpl->getValue('spage')['page_likes'] >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                        <!-- see-more -->
                        <div class="alert alert-post see-more js_see-more" data-get="page_members" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                          <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                          <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                      <?php }?>
                    <?php } else { ?>
                      <p class="text-center text-muted mt10">
                        <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have members");?>

                      </p>
                    <?php }?>
                  </div>
                  <!-- members -->
                </div>

              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "activities") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"activities",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Activities");?>

                </div>
                <div class="card-body">
                  <!-- admins -->
                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Viewers & Editors");?>

                  </div>
                  <div class="pl-md-4">
                    <?php if ($_smarty_tpl->getValue('spage')['page_activities_users']) {?>
                      <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['page_activities_users'], '_user');
$foreach19DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach19DoElse = false;
?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </ul>

                      <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('spage')['page_activities_users']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                        <!-- see-more -->
                        <div class="alert alert-post see-more js_see-more" data-get="page_activities_users" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                          <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                          <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                      <?php }?>
                    <?php } else { ?>
                      <p class="text-center text-muted mt10">
                        <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have activities viewers & editors");?>

                      </p>
                    <?php }?>
                  </div>
                  <!-- admins -->

                  <div class="divider"></div>

                  <!-- members -->
                  <div class="heading-small mb20">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Permission Requests");?>

                  </div>
                  <div class="pl-md-4">
                    <?php if ($_smarty_tpl->getValue('spage')['page_activities_permission_requests']) {?>
                      <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('spage')['page_activities_permission_requests'], '_user');
$foreach20DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach20DoElse = false;
?>
                          <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </ul>

                      <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('spage')['page_activities_permission_requests']) >= $_smarty_tpl->getValue('system')['max_results_even']) {?>
                        <!-- see-more -->
                        <div class="alert alert-post see-more js_see-more" data-get="page_activities_permission_requests" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                          <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("See More");?>
</span>
                          <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                      <?php }?>
                    <?php } else { ?>
                      <p class="text-center text-muted mt10">
                        <?php echo $_smarty_tpl->getValue('spage')['page_title'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("doesn't have activities permission requests");?>

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
                  <div class="alert alert-info">
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
                    <form class="js_ajax-forms" data-url="modules/create.php?type=page&do=edit&edit=monetization&id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
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
                          <label class="switch" for="page_monetization_enabled">
                            <input type="checkbox" name="page_monetization_enabled" id="page_monetization_enabled" <?php if ($_smarty_tpl->getValue('spage')['page_monetization_enabled']) {?>checked<?php }?>>
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
$foreach21DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('plan')->value) {
$foreach21DoElse = false;
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
                            <div data-toggle="modal" data-url="monetization/controller.php?do=add&node_id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
&node_type=page" class="payment-plan new"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add new plan");?>
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
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page Subscribers");?>

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

              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "verification") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Verification");?>

                </div>
                <?php if ($_smarty_tpl->getValue('case') == "verified") {?>
                  <div class="card-body">
                    <div class="text-center">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon mb10",'width'=>"60px",'height'=>"60px"), (int) 0, $_smarty_current_dir);
?>
                      <h4><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Congratulations");?>
</h4>
                      <p class="mt20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("This page is verified");?>
</p>
                    </div>
                  </div>
                <?php } elseif ($_smarty_tpl->getValue('case') == "pending") {?>
                  <div class="card-body">
                    <div class="text-center">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pending",'class'=>"main-icon mb10",'width'=>"60px",'height'=>"60px"), (int) 0, $_smarty_current_dir);
?>
                      <h4><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Pending");?>
</h4>
                      <p class="mt20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your verification request is still awaiting admin approval");?>
</p>
                    </div>
                  </div>
                <?php } elseif ($_smarty_tpl->getValue('case') == "request" || "declined") {?>
                  <form class="js_ajax-forms" data-url="users/verify.php?node=page&node_id=<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                    <div class="card-body">
                      <?php if ($_smarty_tpl->getValue('case') == "declined") {?>
                        <div class="text-center">
                          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"declined",'class'=>"main-icon mb10",'width'=>"60px",'height'=>"60px"), (int) 0, $_smarty_current_dir);
?>
                          <h4><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sorry");?>
</h4>
                          <p class="mt20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your verification request has been declined by the admin");?>
</p>
                        </div>
                        <div class="divider"></div>
                      <?php }?>

                      <?php if ($_smarty_tpl->getValue('system')['verification_docs_required']) {?>
                        <div class="form-group row">
                          <label class="col-md-3 form-label">
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Verification Documents");?>

                          </label>
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="section-title mb20">
                                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Company Incorporation File");?>

                                </div>
                                <div class="x-image full">
                                  <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Remove");?>
'></button>
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
                                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Company Tax File");?>

                                </div>
                                <div class="x-image full">
                                  <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Remove");?>
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
                              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Upload your company incorporation file and tax file");?>

                            </div>
                          </div>
                        </div>
                      <?php }?>

                      <div class="form-group row">
                        <label class="col-md-3 form-label">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Business Website");?>

                        </label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="business_website">
                          <div class="form-text">
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Enter your business website");?>

                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 form-label">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Business Address");?>

                        </label>
                        <div class="col-md-9">
                          <textarea class="form-control" name="business_address"></textarea>
                          <div class="form-text">
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Enter your business address");?>

                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 form-label">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Additional Information");?>

                        </label>
                        <div class="col-md-9">
                          <textarea class="form-control" name="message"></textarea>
                          <div class="form-text">
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Please share why your account should be verified");?>

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
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Send");?>

                      </button>
                    </div>
                  </form>

                <?php }?>

              <?php } elseif ($_smarty_tpl->getValue('sub_view') == "delete") {?>
                <div class="card-header with-icon">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete Page");?>

                </div>
                <div class="card-body">
                  <div class="alert alert-warning">
                    <div class="icon">
                      <i class="fa fa-exclamation-triangle fa-2x"></i>
                    </div>
                    <div class="text pt5">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Once you delete your page you will no longer can access it again");?>

                    </div>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-danger js_delete-page" data-id="<?php echo $_smarty_tpl->getValue('spage')['page_id'];?>
">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete Page");?>

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
