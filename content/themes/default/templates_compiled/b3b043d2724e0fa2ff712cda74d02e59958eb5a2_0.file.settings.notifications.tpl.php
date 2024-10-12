<?php
/* Smarty version 4.5.1, created on 2024-09-06 23:32:53
  from '/home/onenetly/public_html/content/themes/default/templates/settings.notifications.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66db9125ac6512_73418282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3b043d2724e0fa2ff712cda74d02e59958eb5a2' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/settings.notifications.tpl',
      1 => 1707304819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 3,
  ),
),false)) {
function content_66db9125ac6512_73418282 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card-header with-icon">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"notifications",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
?>
  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Notifications" ));?>

</div>
<form class="js_ajax-forms" data-url="users/settings.php?edit=notifications">
  <div class="card-body">
    <!-- System Notifications -->
    <div class="heading-small mb20">
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "System Notifications" ));?>

    </div>
    <div class="pl-md-4">
      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat_bell",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Chat Message Sound" ));?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "A sound will be played each time you receive a new message on an inactive chat window" ));?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="chat_sound_settings">
            <input type="checkbox" name="chat_sound" id="chat_sound_settings" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['chat_sound']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"notification_bell",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Notifications Sound" ));?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "A sound will be played each time you receive a new activity notification" ));?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="notifications_sound_settings">
            <input type="checkbox" name="notifications_sound" id="notifications_sound_settings" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['notifications_sound']) {?>checked<?php }?>>
            <span class="slider round"></span>
          </label>
        </div>
      </div>
    </div>
    <!-- System Notifications -->

    <!-- Email Notifications -->
    <?php if ($_smarty_tpl->tpl_vars['email_user_notifications_enabled']->value || $_smarty_tpl->tpl_vars['email_admin_notifications_enabled']->value) {?>
      <div class="divider"></div>
      <div class="heading-small mb20">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Notifications" ));?>

      </div>
      <div class="pl-md-4">
        <div class="row form-group">
          <label class="col-md-2 form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Me When" ));?>
</label>
          <div class="col-md-10">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['email_post_likes']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_post_likes" id="email_post_likes" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_post_likes']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_post_likes"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone reacted to my post" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['email_post_comments']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_post_comments" id="email_post_comments" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_post_comments']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_post_comments"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone commented on my post" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['email_post_shares']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_post_shares" id="email_post_shares" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_post_shares']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_post_shares"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone shared my post" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['email_wall_posts']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_wall_posts" id="email_wall_posts" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_wall_posts']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_wall_posts"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone posted on my timeline" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['email_mentions']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_mentions" id="email_mentions" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_mentions']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_mentions"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone mentioned me" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['email_profile_visits']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_profile_visits" id="email_profile_visits" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_profile_visits']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_profile_visits"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone visited my profile" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['email_friend_requests']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_friend_requests" id="email_friend_requests" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_friend_requests']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_friend_requests"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone sent me/accepted my friend requset" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_requests'] && $_smarty_tpl->tpl_vars['system']->value['email_user_verification']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_user_verification" id="email_user_verification" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_user_verification']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_user_verification"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Admin approved/declined my verification requests" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_approval_enabled'] && $_smarty_tpl->tpl_vars['system']->value['email_user_post_approval']) {?>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="email_user_post_approval" id="email_user_post_approval" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_user_post_approval']) {?>checked<?php }?>>
                <label class="form-check-label" for="email_user_post_approval"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Admin approved my pending posts" ));?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['email_admin_notifications_enabled']->value && ($_smarty_tpl->tpl_vars['user']->value->_is_admin || $_smarty_tpl->tpl_vars['user']->value->_is_moderator)) {?>
              <?php if ($_smarty_tpl->tpl_vars['email_user_notifications_enabled']->value) {?><div class="divider dashed"></div><?php }?>
              <?php if ($_smarty_tpl->tpl_vars['system']->value['email_admin_verifications']) {?>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_admin_verifications" id="email_admin_verifications" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_admin_verifications']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_admin_verifications"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verification request sent by user/page" ));?>
</label>
                </div>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['system']->value['email_admin_post_approval']) {?>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_admin_post_approval" id="email_admin_post_approval" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['email_admin_post_approval']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_admin_post_approval"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Post published and needs approval" ));?>
</label>
                </div>
              <?php }?>
            <?php }?>
          </div>
        </div>
      </div>
    <?php }?>
    <!-- Email Notifications -->

    <!-- success -->
    <div class="alert alert-success mt15 mb0 x-hidden"></div>
    <!-- success -->

    <!-- error -->
    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
    <!-- error -->
  </div>
  <div class="card-footer text-end">
    <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
  </div>
</form><?php }
}
