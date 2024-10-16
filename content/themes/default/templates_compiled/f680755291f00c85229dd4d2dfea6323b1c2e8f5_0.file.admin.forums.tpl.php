<?php
/* Smarty version 4.5.1, created on 2024-09-01 08:05:54
  from '/home/onenetly/public_html/content/themes/default/templates/admin.forums.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d420623f9146_09907427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f680755291f00c85229dd4d2dfea6323b1c2e8f5' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/admin.forums.tpl',
      1 => 1707407558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.forums.recursive_rows.tpl' => 1,
    'file:admin.forums.recursive_options.tpl' => 2,
  ),
),false)) {
function content_66d420623f9146_09907427 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/add_forum" class="btn btn-md btn-primary">
          <i class="fa fa-plus mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Add New Forum" ));?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add_forum" || $_smarty_tpl->tpl_vars['sub_view']->value == "edit_forum") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Go Back" ));?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "find_threads") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/threads" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Go Back" ));?>

        </a>
      </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "find_replies") {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/replies" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Go Back" ));?>

        </a>
      </div>
    <?php }?>
    <i class="fa fa-comments mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Forums" ));?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "add_forum") {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Add New Forum" ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_forum") {?> &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['forum_name'];
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "threads") {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Threads" ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find_threads") {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Threads" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Find" ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "replies") {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Replies" ));
}?>
    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "find_replies") {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Replies" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Find" ));
}?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover js_treegrid">
          <thead>
            <tr>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Title" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Threads" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Order" ));?>
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
                <?php $_smarty_tpl->_subTemplateRender('file:admin.forums.recursive_rows.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
              <tr>
                <td colspan="5" class="text-center">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No data to show" ));?>

                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "add_forum") {?>

    <form class="js_ajax-forms" data-url="admin/forums.php?do=add_forum">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Name" ));?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="forum_name">
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description" ));?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="forum_description"></textarea>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Section" ));?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="forum_section">
              <option value="0" class="text-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Set as a Section" ));?>
</option>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['forums']->value, 'forum');
$_smarty_tpl->tpl_vars['forum']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['forum']->value) {
$_smarty_tpl->tpl_vars['forum']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender('file:admin.forums.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Order" ));?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="forum_order">
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
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit_forum") {?>

    <form class="js_ajax-forms" data-url="admin/forums.php?do=edit_forum&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['forum_id'];?>
">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Name" ));?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="forum_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['forum_name'];?>
">
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description" ));?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="forum_description"><?php echo $_smarty_tpl->tpl_vars['data']->value['forum_description'];?>
</textarea>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Section" ));?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="forum_section">
              <option value="0" class="text-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Set as a Section" ));?>
</option>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['sections'], 'forum');
$_smarty_tpl->tpl_vars['forum']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['forum']->value) {
$_smarty_tpl->tpl_vars['forum']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender('file:admin.forums.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Order" ));?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="forum_order" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['forum_order'];?>
">
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
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "threads" || $_smarty_tpl->tpl_vars['sub_view']->value == "find_threads") {?>

    <div class="card-body">

      <!-- search form -->
      <div class="mb20">
        <form class="d-flex flex-row align-items-center flex-wrap" action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/find_threads" method="get">
          <div class="form-group mb0">
            <div class="input-group">
              <input type="text" class="form-control" name="query">
              <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search" ));?>
</button>
            </div>
          </div>
        </form>
        <div class="form-text small">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search by Thread Title or Text" ));?>

        </div>
      </div>
      <!-- search form -->

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ID" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Author" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Title" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Time" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Link" ));?>
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
                  <td><?php echo $_smarty_tpl->tpl_vars['row']->value['thread_id'];?>
</td>
                  <td>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['thread_author_url'];?>
">
                      <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['thread_author_picture'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['thread_author_name'];?>

                    </a>
                  </td>
                  <td>
                    <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['title'],30);?>
</span>
                  </td>
                  <td><span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
</span></td>
                  <td>
                    <a class="btn btn-sm btn-light" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->tpl_vars['row']->value['thread_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['thread_title_url'];?>
" target="_blank">
                      <i class="fa fa-eye mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "View" ));?>

                    </a>
                  </td>
                  <td>
                    <button data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete" ));?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="forum_thread" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['thread_id'];?>
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

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "replies" || $_smarty_tpl->tpl_vars['sub_view']->value == "find_replies") {?>

    <div class="card-body">

      <!-- search form -->
      <div class="mb20">
        <form class="d-flex flex-row align-items-center flex-wrap" action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/find_replies" method="get">
          <div class="form-group mb0">
            <div class="input-group">
              <input type="text" class="form-control" name="query">
              <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-search mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search" ));?>
</button>
            </div>
          </div>
        </form>
        <div class="form-text small">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search by Reply Text" ));?>

        </div>
      </div>
      <!-- search form -->

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ID" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Author" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Thread" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Time" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Link" ));?>
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
                  <td><?php echo $_smarty_tpl->tpl_vars['row']->value['reply_id'];?>
</td>
                  <td>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['reply_author_url'];?>
">
                      <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['reply_author_picture'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['row']->value['reply_author_name'];?>

                    </a>
                  </td>
                  <td>
                    <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['title'],30);?>
</span>
                  </td>
                  <td><span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['time'];?>
</span></td>
                  <td>
                    <a class="btn btn-sm btn-light" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->tpl_vars['row']->value['thread_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['thread_title_url'];?>
/#reply-<?php echo $_smarty_tpl->tpl_vars['row']->value['reply_id'];?>
" target="_blank">
                      <i class="fa fa-eye mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "View" ));?>

                    </a>
                  </td>
                  <td>
                    <button data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete" ));?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="forum_reply" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['reply_id'];?>
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

  <?php }?>
</div><?php }
}
