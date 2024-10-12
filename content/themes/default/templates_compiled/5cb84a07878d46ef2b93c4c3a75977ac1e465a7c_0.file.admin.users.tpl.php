<?php
/* Smarty version 4.5.1, created on 2024-08-31 12:17:30
  from '/home/onenetly/public_html/content/themes/default/templates/admin.users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d309dae92dd2_12876093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cb84a07878d46ef2b93c4c3a75977ac1e465a7c' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/admin.users.tpl',
      1 => 1710788422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__custom_fields.tpl' => 5,
    'file:__svg_icons.tpl' => 10,
  ),
),false)) {
function content_66d309dae92dd2_12876093 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),2=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
      <div class="float-end">
        <!-- Export CSV -->
        <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-url="#export-csv" data-options='{ "handle": "users" }'>
          <i class="fa-solid fa-file-csv"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Export CSV" ));?>
</span>
        </button>
        <!-- Export CSV -->
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == '' && ($_smarty_tpl->tpl_vars['cug']->value || $_smarty_tpl->tpl_vars['ncug']->value)) {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Go Back" ));?>
</span>
        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "admins") {?>
      <div class="float-end">
        <!-- Export CSV -->
        <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-url="#export-csv" data-options='{ "handle": "admins" }'>
          <i class="fa-solid fa-file-csv"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Export CSV" ));?>
</span>
        </button>
        <!-- Export CSV -->
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "moderators") {?>
      <div class="float-end">
        <!-- Export CSV -->
        <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-url="#export-csv" data-options='{ "handle": "moderators" }'>
          <i class="fa-solid fa-file-csv"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Export CSV" ));?>
</span>
        </button>
        <!-- Export CSV -->
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "banned") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blacklist" class="btn btn-md btn-danger">
          <i class="fa fa-minus-circle"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Manage Banned IPs" ));?>
</span>
        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "stats") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/stats" class="btn btn-md btn-danger">
          <i class="fa-solid fa-arrow-rotate-left"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Reset" ));?>
</span>
        </a>
        <!-- Export CSV -->
        <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-url="#export-csv" data-options='{ "handle": "users_stats", "from": "<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
", "to": "<?php echo $_smarty_tpl->tpl_vars['to']->value;?>
" }'>
          <i class="fa-solid fa-file-csv"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Export CSV" ));?>
</span>
        </button>
        <!-- Export CSV -->
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Go Back" ));?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Go Back" ));?>
</span>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin && $_smarty_tpl->tpl_vars['data']->value['user_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
          <button class="btn btn-md btn-warning js_login-as" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
" data-handle="connect">
            <i class="fa-solid fa-arrow-right-to-bracket"></i><span class="ml5 d-none d-lg-inline-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Login As" ));?>
</span>
          </button>
        <?php }?>
      </div>
    <?php }?>
    <i class="fa fa-user mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users" ));?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '' && $_smarty_tpl->tpl_vars['cug']->value) {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cug']->value['user_group_title']) ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '' && $_smarty_tpl->tpl_vars['ncug']->value) {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Default" ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value != '' && !in_array($_smarty_tpl->tpl_vars['sub_view']->value,array('edit','not_activated'))) {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( smarty_modifier_capitalize($_smarty_tpl->tpl_vars['sub_view']->value) ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "not_activated") {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Not Activated" ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?> &rsaquo; <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_fullname'];?>
</a><?php }?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '' || $_smarty_tpl->tpl_vars['sub_view']->value == "admins" || $_smarty_tpl->tpl_vars['sub_view']->value == "moderators" || $_smarty_tpl->tpl_vars['sub_view']->value == "online" || $_smarty_tpl->tpl_vars['sub_view']->value == "banned" || $_smarty_tpl->tpl_vars['sub_view']->value == "not_activated" || $_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>

    <div class="card-body">

      <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
        <div class="row">
          <div class="col-sm-4">
            <div class="stat-panel bg-gradient-primary">
              <div class="stat-cell narrow">
                <i class="fa fa-users bg-icon"></i>
                <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['users'];?>
</span><br>
                <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users" ));?>
</span><br>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="stat-panel bg-gradient-red">
              <div class="stat-cell narrow">
                <i class="fa fa-minus-circle bg-icon"></i>
                <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['banned'];?>
</span><br>
                <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Banned" ));?>
</span><br>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="stat-panel bg-gradient-warning">
              <div class="stat-cell narrow">
                <i class="fa fa-envelope bg-icon"></i>
                <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['not_activated'];?>
</span><br>
                <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Not Activated" ));?>
</span><br>
              </div>
            </div>
          </div>
        </div>
      <?php }?>

      <!-- search form -->
      <div class="mb20">
        <form class="d-flex flex-row align-items-center flex-wrap" action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/find" method="get">
          <div class="form-group mb0">
            <div class="input-group">
              <input type="text" class="form-control" name="query">
              <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search" ));?>
</button>
            </div>
          </div>
        </form>
        <div class="form-text small">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search by Username, First Name, Last Name, Email or Phone" ));?>

        </div>
      </div>
      <!-- search form -->

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ID" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Name" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Username" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Joined" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Activated" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Actions" ));?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                  <td><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
</a></td>
                  <td>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
">
                      <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_picture'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['user_lastname'];?>

                    </a>
                  </td>
                  <td>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
" target="_blank">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>

                    </a>
                  </td>
                  <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['user_registered'],"%e %B %Y");?>
</td>
                  <td>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['user_activated']) {?>
                      <span class="badge rounded-pill badge-lg bg-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Yes" ));?>
</span>
                    <?php } else { ?>
                      <span class="badge rounded-pill badge-lg bg-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No" ));?>
</span>
                    <?php }?>
                  </td>
                  <td>
                    <a data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit" ));?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <button data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete" ));?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
">
                      <i class="fa fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
              <tr>
                <td colspan="6" class="text-center">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No data to show" ));?>

                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "stats") {?>

    <div class="card-body">

      <!-- search & data range forms -->
      <div class="row">
        <!-- search form -->
        <div class="col-xl-6 mb20">
          <form class="d-flex flex-row align-items-center flex-wrap js_search-forms" method="get">
            <div class="form-group mb0">
              <div class="input-group">
                <input type="text" class="form-control" name="query" value="<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
">
                <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search" ));?>
</button>
              </div>
            </div>
          </form>
          <div class="form-text small">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search by Username, First Name, Last Name, Email or Phone" ));?>

          </div>
        </div>
        <!-- search form -->

        <!-- data range form -->
        <div class="col-xl-6 mb20">
          <form class="d-flex flex-row align-items-center flex-wrap" action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/stats" method="get">
            <div class="form-group mb0">
              <div class="input-group">
                <input type="date" class="form-control" name="from" value="<?php echo $_smarty_tpl->tpl_vars['from']->value;?>
" placeholder="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "From" ));?>
" required>
                <input type="date" class="form-control" name="to" value="<?php echo $_smarty_tpl->tpl_vars['to']->value;?>
" placeholder="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "To" ));?>
" required>
                <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-filter mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Filter" ));?>
</button>
              </div>
            </div>
          </form>
          <div class="form-text small">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select date range to filter the results by posts count" ));?>

          </div>
        </div>
        <!-- data range form -->
      </div>
      <!-- search & data range forms -->

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ID" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Name" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Username" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Date Range" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Posts Count" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Actions" ));?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                  <td><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
</a></td>
                  <td>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
">
                      <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_picture'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['user_lastname'];?>

                    </a>
                  </td>
                  <td>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
" target="_blank">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>

                    </a>
                  </td>
                  <td>
                    <?php if ($_smarty_tpl->tpl_vars['from']->value && $_smarty_tpl->tpl_vars['to']->value) {?>
                      <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['from']->value,"%e %b %Y");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['to']->value,"%e %b %Y");?>

                    <?php } else { ?>
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "All Time" ));?>

                    <?php }?>
                  </td>
                  <td>
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['posts_count'];?>

                  </td>
                  <td>
                    <a data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit" ));?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <button data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete" ));?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
">
                      <i class="fa fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
              <tr>
                <td colspan="6" class="text-center">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No data to show" ));?>

                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>

    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-2 text-center mb20">
          <img class="img-fluid img-thumbnail rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_picture'];?>
">
        </div>
        <div class="col-12 col-md-5 mb20">
          <ul class="list-group">
            <li class="list-group-item">
              <span class="float-end badge badge-lg rounded-pill bg-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
</span>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "User ID" ));?>

            </li>
            <li class="list-group-item">
              <span class="float-end badge badge-lg rounded-pill bg-secondary"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['user_registered'],"%e %B %Y");?>
</span>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Joined" ));?>

            </li>
            <li class="list-group-item">
              <span class="float-end badge badge-lg rounded-pill bg-secondary"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['user_last_seen'],"%e %B %Y");?>
</span>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Last Login" ));?>

            </li>
          </ul>
        </div>
        <div class="col-12 col-md-5 mb20">
          <ul class="list-group">
            <li class="list-group-item">
              <span class="float-end badge badge-lg rounded-pill bg-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['friends'];?>
</span>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

            </li>
            <li class="list-group-item">
              <span class="float-end badge badge-lg rounded-pill bg-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['followings'];?>
</span>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Followings" ));?>

            </li>
            <li class="list-group-item">
              <span class="float-end badge badge-lg rounded-pill bg-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['followers'];?>
</span>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Followers" ));?>

            </li>
          </ul>
        </div>
      </div>

      <!-- tabs nav -->
      <ul class="nav nav-tabs mb20">
        <li class="nav-item">
          <a class="nav-link active" href="#account" data-bs-toggle="tab">
            <i class="fa fa-cog fa-fw mr5"></i><strong class="mr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Account" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#profile" data-bs-toggle="tab">
            <i class="fa fa-user fa-fw mr5"></i><strong class="mr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Profile" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#privacy" data-bs-toggle="tab">
            <i class="fa fa-lock fa-fw mr5"></i><strong class="mr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Privacy" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#security" data-bs-toggle="tab">
            <i class="fa fa-shield-alt fa-fw mr5"></i><strong class="mr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Security" ));?>
</strong>
          </a>
        </li>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled']) {?>
          <li class="nav-item">
            <a class="nav-link" href="#membership" data-bs-toggle="tab">
              <i class="fa fa-id-card fa-fw mr5"></i><strong class="mr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Membership" ));?>
</strong>
            </a>
          </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['wallet_enabled'] || $_smarty_tpl->tpl_vars['system']->value['points_enabled']) {?>
          <li class="nav-item">
            <a class="nav-link" href="#extra" data-bs-toggle="tab">
              <i class="fa fa-cubes fa-fw mr5"></i><strong class="mr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Extra" ));?>
</strong>
            </a>
          </li>
        <?php }?>
      </ul>
      <!-- tabs nav -->

      <!-- tabs content -->
      <div class="tab-content">
        <!-- account tab -->
        <div class="tab-pane active" id="account">
          <form class="js_ajax-forms" data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_account">
            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verified User" ));?>

              </label>
              <div class="col-md-9">
                <label class="switch" for="user_verified">
                  <input type="checkbox" name="user_verified" id="user_verified" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_verified']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Banned" ));?>

              </label>
              <div class="col-md-9">
                <label class="switch" for="user_banned">
                  <input type="checkbox" name="user_banned" id="user_banned" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_banned']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Ban Message" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="user_banned_message"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_banned_message'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The message that is presented on this profile, if empty 404 error will be used instead" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Account Activated" ));?>

              </label>
              <div class="col-md-9">
                <label class="switch" for="user_activated">
                  <input type="checkbox" name="user_activated" id="user_activated" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_activated']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
                <div class="form-text">
                  <?php if (!$_smarty_tpl->tpl_vars['system']->value['activation_enabled']) {?>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Account activation disabled from your system" ));?>
 <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/registration"><?php ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Registration Settings" ));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</a>
                  <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "email") {?>
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Account activation enabled from your system settings by" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email" ));?>

                    <?php } else { ?>
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Account activation enabled from your system settings by" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS" ));?>

                    <?php }?>
                  <?php }?>
                </div>
              </div>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled'] && $_smarty_tpl->tpl_vars['data']->value['user_two_factor_enabled']) {?>
              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Two-Factor Authentication" ));?>

                </label>
                <div class="col-md-9">
                  <label class="switch" for="user_two_factor_enabled">
                    <input type="checkbox" name="user_two_factor_enabled" id="user_two_factor_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_two_factor_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
            <?php }?>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Demo Account" ));?>

              </label>
              <div class="col-md-9">
                <label class="switch" for="user_demo">
                  <input type="checkbox" name="user_demo" id="user_demo" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_demo']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If demo mode enabled this user will not be able to do anything" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "User Group" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="user_group">
                  <option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_group'] == '1') {?>selected<?php }?>>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Administrators" ));?>

                  </option>
                  <option value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_group'] == '2') {?>selected<?php }?>>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Moderators" ));?>

                  </option>
                  <option value="3" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_group'] == '3' && !$_smarty_tpl->tpl_vars['data']->value['user_group_custom']) {?>selected<?php }?>>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users" ));?>

                  </option>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['user_groups'], 'user_group');
$_smarty_tpl->tpl_vars['user_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user_group']->value) {
$_smarty_tpl->tpl_vars['user_group']->do_else = false;
?>
                    <option value="cusg_<?php echo $_smarty_tpl->tpl_vars['user_group']->value['user_group_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_group_custom'] == $_smarty_tpl->tpl_vars['user_group']->value['user_group_id']) {?>selected<?php }?>>
                      <?php echo $_smarty_tpl->tpl_vars['user_group']->value['user_group_title'];?>

                    </option>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If user subscribed to a package so this package permissions will be used instead" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Username" ));?>

              </label>
              <div class="col-md-9">
                <div class="input-group">
                  <span class="input-group-text d-none d-sm-block"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/</span>
                  <input type="text" class="form-control" name="user_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_name'];?>
">
                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Address" ));?>

              </label>
              <div class="col-md-9">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="text" class="form-control" name="user_email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_email'];?>
">
                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Verified" ));?>

              </label>
              <div class="col-md-9">
                <label class="switch" for="user_email_verified">
                  <input type="checkbox" name="user_email_verified" id="user_email_verified" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_email_verified']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <?php if (($_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && $_smarty_tpl->tpl_vars['system']->value['activation_type'] == "sms") || ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled'] && $_smarty_tpl->tpl_vars['system']->value['two_factor_type'] == "sms")) {?>
              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Phone Number" ));?>

                </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="user_phone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_phone'];?>
">
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Phone number (eg. +905...)" ));?>

                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Phone Verified" ));?>

                </label>
                <div class="col-md-9">
                  <label class="switch" for="user_phone_verified">
                    <input type="checkbox" name="user_phone_verified" id="user_phone_verified" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_phone_verified']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
            <?php }?>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Password" ));?>

              </label>
              <div class="col-md-9">
                <input type="password" class="form-control" name="user_password">
              </div>
            </div>

            <!-- success -->
            <div class="alert alert-success mb0 mt20 x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger mb0 mt20 x-hidden"></div>
            <!-- error -->

            <div class="card-footer-fake text-end">
              <button type="button" class="btn btn-danger js_admin-deleter" data-handle="user_posts" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
" data-delete-message="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Are you sure you want to delete all posts?" ));?>
">
                <i class="fa fa-trash-alt mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete Posts" ));?>

              </button>
              <button type="button" class="btn btn-danger js_admin-deleter" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
" data-redirect="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users">
                <i class="fa fa-trash-alt mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete User" ));?>

              </button>
              <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
            </div>
          </form>
        </div>
        <!-- account tab -->

        <!-- profile tab -->
        <div class="tab-pane" id="profile">
          <form class="js_ajax-forms" data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_profile">
            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Basic" ));?>

            </div>
            <div class="pl-md-4">
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "First Name" ));?>
</label>
                  <input class="form-control" name="user_firstname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_firstname'];?>
">
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Last Name" ));?>
</label>
                  <input class="form-control" name="user_lastname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_lastname'];?>
">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "I am" ));?>
</label>
                  <select class="form-select" name="user_gender">
                    <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Sex" ));?>
:</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genders']->value, 'gender');
$_smarty_tpl->tpl_vars['gender']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gender']->value) {
$_smarty_tpl->tpl_vars['gender']->do_else = false;
?>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_gender'] == $_smarty_tpl->tpl_vars['gender']->value['gender_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_name'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Relationship Status" ));?>
</label>
                  <select class="form-select" name="user_relationship">
                    <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Relationship" ));?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "single") {?>selected<?php }?> value="single"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Single" ));?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "relationship") {?>selected<?php }?> value="relationship"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "In a relationship" ));?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "married") {?>selected<?php }?> value="married"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Married" ));?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "complicated") {?>selected<?php }?> value="complicated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "It's complicated" ));?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "separated") {?>selected<?php }?> value="separated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Separated" ));?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "divorced") {?>selected<?php }?> value="divorced"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Divorced" ));?>
</option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "widowed") {?>selected<?php }?> value="widowed"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Widowed" ));?>
</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Country" ));?>
</label>
                  <select class="form-select" name="user_country">
                    <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Country" ));?>
</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_country'] == $_smarty_tpl->tpl_vars['country']->value['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['country']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website" ));?>
</label>
                  <input type="text" class="form-control" name="user_website" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_website'];?>
">
                </div>
              </div>

              <div class="form-group">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Birthdate" ));?>
</label>
                <div class="row">
                  <div class="col">
                    <select class="form-select" name="birth_month">
                      <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Month" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '1') {?>selected<?php }?> value="1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jan" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '2') {?>selected<?php }?> value="2"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Feb" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '3') {?>selected<?php }?> value="3"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mar" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '4') {?>selected<?php }?> value="4"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Apr" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '5') {?>selected<?php }?> value="5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "May" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '6') {?>selected<?php }?> value="6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jun" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '7') {?>selected<?php }?> value="7"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jul" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '8') {?>selected<?php }?> value="8"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Aug" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '9') {?>selected<?php }?> value="9"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sep" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '10') {?>selected<?php }?> value="10"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Oct" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '11') {?>selected<?php }?> value="11"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Nov" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '12') {?>selected<?php }?> value="12"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Dec" ));?>
</option>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-select" name="birth_day">
                      <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Day" ));?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['day'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                      <?php }
}
?>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-select" name="birth_year">
                      <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Year" ));?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2015+1 - (1905) : 1905-(2015)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1905, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['year'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                      <?php }
}
?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "About Me" ));?>
</label>
                <textarea class="form-control" name="user_biography"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_biography'];?>
</textarea>
              </div>

              <!-- custom fields -->
              <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['basic']) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['basic'],'_registration'=>false), 0, false);
?>
              <?php }?>
              <!-- custom fields -->
            </div>

            <div class="divider"></div>

            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work" ));?>

            </div>
            <div class="pl-md-4">
              <div class="form-group">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Title" ));?>
</label>
                <input type="text" class="form-control" name="user_work_title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_work_title'];?>
">
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Place" ));?>
</label>
                  <input type="text" class="form-control" name="user_work_place" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_work_place'];?>
">
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Website" ));?>
</label>
                  <input type="text" class="form-control" name="user_work_url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_work_url'];?>
">
                </div>
              </div>

              <!-- custom fields -->
              <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['work']) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['work'],'_registration'=>false), 0, true);
?>
              <?php }?>
              <!-- custom fields -->
            </div>

            <div class="divider"></div>

            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Location" ));?>

            </div>
            <div class="pl-md-4">
              <div class="form-group">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Current City" ));?>
</label>
                <input type="text" class="form-control" name="user_current_city" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_current_city'];?>
">
              </div>

              <div class="form-group">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hometown" ));?>
</label>
                <input type="text" class="form-control" name="user_hometown" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_hometown'];?>
">
              </div>

              <!-- custom fields -->
              <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['location']) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['location'],'_registration'=>false), 0, true);
?>
              <?php }?>
              <!-- custom fields -->
            </div>

            <div class="divider"></div>

            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Education" ));?>

            </div>
            <div class="pl-md-4">
              <div class="form-group">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "School" ));?>
</label>
                <input type="text" class="form-control" name="user_edu_school" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_edu_school'];?>
">
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Major" ));?>
</label>
                  <input type="text" class="form-control" name="user_edu_major" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_edu_major'];?>
">
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Class" ));?>
</label>
                  <input type="text" class="form-control" name="user_edu_class" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_edu_class'];?>
">
                </div>
              </div>

              <!-- custom fields -->
              <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['education']) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['education'],'_registration'=>false), 0, true);
?>
              <?php }?>
              <!-- custom fields -->
            </div>

            <div class="divider"></div>

            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Social Links" ));?>

            </div>
            <div class="pl-md-4">
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook Profile URL" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text bg-transparent">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'width'=>"24px",'height'=>"24px"), 0, false);
?>
                    </span>
                    <input type="text" class="form-control" name="facebook" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_facebook'];?>
">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "X Profile URL" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text bg-transparent">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    </span>
                    <input type="text" class="form-control" name="twitter" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_twitter'];?>
">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "YouTube Profile URL" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text bg-transparent">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"youtube",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    </span>
                    <input type="text" class="form-control" name="youtube" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_youtube'];?>
">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Instagram Profile URL" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text bg-transparent">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"instagram",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    </span>
                    <input type="text" class="form-control" name="instagram" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_instagram'];?>
">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "LinkedIn Profile URL" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text bg-transparent">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    </span>
                    <input type="text" class="form-control" name="linkedin" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_linkedin'];?>
">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte Profile URL" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text bg-transparent">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'width'=>"24px",'height'=>"24px"), 0, true);
?>
                    </span>
                    <input type="text" class="form-control" name="vkontakte" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_vkontakte'];?>
">
                  </div>
                </div>
              </div>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
              <div class="divider"></div>
              <div class="heading-small mb20">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Other" ));?>

              </div>
              <div class="pl-md-4">
                <!-- custom fields -->
                <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
                  <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['other'],'_registration'=>false), 0, true);
?>
                <?php }?>
                <!-- custom fields -->
              </div>
            <?php }?>

            <!-- success -->
            <div class="alert alert-success x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger x-hidden"></div>
            <!-- error -->

            <div class="card-footer-fake text-end">
              <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
            </div>
          </form>
        </div>
        <!-- profile tab -->

        <!-- privacy tab -->
        <div class="tab-pane" id="privacy">
          <form class="js_ajax-forms" data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_privacy">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Chat Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If chat disabled you will appear offline and will no see who is online too" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="user_chat_enabled">
                    <input type="checkbox" name="user_chat_enabled" id="user_chat_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_chat_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
            <?php }?>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"account_activation",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email you with our newsletter" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "From time to time we send newsletter email to all of our members" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="user_newsletter_enabled">
                  <input type="checkbox" name="user_newsletter_enabled" id="user_newsletter_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_newsletter_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['system']->value['tips_enabled']) {?>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"tip",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Tips Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow the send tips button on your profile" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="user_tips_enabled">
                    <input type="checkbox" name="user_tips_enabled" id="user_tips_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_tips_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
            <?php }?>

            <div class="row">
              <?php if ($_smarty_tpl->tpl_vars['system']->value['pokes_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can poke you" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-hand-point-right"></i></span>
                    <select class="form-select" name="user_privacy_poke">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_poke'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_poke'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_poke'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No One" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['gifts_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can send you gifts" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-gift"></i></span>
                    <select class="form-select" name="user_privacy_gifts">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gifts'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gifts'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gifts'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No One" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['wall_posts_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can post on your wall" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-newspaper"></i></span>
                    <select class="form-select" name="user_privacy_wall">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_wall'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_wall'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_wall'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <div class="form-group col-md-6">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "gender" ));?>
</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                  <select class="form-select" name="user_privacy_gender">
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gender'] == "public") {?>selected<?php }?> value="public">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gender'] == "friends") {?>selected<?php }?> value="friends">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gender'] == "me") {?>selected<?php }?> value="me">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                    </option>
                  </select>
                </div>
              </div>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['relationship_info_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "relationship" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-heart"></i></span>
                    <select class="form-select" name="user_privacy_relationship">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_relationship'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_relationship'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_relationship'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <div class="form-group col-md-6">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "birthdate" ));?>
</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                  <select class="form-select" name="user_privacy_birthdate">
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_birthdate'] == "public") {?>selected<?php }?> value="public">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_birthdate'] == "friends") {?>selected<?php }?> value="friends">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_birthdate'] == "me") {?>selected<?php }?> value="me">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "basic info" ));?>
</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  <select class="form-select" name="user_privacy_basic">
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_basic'] == "public") {?>selected<?php }?> value="public">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_basic'] == "friends") {?>selected<?php }?> value="friends">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_basic'] == "me") {?>selected<?php }?> value="me">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                    </option>
                  </select>
                </div>
              </div>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['work_info_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "work info" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                    <select class="form-select" name="user_privacy_work">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_work'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_work'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_work'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['location_info_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "location info" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <select class="form-select" name="user_privacy_location">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_location'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_location'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_location'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['education_info_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "education info" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                    <select class="form-select" name="user_privacy_education">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_education'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_education'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_education'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <div class="form-group col-md-6">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "other info" ));?>
</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-folder-plus"></i></span>
                  <select class="form-select" name="user_privacy_other">
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_other'] == "public") {?>selected<?php }?> value="public">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_other'] == "friends") {?>selected<?php }?> value="friends">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_other'] == "me") {?>selected<?php }?> value="me">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "friends" ));?>
</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  <select class="form-select" name="user_privacy_friends">
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_friends'] == "public") {?>selected<?php }?> value="public">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_friends'] == "friends") {?>selected<?php }?> value="friends">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_friends'] == "me") {?>selected<?php }?> value="me">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "followers/followings" ));?>
</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  <select class="form-select" name="user_privacy_followers">
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_followers'] == "public") {?>selected<?php }?> value="public">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_followers'] == "friends") {?>selected<?php }?> value="friends">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_followers'] == "me") {?>selected<?php }?> value="me">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                    </option>
                  </select>
                </div>
              </div>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "subscriptions" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                    <select class="form-select" name="user_privacy_subscriptions">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_subscriptions'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_subscriptions'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_subscriptions'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <div class="form-group col-md-6">
                <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "photos" ));?>
</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-images"></i></span>
                  <select class="form-select" name="user_privacy_photos">
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_photos'] == "public") {?>selected<?php }?> value="public">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_photos'] == "friends") {?>selected<?php }?> value="friends">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                    </option>
                    <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_photos'] == "me") {?>selected<?php }?> value="me">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                    </option>
                  </select>
                </div>
              </div>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "liked pages" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-flag"></i></span>
                    <select class="form-select" name="user_privacy_pages">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_pages'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_pages'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_pages'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "joined groups" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                    <select class="form-select" name="user_privacy_groups">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_groups'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_groups'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_groups'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['system']->value['events_enabled']) {?>
                <div class="form-group col-md-6">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Who can see your" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "joined events" ));?>
</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <select class="form-select" name="user_privacy_events">
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_events'] == "public") {?>selected<?php }?> value="public">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Everyone" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_events'] == "friends") {?>selected<?php }?> value="friends">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>

                      </option>
                      <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_events'] == "me") {?>selected<?php }?> value="me">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Just Me" ));?>

                      </option>
                    </select>
                  </div>
                </div>
              <?php }?>
            </div>

            <!-- success -->
            <div class="alert alert-success x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger x-hidden"></div>
            <!-- error -->

            <div class="card-footer-fake text-end">
              <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
            </div>
          </form>
        </div>
        <!-- privacy tab -->

        <!-- security tab -->
        <div class="tab-pane" id="security">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover js_dataTable" style="width: 100%!important;">
              <thead>
                <tr>
                  <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ID" ));?>
</th>
                  <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Browser" ));?>
</th>
                  <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "OS" ));?>
</th>
                  <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Date" ));?>
</th>
                  <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "IP" ));?>
</th>
                  <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Actions" ));?>
</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo'] && $_smarty_tpl->tpl_vars['data']->value['sessions']) {?>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['sessions'], 'session');
$_smarty_tpl->tpl_vars['session']->iteration = 0;
$_smarty_tpl->tpl_vars['session']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['session']->value) {
$_smarty_tpl->tpl_vars['session']->do_else = false;
$_smarty_tpl->tpl_vars['session']->iteration++;
$__foreach_session_5_saved = $_smarty_tpl->tpl_vars['session'];
?>
                    <tr>
                      <td><?php echo $_smarty_tpl->tpl_vars['session']->iteration;?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['session']->value['user_browser'];?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['session']->value['user_os'];?>
</td>
                      <td>
                        <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['session']->value['session_date'];?>
"><?php echo $_smarty_tpl->tpl_vars['session']->value['session_date'];?>
</span>
                      </td>
                      <td><?php echo $_smarty_tpl->tpl_vars['session']->value['user_ip'];?>
</td>
                      <td>
                        <button data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "End Session" ));?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="session" data-id="<?php echo $_smarty_tpl->tpl_vars['session']->value['session_id'];?>
">
                          <i class="fa fa-trash-alt"></i>
                        </button>
                      </td>
                    </tr>
                  <?php
$_smarty_tpl->tpl_vars['session'] = $__foreach_session_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- security tab -->

        <!-- membership tab -->
        <div class="tab-pane" id="membership">
          <form class="js_ajax-forms" data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_membership">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['user_subscribed']) {?>
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
                      <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['data']->value['price'] ));?>

                      <?php if ($_smarty_tpl->tpl_vars['data']->value['period'] == "life") {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Life Time" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "per" ));?>
 <?php if ($_smarty_tpl->tpl_vars['data']->value['period_num'] != '1') {
echo $_smarty_tpl->tpl_vars['data']->value['period_num'];
}?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['data']->value['period'] )) ));
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
                      <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['user_subscription_date'],"%e %B %Y");?>

                    </p>
                  </div>
                </div>

                <div class="row form-group">
                  <label class="col-md-3 form-label">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Expiration Date" ));?>

                  </label>
                  <div class="col-md-9">
                    <p class="form-control-plaintext">
                      <?php if ($_smarty_tpl->tpl_vars['data']->value['period'] == "life") {?>
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Life Time" ));?>

                      <?php } else { ?>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['subscription_end'],"%e %B %Y");?>
 (<?php if ($_smarty_tpl->tpl_vars['data']->value['subscription_timeleft'] > 0) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remaining" ));?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['subscription_timeleft'];?>
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
                      <?php echo $_smarty_tpl->tpl_vars['data']->value['user_boosted_posts'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['boost_posts'];?>

                    </p>

                    <div class="progress mb5">
                      <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php if ($_smarty_tpl->tpl_vars['data']->value['boost_posts'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_posts']/$_smarty_tpl->tpl_vars['data']->value['boost_posts'])*100;
}?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if ($_smarty_tpl->tpl_vars['data']->value['boost_posts'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_posts']/$_smarty_tpl->tpl_vars['data']->value['boost_posts'])*100;
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
                      <?php echo $_smarty_tpl->tpl_vars['data']->value['user_boosted_pages'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['boost_pages'];?>

                    </p>

                    <div class="progress mb5">
                      <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php if ($_smarty_tpl->tpl_vars['data']->value['boost_pages'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_pages']/$_smarty_tpl->tpl_vars['data']->value['boost_pages'])*100;
}?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php if ($_smarty_tpl->tpl_vars['data']->value['boost_pages'] == 0) {?>0<?php } else {
echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_pages']/$_smarty_tpl->tpl_vars['data']->value['boost_pages'])*100;
}?>%"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-9 offset-md-3">
                    <button type="button" class="btn btn-danger js_admin-deleter" data-handle="user_package" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
">
                      <i class="fa fa-trash-alt mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unsubscribe" ));?>

                    </button>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
            <?php }?>

            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Upgrade Package" ));?>

            </div>
            <div class="pl-md-4">
              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Package" ));?>

                </label>
                <div class="col-md-9">
                  <select class="form-select" name="package">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packages']->value, 'package');
$_smarty_tpl->tpl_vars['package']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package']->value) {
$_smarty_tpl->tpl_vars['package']->do_else = false;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['package']->value['package_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_package'] == $_smarty_tpl->tpl_vars['package']->value['package_id']) {?>selected<?php }?>>
                        <?php echo $_smarty_tpl->tpl_vars['package']->value['name'];?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['package']->value['price'] ));?>

                        <?php if ($_smarty_tpl->tpl_vars['package']->value['period'] == "life") {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Life Time" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "per" ));?>
 <?php if ($_smarty_tpl->tpl_vars['package']->value['period_num'] != '1') {
echo $_smarty_tpl->tpl_vars['package']->value['period_num'];
}?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['package']->value['period'] )) ));
}?>)
                      </option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                </div>
              </div>
            </div>

            <!-- success -->
            <div class="alert alert-success mb0 mt20 x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger mb0 mt20 x-hidden"></div>
            <!-- error -->

            <div class="card-footer-fake text-end">
              <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
            </div>
          </form>
        </div>
        <!-- membership tab -->

        <!-- extra tab -->
        <div class="tab-pane" id="extra">
          <form class="js_ajax-forms" data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_extra">
            <!-- Points -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['points_enabled']) {?>
              <div class="heading-small mb20">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>

              </div>
              <div class="pl-md-4">
                <div class="row">
                  <label class="col-md-3 form-label">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points Balance" ));?>

                  </label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <span class="input-group-text"><i class="fa fa-piggy-bank"></i></span>
                      <input class="form-control" name="user_points" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_points'];?>
">
                    </div>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
            <?php }?>
            <!-- Points -->

            <!-- Wallet -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['wallet_enabled']) {?>
              <div class="heading-small mb20">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Wallet" ));?>

              </div>
              <div class="pl-md-4">
                <div class="row">
                  <label class="col-md-3 form-label">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Wallet Balance" ));?>

                  </label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <?php if ($_smarty_tpl->tpl_vars['system']->value['system_currency_dir'] == "left") {?>
                        <span class="input-group-text"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span>
                      <?php }?>
                      <input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="user_wallet_balance" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_wallet_balance'];?>
">
                      <?php if ($_smarty_tpl->tpl_vars['system']->value['system_currency_dir'] == "right") {?>
                        <span class="input-group-text"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
            <?php }?>
            <!-- Wallet -->

            <!-- Marketplace -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['market_enabled']) {?>
              <div class="heading-small mb20">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Marketplace" ));?>

              </div>
              <div class="pl-md-4">
                <div class="row">
                  <label class="col-md-3 form-label">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Marketplace Balance" ));?>

                  </label>
                  <div class="col-md-9">
                    <h6>
                      <span class="badge badge-lg bg-light text-primary">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['data']->value['user_market_balance'],2) ));?>

                      </span>
                    </h6>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
            <?php }?>
            <!-- Marketplace -->

            <!-- Funding -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['funding_enabled']) {?>
              <div class="heading-small mb20">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Funding" ));?>

              </div>
              <div class="pl-md-4">
                <div class="row">
                  <label class="col-md-3 form-label">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Funding Balance" ));?>

                  </label>
                  <div class="col-md-9">
                    <h6>
                      <span class="badge badge-lg bg-light text-primary">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['data']->value['user_funding_balance'],2) ));?>

                      </span>
                    </h6>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
            <?php }?>
            <!-- Funding -->

            <!-- Monetization -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_enabled']) {?>
              <div class="heading-small mb20">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Monetization" ));?>

              </div>
              <?php if ($_smarty_tpl->tpl_vars['data']->value['can_monetize_content']) {?>
                <div class="pl-md-4">
                  <div class="form-table-row">
                    <div class="avatar">
                      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                    </div>
                    <div>
                      <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Monetization" ));?>
</div>
                      <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable or disable monetization for your content" ));?>
</div>
                    </div>
                    <div class="text-end">
                      <label class="switch" for="user_monetization_enabled">
                        <input type="checkbox" name="user_monetization_enabled" id="user_monetization_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_monetization_enabled']) {?>checked<?php }?>>
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>

                  <div class="row mb30">
                    <label class="col-md-3 form-label">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payment Plans" ));?>

                    </label>
                    <div class="col-md-9">
                      <div class="payment-plans">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['monetization_plans']->value, 'plan');
$_smarty_tpl->tpl_vars['plan']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
$_smarty_tpl->tpl_vars['plan']->do_else = false;
?>
                          <div class="payment-plan">
                            <div class="text-xxlg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['plan']->value['title'] ));?>
</div>
                            <div class="text-xlg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['plan']->value['price'] ));?>
 / <?php if ($_smarty_tpl->tpl_vars['plan']->value['period_num'] != '1') {
echo $_smarty_tpl->tpl_vars['plan']->value['period_num'];
}?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['plan']->value['period'] )) ));?>
</div>
                            <?php ob_start();
echo $_smarty_tpl->tpl_vars['plan']->value['custom_description'];
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {?>
                              <div><?php echo $_smarty_tpl->tpl_vars['plan']->value['custom_description'];?>
</div>
                            <?php }?>
                            <div class="mt10">
                              <span class="text-link mr10 js_monetization-deleter" data-id="<?php echo $_smarty_tpl->tpl_vars['plan']->value['plan_id'];?>
">
                                <i class="fa fa-trash-alt mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete" ));?>

                              </span>
                              |
                              <span data-toggle="modal" data-url="monetization/controller.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['plan']->value['plan_id'];?>
" class="text-link ml10">
                                <i class="fa fa-pen mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit" ));?>

                              </span>
                            </div>
                          </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <div data-toggle="modal" data-url="monetization/controller.php?do=add&node_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&node_type=profile" class="payment-plan new"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Add new plan" ));?>
 </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-md-3 form-label">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Monetization Balance" ));?>

                    </label>
                    <div class="col-md-9">
                      <h6>
                        <span class="badge badge-lg bg-light text-primary">
                          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['data']->value['user_monetization_balance'],2) ));?>

                        </span>
                      </h6>
                    </div>
                  </div>
                </div>
              <?php } else { ?>
                <div class="pl-md-4">
                  <div class="alert alert-danger">
                    <div class="icon">
                      <i class="fa fa-minus-circle fa-2x"></i>
                    </div>
                    <div class="text pt5">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "This user is not eligible for monetization" ));?>

                    </div>
                  </div>
                </div>
              <?php }?>
            <?php }?>
            <!-- Monetization -->

            <!-- success -->
            <div class="alert alert-success mb0 mt20 x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger mb0 mt20 x-hidden"></div>
            <!-- error -->

            <div class="card-footer-fake text-end">
              <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
            </div>
          </form>
        </div>
        <!-- extra tab -->
      </div>
      <!-- tabs content -->
    </div>

  <?php }?>
</div><?php }
}
