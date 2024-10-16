<?php
/* Smarty version 4.5.1, created on 2024-09-05 13:45:23
  from '/home/onenetly/public_html/content/themes/default/templates/admin.newsletter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d9b5f34a65d6_97837898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f63dba51e51bb392a18f7de0ecdb6d8d7ae58dc' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/admin.newsletter.tpl',
      1 => 1689526118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
),false)) {
function content_66d9b5f34a65d6_97837898 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <i class="fa fa-paper-plane mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Newsletter" ));?>

  </div>

  <!-- Newsletter -->
  <form class="js_ajax-forms" data-url="admin/newsletter.php">
    <div class="card-body">
      <div class="form-table-row">
        <div class="avatar">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"account_activation",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, false);
?>
        </div>
        <div>
          <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Message" ));?>
</div>
          <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The message will sent to Website Email only" ));?>
</div>
        </div>
        <div class="text-end">
          <label class="switch" for="is_test">
            <input type="checkbox" name="is_test" id="is_test">
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Send to" ));?>

        </label>
        <div class="col-sm-9">
          <select class="form-select" name="to">
            <option value="all_users"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "All Users" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_all'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_activated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who activated their account" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_activated'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_not_activated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who did not activated their account" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_not_activated'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_not_logged_week"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who did not login from 1 week" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_not_logged_week'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_not_logged_month"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who did not login from 1 month" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_not_logged_month'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_not_logged_3_months"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who did not login from 3 months" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_not_logged_3_months'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_not_logged_6_months"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who did not login from 6 months" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_not_logged_6_months'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_not_logged_9_months"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who did not login from 9 months" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_not_logged_9_months'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
            <option value="users_not_logged_year"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users who did not login from 1 year" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['insights']->value['users_not_logged_year'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "user" ));?>
)</option>
          </select>
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Subject" ));?>

        </label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="subject">
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Message" ));?>

        </label>
        <div class="col-sm-9">
          <textarea class="form-control js_wysiwyg-advanced" rows="10" name="message"></textarea>
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
      <button type="submit" class="btn btn-danger">
        <i class="fa fa-paper-plane mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Send" ));?>

      </button>
    </div>
  </form>
  <!-- Newsletter -->

</div><?php }
}
