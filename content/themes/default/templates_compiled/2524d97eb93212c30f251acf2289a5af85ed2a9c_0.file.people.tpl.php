<?php
/* Smarty version 4.5.1, created on 2024-08-31 08:30:40
  from '/home/onenetly/public_html/content/themes/default/templates/people.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2d4b0ccbb41_00515487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2524d97eb93212c30f251acf2289a5af85ed2a9c' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/people.tpl',
      1 => 1699255769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__feeds_user.tpl' => 4,
    'file:__custom_fields.tpl' => 1,
    'file:_ads_campaigns.tpl' => 1,
    'file:_ads.tpl' => 1,
    'file:_widget.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_66d2d4b0ccbb41_00515487 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="<?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> mt20 sg-offcanvas">
  <div class="row">

    <!-- left panel -->
    <div class="col-md-4 col-lg-3 sg-offcanvas-sidebar js_sticky-sidebar">
      <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    <!-- left panel -->

    <!-- content panel -->
    <div class="col-md-8 col-lg-9 sg-offcanvas-mainbar">

      <!-- tabs -->
      <div class="content-tabs rounded-sm shadow-sm clearfix">
        <ul>
          <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '' || $_smarty_tpl->tpl_vars['view']->value == "find") {?>class="active" <?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Discover" ));?>
</a>
          </li>
          <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "friend_requests") {?>class="active" <?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friend Requests" ));?>

              <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) {?>
                <span class="badge badge-lg bg-info ml5"><?php echo smarty_modifier_count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']);?>
</span>
              <?php }?>
            </a>
          </li>
          <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "sent_requests") {?>class="active" <?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/sent_requests">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sent Requests" ));?>

              <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent_total']) {?>
                <span class="badge badge-lg bg-warning ml5"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent_total'];?>
</span>
              <?php }?>
            </a>
          </li>
        </ul>
      </div>
      <!-- tabs -->

      <!-- content -->
      <div class="row">
        <!-- left panel -->
        <div class="col-lg-8">
          <div class="card">

            <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
              <div class="card-header bg-transparent">
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "People You May Know" ));?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['people']->value) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"add"), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>

                  <!-- see-more -->
                  <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['people']->value) >= $_smarty_tpl->tpl_vars['system']->value['min_results']) {?>
                    <div class="alert alert-post see-more js_see-more" data-get="new_people">
                      <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "See More" ));?>
</span>
                      <div class="loader loader_small x-hidden"></div>
                    </div>
                  <?php }?>
                  <!-- see-more -->
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No people available" ));?>

                  </p>
                <?php }?>
              </div>

            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "find") {?>
              <div class="card-header bg-transparent">
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search Results" ));?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['people']->value) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value['connection']), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No people available for your search" ));?>

                  </p>
                <?php }?>
              </div>

            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "friend_requests") {?>
              <div class="card-header bg-transparent">
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Respond to Your Friend Request" ));?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"request"), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No new requests" ));?>

                  </p>
                <?php }?>

                <!-- see-more -->
                <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                  <div class="alert alert-info see-more js_see-more" data-get="friend_requests">
                    <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "See More" ));?>
</span>
                    <div class="loader loader_small x-hidden"></div>
                  </div>
                <?php }?>
                <!-- see-more -->
              </div>

            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "sent_requests") {?>
              <div class="card-header bg-transparent">
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friend Requests Sent" ));?>
</strong>
              </div>
              <div class="card-body">
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']) {?>
                  <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"cancel"), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                <?php } else { ?>
                  <p class="text-center text-muted">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No new requests" ));?>

                  </p>
                <?php }?>

                <!-- see-more -->
                <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                  <div class="alert alert-info see-more js_see-more" data-get="friend_requests_sent">
                    <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "See More" ));?>
</span>
                    <div class="loader loader_small x-hidden"></div>
                  </div>
                <?php }?>
                <!-- see-more -->
              </div>

            <?php }?>

          </div>
        </div>
        <!-- left panel -->

        <!-- right panel -->
        <div class="col-lg-4">
          <!-- search panel -->
          <div class="card">
            <div class="card-header">
              <i class="fa fa-search mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search" ));?>

            </div>
            <div class="card-body">
              <form action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/find" method="post">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['location_finder_enabled']) {?>
                  <div class="form-group">
                    <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Distance" ));?>
</label>
                    <div class="d-grid">
                      <input type="range" class="custom-range mb10" min="1" max="5000" value="5000" name="distance_slider" oninput="this.form.distance_value.value=this.value">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><?php if ($_smarty_tpl->tpl_vars['system']->value['system_distance'] == "mile") {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ML" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "KM" ));
}?></span>
                        <input type="number" class="form-control" min="1" max="5000" value="5000" name="distance_value" oninput="this.form.distance_slider.value=this.value">
                      </div>
                    </div>
                  </div>
                <?php }?>
                <!-- keyword -->
                <div class="form-group">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Keyword" ));?>
</label>
                  <input type="text" class="form-control" name="query">
                </div>
                <!-- keyword -->
                <!-- gender -->
                <div class="form-group <?php if ($_smarty_tpl->tpl_vars['system']->value['genders_disabled']) {?>x-hidden<?php }?>">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Gender" ));?>
</label>
                  <select class="form-select" name="gender">
                    <option value="any"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Any" ));?>
</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genders']->value, 'gender');
$_smarty_tpl->tpl_vars['gender']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gender']->value) {
$_smarty_tpl->tpl_vars['gender']->do_else = false;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_name'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
                </div>
                <!-- gender -->
                <!-- relationship -->
                <?php if ($_smarty_tpl->tpl_vars['system']->value['relationship_info_enabled']) {?>
                  <div class="form-group">
                    <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Relationship" ));?>
</label>
                    <select class="form-select" name="relationship">
                      <option value="any"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Any" ));?>
</option>
                      <option value="single"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Single" ));?>
</option>
                      <option value="relationship"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "In a relationship" ));?>
</option>
                      <option value="married"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Married" ));?>
</option>
                      <option value="complicated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "It's complicated" ));?>
</option>
                      <option value="separated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Separated" ));?>
</option>
                      <option value="divorced"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Divorced" ));?>
</option>
                      <option value="widowed"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Widowed" ));?>
</option>
                    </select>
                  </div>
                <?php }?>
                <!-- relationship -->
                <!-- online status -->
                <div class="form-group">
                  <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Online Status" ));?>
</label>
                  <select class="form-select" name="status">
                    <option value="any"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Any" ));?>
</option>
                    <option value="online"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Online" ));?>
</option>
                    <option value="offline"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Offline" ));?>
</option>
                  </select>
                </div>
                <!-- online status -->
                <!-- custom fields -->
                <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value) {?>
                  <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value,'_registration'=>true,'_search'=>true), 0, false);
?>
                <?php }?>
                <!-- custom fields -->
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary" name="submit"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search" ));?>
</button>
                </div>
              </form>
            </div>
          </div>
          <!-- search panel -->

          <?php $_smarty_tpl->_subTemplateRender('file:_ads_campaigns.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php $_smarty_tpl->_subTemplateRender('file:_widget.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <!-- right panel -->


      </div>
      <!-- content -->

    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
