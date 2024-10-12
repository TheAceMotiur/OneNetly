<?php
/* Smarty version 4.5.1, created on 2024-08-31 08:02:54
  from '/home/onenetly/public_html/content/themes/default/templates/admin.settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2ce2e400af6_63930139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '261650fb6a7d0cd4eb161b13b2d21a3ec990545c' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/admin.settings.tpl',
      1 => 1711110137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 142,
  ),
),false)) {
function content_66d2ce2e400af6_63930139 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>

    <!-- card-header -->
    <div class="card-header with-icon with-nav">
      <!-- panel title -->
      <div class="mb20">
        <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>

      </div>
      <!-- panel title -->

      <!-- panel nav -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#General" data-bs-toggle="tab">
            <i class="fa fa-server fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "General" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#SEO" data-bs-toggle="tab">
            <i class="fa fa-sitemap fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SEO" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Modules" data-bs-toggle="tab">
            <i class="fa fa-dice-d6 fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Modules" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Features" data-bs-toggle="tab">
            <i class="fa fa-microchip fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Features" ));?>
</strong>
          </a>
        </li>
      </ul>
      <!-- panel nav -->
    </div>
    <!-- card-header -->

    <!-- tab-content -->
    <div class="tab-content">
      <!-- General -->
      <div class="tab-pane active" id="General">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=general">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"website_live",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, false);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website Live" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the entire website On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="system_live">
                  <input type="checkbox" name="system_live" id="system_live" <?php if ($_smarty_tpl->tpl_vars['system']->value['system_live']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shutdown Message" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_message" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_message'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The text that is presented when the site is closed" ));?>

                </div>
              </div>
            </div>

            <div class="divider dashed"></div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "System Email" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="system_email" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_email'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The contact email that all messages send to" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "System Datetime Format" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="system_datetime_format">
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['system_datetime_format'] == "d/m/Y H:i") {?>selected<?php }?> value="d/m/Y H:i">d/m/Y H:i (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Example" ));?>
: 30/05/2023 01:30 PM)</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['system_datetime_format'] == "m/d/Y H:i") {?>selected<?php }?> value="m/d/Y H:i">m/d/Y H:i (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Example" ));?>
: 05/30/2023 01:30 PM)</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select the datetime format of the datetime picker" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "System Distance Unit" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="system_distance">
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['system_distance'] == "mile") {?>selected<?php }?> value="mile"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mile" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['system_distance'] == "kilometer") {?>selected<?php }?> value="kilometer"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Kilometer" ));?>
</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select the distance measure unit of your website" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "System Currency" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="system_currency">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['system_currencies']->value, 'currency');
$_smarty_tpl->tpl_vars['currency']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
$_smarty_tpl->tpl_vars['currency']->do_else = false;
?>
                    <option <?php if ($_smarty_tpl->tpl_vars['currency']->value['default']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['currency']->value['currency_id'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['currency']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['currency']->value['code'];?>
)
                    </option>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can add, edit or delete currencies from" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/currencies"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Currencies" ));?>
</a>
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
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- General -->

      <!-- SEO -->
      <div class="tab-pane" id="SEO">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=seo">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"website_public",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website Public" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make the website public to allow non logged users to view website content" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="system_public">
                  <input type="checkbox" name="system_public" id="system_public" <?php if ($_smarty_tpl->tpl_vars['system']->value['system_public']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Newsfeed Public" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make the newsfeed available for visitors in landing page" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable this will make your website public and list only public posts" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="newsfeed_public">
                  <input type="checkbox" name="newsfeed_public" id="newsfeed_public" <?php if ($_smarty_tpl->tpl_vars['system']->value['newsfeed_public']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"directory",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Directory" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable the directory for better SEO results" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make the website public to allow non logged users to view website content" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="directory_enabled">
                  <input type="checkbox" name="directory_enabled" id="directory_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['directory_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website Title" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="system_title" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['system_title'] ));?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Title of your website" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your website" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website Keywords" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_keywords" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_keywords'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Example: social, social site" ));?>

                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Directory Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_directory" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_directory'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your Directory" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pages Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_pages" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_pages'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your pages module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Groups Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_groups" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_groups'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your groups module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Events Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_events" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_events'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your events module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Blogs Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_blogs" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_blogs'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your blogs module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Marketplace Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_marketplace" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_marketplace'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your marketplace module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Funding Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_funding" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_funding'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your funding module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Offers Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_offers" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_offers'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your offer module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jobs Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_jobs" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_jobs'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your jobs module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Forums Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_forums" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_forums'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your forums module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Movies Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_movies" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_movies'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your movies module" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Games Description" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_description_games" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_description_games'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Description of your games module" ));?>

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
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- SEO -->

      <!-- Modules -->
      <div class="tab-pane" id="Modules">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=modules">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pages" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the pages On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="pages_enabled">
                  <input type="checkbox" name="pages_enabled" id="pages_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pages Reviews" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the pages reviews On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="pages_reviews_enabled">
                  <input type="checkbox" name="pages_reviews_enabled" id="pages_reviews_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_reviews_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pages Review Replacement" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enbale this to allow user to change his review" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="pages_reviews_replacement_enabled">
                  <input type="checkbox" name="pages_reviews_replacement_enabled" id="pages_reviews_replacement_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_reviews_replacement_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Groups" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the groups On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="groups_enabled">
                  <input type="checkbox" name="groups_enabled" id="groups_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Groups Reviews" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the groups reviews On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="groups_reviews_enabled">
                  <input type="checkbox" name="groups_reviews_enabled" id="groups_reviews_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_reviews_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Groups Review Replacement" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enbale this to allow user to change his review" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="groups_reviews_replacement_enabled">
                  <input type="checkbox" name="groups_reviews_replacement_enabled" id="groups_reviews_replacement_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_reviews_replacement_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Events" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the events On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="events_enabled">
                  <input type="checkbox" name="events_enabled" id="events_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['events_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pages Events" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow pages to create events" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="pages_events_enabled">
                  <input type="checkbox" name="pages_events_enabled" id="pages_events_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_events_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Events Reviews" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the events reviews On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="events_reviews_enabled">
                  <input type="checkbox" name="events_reviews_enabled" id="events_reviews_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['events_reviews_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Events Review Replacement" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enbale this to allow user to change his review" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="events_reviews_replacement_enabled">
                  <input type="checkbox" name="events_reviews_replacement_enabled" id="events_reviews_replacement_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['events_reviews_replacement_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"watch",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watch" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the watch videos On and Off" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watch module will show all public videos at one place" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="watch_enabled">
                  <input type="checkbox" name="watch_enabled" id="watch_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['watch_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blogs",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Blogs" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the blogs On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="blogs_enabled">
                  <input type="checkbox" name="blogs_enabled" id="blogs_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['blogs_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"offers",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Offers" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the offers On and Off" ));?>
<br>
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="offers_enabled">
                  <input type="checkbox" name="offers_enabled" id="offers_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['offers_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jobs" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the jobs On and Off" ));?>
<br>
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="jobs_enabled">
                  <input type="checkbox" name="jobs_enabled" id="jobs_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['jobs_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"forums",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Forums" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the forums On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="forums_enabled">
                  <input type="checkbox" name="forums_enabled" id="forums_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['forums_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_online",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Online Users" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Show forums online users" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="forums_online_enabled">
                  <input type="checkbox" name="forums_online_enabled" id="forums_online_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['forums_online_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"stats",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Statistics" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Show forums statistics" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="forums_statistics_enabled">
                  <input type="checkbox" name="forums_statistics_enabled" id="forums_statistics_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['forums_statistics_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"movies",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Movies" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the movies On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="movies_enabled">
                  <input type="checkbox" name="movies_enabled" id="movies_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['movies_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"games",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Games" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the games On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="games_enabled">
                  <input type="checkbox" name="games_enabled" id="games_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['games_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
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
      </div>
      <!-- Modules -->

      <!-- Features -->
      <div class="tab-pane" id="Features">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=features">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Fliter by Location" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If enabled user will able to filter people, products ... etc by location" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="location_finder_enabled">
                  <input type="checkbox" name="location_finder_enabled" id="location_finder_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['location_finder_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"contat_us",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Contact Us" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the contact us page On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="contact_enabled">
                  <input type="checkbox" name="contact_enabled" id="contact_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['contact_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dark_light",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "DayTime Messages" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the DayTime Messages (Good Morning, Afternoon, Evening) On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="daytime_msg_enabled">
                  <input type="checkbox" name="daytime_msg_enabled" id="daytime_msg_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['daytime_msg_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Morning Message" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_morning_message" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_morning_message'];?>
</textarea>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Afternoon Message" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_afternoon_message" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_afternoon_message'];?>
</textarea>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Evening Message" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="system_evening_message" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_evening_message'];?>
</textarea>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"poke",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pokes" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable users to poke each others" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="pokes_enabled">
                  <input type="checkbox" name="pokes_enabled" id="pokes_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['pokes_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gifts",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Gifts" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable users to send gifts to each others" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/gifts"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Gifts" ));?>
</a>
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="gifts_enabled">
                  <input type="checkbox" name="gifts_enabled" id="gifts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['gifts_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"cookie",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Cookie Consent" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "GDPR" ));?>
)</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the cookie consent notification On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="cookie_consent_enabled">
                  <input type="checkbox" name="cookie_consent_enabled" id="cookie_consent_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['cookie_consent_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"adblock",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Adblock Detector" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Adblock auto detector notification On and Off" ));?>
, <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "(Note: Admin is exception)" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Red block message will appear to make user disable adblock from his browser" ));?>
<br>
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="adblock_detector_enabled">
                  <input type="checkbox" name="adblock_detector_enabled" id="adblock_detector_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['adblock_detector_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
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
      </div>
      <!-- Features -->
    </div>
    <!-- tab-content -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "posts") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Posts" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Posts -->
    <form class="js_ajax-forms" data-url="admin/settings.php?edit=posts">
      <div class="card-body">
        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"24_hours",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stories" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the stories On and Off" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stories are photos and videos that only last 24 hours" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="stories_enabled">
              <input type="checkbox" name="stories_enabled" id="stories_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['stories_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Story Duration" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="stories_duration" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['stories_duration'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The story duration in seconds" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Posts Approval System" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the approval system On and Off (If disabled all posts will be approved by default)" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If enabled, posts will be pending for approval by the admin or moderators" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="posts_approval_enabled">
              <input type="checkbox" name="posts_approval_enabled" id="posts_approval_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_approval_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Appoval Limit" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="posts_approval_limit" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['posts_approval_limit'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "After how many posts needs to be approved so the user can post without approval" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Newsfeed Posts Source" ));?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="newsfeed_source">
              <option value="default" <?php if ($_smarty_tpl->tpl_vars['system']->value['newsfeed_source'] == "default") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Default" ));?>
 [<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Show what user is followings (Friends, Followings, Pages... etc)" ));?>
]</option>
              <option value="all_posts" <?php if ($_smarty_tpl->tpl_vars['system']->value['newsfeed_source'] == "all_posts") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "All Posts" ));?>
 [<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "All posts will be shown" ));?>
]</option>
            </select>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Algorithm will exclude any post from closed/secret groups and events that users not member of incase of all posts also will disable all posts privacy" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Newsfeed Location Filter" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the newsfeed location filter On and Off" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Will enable your users to filter their newsfeed by countries" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="newsfeed_location_filter_enabled">
              <input type="checkbox" name="newsfeed_location_filter_enabled" id="newsfeed_location_filter_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['newsfeed_location_filter_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"popularity",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Popular Posts" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the popular posts On and Off" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Popular posts are public posts ordered by most reactions, comments & shares" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="popular_posts_enabled">
              <input type="checkbox" name="popular_posts_enabled" id="popular_posts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['popular_posts_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"posts_discover",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Discover Posts" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the discover posts On and Off" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Discover posts are public posts ordered from most recent to old" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="discover_posts_enabled">
              <input type="checkbox" name="discover_posts_enabled" id="discover_posts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['discover_posts_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"memories",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Memories" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the memories On and Off" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Memories are posts from the same day on last year" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="memories_enabled">
              <input type="checkbox" name="memories_enabled" id="memories_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['memories_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wall_posts",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Wall Posts" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users can publish posts on their friends walls" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="wall_posts_enabled">
              <input type="checkbox" name="wall_posts_enabled" id="wall_posts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['wall_posts_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"posts_colored",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Colored Posts" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the colored posts On and Off" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/colored_posts"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Colored Posts" ));?>
</a>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="colored_posts_enabled">
              <input type="checkbox" name="colored_posts_enabled" id="colored_posts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['colored_posts_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"smile",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Feelings/Activity Posts" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the feelings and activity posts On and Off" ));?>
<br>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="activity_posts_enabled">
              <input type="checkbox" name="activity_posts_enabled" id="activity_posts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['activity_posts_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"voice_notes",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Voice Notes in Posts" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the voice notes in posts On and Off" ));?>
<br>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="voice_notes_posts_enabled">
              <input type="checkbox" name="voice_notes_posts_enabled" id="voice_notes_posts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_posts_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <div style="width: 40px; height: 40px;"></div>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Voice Notes in Comments" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the voice notes in comments On and Off" ));?>
<br>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="voice_notes_comments_enabled">
              <input type="checkbox" name="voice_notes_comments_enabled" id="voice_notes_comments_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_comments_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Voice Notes Max Duration" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="voice_notes_durtaion" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['voice_notes_durtaion'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The maximum length for voice note in seconds" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Voice Notes Encoding" ));?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="voice_notes_encoding">
              <option value="mp3" <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_encoding'] == "mp3") {?>selected<?php }?>>mp3</option>
              <option value="ogg" <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_encoding'] == "ogg") {?>selected<?php }?>>ogg</option>
              <option value="wav" <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_encoding'] == "wav") {?>selected<?php }?>>wav</option>
            </select>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"polls",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Polls" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the poll posts On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="polls_enabled">
              <input type="checkbox" name="polls_enabled" id="polls_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['polls_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Geolocation" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the post Geolocation On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="geolocation_enabled">
              <input type="checkbox" name="geolocation_enabled" id="geolocation_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['geolocation_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Geolocation Google Key" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="geolocation_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['geolocation_key'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Check the documentation to learn how to get this key" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gif",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "GIF" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the gif posts On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="gif_enabled">
              <input type="checkbox" name="gif_enabled" id="gif_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['gif_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Giphy API Key" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="giphy_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['giphy_key'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Check the documentation to learn how to get this key" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"language",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Post Translation" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the post translation On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="post_translation_enabled">
              <input type="checkbox" name="post_translation_enabled" id="post_translation_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['post_translation_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Yandex Key" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="yandex_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['yandex_key'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Check the documentation to learn how to get this key" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"youtube_player",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Smart YouTube Player" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Smart YouTube player will save a lot of bandwidth" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="smart_yt_player">
              <input type="checkbox" name="smart_yt_player" id="smart_yt_player" <?php if ($_smarty_tpl->tpl_vars['system']->value['smart_yt_player']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"social_share",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Social Media Share" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the social media share for posts On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="social_share_enabled">
              <input type="checkbox" name="social_share_enabled" id="social_share_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['social_share_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Post Characters" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="max_post_length" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_post_length'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum allowed post characters length (0 for unlimited)" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Comment Characters" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="max_comment_length" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_comment_length'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum allowed comment characters length (0 for unlimited)" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Posts/Hour" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="max_posts_hour" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_posts_hour'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum number of posts that user can publish per hour (0 for unlimited)" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Comments/Hour" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="max_comments_hour" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_comments_hour'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum number of comments that user can publish per hour (0 for unlimited)" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Default Posts Privacy" ));?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="default_privacy">
              <option value="public" <?php if ($_smarty_tpl->tpl_vars['system']->value['default_privacy'] == "public") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Public" ));?>
</option>
              <option value="friends" <?php if ($_smarty_tpl->tpl_vars['system']->value['default_privacy'] == "friends") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>
</option>
              <option value="me" <?php if ($_smarty_tpl->tpl_vars['system']->value['default_privacy'] == "me") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Only Me" ));?>
</option>
            </select>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Post As Anonymous" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn Anonymous mode On and Off" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: Admins and Moderators will able to see the real post author" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="anonymous_mode">
              <input type="checkbox" name="anonymous_mode" id="anonymous_mode" <?php if ($_smarty_tpl->tpl_vars['system']->value['anonymous_mode']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"adult",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Adult Mode" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Adult mode will hide content that marked for adult from users under 18 years old" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="adult_mode">
              <input type="checkbox" name="adult_mode" id="adult_mode" <?php if ($_smarty_tpl->tpl_vars['system']->value['adult_mode']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_online",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Online Status on Posts" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn online indicator on Posts On and Off (User must be online and enabled the chat)" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="posts_online_status">
              <input type="checkbox" name="posts_online_status" id="posts_online_status" <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_online_status']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"scroll_desktop",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Desktop Infinite Scroll" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn infinite scroll on desktop screens On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="desktop_infinite_scroll">
              <input type="checkbox" name="desktop_infinite_scroll" id="desktop_infinite_scroll" <?php if ($_smarty_tpl->tpl_vars['system']->value['desktop_infinite_scroll']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"scroll_mobile",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mobile Infinite Scroll" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn infinite scroll on mobile screens On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="mobile_infinite_scroll">
              <input type="checkbox" name="mobile_infinite_scroll" id="mobile_infinite_scroll" <?php if ($_smarty_tpl->tpl_vars['system']->value['mobile_infinite_scroll']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Auto Play Videos" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn auto play videos On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="auto_play_videos">
              <input type="checkbox" name="auto_play_videos" id="auto_play_videos" <?php if ($_smarty_tpl->tpl_vars['system']->value['auto_play_videos']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"fluid_vertical",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Videos Fluid Mode" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable video player fluid mode" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="fluid_videos_enabled">
              <input type="checkbox" name="fluid_videos_enabled" id="fluid_videos_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['fluid_videos_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"views",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Posts Views" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn posts views system On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="posts_views_enabled">
              <input type="checkbox" name="posts_views_enabled" id="posts_views_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_views_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Views Type" ));?>

          </label>
          <div class="col-md-9">
            <div class="form-check form-check-inline">
              <input type="radio" name="posts_views_type" id="all_views" value="all" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_views_type'] == "all") {?>checked<?php }?>>
              <label class="form-check-label" for="all_views"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "All Views" ));?>
</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="posts_views_type" id="unique_views" value="unique" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_views_type'] == "unique") {?>checked<?php }?>>
              <label class="form-check-label" for="unique_views"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unique Views Only" ));?>
</label>
            </div>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: All views will count all views including the same user multiple views" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Posts Reviews" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the posts reviews On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="posts_reviews_enabled">
              <input type="checkbox" name="posts_reviews_enabled" id="posts_reviews_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_reviews_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <div style="width: 40px; height: 40px;"></div>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Posts Review Replacement" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enbale this to allow user to change his review" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="posts_reviews_replacement_enabled">
              <input type="checkbox" name="posts_reviews_replacement_enabled" id="posts_reviews_replacement_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_reviews_replacement_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"trending",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Trending Hashtags" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the trending hashtags feature On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="trending_hashtags_enabled">
              <input type="checkbox" name="trending_hashtags_enabled" id="trending_hashtags_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['trending_hashtags_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Trending Interval" ));?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="trending_hashtags_interval">
              <option <?php if ($_smarty_tpl->tpl_vars['system']->value['trending_hashtags_interval'] == "day") {?>selected<?php }?> value="day"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Last 24 Hours" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['system']->value['trending_hashtags_interval'] == "week") {?>selected<?php }?> value="week"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Last Week" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['system']->value['trending_hashtags_interval'] == "month") {?>selected<?php }?> value="month"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Last Month" ));?>
</option>
            </select>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select the interval of trending hashtags" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hashtags Limit" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="trending_hashtags_limit" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['trending_hashtags_limit'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "How many hashtags you want to display" ));?>

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
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>
    <!-- Posts -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "registration") {?>

    <!-- card-header -->
    <div class="card-header with-icon with-nav">
      <!-- panel title -->
      <div class="mb20">
        <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Registration" ));?>

      </div>
      <!-- panel title -->

      <!-- panel nav -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#General" data-bs-toggle="tab">
            <i class="fa fa-sign-in-alt fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "General" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Social" data-bs-toggle="tab">
            <i class="fab fa-facebook fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Social Login" ));?>
</strong>
          </a>
        </li>
      </ul>
      <!-- panel nav -->
    </div>
    <!-- card-header -->

    <!-- tabs content -->
    <div class="tab-content">
      <!-- General -->
      <div class="tab-pane active" id="General">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=registration">
          <div class="card-body">
            <div class="alert alert-info">
              <div class="icon">
                <i class="fa fa-info-circle fa-2x"></i>
              </div>
              <div class="text pt5">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If Registration is Free and Pro Packages enabled they will be used as optional upgrading plans" ));?>
.
              </div>
            </div>
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"registration",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Registration" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow users to create accounts" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="registration_enabled">
                  <input type="checkbox" name="registration_enabled" id="registration_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['registration_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Registration Type" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check form-check-inline">
                  <input type="radio" name="registration_type" id="registration_free" value="free" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['registration_type'] == "free") {?>checked<?php }?>>
                  <label class="form-check-label" for="registration_free"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Free" ));?>
</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" name="registration_type" id="registration_paid" value="paid" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['registration_type'] == "paid") {?>checked<?php }?>>
                  <label class="form-check-label" for="registration_paid"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Subscriptions Only" ));?>
</label>
                </div>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow users to create accounts Free or via Subscriptions only" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pro"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pro System" ));?>
</a>
                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Default User Group" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="default_custom_user_group">
                  <option value="0" <?php if ($_smarty_tpl->tpl_vars['system']->value['default_custom_user_group'] == '0') {?>selected<?php }?>>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users" ));?>

                  </option>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_groups']->value, 'user_group');
$_smarty_tpl->tpl_vars['user_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user_group']->value) {
$_smarty_tpl->tpl_vars['user_group']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['user_group']->value['user_group_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['system']->value['default_custom_user_group'] == $_smarty_tpl->tpl_vars['user_group']->value['user_group_id']) {?>selected<?php }?>>
                      <?php echo $_smarty_tpl->tpl_vars['user_group']->value['user_group_title'];?>

                    </option>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select the default user group for new accounts" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can manage users groups from" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users_groups"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "User Groups" ));?>
</a>
                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"invitation",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Invitation System" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "This option is used to register the users by invitation codes only" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="invitation_enabled">
                  <input type="checkbox" name="invitation_enabled" id="invitation_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Invitations/User" ));?>

              </label>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-sm-8">
                    <input class="form-control" name="invitation_user_limit" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['invitation_user_limit'];?>
">
                  </div>
                  <div class="col-sm-4">
                    <select class="form-select" name="invitation_expire_period">
                      <option <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_expire_period'] == "hour") {?>selected<?php }?> value="hour"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hour" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_expire_period'] == "day") {?>selected<?php }?> value="day"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Day" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_expire_period'] == "week") {?>selected<?php }?> value="week"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Week" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_expire_period'] == "month") {?>selected<?php }?> value="month"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Month" ));?>
</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_expire_period'] == "year") {?>selected<?php }?> value="year"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Year" ));?>
</option>
                    </select>
                  </div>
                </div>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Number of invitation codes allowed to each user (0 for unlimited) " ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For example 1 code per day, 5 codes per month" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Send Method" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check form-check-inline">
                  <input type="radio" name="invitation_send_method" id="invitation_email" value="email" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_send_method'] == "email") {?>checked<?php }?>>
                  <label class="form-check-label" for="invitation_email"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email" ));?>
</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" name="invitation_send_method" id="invitation_sms" value="sms" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_send_method'] == "sms") {?>checked<?php }?>>
                  <label class="form-check-label" for="invitation_sms"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS" ));?>
</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" name="invitation_send_method" id="invitation_both" value="both" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['invitation_send_method'] == "both") {?>checked<?php }?>>
                  <label class="form-check-label" for="invitation_both"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Both" ));?>
</label>
                </div>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Email or SMS to send invitation link to new user's email/phone" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/sms"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS Settings" ));?>
</a>
                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"account_activation",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Activation Enabled" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable account activation to send activation code to user's email/phone" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="activation_enabled">
                  <input type="checkbox" name="activation_enabled" id="activation_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"adblock",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Activation Required" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable this and user will not be able to access without activation" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="activation_required">
                  <input type="checkbox" name="activation_required" id="activation_required" <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_required']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Activation Type" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check form-check-inline">
                  <input type="radio" name="activation_type" id="activation_email" value="email" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "email") {?>checked<?php }?>>
                  <label class="form-check-label" for="activation_email"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email" ));?>
</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" name="activation_type" id="activation_sms" value="sms" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "sms") {?>checked<?php }?>>
                  <label class="form-check-label" for="activation_sms"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS" ));?>
</label>
                </div>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Email or SMS activation to send activation code to user's email/phone" ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/sms"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS Settings" ));?>
</a>
                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"age_limit",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Age Restriction" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable age restriction" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="age_restriction">
                  <input type="checkbox" name="age_restriction" id="age_restriction" <?php if ($_smarty_tpl->tpl_vars['system']->value['age_restriction']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Minimum Age" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="minimum_age" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['minimum_age'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The minimum age required to register (in years)" ));?>

                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"getting_started",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Getting Started" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable getting started page after registration" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="getting_started">
                  <input type="checkbox" name="getting_started" id="getting_started" <?php if ($_smarty_tpl->tpl_vars['system']->value['getting_started']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Required Data" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="getting_started_profile_image_required" id="getting_started_profile_image_required" <?php if ($_smarty_tpl->tpl_vars['system']->value['getting_started_profile_image_required']) {?>checked<?php }?>>
                  <label class="form-check-label" for="getting_started_profile_image_required"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Profile Image Required" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="getting_started_location_required" id="getting_started_location_required" <?php if ($_smarty_tpl->tpl_vars['system']->value['getting_started_location_required']) {?>checked<?php }?>>
                  <label class="form-check-label" for="getting_started_location_required"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Location Data Required" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="getting_started_work_required" id="getting_started_work_required" <?php if ($_smarty_tpl->tpl_vars['system']->value['getting_started_work_required']) {?>checked<?php }?>>
                  <label class="form-check-label" for="getting_started_work_required"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Data Required" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="getting_started_education_required" id="getting_started_education_required" <?php if ($_smarty_tpl->tpl_vars['system']->value['getting_started_education_required']) {?>checked<?php }?>>
                  <label class="form-check-label" for="getting_started_education_required"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Education Data Required" ));?>
</label>
                </div>
                <span class="form-text mt10">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Such data will be mandatory when user getting started" ));?>

                </span>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsletter",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Newsletter Consent" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "GDPR" ));?>
)</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable newsletter consent during the registration" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="newsletter_consent">
                  <input type="checkbox" name="newsletter_consent" id="newsletter_consent" <?php if ($_smarty_tpl->tpl_vars['system']->value['newsletter_consent']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Accounts/IP" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_accounts" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_accounts'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum number of accounts allowed to register per IP (0 for unlimited)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Name Minimum Length" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="name_min_length" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['name_min_length'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The First and Last name minimum length" ));?>

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
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- General -->

      <!-- Social -->
      <div class="tab-pane" id="Social">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=social_login">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"social_share",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Social Logins" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via social media (Facebook, Twitter and etc) On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="social_login_enabled">
                  <input type="checkbox" name="social_login_enabled" id="social_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['social_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <!-- facebook -->
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via Facebook On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="facebook_login_enabled">
                  <input type="checkbox" name="facebook_login_enabled" id="facebook_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook App ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="facebook_appid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['facebook_appid'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook App Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="facebook_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['facebook_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>
            <!-- facebook -->

            <div class="divider"></div>

            <!-- google -->
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"google",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via Google On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="google_login_enabled">
                  <input type="checkbox" name="google_login_enabled" id="google_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['google_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google App ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="google_appid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['google_appid'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google App Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="google_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['google_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>
            <!-- google -->

            <div class="divider"></div>

            <!-- twitter -->
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twitter" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via Twitter On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="twitter_login_enabled">
                  <input type="checkbox" name="twitter_login_enabled" id="twitter_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twitter App ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="twitter_appid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twitter_appid'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twitter App Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="twitter_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twitter_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>
            <!-- twitter -->

            <div class="divider"></div>

            <!-- linkedin -->
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Linkedin" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via Linkedin On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="linkedin_login_enabled">
                  <input type="checkbox" name="linkedin_login_enabled" id="linkedin_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Linkedin App ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="linkedin_appid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['linkedin_appid'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Linkedin App Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="linkedin_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['linkedin_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>
            <!-- linkedin -->

            <div class="divider"></div>

            <!-- vk -->
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via Vkontakte On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="vkontakte_login_enabled">
                  <input type="checkbox" name="vkontakte_login_enabled" id="vkontakte_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte App ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="vkontakte_appid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['vkontakte_appid'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte App Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="vkontakte_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['vkontakte_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>
            <!-- vk -->

            <div class="divider"></div>

            <!-- wordpress -->
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wordpress",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "WordPress" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via WordPress On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="wordpress_login_enabled">
                  <input type="checkbox" name="wordpress_login_enabled" id="wordpress_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['wordpress_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "WordPress App ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="wordpress_appid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['wordpress_appid'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "WordPress App Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="wordpress_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['wordpress_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>
            <!-- wordpress -->

            <div class="divider"></div>

            <!-- Sngine -->
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"developers",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sngine" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn registration/login via other Sngine website On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="sngine_login_enabled">
                  <input type="checkbox" name="sngine_login_enabled" id="sngine_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['sngine_login_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sngine App ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="sngine_appid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_appid'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sngine App Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="sngine_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sngine App Domain" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="sngine_app_domain" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_domain'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Please enter your Sngine App Domain without http:// or https://" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sngine App Name" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="sngine_app_name" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_name'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sngine App Icon" ));?>

              </label>
              <div class="col-md-9">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['sngine_app_icon'] == '') {?>
                  <div class="x-image">
                    <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'></button>
                    <div class="x-image-loader">
                      <div class="progress x-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                    <input type="hidden" class="js_x-image-input" name="sngine_app_icon" value="">
                  </div>
                <?php } else { ?>
                  <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_icon'];?>
')">
                    <button type="button" class="btn-close js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'></button>
                    <div class="x-image-loader">
                      <div class="progress x-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                    <input type="hidden" class="js_x-image-input" name="sngine_app_icon" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['sngine_app_icon'];?>
">
                  </div>
                <?php }?>
              </div>
            </div>
            <!-- Sngine -->

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
      </div>
      <!-- Social -->
    </div>
    <!-- tabs content -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "accounts") {?>

    <!-- card-header -->
    <div class="card-header with-icon with-nav">
      <!-- panel title -->
      <div class="mb20">
        <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Accounts" ));?>

      </div>
      <!-- panel title -->

      <!-- panel nav -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#General" data-bs-toggle="tab">
            <i class="fa fa-user-cog fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "General" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Profile" data-bs-toggle="tab">
            <i class="fa fa-address-card fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Profile" ));?>
</strong>
          </a>
        </li>
      </ul>
      <!-- panel nav -->
    </div>
    <!-- card-header -->

    <!-- tab-content -->
    <div class="tab-content">
      <!-- General -->
      <div class="tab-pane active" id="General">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=accounts">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"accounts_switcher",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Switch Accounts" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow users to switch between multiple accounts" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="switch_accounts_enabled">
                  <input type="checkbox" name="switch_accounts_enabled" id="switch_accounts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['switch_accounts_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"genders",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disable Genders" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If disabled genders will be hidden for the users" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="genders_disabled">
                  <input type="checkbox" name="genders_disabled" id="genders_disabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['genders_disabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"username",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Show Usernames Only" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If disabled full names will be displayed instead" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="show_usernames_enabled">
                  <input type="checkbox" name="show_usernames_enabled" id="show_usernames_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"special_characters",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow Special Characters" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow special Characters in user's first & last name" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="special_characters_enabled">
                  <input type="checkbox" name="special_characters_enabled" id="special_characters_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['special_characters_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete_user",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete Account" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "GDPR" ));?>
)</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow users to delete their account" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="delete_accounts_enabled">
                  <input type="checkbox" name="delete_accounts_enabled" id="delete_accounts_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['delete_accounts_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"user_information",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Download User Information" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "GDPR" ));?>
)</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow users to download their account information from settings page" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="download_info_enabled">
                  <input type="checkbox" name="download_info_enabled" id="download_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['download_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verification",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verification Requests" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the verification requests from users & pages On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="verification_requests">
                  <input type="checkbox" name="verification_requests" id="verification_requests" <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_requests']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verification Documents" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable it to make verification documents required" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="verification_docs_required">
                  <input type="checkbox" name="verification_docs_required" id="verification_docs_required" <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_docs_required']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Required for Posts" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If enabled then verification will be required to publish posts" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="verification_for_posts">
                  <input type="checkbox" name="verification_for_posts" id="verification_for_posts" <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_for_posts']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Required for Monetization" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If enabled then verification will be required to enable monetization" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="verification_for_monetization">
                  <input type="checkbox" name="verification_for_monetization" id="verification_for_monetization" <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_for_monetization']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Required for Adult Content" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If enabled then verification will be required to share or consume adult content" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="verification_for_adult_content">
                  <input type="checkbox" name="verification_for_adult_content" id="verification_for_adult_content" <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_for_adult_content']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"followings",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Disable Friend Request After Decline" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If enabled user A will be able to send friendship request to user B again" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="disable_declined_friendrequest">
                  <input type="checkbox" name="disable_declined_friendrequest" id="disable_declined_friendrequest" <?php if ($_smarty_tpl->tpl_vars['system']->value['disable_declined_friendrequest']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Friends/User" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_friends" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_friends'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum number of friends allowed per User (0 for unlimited)" ));?>

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
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- General -->

      <!-- Profile -->
      <div class="tab-pane" id="Profile">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=profile">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"relationship",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Relationship Status" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Relationship Status On/Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="relationship_info_enabled">
                  <input type="checkbox" name="relationship_info_enabled" id="relationship_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['relationship_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"website",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Website On/Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="website_info_enabled">
                  <input type="checkbox" name="website_info_enabled" id="website_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['website_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"biography",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "About Me" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the About Me On/Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="biography_info_enabled">
                  <input type="checkbox" name="biography_info_enabled" id="biography_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['biography_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"jobs",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Info" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Work info On/Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="work_info_enabled">
                  <input type="checkbox" name="work_info_enabled" id="work_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['work_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Location Info" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Location info On/Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="location_info_enabled">
                  <input type="checkbox" name="location_info_enabled" id="location_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['location_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"education",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Education Info" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Education info On/Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="education_info_enabled">
                  <input type="checkbox" name="education_info_enabled" id="education_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['education_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"social_share",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Social Links" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Social Links On/Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="social_info_enabled">
                  <input type="checkbox" name="social_info_enabled" id="social_info_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['social_info_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"design",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Profile Design" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allow users to upload background image to their profiles" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="system_profile_background_enabled">
                  <input type="checkbox" name="system_profile_background_enabled" id="system_profile_background_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
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
      </div>
      <!-- Profile -->
    </div>
    <!-- tab-content -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "email") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <form class="js_ajax-forms" data-url="admin/settings.php?edit=email">
      <div class="card-body">
        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"email",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMTP" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable SMTP email system" ));?>
<br />
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "PHP mail() function will be used in case of disabled" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="email_smtp_enabled">
              <input type="checkbox" name="email_smtp_enabled" id="email_smtp_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_smtp_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"authentication",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMTP Require Authentication" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable SMTP authentication" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="email_smtp_authentication">
              <input type="checkbox" name="email_smtp_authentication" id="email_smtp_authentication" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_smtp_authentication']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"ssl",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMTP SSL Encryption" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable SMTP SSL encryption" ));?>
<br />
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "TLS encryption will be used in case of disabled" ));?>

            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="email_smtp_ssl">
              <input type="checkbox" name="email_smtp_ssl" id="email_smtp_ssl" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_smtp_ssl']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMTP Server" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="email_smtp_server" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['email_smtp_server'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMTP Port" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="email_smtp_port" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['email_smtp_port'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMTP Username" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="email_smtp_username" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['email_smtp_username'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMTP Password" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="email_smtp_password" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['email_smtp_password'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Set From" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="email_smtp_setfrom" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['email_smtp_setfrom'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Set the From email address" ));?>
, <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For example: email@domain.com" ));?>

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
        <button type="button" class="btn btn-danger js_admin-tester" data-handle="smtp">
          <i class="fa fa-bolt mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

        </button>
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "sms") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- SMS -->
    <form class="js_ajax-forms" data-url="admin/settings.php?edit=sms">
      <div class="card-body">

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS Provider" ));?>

          </label>
          <div class="col-md-9">
            <div>
              <!-- Twilio -->
              <input class="x-hidden input-label" type="radio" name="sms_provider" value="twilio" id="sms_twilio" <?php if ($_smarty_tpl->tpl_vars['system']->value['sms_provider'] == "twilio") {?>checked<?php }?> />
              <label class="button-label" for="sms_twilio">
                <div class="icon">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twilio",'width'=>"32px",'height'=>"32px"), 0, true);
?>
                </div>
                <div class="title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio" ));?>
</div>
              </label>
              <!-- Twilio -->
              <!-- BulkSMS -->
              <input class="x-hidden input-label" type="radio" name="sms_provider" value="bulksms" id="sms_bulksms" <?php if ($_smarty_tpl->tpl_vars['system']->value['sms_provider'] == "bulksms") {?>checked<?php }?> />
              <label class="button-label" for="sms_bulksms">
                <div class="icon">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"bulksms",'width'=>"52px",'height'=>"32px"), 0, true);
?>
                </div>
                <div class="title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "BulkSMS" ));?>
</div>
              </label>
              <!-- BulkSMS -->
              <!-- Infobip -->
              <input class="x-hidden input-label" type="radio" name="sms_provider" value="infobip" id="sms_infobip" <?php if ($_smarty_tpl->tpl_vars['system']->value['sms_provider'] == "infobip") {?>checked<?php }?> />
              <label class="button-label" for="sms_infobip">
                <div class="icon">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"infobip",'width'=>"52px",'height'=>"32px"), 0, true);
?>
                </div>
                <div class="title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Infobip" ));?>
</div>
              </label>
              <!-- Infobip -->
              <!-- Msg91 -->
              <input class="x-hidden input-label" type="radio" name="sms_provider" value="msg91" id="sms_msg91" <?php if ($_smarty_tpl->tpl_vars['system']->value['sms_provider'] == "msg91") {?>checked<?php }?> />
              <label class="button-label" for="sms_msg91">
                <div class="icon">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"msg91",'width'=>"52px",'height'=>"32px"), 0, true);
?>
                </div>
                <div class="title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Msg91" ));?>
</div>
              </label>
              <!-- Msg91 -->
            </div>

            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select your default SMS provider" ));?>
<br />
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS Limit" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="sms_limit" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['sms_limit'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Set the maximum number of SMS messages that can be sent per hour" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <!-- Twilio -->
        <div class="heading-small mb20">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio" ));?>

        </div>
        <div class="pl-md-4">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio Account SID" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="twilio_sid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twilio_sid'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio Auth Token" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="twilio_token" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twilio_token'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio Phone Number" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="twilio_phone" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twilio_phone'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>
        </div>
        <!-- Twilio -->

        <div class="divider"></div>

        <!-- BulkSMS -->
        <div class="heading-small mb20">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "BulkSMS" ));?>

        </div>
        <div class="pl-md-4">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "BulkSMS Username" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="bulksms_username" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['bulksms_username'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "BulkSMS Password" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="bulksms_password" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['bulksms_password'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>
        </div>
        <!-- BulkSMS -->

        <div class="divider"></div>

        <!-- Infobip -->
        <div class="heading-small mb20">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Infobip" ));?>

        </div>
        <div class="pl-md-4">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Infobip Username" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="infobip_username" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['infobip_username'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Infobip Password" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="infobip_password" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['infobip_password'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>
        </div>
        <!-- Infobip -->

        <div class="divider"></div>

        <!-- Msg91 -->
        <div class="heading-small mb20">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Msg91" ));?>

        </div>
        <div class="pl-md-4">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Msg91 AuthKey" ));?>

            </label>
            <div class="col-md-9">
              <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                <input type="text" class="form-control" name="msg91_authkey" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['msg91_authkey'];?>
">
              <?php } else { ?>
                <input type="password" class="form-control" value="*********">
              <?php }?>
            </div>
          </div>
        </div>
        <!-- Msg91 -->

        <div class="divider"></div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Phone Number" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="system_phone" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_phone'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your phone number to test the SMS service i.e +12344567890" ));?>
<br />
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "A test SMS will be sent to this phone number when you test the connection" ));?>

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
        <button type="button" class="btn btn-danger js_admin-tester" data-handle="sms">
          <i class="fa fa-bolt mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

        </button>
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>
    <!-- SMS -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "notifications") {?>

    <!-- card-header -->
    <div class="card-header with-icon with-nav">
      <!-- panel title -->
      <div class="mb20">
        <i class="fa fa-bell mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Notifications" ));?>

      </div>
      <!-- panel title -->

      <!-- panel nav -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#Website" data-bs-toggle="tab">
            <i class="fa fa-bell fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website Notifications" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Email" data-bs-toggle="tab">
            <i class="fa fa-envelope fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Notifications" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Push" data-bs-toggle="tab">
            <i class="fas fa-broadcast-tower fa-fw mr5"></i><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Push Notifications" ));?>
</strong>
          </a>
        </li>
      </ul>
      <!-- panel nav -->
    </div>
    <!-- card-header -->

    <!-- tabs content -->
    <div class="tab-content">
      <!-- Website Notifications -->
      <div class="tab-pane active" id="Website">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=website_notifications">
          <div class="card-body">

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"profile_notifications",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Profile Visit Notification" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the profile visit notification On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="profile_notification_enabled">
                  <input type="checkbox" name="profile_notification_enabled" id="profile_notification_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['profile_notification_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"browser_notifications",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Browser Notifications" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the browser notifications On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="browser_notifications_enabled">
                  <input type="checkbox" name="browser_notifications_enabled" id="browser_notifications_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['browser_notifications_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"noty_notifications",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Noty Notifications" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the noty notifications On and Off" ));?>
 (<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/screenshots/noty_notification.png"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "preview" ));?>
</a>)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="noty_notifications_enabled">
                  <input type="checkbox" name="noty_notifications_enabled" id="noty_notifications_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['noty_notifications_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
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
      </div>
      <!-- Website Notifications -->

      <!-- Email Notifications -->
      <div class="tab-pane" id="Email">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=email_notifications">
          <div class="card-body">

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsletter",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Notifications" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable email notifications system" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="email_notifications">
                  <input type="checkbox" name="email_notifications" id="email_notifications" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_notifications']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email User When" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_post_likes" id="email_post_likes" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_post_likes']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_post_likes"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone reacted to his post" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_post_comments" id="email_post_comments" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_post_comments']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_post_comments"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone commented on his post" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_post_shares" id="email_post_shares" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_post_shares']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_post_shares"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone shared his post" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_wall_posts" id="email_wall_posts" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_wall_posts']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_wall_posts"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone posted on his timeline" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_mentions" id="email_mentions" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_mentions']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_mentions"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone mentioned him" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_profile_visits" id="email_profile_visits" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_profile_visits']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_profile_visits"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone visited his profile" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_friend_requests" id="email_friend_requests" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_friend_requests']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_friend_requests"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Someone sent him or accepted his friend requset" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_user_verification" id="email_user_verification" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_user_verification']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_user_verification"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Admin approved/declined my verification requests" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_user_post_approval" id="email_user_post_approval" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_user_post_approval']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_user_post_approval"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Admin approved my pending posts" ));?>
</label>
                </div>
              </div>
            </div>

            <div class="divider dashed"></div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email Admin When" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_admin_verifications" id="email_admin_verifications" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_admin_verifications']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_admin_verifications"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Verification request sent by user/page" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="email_admin_post_approval" id="email_admin_post_approval" <?php if ($_smarty_tpl->tpl_vars['system']->value['email_admin_post_approval']) {?>checked<?php }?>>
                  <label class="form-check-label" for="email_admin_post_approval"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Post published and needs approval" ));?>
</label>
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
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- Email Notifications -->

      <!-- Push Notifications -->
      <div class="tab-pane" id="Push">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=push_notifications">
          <div class="card-body">

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"onesignal",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "OneSignal Push Notifications" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the OneSignal push notification On and Off" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="onesignal_notification_enabled">
                  <input type="checkbox" name="onesignal_notification_enabled" id="onesignal_notification_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['onesignal_notification_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "OneSignal APP ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="onesignal_app_id" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['onesignal_app_id'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "OneSignal REST API Key" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="onesignal_api_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['onesignal_api_key'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
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
      </div>
      <!-- Push Notifications -->
    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "chat") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Chat" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Chat -->
    <form class="js_ajax-forms" data-url="admin/settings.php?edit=chat">
      <div class="card-body">
        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Chat Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the chat system On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="chat_enabled">
              <input type="checkbox" name="chat_enabled" id="chat_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"voice_notes",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Voice Notes" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the voice notes in chat On and Off" ));?>
<br>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="voice_notes_chat_enabled">
              <input type="checkbox" name="voice_notes_chat_enabled" id="voice_notes_chat_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat_status",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "User Status Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Last Seen On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="chat_status_enabled">
              <input type="checkbox" name="chat_status_enabled" id="chat_status_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_status_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat_typing",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Typing Status Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Typing Status On and Off" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Needs a good server to work fine" ));?>
)</div>
          </div>
          <div class="text-end">
            <label class="switch" for="chat_typing_enabled">
              <input type="checkbox" name="chat_typing_enabled" id="chat_typing_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_typing_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat_seen",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Seen Status Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the Seen Status On and Off" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Needs a good server to work fine" ));?>
)</div>
          </div>
          <div class="text-end">
            <label class="switch" for="chat_seen_enabled">
              <input type="checkbox" name="chat_seen_enabled" id="chat_seen_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_seen_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"delete",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete For Everyone" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Permanently remove the conversation for all chat members when user delete it" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="chat_permanently_delete_enabled">
              <input type="checkbox" name="chat_permanently_delete_enabled" id="chat_permanently_delete_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_permanently_delete_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_audio",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Audio Call Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the audio call system On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="audio_call_enabled">
              <input type="checkbox" name="audio_call_enabled" id="audio_call_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['audio_call_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"call_video",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Video Call Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the video call system On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="video_call_enabled">
              <input type="checkbox" name="video_call_enabled" id="video_call_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['video_call_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio Account SID" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="twilio_sid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twilio_sid'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio API SID" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="twilio_apisid" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twilio_apisid'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twilio API SECRET" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="twilio_apisecret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['twilio_apisecret'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
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
    <!-- Chat -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "live") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live Stream" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Live -->
    <form class="js_ajax-forms" data-url="admin/settings.php?edit=live">
      <div class="card-body">
        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"live",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live Stream Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the live stream system On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="live_enabled">
              <input type="checkbox" name="live_enabled" id="live_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['live_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Agora App ID" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="agora_app_id" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['agora_app_id'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Agora App Certificate" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="agora_app_certificate" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['agora_app_certificate'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"cloud_save",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Live Videos" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn the save live stream videos On and Off" ));?>
<br>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="save_live_enabled">
              <input type="checkbox" name="save_live_enabled" id="save_live_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['save_live_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Agora Customer ID" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="agora_customer_id" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['agora_customer_id'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Agora Customer Secret" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="agora_customer_certificate" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['agora_customer_certificate'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo "S3";?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Name" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="agora_s3_bucket" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['agora_s3_bucket'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 bucket name" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo "S3";?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Region" ));?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="agora_s3_region">
              <option value="us-east-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "us-east-1") {?>selected<?php }?>>US East (N. Virginia) us-east-1</option>
              <option value="us-east-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "us-east-2") {?>selected<?php }?>>US East (Ohio) us-east-2</option>
              <option value="us-west-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "us-west-1") {?>selected<?php }?>>US West (N. California) us-west-1</option>
              <option value="us-west-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "us-west-2") {?>selected<?php }?>>US West (Oregon) us-west-2</option>
              <option value="eu-west-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "eu-west-1") {?>selected<?php }?>>EU (Ireland) eu-west-1</option>
              <option value="eu-west-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "eu-west-2") {?>selected<?php }?>>EU (London) eu-west-2</option>
              <option value="eu-west-3" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "eu-west-3") {?>selected<?php }?>>EU (Paris) eu-west-3</option>
              <option value="eu-central-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "eu-central-1") {?>selected<?php }?>>EU (Frankfurt) eu-central-1</option>
              <option value="ap-southeast-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "ap-southeast-1") {?>selected<?php }?>>Asia Pacific (Singapore) ap-southeast-1</option>
              <option value="ap-southeast-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "ap-southeast-2") {?>selected<?php }?>>Asia Pacific (Sydney) ap-southeast-2</option>
              <option value="ap-northeast-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "ap-northeast-1") {?>selected<?php }?>>Asia Pacific (Tokyo) ap-northeast-1</option>
              <option value="ap-northeast-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "ap-northeast-2") {?>selected<?php }?>>Asia Pacific (Seoul) ap-northeast-2</option>
              <option value="sa-east-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "sa-east-1") {?>selected<?php }?>>South America (São Paulo) sa-east-1</option>
              <option value="ca-central-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "ca-central-1") {?>selected<?php }?>>Canada (Central) ca-central-1</option>
              <option value="ap-south-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['agora_s3_region'] == "ap-south-1") {?>selected<?php }?>>Asia Pacific (Mumbai)</option>
            </select>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 bucket region" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo "S3";?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key ID" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="agora_s3_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['agora_s3_key'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 Access Key ID" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo "S3";?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key Secret" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="agora_s3_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['agora_s3_secret'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 Access Key Secret" ));?>

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
        <button type="button" class="btn btn-danger js_admin-tester" data-handle="s3-agora">
          <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "S3" ));?>
)
        </button>
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>
    <!-- Live -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "uploads") {?>

    <!-- card-header -->
    <div class="card-header with-icon with-nav">
      <!-- panel title -->
      <div class="mb20">
        <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Uploads" ));?>

      </div>
      <!-- panel title -->

      <!-- panel nav -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#General" data-bs-toggle="tab">
            <i class="fa fa-upload fa-fw mr5"></i><strong class="pr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "General" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Cloud" data-bs-toggle="tab">
            <i class="fas fa-cloud-upload-alt fa-fw mr5"></i><strong class="pr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Cloud Hosting" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#FTP" data-bs-toggle="tab">
            <i class="fa fa-server fa-fw mr5"></i><strong class="pr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FTP" ));?>
</strong>
          </a>
        </li>
      </ul>
      <!-- panel nav -->
    </div>
    <!-- card-header -->

    <!-- tabs content -->
    <div class="tab-content">
      <!-- General -->
      <div class="tab-pane active" id="General">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=uploads">
          <div class="card-body">
            <div class="alert alert-warning">
              <div class="icon">
                <i class="fa fa-exclamation-triangle fa-2x"></i>
              </div>
              <div class="text">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your server max upload size" ));?>
 = <?php echo $_smarty_tpl->tpl_vars['max_upload_size']->value;?>
<br>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can't upload files larger than" ));?>
 <?php echo $_smarty_tpl->tpl_vars['max_upload_size']->value;?>
 - <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "To upload larger files, contact your hosting provider" ));?>

              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Uploads Directory" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="uploads_directory" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['uploads_directory'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The path of uploads local directory" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Uploads Prefix" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="uploads_prefix" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['uploads_prefix'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Add a prefix to the uploaded files (No spaces or special characters only like 'mysite' or 'my_site')" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Uploads CDN Endpoint" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="uploads_cdn_url" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['uploads_cdn_url'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your CDN URL like AWS CloudFront" ));?>

                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"photos",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Photo Upload" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable photo upload to share & upload photos to the site" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="photos_enabled">
                  <input type="checkbox" name="photos_enabled" id="photos_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['photos_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Photo Upload in Comments" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable photo upload in comments" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="comments_photos_enabled">
                  <input type="checkbox" name="comments_photos_enabled" id="comments_photos_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['comments_photos_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Photo Upload in Chat" ));?>
 </div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable photo upload in chat" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="chat_photos_enabled">
                  <input type="checkbox" name="chat_photos_enabled" id="chat_photos_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_photos_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <div style="width: 40px; height: 40px;"></div>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Photo Upload in Blogs and Forums" ));?>
 </div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable photo upload in articles and forums threads" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="tinymce_photos_enabled">
                  <input type="checkbox" name="tinymce_photos_enabled" id="tinymce_photos_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['tinymce_photos_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Photo Size" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_photo_size" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_photo_size'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum size of uploaded photo in posts" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "in kilobytes (1M = 1024KB)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Photo Quality" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="uploads_quality">
                  <option value="high" <?php if ($_smarty_tpl->tpl_vars['system']->value['uploads_quality'] == "high") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "High quality photos with low compression" ));?>
</option>
                  <option value="medium" <?php if ($_smarty_tpl->tpl_vars['system']->value['uploads_quality'] == "medium") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Medium quality photos with medium compression" ));?>
</option>
                  <option value="low" <?php if ($_smarty_tpl->tpl_vars['system']->value['uploads_quality'] == "low") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Low quality photos with high compression" ));?>
</option>
                </select>
              </div>
            </div>

            <div class="divider dashed"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"resolution",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Cover Photo Resolution Limit" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable cover photo limit (Minimum width 1108px & Minimum height 360px)" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="limit_cover_photo">
                  <input type="checkbox" name="limit_cover_photo" id="limit_cover_photo" <?php if ($_smarty_tpl->tpl_vars['system']->value['limit_cover_photo']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gif",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Animated Images for Avatars/Covers" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable user to upload animated images for avarats and covers" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="allow_animated_images">
                  <input type="checkbox" name="allow_animated_images" id="allow_animated_images" <?php if ($_smarty_tpl->tpl_vars['system']->value['allow_animated_images']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Cover Photo Size" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_cover_size" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_cover_size'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum size of cover photo" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "in kilobytes (1 M = 1024 KB)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max Profile Photo Size" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_avatar_size" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_avatar_size'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum size of profile photo" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "in kilobytes (1 M = 1024 KB)" ));?>

                </div>
              </div>
            </div>

            <div class="divider dashed"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"watermark",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Images" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable it to add watermark icon to all uploaded photos (except: profile pictures and cover images)" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="watermark_enabled">
                  <input type="checkbox" name="watermark_enabled" id="watermark_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Icon" ));?>

              </label>
              <div class="col-md-9">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_icon'] == '') {?>
                  <div class="x-image">
                    <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'>

                    </button>
                    <div class="x-image-loader">
                      <div class="progress x-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                    <input type="hidden" class="js_x-image-input" name="watermark_icon" value="">
                  </div>
                <?php } else { ?>
                  <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_icon'];?>
')">
                    <button type="button" class="btn-close js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'>

                    </button>
                    <div class="x-image-loader">
                      <div class="progress x-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                    <input type="hidden" class="js_x-image-input" name="watermark_icon" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_icon'];?>
">
                  </div>
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Upload your watermark icon (PNG is recommended)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Position" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="watermark_position">
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "top left") {?>selected<?php }?> value="top left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Top Left" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "top right") {?>selected<?php }?> value="top right"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Top Right" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "top") {?>selected<?php }?> value="top"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Top" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "bottom left") {?>selected<?php }?> value="bottom left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bottom Left" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "bottom right") {?>selected<?php }?> value="bottom right"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bottom Right" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "bottom") {?>selected<?php }?> value="bottom"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bottom" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "left") {?>selected<?php }?> value="left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Left" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_position'] == "right") {?>selected<?php }?> value="right"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Right" ));?>
</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select the position (the anchor point) of your watermark icon" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Opacity" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="watermark_opacity" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_opacity'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The opacity level of the watermark icon (value between 0 - 1)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark X Offset" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="watermark_xoffset" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_xoffset'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Horizontal offset in pixels" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Y Offset" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="watermark_yoffset" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_yoffset'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vertical offset in pixels" ));?>

                </div>
              </div>
            </div>

            <div class="divider dashed"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"adult",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Adult Images Detection" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable it to detect the adult images and system will blur or delete them" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="adult_images_enabled">
                  <input type="checkbox" name="adult_images_enabled" id="adult_images_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['adult_images_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Adult Images Action" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check form-check-inline">
                  <input type="radio" name="adult_images_action" id="action_blue" value="blur" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['adult_images_action'] == "blur") {?>checked<?php }?>>
                  <label class="form-check-label" for="action_blue"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Blur" ));?>
</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" name="adult_images_action" id="action_delete" value="delete" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['adult_images_action'] == "delete") {?>checked<?php }?>>
                  <label class="form-check-label" for="action_delete"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete" ));?>
</label>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google Vision API Key" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="adult_images_api_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['adult_images_api_key'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Cloud Vision API Key" ));?>

                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"videos",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Video Upload" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable video upload to share & upload videos to the site" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="videos_enabled">
                  <input type="checkbox" name="videos_enabled" id="videos_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['videos_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max video size" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_video_size" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_video_size'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum size of uploaded video in posts" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "in kilobytes (1M = 1024KB)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Video extensions" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="video_extensions" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['video_extensions'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allowed video extensions (separated with comma ',)" ));?>

                </div>
              </div>
            </div>

            <div class="divider dashed"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"ffmpeg",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FFMPEG Enabled" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable FFMPEG to convert and optimize videos to mp4" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="ffmpeg_enabled">
                  <input type="checkbox" name="ffmpeg_enabled" id="ffmpeg_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FFMPEG Binary Path" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="ffmpeg_path" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['ffmpeg_path'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Example: Linux(/usr/bin/ffmpeg) or Windows(C:\\ffmpeg\bin\ffmpeg.exe)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FFMPEG Conversion Speed" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="ffmpeg_speed">
                  <option value="ultrafast" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "ultrafast") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Ultrafast" ));?>
</option>
                  <option value="superfast" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "superfast") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Superfast" ));?>
</option>
                  <option value="veryfast" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "veryfast") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Veryfast" ));?>
</option>
                  <option value="faster" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "faster") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Faster" ));?>
</option>
                  <option value="fast" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "fast") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Fast" ));?>
</option>
                  <option value="medium" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "medium") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Medium" ));?>
</option>
                  <option value="slow" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "slow") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Slow" ));?>
</option>
                  <option value="slower" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "slower") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Slower" ));?>
</option>
                  <option value="veryslow" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_speed'] == "veryslow") {?>selected<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Veryslow" ));?>
</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Slow speed gives you better compression and quality and vice versa" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Video Resolutions" ));?>

              </label>
              <div class="col-md-9">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="ffmpeg_240p_enabled" id="ffmpeg_240p_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_240p_enabled']) {?>checked<?php }?>>
                  <label class="form-check-label" for="ffmpeg_240p_enabled"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "240p Resolution" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="ffmpeg_360p_enabled" id="ffmpeg_360p_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_360p_enabled']) {?>checked<?php }?>>
                  <label class="form-check-label" for="ffmpeg_360p_enabled"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "360p Resolution" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="ffmpeg_480p_enabled" id="ffmpeg_480p_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_480p_enabled']) {?>checked<?php }?>>
                  <label class="form-check-label" for="ffmpeg_480p_enabled"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "480p Resolution" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="ffmpeg_720p_enabled" id="ffmpeg_720p_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_720p_enabled']) {?>checked<?php }?>>
                  <label class="form-check-label" for="ffmpeg_720p_enabled"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "720p Resolution" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="ffmpeg_1080p_enabled" id="ffmpeg_1080p_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_1080p_enabled']) {?>checked<?php }?>>
                  <label class="form-check-label" for="ffmpeg_1080p_enabled"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "1080p Resolution" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="ffmpeg_1440p_enabled" id="ffmpeg_1440p_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_1440p_enabled']) {?>checked<?php }?>>
                  <label class="form-check-label" for="ffmpeg_1440p_enabled"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "1440p Resolution" ));?>
</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="ffmpeg_2160p_enabled" id="ffmpeg_2160p_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ffmpeg_2160p_enabled']) {?>checked<?php }?>>
                  <label class="form-check-label" for="ffmpeg_2160p_enabled"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "2160p Resolution" ));?>
</label>
                </div>
                <span class="form-text mt10">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select the resolutions you want to convert your videos to" ));?>

                </span>
              </div>
            </div>

            <div class="divider dashed"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"watermark",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Videos" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable it to add watermark icon to all uploaded videos (Note: FFmpeg must be enabled)" ));?>

                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="watermark_videos_enabled">
                  <input type="checkbox" name="watermark_videos_enabled" id="watermark_videos_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_videos_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Icon" ));?>

              </label>
              <div class="col-md-9">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_videos_icon'] == '') {?>
                  <div class="x-image">
                    <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'>

                    </button>
                    <div class="x-image-loader">
                      <div class="progress x-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                    <input type="hidden" class="js_x-image-input" name="watermark_videos_icon" value="">
                  </div>
                <?php } else { ?>
                  <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_videos_icon'];?>
')">
                    <button type="button" class="btn-close js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'>

                    </button>
                    <div class="x-image-loader">
                      <div class="progress x-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                    <input type="hidden" class="js_x-image-input" name="watermark_videos_icon" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_videos_icon'];?>
">
                  </div>
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Upload your watermark icon (PNG is recommended)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Position" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="watermark_videos_position">
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_videos_position'] == "top_left") {?>selected<?php }?> value="top_left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Top Left" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_videos_position'] == "top_right") {?>selected<?php }?> value="top_right"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Top Right" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_videos_position'] == "center") {?>selected<?php }?> value="center"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Center" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_videos_position'] == "bottom_left") {?>selected<?php }?> value="bottom_left"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bottom Left" ));?>
</option>
                  <option <?php if ($_smarty_tpl->tpl_vars['system']->value['watermark_videos_position'] == "bottom_right") {?>selected<?php }?> value="bottom_right"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bottom Right" ));?>
</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select the position (the anchor point) of your watermark icon" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Opacity" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="watermark_videos_opacity" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_videos_opacity'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The opacity level of the watermark icon (value between 0 - 1)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark X Offset" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="watermark_videos_xoffset" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_videos_xoffset'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Horizontal offset in pixels" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Watermark Y Offset" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="watermark_videos_yoffset" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['watermark_videos_yoffset'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vertical offset in pixels" ));?>

                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"audios",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Audio Upload" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable audio upload to share & upload sounds to the site" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="audio_enabled">
                  <input type="checkbox" name="audio_enabled" id="audio_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['audio_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max audio size" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_audio_size" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_audio_size'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum size of uploaded audio in posts" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "in kilobytes (1M = 1024KB)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Audio extensions" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="audio_extensions" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['audio_extensions'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allowed audio extensions (separated with comma ',)" ));?>

                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"files",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6 mb5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "File Upload" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable file upload to share & upload files to the site" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="file_enabled">
                  <input type="checkbox" name="file_enabled" id="file_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['file_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Max file size" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="max_file_size" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_file_size'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Maximum size of uploaded file in posts" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "in kilobytes (1M = 1024KB)" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "File extensions" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="file_extensions" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['file_extensions'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Allowed file extensions (separated with comma ',)" ));?>

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
            <button type="button" class="btn btn-danger js_admin-tester" data-handle="ffmpeg">
              <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection (FFMPEG)" ));?>

            </button>
            <button type="button" class="btn btn-danger js_admin-tester" data-handle="google_vision">
              <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection (Vision API)" ));?>

            </button>
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- General -->

      <!-- Cloud -->
      <div class="tab-pane" id="Cloud">
        <div class="card-body">

          <div class="alert alert-primary">
            <div class="icon">
              <i class="fas fa-cloud-upload-alt fa-2x"></i>
            </div>
            <div class="text">
              <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Cloud Hosting" ));?>
</strong><br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Before enabling cloud hosting, make sure you upload the whole 'uploads' folder to your bucket" ));?>
.<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Before disabling cloud hosting, make sure you download the whole 'uploads' folder to your server" ));?>
.
            </div>
          </div>

          <!-- S3 -->
          <form class="js_ajax-forms" data-url="admin/settings.php?edit=s3">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"aws_s3",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Amazon S3 Storage" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable Amazon S3 storage" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: Enable this will disable all other options" ));?>
)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="s3_enabled">
                  <input type="checkbox" name="s3_enabled" id="s3_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Name" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="s3_bucket" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['s3_bucket'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 bucket name" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Region" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="s3_region">
                  <option value="us-east-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "us-east-2") {?>selected<?php }?>>US East (Ohio) us-east-2</option>
                  <option value="us-east-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "us-east-1") {?>selected<?php }?>>US East (N. Virginia) us-east-1</option>
                  <option value="us-west-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "us-west-1") {?>selected<?php }?>>US West (N. California) us-west-1</option>
                  <option value="us-west-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "us-west-2") {?>selected<?php }?>>US West (Oregon) us-west-2</option>
                  <option value="ap-east-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ap-east-1") {?>selected<?php }?>>Asia Pacific (Hong Kong) ap-east-1</option>
                  <option value="ap-south-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ap-south-1") {?>selected<?php }?>>Asia Pacific (Mumbai)</option>
                  <option value="ap-northeast-3" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ap-northeast-3") {?>selected<?php }?>>Asia Pacific (Osaka-Local) ap-northeast-3</option>
                  <option value="ap-northeast-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ap-northeast-2") {?>selected<?php }?>>Asia Pacific (Seoul) ap-northeast-2</option>
                  <option value="ap-southeast-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ap-southeast-1") {?>selected<?php }?>>Asia Pacific (Singapore) ap-southeast-1</option>
                  <option value="ap-southeast-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ap-southeast-2") {?>selected<?php }?>>Asia Pacific (Sydney) ap-southeast-2</option>
                  <option value="ap-northeast-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ap-northeast-1") {?>selected<?php }?>>Asia Pacific (Tokyo) ap-northeast-1</option>
                  <option value="ca-central-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "ca-central-1") {?>selected<?php }?>>Canada (Central) ca-central-1</option>
                  <option value="eu-central-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "eu-central-1") {?>selected<?php }?>>EU (Frankfurt) eu-central-1</option>
                  <option value="eu-west-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "eu-west-1") {?>selected<?php }?>>EU (Ireland) eu-west-1</option>
                  <option value="eu-west-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "eu-west-2") {?>selected<?php }?>>EU (London) eu-west-2</option>
                  <option value="eu-west-3" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "eu-west-3") {?>selected<?php }?>>EU (Paris) eu-west-3</option>
                  <option value="eu-north-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "eu-north-1") {?>selected<?php }?>>Europe (Stockholm) eu-north-1</option>
                  <option value="me-south-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "me-south-1") {?>selected<?php }?>>Middle East (Bahrain) me-south-1</option>
                  <option value="sa-east-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['s3_region'] == "sa-east-1") {?>selected<?php }?>>South America (São Paulo) sa-east-1</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 bucket region" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="s3_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['s3_key'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 Access Key ID" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="s3_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['s3_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Amazon S3 Access Key Secret" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label"></label>
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
                <button type="button" class="btn btn-danger js_admin-tester" data-handle="s3">
                  <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

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
          <!-- S3 -->

          <div class="divider"></div>

          <!-- Google -->
          <form class="js_ajax-forms" data-url="admin/settings.php?edit=google_cloud">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"google_cloud",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google Cloud" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable Google Cloud storage" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: Enable this will disable all other options" ));?>
)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="google_cloud_enabled">
                  <input type="checkbox" name="google_cloud_enabled" id="google_cloud_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['google_cloud_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Name" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="google_cloud_bucket" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['google_cloud_bucket'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Google Cloud bucket name" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google Cloud File" ));?>

              </label>
              <div class="col-md-9">
                <textarea name="google_cloud_file" id="google_cloud_file"><?php echo $_smarty_tpl->tpl_vars['system']->value['google_cloud_file'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your service account keys JSON" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label"></label>
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
                <button type="button" class="btn btn-danger js_admin-tester" data-handle="google_cloud">
                  <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

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
          <!-- Google -->

          <div class="divider"></div>

          <!-- DigitalOcean -->
          <form class="js_ajax-forms" data-url="admin/settings.php?edit=digitalocean">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"digitalocean",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "DigitalOcean Space" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable DigitalOcean storage" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: Enable this will disable all other options" ));?>
)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="digitalocean_enabled">
                  <input type="checkbox" name="digitalocean_enabled" id="digitalocean_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['digitalocean_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Space Name" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="digitalocean_space_name" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['digitalocean_space_name'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your DigitalOcean space name" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Space Region" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="digitalocean_space_region">
                  <option value="sfo2" <?php if ($_smarty_tpl->tpl_vars['system']->value['digitalocean_space_region'] == "sfo2") {?>selected<?php }?>>San Francisco 2</option>
                  <option value="sfo3" <?php if ($_smarty_tpl->tpl_vars['system']->value['digitalocean_space_region'] == "sfo3") {?>selected<?php }?>>San Francisco 3</option>
                  <option value="nyc3" <?php if ($_smarty_tpl->tpl_vars['system']->value['digitalocean_space_region'] == "nyc3") {?>selected<?php }?>>New York</option>
                  <option value="ams3" <?php if ($_smarty_tpl->tpl_vars['system']->value['digitalocean_space_region'] == "ams3") {?>selected<?php }?>>Amsterdam</option>
                  <option value="sgp1" <?php if ($_smarty_tpl->tpl_vars['system']->value['digitalocean_space_region'] == "sgp1") {?>selected<?php }?>>Singapore</option>
                  <option value="fra1" <?php if ($_smarty_tpl->tpl_vars['system']->value['digitalocean_space_region'] == "fra1") {?>selected<?php }?>>Frankfurt</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your DigitalOcean space region" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="digitalocean_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['digitalocean_key'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your DigitalOcean Access Key ID" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="digitalocean_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['digitalocean_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your DigitalOcean Access Key Secret" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label"></label>
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
                <button type="button" class="btn btn-danger js_admin-tester" data-handle="digitalocean">
                  <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

                </button>
              </div>
            </div>

            <!-- success -->
            <div class="alert alert-success mb20 x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger mt15 mb0 x-hidden"></div>
            <!-- error -->
          </form>
          <!-- DigitalOcean -->

          <div class="divider"></div>

          <!-- Wasabi -->
          <form class="js_ajax-forms" data-url="admin/settings.php?edit=wasabi">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wasabi",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Wasabi" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable Wasabi storage" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: Enable this will disable all other options" ));?>
)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="wasabi_enabled">
                  <input type="checkbox" name="wasabi_enabled" id="wasabi_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Name" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="wasabi_bucket" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['wasabi_bucket'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Wasabi bucket name" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Region" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="wasabi_region">
                  <option value="us-east-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "us-east-1") {?>selected<?php }?>>us-east-1</option>
                  <option value="us-east-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "us-east-2") {?>selected<?php }?>>us-east-2</option>
                  <option value="us-central-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "us-central-1") {?>selected<?php }?>>us-central-1</option>
                  <option value="us-west-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "us-west-1") {?>selected<?php }?>>us-west-1</option>
                  <option value="ca-central-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "ca-central-1") {?>selected<?php }?>>ca-central-1</option>
                  <option value="eu-central-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "eu-central-1") {?>selected<?php }?>>eu-central-1</option>
                  <option value="eu-central-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "eu-central-2") {?>selected<?php }?>>eu-central-2</option>
                  <option value="eu-west-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "eu-west-1") {?>selected<?php }?>>eu-west-1</option>
                  <option value="eu-west-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "eu-west-2") {?>selected<?php }?>>eu-west-2</option>
                  <option value="ap-northeast-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "ap-northeast-1") {?>selected<?php }?>>ap-northeast-1</option>
                  <option value="ap-northeast-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "ap-northeast-2") {?>selected<?php }?>>ap-northeast-2</option>
                  <option value="ap-southeast-1" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "ap-southeast-1") {?>selected<?php }?>>ap-southeast-1</option>
                  <option value="ap-southeast-2" <?php if ($_smarty_tpl->tpl_vars['system']->value['wasabi_region'] == "ap-southeast-2") {?>selected<?php }?>>ap-southeast-2</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Wasabi bucket region" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="wasabi_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['wasabi_key'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Wasabi Access Key ID" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="wasabi_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['wasabi_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Wasabi Access Key Secret" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label"></label>
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
                <button type="button" class="btn btn-danger js_admin-tester" data-handle="wasabi">
                  <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

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
          <!-- Wasabi -->

          <div class="divider"></div>

          <!-- Backblaze -->
          <form class="js_ajax-forms" data-url="admin/settings.php?edit=backblaze">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"backblaze",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Backblaze" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable Backblaze storage" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: Enable this will disable all other options" ));?>
)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="backblaze_enabled">
                  <input type="checkbox" name="backblaze_enabled" id="backblaze_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['backblaze_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Name" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="backblaze_bucket" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['backblaze_bucket'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Backblaze bucket name" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bucket Region" ));?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="backblaze_region">
                  <option value="eu-central-003" <?php if ($_smarty_tpl->tpl_vars['system']->value['backblaze_region'] == "eu-central-003") {?>selected<?php }?>>eu-central-003</option>
                  <option value="us-west-004" <?php if ($_smarty_tpl->tpl_vars['system']->value['backblaze_region'] == "us-west-004") {?>selected<?php }?>>us-west-004</option>
                  <option value="us-east-005" <?php if ($_smarty_tpl->tpl_vars['system']->value['backblaze_region'] == "us-east-005") {?>selected<?php }?>>us-east-005</option>
                </select>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Backblaze bucket region" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key ID" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="backblaze_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['backblaze_key'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Backblaze Access Key ID" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Access Key Secret" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="backblaze_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['backblaze_secret'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Backblaze Access Key Secret" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label"></label>
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
                <button type="button" class="btn btn-danger js_admin-tester" data-handle="backblaze">
                  <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

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
          <!-- Backblaze -->

        </div>
      </div>
      <!-- Cloud -->

      <!-- FTP -->
      <div class="tab-pane" id="FTP">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=ftp">
          <div class="card-body">
            <div class="alert alert-primary">
              <div class="icon">
                <i class="fa fa-server fa-2x"></i>
              </div>
              <div class="text">
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FTP Storage" ));?>
</strong><br>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Before enabling FTP Storage, make sure you upload the whole 'uploads' folder to your space" ));?>
.<br>
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Before disabling FTP Storage, make sure you download the whole 'uploads' folder to your server" ));?>
.
              </div>
            </div>

            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"server",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FTP Storage" ));?>
</div>
                <div class="form-text d-none d-sm-block">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable FTP Storage upload" ));?>
 (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: Enable this will disable all other options" ));?>
)
                </div>
              </div>
              <div class="text-end">
                <label class="switch" for="ftp_enabled">
                  <input type="checkbox" name="ftp_enabled" id="ftp_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['ftp_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hostname" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="ftp_hostname" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['ftp_hostname'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Port" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="ftp_port" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['ftp_port'];?>
" placeholder="21">
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Username" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="ftp_username" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['ftp_username'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Password" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="ftp_password" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['ftp_password'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FTP Path" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="ftp_path" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['ftp_path'];?>
" placeholder="./">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The path to your uploads folder (Examples: './' or 'public_html/uploads')" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "FTP Endpoint" ));?>

              </label>
              <div class="col-md-9">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                  <input type="text" class="form-control" name="ftp_endpoint" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['ftp_endpoint'];?>
">
                <?php } else { ?>
                  <input type="password" class="form-control" value="*********">
                <?php }?>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The URL to your uploads folder (Examples: 'https://domain.com/uploads' or 'https://64.233.191.255/uploads')" ));?>

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
            <button type="button" class="btn btn-danger js_admin-tester" data-handle="ftp">
              <i class="fa fa-bolt mr10"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Connection" ));?>

            </button>
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- FTP -->
    </div>
    <!-- tabs content -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "security") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Security" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Security -->
    <form class="js_ajax-forms" data-url="admin/settings.php?edit=security">
      <div class="card-body">
        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Unusual Login Detection" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable unusual login detection, System will not allow user to login with same session from different device or location" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="unusual_login_enabled">
              <input type="checkbox" name="unusual_login_enabled" id="unusual_login_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['unusual_login_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"firewall",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Brute Force Detection" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable brute force attack detection, System will block the user account if hacker try to login with invalid password too many times to guess the correct account password" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="brute_force_detection_enabled">
              <input type="checkbox" name="brute_force_detection_enabled" id="brute_force_detection_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['brute_force_detection_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bad Login Limit" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="brute_force_bad_login_limit" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['brute_force_bad_login_limit'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Number of bad login attempts till account get blocked" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Lockout Time" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="brute_force_lockout_time" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['brute_force_lockout_time'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Number of minutes the account will still locked out" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"fingerprint",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Two-Factor Authentication" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable two-factor authentication to log in with a code from your email/phone as well as a password" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="two_factor_enabled">
              <input type="checkbox" name="two_factor_enabled" id="two_factor_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Two-Factor Authentication Via" ));?>

          </label>
          <div class="col-md-9">
            <div class="form-check form-check-inline">
              <input type="radio" name="two_factor_type" id="two_factor_email" value="email" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_type'] == "email") {?>checked<?php }?>>
              <label class="form-check-label" for="two_factor_email"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Email" ));?>
</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="two_factor_type" id="two_factor_sms" value="sms" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_type'] == "sms") {?>checked<?php }?>>
              <label class="form-check-label" for="two_factor_sms"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS" ));?>
</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="two_factor_type" id="two_factor_google" value="google" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_type'] == "google") {?>checked<?php }?>>
              <label class="form-check-label" for="two_factor_google"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Google Authenticator" ));?>
</label>
            </div>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Email, SMS or Google Authenticator to send log in code to user" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/sms"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SMS Settings" ));?>
</a>
            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"reserved",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Reserved Usernames Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable Reserved Usernames" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="reserved_usernames_enabled">
              <input type="checkbox" name="reserved_usernames_enabled" id="reserved_usernames_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['reserved_usernames_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Reserved Usernames" ));?>

          </label>
          <div class="col-md-9">
            <textarea class="js_tagify x-hidden" name="reserved_usernames" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['reserved_usernames'];?>
</textarea>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"censored",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Censored Words Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable Words to be censored" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="censored_words_enabled">
              <input type="checkbox" name="censored_words_enabled" id="censored_words_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['censored_words_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Censored Words" ));?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="censored_words" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['censored_words'];?>
</textarea>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Words to be censored, separated by a comma (,)" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"html",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "HTML Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable HTML code in Rich Text Editor (blogs and forums)" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="html_richtext_enabled">
              <input type="checkbox" name="html_richtext_enabled" id="html_richtext_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['html_richtext_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"google_recaptcha",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "reCAPTCHA Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Turn reCAPTCHA On and Off" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="reCAPTCHA_enabled">
              <input type="checkbox" name="reCAPTCHA_enabled" id="reCAPTCHA_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['reCAPTCHA_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "reCAPTCHA Site Key" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="reCAPTCHA_site_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['reCAPTCHA_site_key'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "reCAPTCHA Secret Key" ));?>

          </label>
          <div class="col-md-9">
            <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
              <input type="text" class="form-control" name="reCAPTCHA_secret_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['reCAPTCHA_secret_key'];?>
">
            <?php } else { ?>
              <input type="password" class="form-control" value="*********">
            <?php }?>
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
    <!-- Security -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>

    <!-- card-header -->
    <div class="card-header with-icon with-nav">
      <!-- panel title -->
      <div class="mb20">
        <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payments" ));?>

      </div>
      <!-- panel title -->

      <!-- panel nav -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#Settings" data-bs-toggle="tab">
            <i class="fa fa-cog fa-fw mr5"></i><strong class="pr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Payments" data-bs-toggle="tab">
            <i class="fa fa-credit-card fa-fw mr5"></i><strong class="pr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Online Payments" ));?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Bank" data-bs-toggle="tab">
            <i class="fa fa-university fa-fw mr5"></i><strong class="pr5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Transfers" ));?>
</strong>
          </a>
        </li>
      </ul>
      <!-- panel nav -->
    </div>
    <!-- card-header -->

    <!-- tabs content -->
    <div class="tab-content">
      <!-- Settings -->
      <div class="tab-pane active" id="Settings">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=payments_settings">
          <div class="card-body">
            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Fees" ));?>

            </div>
            <div class="pl-md-4">
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"withdrawal",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payment Fees" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable Payment Fees" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="payment_fees_enabled">
                    <input type="checkbox" name="payment_fees_enabled" id="payment_fees_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['payment_fees_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Fees Percentage" ));?>
 (%)
                </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="payment_fees_percentage" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['payment_fees_percentage'];?>
">
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Percentage of fees to be added to the payment amount" ));?>

                  </div>
                </div>
              </div>
            </div>

            <div class="divider"></div>

            <div class="heading-small mb20">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "VAT" ));?>

            </div>
            <div class="pl-md-4">
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vat",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "VAT Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable VAT" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="payment_vat_enabled">
                    <input type="checkbox" name="payment_vat_enabled" id="payment_vat_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['payment_vat_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "VAT By User Country" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable/Disable VAT by user country" ));?>
 (<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/countries"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Manage Countries VAT" ));?>
</a>)</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="payment_country_vat_enabled">
                    <input type="checkbox" name="payment_country_vat_enabled" id="payment_country_vat_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['payment_country_vat_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Default VAT Percentage" ));?>
 (%)
                </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="payment_vat_percentage" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['payment_vat_percentage'];?>
">
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: If VAT By User Country enabled then VAT will be calculated based on user country VAT" ));?>
<br>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: If user didn't select his country then VAT will be calculated based on default VAT percentage" ));?>
<br>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Note: If country VAT is not set then VAT will be calculated based on default VAT percentage" ));?>
<br>
                  </div>
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
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- Settings -->

      <!-- Payments -->
      <div class="tab-pane" id="Payments">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=payments_methods">
          <div class="card-body">

            <!-- PayPal -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"paypal",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Paypal Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Paypal" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="paypal_enabled">
                    <input type="checkbox" name="paypal_enabled" id="paypal_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['paypal_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Paypal Mode" ));?>

                </label>
                <div class="col-md-9">
                  <div class="form-check form-check-inline">
                    <input type="radio" name="paypal_mode" id="paypal_live" value="live" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['paypal_mode'] == "live") {?>checked<?php }?>>
                    <label class="form-check-label" for="paypal_live"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live" ));?>
</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="paypal_mode" id="paypal_sandbox" value="sandbox" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['paypal_mode'] == "sandbox") {?>checked<?php }?>>
                    <label class="form-check-label" for="paypal_sandbox"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sandbox" ));?>
</label>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "PayPal Client ID" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="paypal_id" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['paypal_id'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "PayPal Secret Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="paypal_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['paypal_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "PayPal Webhook Id" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="paypal_webhook" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['paypal_webhook'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- PayPal -->

            <div class="divider"></div>

            <!-- Stripe -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"stripe",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stripe Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Credit Card" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="creditcard_enabled">
                    <input type="checkbox" name="creditcard_enabled" id="creditcard_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['creditcard_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"alipay",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Alipay Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Alipay" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="alipay_enabled">
                    <input type="checkbox" name="alipay_enabled" id="alipay_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['alipay_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stripe Mode" ));?>

                </label>
                <div class="col-md-9">
                  <div class="form-check form-check-inline">
                    <input type="radio" name="stripe_mode" id="stripe_live" value="live" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['stripe_mode'] == "live") {?>checked<?php }?>>
                    <label class="form-check-label" for="stripe_live"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live" ));?>
</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="stripe_mode" id="stripe_test" value="test" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['stripe_mode'] == "test") {?>checked<?php }?>>
                    <label class="form-check-label" for="stripe_test"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test" ));?>
</label>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Secret Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="stripe_test_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['stripe_test_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stripe secret key that starts with sk_" ));?>

                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Test Publishable Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="stripe_test_publishable" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['stripe_test_publishable'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stripe publishable key that starts with pk_" ));?>

                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live Secret Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="stripe_live_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['stripe_live_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stripe secret key that starts with sk_" ));?>

                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live Publishable Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="stripe_live_publishable" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['stripe_live_publishable'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stripe publishable key that starts with pk_" ));?>

                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Webhook Signing Secret" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="stripe_webhook" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['stripe_webhook'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Stripe webhook signing secret that starts with whsec_" ));?>

                  </div>
                </div>
              </div>
            </div>
            <!-- Stripe -->

            <div class="divider"></div>

            <!-- Paystack -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"paystack",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Paystack Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Paystack" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="paystack_enabled">
                    <input type="checkbox" name="paystack_enabled" id="paystack_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['paystack_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Secret Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="paystack_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['paystack_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Paystack secret key that starts with sk_" ));?>

                  </div>
                </div>
              </div>
            </div>
            <!-- Paystack -->

            <div class="divider"></div>

            <!-- CoinPayments -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"bitcoin",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "CoinPayments Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via CoinPayments" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="coinpayments_enabled">
                    <input type="checkbox" name="coinpayments_enabled" id="coinpayments_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['coinpayments_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Merchant ID" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="coinpayments_merchant_id" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['coinpayments_merchant_id'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "IPN Secret" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="coinpayments_ipn_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['coinpayments_ipn_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- CoinPayments -->

            <div class="divider"></div>

            <!-- 2Checkout -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"2co",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "2Checkout Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via 2Checkout" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="2checkout_enabled">
                    <input type="checkbox" name="2checkout_enabled" id="2checkout_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['2checkout_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "2Checkout Mode" ));?>

                </label>
                <div class="col-md-9">
                  <div class="form-check form-check-inline">
                    <input type="radio" name="2checkout_mode" id="2checkout_live" value="live" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['2checkout_mode'] == "live") {?>checked<?php }?>>
                    <label class="form-check-label" for="2checkout_live"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live" ));?>
</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="2checkout_mode" id="2checkout_sandbox" value="sandbox" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['2checkout_mode'] == "sandbox") {?>checked<?php }?>>
                    <label class="form-check-label" for="2checkout_sandbox"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Demo" ));?>
</label>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Merchant Code" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="2checkout_merchant_code" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['2checkout_merchant_code'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "API Publishable Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="2checkout_publishable_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['2checkout_publishable_key'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "API Private Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="2checkout_private_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['2checkout_private_key'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- 2Checkout -->

            <div class="divider"></div>

            <!-- Razorpay -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"razorpay",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Razorpay Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Razorpay" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="razorpay_enabled">
                    <input type="checkbox" name="razorpay_enabled" id="razorpay_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['razorpay_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Key ID" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="razorpay_key_id" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['razorpay_key_id'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Key Secret" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="razorpay_key_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['razorpay_key_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- Razorpay -->

            <div class="divider"></div>

            <!-- Cashfree -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <img width="40px" height="40px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/cashfree.png">
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Cashfree Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Cashfree" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="cashfree_enabled">
                    <input type="checkbox" name="cashfree_enabled" id="cashfree_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['cashfree_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Cashfree Mode" ));?>

                </label>
                <div class="col-md-9">
                  <div class="form-check form-check-inline">
                    <input type="radio" name="cashfree_mode" id="Cashfree_live" value="live" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['cashfree_mode'] == "live") {?>checked<?php }?>>
                    <label class="form-check-label" for="Cashfree_live"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Live" ));?>
</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="cashfree_mode" id="Cashfree_sandbox" value="sandbox" class="form-check-input" <?php if ($_smarty_tpl->tpl_vars['system']->value['cashfree_mode'] == "sandbox") {?>checked<?php }?>>
                    <label class="form-check-label" for="Cashfree_sandbox"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sandbox" ));?>
</label>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Client ID" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="cashfree_client_id" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['cashfree_client_id'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Client Secret" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="cashfree_client_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['cashfree_client_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- Cashfree -->

            <div class="divider"></div>

            <!-- Coinbase -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"coinbase",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Coinbase Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Coinbase" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="coinbase_enabled">
                    <input type="checkbox" name="coinbase_enabled" id="coinbase_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['coinbase_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "API Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="coinbase_api_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['coinbase_api_key'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- Coinbase -->

            <div class="divider"></div>

            <!-- SecurionPay -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"securionpay",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SecurionPay Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via SecurionPay" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="securionpay_enabled">
                    <input type="checkbox" name="securionpay_enabled" id="securionpay_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['securionpay_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "API Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="securionpay_api_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['securionpay_api_key'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "API Secret" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="securionpay_api_secret" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['securionpay_api_secret'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- SecurionPay -->

            <div class="divider"></div>

            <!-- MoneyPoolsCash -->
            <div>
              <div class="form-table-row">
                <div class="avatar">
                  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"moneypoolscash",'width'=>"40px",'height'=>"40px"), 0, true);
?>
                </div>
                <div>
                  <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "MoneyPoolsCash Enabled" ));?>
</div>
                  <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via MoneyPoolsCash" ));?>
</div>
                </div>
                <div class="text-end">
                  <label class="switch" for="moneypoolscash_enabled">
                    <input type="checkbox" name="moneypoolscash_enabled" id="moneypoolscash_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['moneypoolscash_enabled']) {?>checked<?php }?>>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "API Key" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="moneypoolscash_api_key" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['moneypoolscash_api_key'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Merchant Email" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="moneypoolscash_merchant_email" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['moneypoolscash_merchant_email'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Merchant Wallet Password" ));?>

                </label>
                <div class="col-md-9">
                  <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_demo']) {?>
                    <input type="text" class="form-control" name="moneypoolscash_merchant_password" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['moneypoolscash_merchant_password'];?>
">
                  <?php } else { ?>
                    <input type="password" class="form-control" value="*********">
                  <?php }?>
                  <div class="form-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "This required only for automatic withdrawal payments not for online payments" ));?>

                  </div>
                </div>
              </div>
            </div>
            <!-- MoneyPoolsCash -->

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
      </div>
      <!-- Payments -->

      <!-- Bank -->
      <div class="tab-pane" id="Bank">
        <form class="js_ajax-forms" data-url="admin/settings.php?edit=bank">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"bank",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Transfers Enabled" ));?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable payments via Bank Transfers" ));?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="bank_transfers_enabled">
                  <input type="checkbox" name="bank_transfers_enabled" id="bank_transfers_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Name" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="bank_name" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['bank_name'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Bank Name" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Account Number" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="bank_account_number" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_number'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Bank Account Number" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Account Name" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="bank_account_name" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_name'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Bank Account Name" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Account Routing Code" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="bank_account_routing" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_routing'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Bank Account Routing Code or SWIFT Code" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Account Country" ));?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="bank_account_country" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_country'];?>
">
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Bank Account Country" ));?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Transfer Note" ));?>

              </label>
              <div class="col-md-9">
                <textarea class="form-control" name="bank_transfer_note" rows="5"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_transfer_note'];?>
</textarea>
                <div class="form-text">
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "This note will be displayed to the user while upload his bank transfer receipt" ));?>

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
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
          </div>
        </form>
      </div>
      <!-- Bank -->
    </div>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "limits") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Limits" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Limits -->
    <form class="js_ajax-forms" data-url="admin/settings.php?edit=limits">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Data Heartbeat" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="data_heartbeat" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['data_heartbeat'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The update interval to check for new data (in seconds)" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Chat Heartbeat" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="chat_heartbeat" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['chat_heartbeat'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The update interval to check for new messages (in seconds)" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Offline After" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="offline_time" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['offline_time'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The amount of time to be considered online since the last user's activity (in seconds)" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The maximim value is one day = 86400 seconds" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Newsfeed Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="newsfeed_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['newsfeed_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of posts in the newsfeed" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pages Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="pages_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['pages_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the pages module" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Groups Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="groups_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['groups_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the groups module" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Events Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="events_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['events_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the events module" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Marketplace Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="marketplace_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['marketplace_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the marketplace module" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Offers Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="offers_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['offers_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the offers module" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jobs Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="jobs_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['jobs_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the jobs module" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Games Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="games_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['games_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the games module" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Search Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="search_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['search_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The number of results in the search module" ));?>

            </div>
          </div>
        </div>

        <div class="divider"></div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Minimum Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="min_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['min_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Min number of results per request" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Maximum Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="max_results" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_results'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Max number of results per request" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Minimum Even Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="min_results_even" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['min_results_even'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Min even number of results per request" ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Maximum Even Results" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="max_results_even" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['max_results_even'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The Max even number of results per request" ));?>

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
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>
    <!-- Limits -->

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "analytics") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-cog mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Settings" ));?>
 &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Analytics" ));?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Analytics -->
    <form class="js_ajax-forms" data-url="admin/settings.php?edit=analytics">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Tracking Code" ));?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="message" rows="3"><?php echo $_smarty_tpl->tpl_vars['system']->value['analytics_code'];?>
</textarea>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The analytics tracking code (Ex: Google Analytics)" ));?>

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
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>
    <!-- Analytics -->

  <?php }?>

</div><?php }
}
