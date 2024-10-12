<?php
/* Smarty version 4.5.1, created on 2024-08-31 08:00:49
  from '/home/onenetly/public_html/content/themes/default/templates/__feeds_post.body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2cdb1de0a11_76713724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ae5a05963b419a961836554199b6c24e947c8ce' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/__feeds_post.body.tpl',
      1 => 1710678903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 42,
    'file:__feeds_post.text.tpl' => 5,
    'file:__feeds_post.body.tpl' => 2,
    'file:__feeds_post.body.photos.tpl' => 2,
    'file:_need_pro_package.tpl' => 1,
    'file:_need_payment.tpl' => 1,
    'file:_need_subscription.tpl' => 1,
    'file:_need_age_verification.tpl' => 1,
  ),
),false)) {
function content_66d2cdb1de0a11_76713724 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),1=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),2=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!-- post header -->
<div class="post-header">

  <!-- post picture -->
  <div class="post-avatar">
    <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
      <div class="post-avatar-anonymous">
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, false);
?>
      </div>
    <?php } else { ?>
      <a class="post-avatar-picture" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_url'];?>
" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_picture'];?>
);">
      </a>
      <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_author_online']) {?><i class="fa fa-circle online-dot"></i><?php }?>
    <?php }?>
  </div>
  <!-- post picture -->

  <!-- post meta -->
  <div class="post-meta">
    <!-- post menu -->
    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && !$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['_get']->value != "posts_information") {?>
      <div class="float-end dropdown">
        <i class="fa fa-chevron-down dropdown-toggle" data-bs-toggle="dropdown" data-display="static"></i>
        <div class="dropdown-menu dropdown-menu-end action-dropdown-menu">
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['manage_post'] && $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product") {?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['available']) {?>
              <div class="dropdown-item pointer js_sold-post">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mark as Sold" ));?>
</span>
                </div>
              </div>
            <?php } else { ?>
              <div class="dropdown-item pointer js_unsold-post">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mark as Available" ));?>
</span>
                </div>
              </div>
            <?php }?>
            <div class="dropdown-divider"></div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['manage_post'] && $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "job") {?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['job']['available']) {?>
              <div class="dropdown-item pointer js_closed-post">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mark as Closed" ));?>
</span>
                </div>
              </div>
            <?php } else { ?>
              <div class="dropdown-item pointer js_unclosed-post">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mark as Available" ));?>
</span>
                </div>
              </div>
            <?php }?>
            <div class="dropdown-divider"></div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['i_save']) {?>
            <div href="#" class="dropdown-item pointer js_unsave-post">
              <div class="action no-desc">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"saved",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unsave Post" ));?>
</span>
              </div>
            </div>
          <?php } else { ?>
            <div class="dropdown-item pointer js_save-post">
              <div class="action no-desc">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"saved",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Post" ));?>
</span>
              </div>
            </div>
          <?php }?>
          <div class="dropdown-divider"></div>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['manage_post']) {?>
            <!-- Boost -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event']) {?>
              <?php if ($_smarty_tpl->tpl_vars['_post']->value['boosted']) {?>
                <div class="dropdown-item pointer js_unboost-post">
                  <div class="action no-desc">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"boosted",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                    <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unboost Post" ));?>
</span>
                  </div>
                </div>
              <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_boost_posts']) {?>
                  <div class="dropdown-item pointer js_boost-post">
                    <div class="action no-desc">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"boosted",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Boost Post" ));?>
</span>
                    </div>
                  </div>
                <?php } else { ?>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="dropdown-item">
                    <div class="action no-desc">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"boosted",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Boost Post" ));?>
</span>
                    </div>
                  </a>
                <?php }?>
              <?php }?>
            <?php }?>
            <!-- Boost -->
            <!-- Pin -->
            <?php if (!$_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
              <?php if ((!$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event']) || ($_smarty_tpl->tpl_vars['_post']->value['in_group'] && $_smarty_tpl->tpl_vars['_post']->value['is_group_admin']) || ($_smarty_tpl->tpl_vars['_post']->value['in_event'] && $_smarty_tpl->tpl_vars['_post']->value['is_event_admin'])) {?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['pinned']) {?>
                  <div class="dropdown-item pointer js_unpin-post">
                    <div class="action no-desc">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pin",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unpin Post" ));?>
</span>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="dropdown-item pointer js_pin-post">
                    <div class="action no-desc">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pin",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                      <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pin Post" ));?>
</span>
                    </div>
                  </div>
                <?php }?>
              <?php }?>
            <?php }?>
            <!-- Pin -->
            <!-- Edit -->
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "article") {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/edit/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" class="dropdown-item pointer">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit Article" ));?>
</span>
                </div>
              </a>
            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product") {?>
              <div class="dropdown-item pointer" data-toggle="modal" data-url="posts/product.php?do=edit&post_id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit Product" ));?>
</span>
                </div>
              </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "funding") {?>
              <div class="dropdown-item pointer" data-toggle="modal" data-url="posts/funding.php?do=edit&post_id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit Funding" ));?>
</span>
                </div>
              </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "offer") {?>
              <div class="dropdown-item pointer" data-toggle="modal" data-url="posts/offer.php?do=edit&post_id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit Offer" ));?>
</span>
                </div>
              </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "job") {?>
              <div class="dropdown-item pointer" data-toggle="modal" data-url="posts/job.php?do=edit&post_id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit Job" ));?>
</span>
                </div>
              </div>
            <?php } else { ?>
              <div class="dropdown-item pointer js_edit-post">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit Post" ));?>
</span>
                </div>
              </div>
            <?php }?>
            <!-- Edit -->
            <!-- Monetization -->
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['can_be_for_subscriptions']) {?>
              <?php if ($_smarty_tpl->tpl_vars['_post']->value['for_subscriptions']) {?>
                <div class="dropdown-item pointer js_unmonetize-post">
                  <div class="action no-desc">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                    <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For Everyone" ));?>
</span>
                  </div>
                </div>
              <?php } else { ?>
                <div class="dropdown-item pointer js_monetize-post">
                  <div class="action no-desc">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                    <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For Subscribers Only" ));?>
</span>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- Monetization -->
            <!-- Delete -->
            <div class="dropdown-item pointer js_delete-post">
              <div class="action no-desc">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete Post" ));?>
</span>
              </div>
            </div>
            <!-- Delete -->
            <!-- Hide -->
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['user_type'] == "user" && !$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event'] && !$_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
              <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_hidden']) {?>
                <div class="dropdown-item pointer js_allow-post">
                  <div class="action no-desc">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"unhide",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                    <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow on Timeline" ));?>
</span>
                  </div>
                </div>
              <?php } else { ?>
                <div class="dropdown-item pointer js_disallow-post">
                  <div class="action no-desc">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"hide",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                    <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hide from Timeline" ));?>
</span>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- Hide -->
            <!-- Disable Comments -->
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['comments_disabled']) {?>
              <div class="dropdown-item pointer js_enable-post-comments">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comments",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn on Commenting" ));?>
</span>
                </div>
              </div>
            <?php } else { ?>
              <div class="dropdown-item pointer js_disable-post-comments">
                <div class="action no-desc">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comments",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn off Commenting" ));?>
</span>
                </div>
              </div>
            <?php }?>
            <!-- Disable Comments -->
          <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['user_type'] == "user" && !$_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
              <div class="dropdown-item pointer js_hide-author" data-author-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['user_id'];?>
" data-author-name="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_name'];?>
">
                <div class="action">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"block",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unfollow" ));?>
 <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['_post']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['_post']->value['user_firstname'];
}?>
                </div>
                <div class="action-desc"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stop seeing posts but stay friends" ));?>
</div>
              </div>
            <?php }?>
            <div class="dropdown-item pointer js_hide-post">
              <div class="action">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"hide",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hide this post" ));?>

              </div>
              <div class="action-desc"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "See fewer posts like this" ));?>
</div>
            </div>
            <div class="dropdown-item pointer" data-toggle="modal" data-url="data/report.php?do=create&handle=post&id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
              <div class="action no-desc">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"report",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Report post" ));?>
</span>
              </div>
            </div>
          <?php }?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" target="_blank" class="dropdown-item">
            <div class="action no-desc">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"link",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
              <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Open post in new tab" ));?>
</span>
            </div>
          </a>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_anonymous'] && ($_smarty_tpl->tpl_vars['user']->value->_is_admin || $_smarty_tpl->tpl_vars['user']->value->_is_moderator)) {?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_url'];?>
" target="_blank" class="dropdown-item">
              <div class="action no-desc">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'class'=>"main-icon mr10",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Open Author Profile" ));?>
</span>
              </div>
            </a>
          <?php }?>
        </div>
      </div>
    <?php }?>
    <!-- post menu -->

    <!-- post author -->
    <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
      <span class="post-author"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Anonymous" ));?>
</span>
    <?php } else { ?>
      <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['_post']->value['user_type'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['user_id'];?>
">
        <a class="post-author" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_name'];?>
</a>
      </span>
      <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_author_verified']) {?>
        <span class="verified-badge" data-bs-toggle="tooltip" title='<?php if ($_smarty_tpl->tpl_vars['_post']->value['user_type'] == "user") {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verified User" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verified Page" ));
}?>'>
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
        </span>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['_post']->value['user_subscribed']) {?>
        <span class="pro-badge" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['package_name'] ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Member" ));?>
'>
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pro_badge",'width'=>"20px",'height'=>"20px"), 0, true);
?>
        </span>
      <?php }?>
    <?php }?>
    <!-- post author -->

    <!-- post-title -->
    <span class="post-title">
      <?php if (!$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "shared") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "shared" ));?>

        <?php if ($_smarty_tpl->tpl_vars['_post']->value['origin']['is_anonymous']) {?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Anonymous post" ));?>

        <?php } else { ?>
          <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['user_type'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['user_id'];?>
">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['post_author_url'];?>
">
              <?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['post_author_name'];?>

            </a><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "'s" ));?>

          </span>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['post_id'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'link') {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "link" ));?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'media') {?>
              <?php if ($_smarty_tpl->tpl_vars['_post']->value['origin']['media']['media_type'] != "soundcloud") {?>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "video" ));?>

              <?php } else { ?>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "song" ));?>

              <?php }?>

            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'photos') {?>
              <?php if ($_smarty_tpl->tpl_vars['_post']->value['origin']['photos_num'] > 1) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "photos" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "photo" ));
}?>

            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'album') {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "album" ));?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'poll') {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "poll" ));?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'video') {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "video" ));?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'audio') {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "audio" ));?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'file') {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "file" ));?>


            <?php } else { ?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "post" ));?>

            <?php }?>
          </a>
        <?php }?>

      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "link") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "shared a link" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "live") {?>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['live']['live_ended']) {?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "was live" ));?>

        <?php } else { ?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "is live now" ));?>

        <?php }?>

      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "photos") {?>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos_num'] == 1) {?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added a photo" ));?>

        <?php } else { ?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added" ));?>
 <?php echo $_smarty_tpl->tpl_vars['_post']->value['photos_num'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "photos" ));?>

        <?php }?>

      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "album") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added" ));?>
 <?php echo $_smarty_tpl->tpl_vars['_post']->value['photos_num'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "photos to the album" ));?>
: <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['album']['path'];?>
/album/<?php echo $_smarty_tpl->tpl_vars['_post']->value['album']['album_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['album']['title'];?>
</a>

      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_picture") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "updated the profile picture" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_cover") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "updated the cover photo" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_picture") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "updated page picture" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_cover") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "updated cover photo" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_picture") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "updated group picture" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_cover") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "updated group cover" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "event_cover") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "updated event cover" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "article") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added article" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/category/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['category_url'];?>
" class="article-category text-no-underline"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['article']['category_name'] ));?>
</a>

      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added product for sale" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "funding") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "raised funding request" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "offer") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added offer" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "job") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added job" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "poll") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added poll" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "video") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added video" ));?>
 <span class="badge rounded-pill badge-lg bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['video']['category_name'] ));?>
</span>

      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "audio") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added audio" ));?>


      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "file") {?>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "added file" ));?>


      <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['_get']->value != 'posts_group' && $_smarty_tpl->tpl_vars['_post']->value['in_group']) {?>
        <i class="fa fa-chevron-right ml5 mr5"></i>
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon mr5",'width'=>"20px",'height'=>"20px"), 0, true);
?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_post']->value['group_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['group_title'];?>
</a>
      <?php } elseif ($_smarty_tpl->tpl_vars['_get']->value != 'posts_event' && $_smarty_tpl->tpl_vars['_post']->value['in_event']) {?>
        <i class="fa fa-chevron-right ml5 mr5"></i>
        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon mr5",'width'=>"20px",'height'=>"20px"), 0, true);
?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_post']->value['event_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['event_title'];?>
</a>
      <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['in_wall']) {?>
        <i class="fa fa-chevron-right ml5 mr5"></i>
        <span class="js_user-popover" data-type="user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['wall_id'];?>
">
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['wall_username'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['wall_fullname'];?>
</a>
        </span>
      <?php }?>
    </span>
    <!-- post-title -->

    <!-- post feeling -->
    <?php if ($_smarty_tpl->tpl_vars['_post']->value['feeling_action']) {?>
      <span class="post-title">
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] != '' && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "map" && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "media") {?> & <?php }
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "is" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value["feeling_action"] ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value["feeling_value"] ));?>
 <i class="twa twa-lg twa-<?php echo $_smarty_tpl->tpl_vars['_post']->value['feeling_icon'];?>
"></i>
      </span>
    <?php }?>
    <!-- post feeling -->

    <!-- post time & location & privacy -->
    <div class="post-time">
      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['_post']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['time'];?>
</a>
      <?php if ($_smarty_tpl->tpl_vars['_post']->value['location']) {?>
        - <i class="fa fa-map-marker"></i> <span><?php echo $_smarty_tpl->tpl_vars['_post']->value['location'];?>
</span>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['post_translation_enabled']) {?>
        - <span class="text-link js_translator"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Translate" ));?>
</span>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['newsfeed_source'] == "default") {?>
        -
        <?php if (!$_smarty_tpl->tpl_vars['_post']->value['is_anonymous'] && !$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['_post']->value['manage_post'] && $_smarty_tpl->tpl_vars['_post']->value['user_type'] == 'user' && !$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event'] && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "article" && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "product" && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "funding") {?>
          <!-- privacy -->
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "me") {?>
            <div class="btn-group" data-bs-toggle="tooltip" data-value="me" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Only Me" ));?>
'>
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-display="static">
                <i class="btn-group-icon fa fa-lock"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-left">
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Public" ));?>
' data-value="public">
                  <i class="fa fa-globe"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Public" ));?>

                </div>
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Friends" ));?>
' data-value="friends">
                  <i class="fa fa-users"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                </div>
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Only Me" ));?>
' data-value="me">
                  <i class="fa fa-lock"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Only Me" ));?>

                </div>
              </div>
            </div>
          <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "friends") {?>
            <div class="btn-group" data-bs-toggle="tooltip" data-value="friends" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Friends" ));?>
'>
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-display="static">
                <i class="btn-group-icon fa fa-users"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-left">
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Public" ));?>
' data-value="public">
                  <i class="fa fa-globe"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Public" ));?>

                </div>
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Friends" ));?>
' data-value="friends">
                  <i class="fa fa-users"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                </div>
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Only Me" ));?>
' data-value="me">
                  <i class="fa fa-lock"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Only Me" ));?>

                </div>
              </div>
            </div>
          <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "public") {?>
            <div class="btn-group" data-bs-toggle="tooltip" data-value="public" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Public" ));?>
'>
              <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-display="static">
                <i class="btn-group-icon fa fa-globe"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-left">
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Public" ));?>
' data-value="public">
                  <i class="fa fa-globe"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Public" ));?>

                </div>
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Friends" ));?>
' data-value="friends">
                  <i class="fa fa-users"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                </div>
                <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with: Only Me" ));?>
' data-value="me">
                  <i class="fa fa-lock"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Only Me" ));?>

                </div>
              </div>
            </div>
          <?php }?>

          <!-- privacy -->
        <?php } else { ?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "me") {?>
            <i class="fa fa-lock" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Only Me" ));?>
'></i>
          <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "friends") {?>
            <i class="fa fa-users" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>
'></i>
          <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "public") {?>
            <i class="fa fa-globe" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Public" ));?>
'></i>
          <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "custom") {?>
            <i class="fa fa-cog" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Custom People" ));?>
'></i>
          <?php }?>
        <?php }?>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['_post']->value['for_subscriptions']) {?>
        <span class="badge bg-light text-primary ml5"><i class="fa fa-star mr5"></i><?php echo mb_strtoupper((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Subscriptions" )) ?? '', 'UTF-8');?>
</span>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_paid']) {?>
        <span class="badge bg-light text-primary ml5"><i class="fa-solid fa-sack-dollar mr5"></i><?php echo mb_strtoupper((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Paid" )) ?? '', 'UTF-8');?>
</span>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['_post']->value['for_adult']) {?>
        <span class="badge bg-light text-primary ml5"><i class="fa-solid fa-eye-slash mr5"></i><?php echo mb_strtoupper((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Adult" )) ?? '', 'UTF-8');?>
</span>
      <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_reviews_enabled'] && $_smarty_tpl->tpl_vars['post']->value['post_type'] != "product") {?>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_rate']) {?>
          <span class="review-stars small ml5">
            <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_rate'] >= 1) {?>checked<?php }?>"></i>
            <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_rate'] >= 2) {?>checked<?php }?>"></i>
            <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_rate'] >= 3) {?>checked<?php }?>"></i>
            <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_rate'] >= 4) {?>checked<?php }?>"></i>
            <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_rate'] >= 5) {?>checked<?php }?>"></i>
          </span>
          <span class="badge bg-light text-primary"><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['_post']->value['post_rate'],1);?>
</span>
        <?php }?>
      <?php }?>
    </div>
    <!-- post time & location & privacy -->
  </div>
  <!-- post meta -->
</div>
<!-- post header -->

<?php if (!$_smarty_tpl->tpl_vars['_post']->value['needs_payment'] && !$_smarty_tpl->tpl_vars['_post']->value['needs_subscription'] && !$_smarty_tpl->tpl_vars['_post']->value['needs_age_verification']) {?>

  <?php if (!$_smarty_tpl->tpl_vars['_post']->value['needs_pro_package']) {?>
    <!-- post text -->
    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] != "product" && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "funding" && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "offer" && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "job") {?>
      <?php if (!$_smarty_tpl->tpl_vars['_shared']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['colored_pattern']) {?>
          <div class="post-colored" <?php if ($_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['type'] == "color") {?> style="background-image: linear-gradient(45deg, <?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['background_color_1'];?>
, <?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['background_color_2'];?>
);" <?php } else { ?> style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['background_image'];?>
)" <?php }?>>
            <div class="post-colored-text-wrapper js_scroller" data-slimScroll-height="240">
              <div class="post-text" dir="auto" style="color: <?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['text_color'];?>
;">
                <?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>

              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="post-text js_readmore" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>
</div>
        <?php }?>
        <div class="post-text-translation x-hidden" dir="auto"></div>
      <?php }?>
    <?php }?>
    <!-- post text -->

    <?php if (!$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "shared" && $_smarty_tpl->tpl_vars['_post']->value['origin']) {?>
      <div class="post-snippet <?php if (in_array($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'],array('product','funding','job','poll'))) {?>pb15<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['_snippet']->value) {?>
          <div class="post-snippet-toggle text-link js_show-attachments"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Show Attachments" ));?>
</div>
        <?php }?>
        <div <?php if ($_smarty_tpl->tpl_vars['_snippet']->value) {?>class="x-hidden" <?php }?>>
          <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.body.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_post'=>$_smarty_tpl->tpl_vars['_post']->value['origin'],'_shared'=>true), 0, true);
?>
        </div>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "link" && $_smarty_tpl->tpl_vars['_post']->value['link']) {?>
      <div class="mt10 plr15">
        <div class="post-media">
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['link']['source_thumbnail']) {?>
            <a class="post-media-image" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_url'];?>
" target="_blank" rel="nofollow">
              <div class="image" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_thumbnail'];?>
');"></div>
              <div class="source"><?php echo mb_strtoupper((string) $_smarty_tpl->tpl_vars['_post']->value['link']['source_host'] ?? '', 'UTF-8');?>
</div>
            </a>
          <?php }?>
          <div class="post-media-meta">
            <a class="title mb5" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_url'];?>
" target="_blank" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_title'];?>
</a>
            <div class="text mb5"><?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_text'];?>
</div>
          </div>
        </div>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "media" && $_smarty_tpl->tpl_vars['_post']->value['media']) {?>
      <div class="mt10 plr15">
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['media']['source_type'] == "photo") {?>
          <div class="post-media">
            <div class="post-media-image">
              <div class="image" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_url'];?>
');"></div>
            </div>
            <div class="post-media-meta">
              <div class="source"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'];?>
</a></div>
            </div>
          </div>
        <?php } else { ?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'] == "YouTube") {?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['smart_yt_player']) {?>
              <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['_post']) ? $_smarty_tpl->tpl_vars['_post']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['media']['vidoe_id'] = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'get_youtube_id' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['media']['source_html'] ));
$_smarty_tpl->_assignInScope('_post', $_tmp_array);?>
              <div class="youtube-player js_youtube-player" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['vidoe_id'];?>
">
                <img src="https://i.ytimg.com/vi/<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['vidoe_id'];?>
/hqdefault.jpg">
                <div class="play"></div>
              </div>
            <?php } else { ?>
              <div class="post-media">
                <div class="ratio ratio-16x9">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'html_entity_decode' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['media']['source_html'],ENT_QUOTES ));?>

                </div>
              </div>
            <?php }?>

          <?php } elseif (in_array($_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'],array("Vimeo","Twitch","Rumble.com","Banned.Video","Brighteon","Odysee","Gab TV"))) {?>
            <div class="post-media">
              <div class="ratio ratio-16x9">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'html_entity_decode' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['media']['source_html'],ENT_QUOTES ));?>

              </div>
            </div>
          <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'] == "Facebook") {?>
            <div class="embed-facebook-wrapper">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'html_entity_decode' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['media']['source_html'],ENT_QUOTES ));?>

              <div class="embed-facebook-placeholder ptb30">
                <div class="d-flex justify-content-center">
                  <div class="spinner-grow"></div>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="embed-iframe-wrapper">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'html_entity_decode' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['media']['source_html'],ENT_QUOTES ));?>

            </div>
          <?php }?>
        <?php }?>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "live" && $_smarty_tpl->tpl_vars['_post']->value['live']) {?>
      <?php if ($_smarty_tpl->tpl_vars['system']->value['save_live_enabled'] && $_smarty_tpl->tpl_vars['_post']->value['live']['live_ended'] && $_smarty_tpl->tpl_vars['_post']->value['live']['live_recorded']) {?>
        <div class="overflow-hidden">
          <video class="js_videojs video-js vjs-fluid vjs-default-skin" id="video-<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['live_id'];
if ($_smarty_tpl->tpl_vars['pinned']->value || $_smarty_tpl->tpl_vars['boosted']->value) {?>-<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];
}?>" <?php if ($_smarty_tpl->tpl_vars['_post']->value['live']['video_thumbnail']) {?>poster="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['video_thumbnail'];?>
" <?php }?> controls preload="auto">
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_agora_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['agora_file'];?>
" type="application/x-mpegURL">
          </video>
        </div>
      <?php } else { ?>
        <div class="youtube-player with-live js_lightbox-live">
          <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['video_thumbnail'];?>
">
          <div class="play"></div>
        </div>
      <?php }?>
    <?php }?>

    <?php if (($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "photos" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "album" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_picture" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_cover" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_picture" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_cover" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_picture" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_cover" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "event_cover" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "combo") && $_smarty_tpl->tpl_vars['_post']->value['photos_num'] > 0) {?>
      <div class="mt10">
        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.body.photos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "map") {?>
      <div class="post-map">
        <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $_smarty_tpl->tpl_vars['_post']->value['location'];?>
&amp;zoom=20&amp;size=600x250&amp;maptype=roadmap&amp;markers=color:red%7C<?php echo $_smarty_tpl->tpl_vars['_post']->value['location'];?>
&amp;key=<?php echo $_smarty_tpl->tpl_vars['system']->value['geolocation_key'];?>
" width="100%">
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "article" && $_smarty_tpl->tpl_vars['_post']->value['article']) {?>
      <div class="mt10 plr15">
        <div class="post-media">
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['article']['cover']) {?>
            <a class="post-media-image" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['title_url'];?>
">
              <div style="padding-top: 50%; background-size: cover; background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['cover'];?>
');"></div>
            </a>
          <?php }?>
          <div class="post-media-meta">
            <a class="title mb5" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['title_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['title'];?>
</a>
            <div class="text mb5"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_post']->value['article']['text_snippet'],400);?>
</div>
          </div>
        </div>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "funding" && $_smarty_tpl->tpl_vars['_post']->value['funding']) {?>
      <div class="mt10">
        <div class="post-media">
          <a class="post-media-image" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" target="_blank">
            <div class="image" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['funding']['cover_image'];?>
');"></div>
            <div class="icon">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon",'width'=>"32px",'height'=>"32px"), 0, true);
?>
            </div>
          </a>
        </div>
        <div class="post-funding-meta">
          <div class="funding-title mb10 mt20">
            <?php echo $_smarty_tpl->tpl_vars['_post']->value['funding']['title'];?>

          </div>
          <div class="funding-completion mb10 mt20">
            <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['_post']->value['funding']['funding_completion'];?>
%</span>
            <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['funding']['raised_amount'] ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Raised of" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['funding']['amount'] ));?>
</strong>
            <div class="progress mt5">
              <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['_post']->value['funding']['funding_completion'];?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['_post']->value['funding']['funding_completion'];?>
%"></div>
            </div>
          </div>
          <div class="funding-description">
            <!-- post text -->
            <?php if (!$_smarty_tpl->tpl_vars['_shared']->value) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php } else { ?>
              <div class="post-text js_readmore text-muted" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>
</div>
              <div class="post-text-translation x-hidden" dir="auto"></div>
            <?php }?>
            <!-- post text -->
          </div>
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['_post']->value['author_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
            <div class="mt10 d-grid">
              <button type="button" class="btn btn-success js_funding-donate" data-toggle="modal" data-url="#funding-donate" data-options='{ "post_id": <?php echo $_smarty_tpl->tpl_vars['_post']->value["post_id"];?>
 }'>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Donate" ));?>

              </button>
            </div>
          <?php }?>
        </div>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "offer" && $_smarty_tpl->tpl_vars['_post']->value['offer']) {?>
      <div class="mt10 plr15">
        <div class="post-media">
          <div class="post-media-image">
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos_num'] == 1) {?>
              <div class="image" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['offer']['thumbnail'];?>
');"></div>
            <?php } else { ?>
              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.body.photos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['offer']['end_date']) {?>
              <div class="source">
                <i class="far fa-calendar-alt mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Expires" ));?>
: <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_post']->value['offer']['end_date'],$_smarty_tpl->tpl_vars['system']->value['system_date_format']);?>
</strong>
              </div>
            <?php }?>
            <div class="icon">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"offers",'width'=>"32px",'height'=>"32px"), 0, true);
?>
            </div>
          </div>
          <div class="post-media-meta">
            <span class="title text-active mb5 mt20"><?php echo $_smarty_tpl->tpl_vars['_post']->value['offer']['meta_title'];?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['offer']['price']) {?>
              <div class="text-success mtb5">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "From" ));?>
 <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['offer']['price'] ));?>
</strong>
              </div>
            <?php }?>
            <!-- post text -->
            <?php if (!$_smarty_tpl->tpl_vars['_shared']->value) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php } else { ?>
              <div class="post-text js_readmore text-muted" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>
</div>
              <div class="post-text-translation x-hidden" dir="auto"></div>
            <?php }?>
            <!-- post text -->
            <!-- custom fileds -->
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['custom_fields']['basic']) {?>
              <div class="post-custom-fileds-wrapper mt10">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_post']->value['custom_fields']['basic'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
                  <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                    <div>
                      <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['custom_field']->value['label'] ));?>
</strong><br>
                      <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                        <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                      <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                      <?php }?>
                    </div>
                  <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </div>
            <?php }?>
            <!-- custom fileds -->
          </div>
        </div>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "job" && $_smarty_tpl->tpl_vars['_post']->value['job']) {?>
      <div class="mt10 plr15">
        <div class="post-media">
          <a class="post-media-image" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" target="_blank">
            <div class="image" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['job']['cover_image'];?>
');"></div>
            <div class="source">
              <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['job']['salary_minimum'] ));?>
 - <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['job']['salary_maximum'] ));?>
 / <?php echo $_smarty_tpl->tpl_vars['_post']->value['job']['pay_salary_per_meta'];?>
</strong>
            </div>
            <div class="icon">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'width'=>"32px",'height'=>"32px"), 0, true);
?>
            </div>
          </a>
        </div>
        <div class="post-job-meta">
          <div class="job-title mb10 mt20">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['_post']->value['job']['title'];?>
</a>
          </div>
          <div class="post-product-wrapper">
            <div class="post-product-details">
              <div class="title">
                <i class="fa fa-map-marker fa-fw mr5" style="color: #1f9cff;"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Location" ));?>

              </div>
              <div class="description">
                <?php echo $_smarty_tpl->tpl_vars['_post']->value['job']['location'];?>

              </div>
            </div>
            <div class="post-product-details">
              <div class="title">
                <i class="fa fa-briefcase fa-fw mr5" style="color: #2bb431;"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Type" ));?>

              </div>
              <div class="description">
                <?php echo $_smarty_tpl->tpl_vars['_post']->value['job']['type_meta'];?>

              </div>
            </div>
            <div class="post-product-details">
              <div class="title">
                <i class="fa fa-clock fa-fw mr5" style="color: #a038b2;"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Status" ));?>

              </div>
              <div class="description">
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['job']['available']) {?>
                  <span class="badge bg-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Open" ));?>
</span>
                <?php } else { ?>
                  <span class="badge bg-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Closed" ));?>
</span>
                <?php }?>
              </div>
            </div>
          </div>
          <div class="job-description">
            <!-- post text -->
            <?php if (!$_smarty_tpl->tpl_vars['_shared']->value) {?>
              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php } else { ?>
              <div class="post-text js_readmore text-muted" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>
</div>
              <div class="post-text-translation x-hidden" dir="auto"></div>
            <?php }?>
            <!-- post text -->
          </div>
          <!-- custom fileds -->
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['custom_fields']['basic']) {?>
            <div class="post-custom-fileds-wrapper mt10">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_post']->value['custom_fields']['basic'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                  <div>
                    <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['custom_field']->value['label'] ));?>
</strong><br>
                    <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                    <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                      <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                    <?php } else { ?>
                      <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                    <?php }?>
                  </div>
                <?php }?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
          <?php }?>
          <!-- custom fileds -->
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['author_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
            <div class="mt10 d-grid">
              <button type="button" class="btn btn-primary js_job-apply" data-toggle="modal" data-size="large" data-url="posts/job.php?do=candidates&post_id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['_post']->value['job']['candidates_count'] == 0) {?>disabled<?php }?>>
                <i class="fa fa-users mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "View Candidates" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['_post']->value['job']['candidates_count'];?>
)
              </button>
            </div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['_post']->value['job']['available'] && $_smarty_tpl->tpl_vars['_post']->value['author_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
            <div class="mt10 d-grid">
              <button type="button" class="btn btn-success js_job-apply" data-toggle="modal" data-size="large" data-url="posts/job.php?do=application&post_id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Apply Now" ));?>

              </button>
            </div>
          <?php }?>
        </div>
      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "poll" && $_smarty_tpl->tpl_vars['_post']->value['poll']) {?>
      <div class="poll-options mt10" data-poll-votes="<?php echo $_smarty_tpl->tpl_vars['_post']->value['poll']['votes'];?>
">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_post']->value['poll']['options'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
          <div class="mb5">
            <div class="poll-option js_poll-vote" data-id="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
" data-option-votes="<?php echo $_smarty_tpl->tpl_vars['option']->value['votes'];?>
">
              <div class="percentage-bg" <?php if ($_smarty_tpl->tpl_vars['_post']->value['poll']['votes'] > 0) {?> style="width: <?php echo ($_smarty_tpl->tpl_vars['option']->value['votes']/$_smarty_tpl->tpl_vars['_post']->value['poll']['votes'])*100;?>
%" <?php }?>></div>
              <div class="form-check form-check-inline">
                <input type="radio" name="poll_<?php echo $_smarty_tpl->tpl_vars['_post']->value['poll']['poll_id'];?>
" id="option_<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['option']->value['checked']) {?>checked<?php }?>>
                <label class="form-check-label" for="option_<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['text'];?>
</label>
              </div>
            </div>
            <div class="poll-voters">
              <div class="more" data-toggle="modal" data-url="posts/who_votes.php?option_id=<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['option']->value['votes'];?>

              </div>
            </div>
          </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    <?php }?>

    <?php if (($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "video" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "combo") && $_smarty_tpl->tpl_vars['_post']->value['video']) {?>
      <div class="overflow-hidden <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "combo") {?>mt10<?php }?>">
        <video class="js_videojs video-js <?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_videos_enabled']) {?>vjs-fluid<?php } else { ?>vjs-16-9<?php }?> vjs-default-skin" id="video-<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['video_id'];
if ($_smarty_tpl->tpl_vars['pinned']->value || $_smarty_tpl->tpl_vars['boosted']->value) {?>-<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];
}?>" <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>onplay="update_media_views('video', <?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['video_id'];?>
)" <?php }?> <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail']) {?>poster="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail'];?>
" <?php }?> controls preload="auto" <?php if ($_smarty_tpl->tpl_vars['system']->value['auto_play_videos']) {?>muted="muted" <?php }?> style="width:100%;height:100%;" width="100%" height="100%">
          <?php if (empty($_smarty_tpl->tpl_vars['_post']->value['video']['source_240p']) && empty($_smarty_tpl->tpl_vars['_post']->value['video']['source_360p']) && empty($_smarty_tpl->tpl_vars['_post']->value['video']['source_480p']) && empty($_smarty_tpl->tpl_vars['_post']->value['video']['source_720p']) && empty($_smarty_tpl->tpl_vars['_post']->value['video']['source_1080p']) && empty($_smarty_tpl->tpl_vars['_post']->value['video']['source_1440p']) && empty($_smarty_tpl->tpl_vars['_post']->value['video']['source_2160p'])) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source'];?>
" type="video/mp4">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['source_240p']) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source_240p'];?>
" type="video/mp4" label="240p" res="240">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['source_360p']) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source_360p'];?>
" type="video/mp4" label="360p" res="360">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['source_480p']) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source_480p'];?>
" type="video/mp4" label="480p" res="480">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['source_720p']) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source_720p'];?>
" type="video/mp4" label="720p" res="720">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['source_1080p']) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source_1080p'];?>
" type="video/mp4" label="1080p" res="1080">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['source_1440p']) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source_1440p'];?>
" type="video/mp4" label="1440p" res="1440">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['source_2160p']) {?>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source_2160p'];?>
" type="video/mp4" label="2160p" res="2160">
          <?php }?>
        </video>
      </div>
    <?php }?>

    <?php if (($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "audio" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "combo") && $_smarty_tpl->tpl_vars['_post']->value['audio']) {?>
      <div class="plr10 <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "combo") {?>mt10<?php }?>">
        <audio class="js_audio" id="audio-<?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['audio_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>onplay="update_media_views('audio', <?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['audio_id'];?>
)" <?php }?> controls preload="auto" style="width: 100%;">
          <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['source'];?>
" type="audio/mpeg">
          <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['source'];?>
" type="audio/mp3">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your browser does not support HTML5 audio" ));?>

        </audio>
      </div>
    <?php }?>

    <?php if (($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "file" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "combo") && $_smarty_tpl->tpl_vars['_post']->value['file']) {?>
      <div class="post-downloader <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "combo") {?>mt10<?php }?>">
        <div class="icon">
          <i class="fa fa-file-alt fa-2x"></i>
        </div>
        <div class="info">
          <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "File Type" ));?>
</strong>: <?php ob_start();
echo $_smarty_tpl->tpl_vars['_post']->value['file']['source'];
$_prefixVariable2 = ob_get_clean();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'get_extension' ][ 0 ], array( $_prefixVariable2 ));?>

          <div class="mt10">
            <a class="btn btn-primary btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['file']['source'];?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Download" ));?>
</a>
          </div>
        </div>
      </div>

    <?php }?>

    <!-- product -->
    <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product" && $_smarty_tpl->tpl_vars['_post']->value['product']) {?>
      <div class="post-product-container">
        <div class="mtb10 text-xlg">
          <strong><?php echo $_smarty_tpl->tpl_vars['_post']->value['product']['name'];?>
</strong>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['is_digital']) {?>
            <span class="badge bg-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Digital" ));?>
</span>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['status'] == "new") {?>
            <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "New" ));?>
</span>
          <?php } else { ?>
            <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Used" ));?>
</span>
          <?php }?>
        </div>
        <div class="mb20 text-lg text-success">
          <strong>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['price'] > 0) {?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['product']['price'] ));?>

            <?php } else { ?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Free" ));?>

            <?php }?>
          </strong>
        </div>
        <div class="mb10">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"market",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
          <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['available']) {?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['quantity'] > 0) {?>
              <span class="badge badge-lg bg-light text-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "In stock" ));?>
</span>
            <?php } else { ?>
              <span class="badge badge-lg bg-light text-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Out of stock" ));?>
</span>
            <?php }?>
          <?php } else { ?>
            <span class="badge badge-lg bg-light text-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SOLD" ));?>
</span>
          <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['location']) {?>
          <div class="mb10">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
            <?php echo $_smarty_tpl->tpl_vars['_post']->value['product']['location'];?>

          </div>
        <?php }?>
        <div class="mb20">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"saved",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market/category/<?php echo $_smarty_tpl->tpl_vars['_post']->value['product']['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['product']['category_url'];?>
" class="badge badge-lg bg-light text-primary text-no-underline"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['_post']->value['product']['category_name'] ));?>
</a>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_reviews_enabled']) {?>
          <div class="mb20">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
            <span class="pointer ml10" data-toggle="modal" data-url="posts/who_reviews.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
              <?php echo $_smarty_tpl->tpl_vars['post']->value['reviews_count'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Reviews" ));?>

            </span>
            <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate']) {?>
              <span class="review-stars small ml5">
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 1) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 2) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 3) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 4) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 5) {?>checked<?php }?>"></i>
              </span>
              <span class="badge bg-light text-primary"><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['post']->value['post_rate'],1);?>
</span>
            <?php }?>
          </div>
        <?php }?>
        <!-- post text -->
        <?php if (!$_smarty_tpl->tpl_vars['_shared']->value) {?>
          <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php } else { ?>
          <div class="post-text js_readmore text-muted" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>
</div>
          <div class="post-text-translation x-hidden" dir="auto"></div>
        <?php }?>
        <!-- post text -->
        <!-- custom fileds -->
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['custom_fields']['basic']) {?>
          <div class="post-custom-fileds-wrapper mt10">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_post']->value['custom_fields']['basic'], 'custom_field');
$_smarty_tpl->tpl_vars['custom_field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['custom_field']->value) {
$_smarty_tpl->tpl_vars['custom_field']->do_else = false;
?>
              <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['value']) {?>
                <div>
                  <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['custom_field']->value['label'] ));?>
</strong><br>
                  <?php if ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "textbox" && $_smarty_tpl->tpl_vars['custom_field']->value['is_link']) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>
</a>
                  <?php } elseif ($_smarty_tpl->tpl_vars['custom_field']->value['type'] == "multipleselectbox") {?>
                    <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value_string'];?>

                  <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['custom_field']->value['value'];?>

                  <?php }?>
                </div>
              <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </div>
        <?php }?>
        <!-- custom fileds -->
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['author_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
          <div class="mt10 row g-1">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['market_shopping_cart_enabled']) {?>
              <div class="col-12 col-md-9 mb5">
                <div class="d-grid">
                  <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['available'] && $_smarty_tpl->tpl_vars['_post']->value['product']['quantity'] > 0) {?>
                    <button type="button" class="btn btn-primary js_shopping-add-to-cart" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                      <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['is_digital']) {?>
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Buy & Download" ));?>

                      <?php } else { ?>
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Buy" ));?>

                      <?php }?>
                    </button>
                  <?php } else { ?>
                    <button type="button" class="btn btn-primary" disabled>
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Currently unavailable" ));?>

                    </button>
                  <?php }?>
                </div>
              </div>
            <?php }?>
            <div class="col-12 <?php if ($_smarty_tpl->tpl_vars['system']->value['market_shopping_cart_enabled']) {?>col-md-3<?php }?>">
              <div class="d-grid">
                <button type="button" class="btn btn-light js_chat-start" data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['author_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_name'];?>
" data-link="<?php echo $_smarty_tpl->tpl_vars['_post']->value['user_name'];?>
" data-picture="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_picture'];?>
">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"header-messages",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), 0, true);
?>
                  <?php if (!$_smarty_tpl->tpl_vars['system']->value['market_shopping_cart_enabled']) {?>
                    <span class="ml10"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Contact Seller" ));?>
</span>
                  <?php }?>
                </button>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
    <?php }?>
    <!-- product -->

  <?php } else { ?>
    <div class="ptb20 plr20">
      <?php $_smarty_tpl->_subTemplateRender('file:_need_pro_package.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_manage'=>true), 0, false);
?>
    </div>
  <?php }?>

<?php } else { ?>

  <?php if ($_smarty_tpl->tpl_vars['_post']->value['needs_payment']) {?>
    <div class="ptb20 plr20">
      <?php $_smarty_tpl->_subTemplateRender('file:_need_payment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post_id'=>$_smarty_tpl->tpl_vars['_post']->value['post_id'],'price'=>$_smarty_tpl->tpl_vars['_post']->value['post_price'],'paid_text'=>$_smarty_tpl->tpl_vars['_post']->value['paid_text']), 0, false);
?>
    </div>
  <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['needs_subscription']) {?>
    <div class="ptb20 plr20">
      <?php $_smarty_tpl->_subTemplateRender('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node_type'=>$_smarty_tpl->tpl_vars['_post']->value['needs_subscription_type'],'node_id'=>$_smarty_tpl->tpl_vars['_post']->value['needs_subscription_id'],'price'=>$_smarty_tpl->tpl_vars['_post']->value['needs_subscription_price']), 0, false);
?>
    </div>
  <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['needs_age_verification']) {?>
    <div class="ptb20 plr20">
      <?php $_smarty_tpl->_subTemplateRender('file:_need_age_verification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
  <?php }?>

<?php }
}
}
