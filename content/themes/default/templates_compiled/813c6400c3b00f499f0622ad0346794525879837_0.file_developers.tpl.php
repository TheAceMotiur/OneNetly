<?php
/* Smarty version 5.4.1, created on 2024-09-29 19:40:27
  from 'file:developers.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f9ad2b2f0492_55625366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '813c6400c3b00f499f0622ad0346794525879837' => 
    array (
      0 => 'developers.tpl',
      1 => 1695976602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__svg_icons.tpl' => 6,
    'file:_no_data.tpl' => 1,
    'file:__categories.recursive_options.tpl' => 2,
    'file:_footer.tpl' => 1,
  ),
))) {
function content_66f9ad2b2f0492_55625366 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
$_smarty_tpl->renderSubTemplate('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<!-- page header -->
<div class="page-header">
  <?php if ($_smarty_tpl->getValue('view') == "share") {?>
    <img class="floating-img d-none d-md-block" src="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->getValue('system')['theme'];?>
/images/headers/undraw_share_766i.svg">
  <?php } else { ?>
    <img class="floating-img d-none d-md-block" src="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->getValue('system')['theme'];?>
/images/headers/undraw_code_typing_7jnv.svg">
  <?php }?>
  <div class="circle-2"></div>
  <div class="circle-3"></div>
  <div class="inner">
    <h2><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Developers");?>
</h2>
    <p class="text-xlg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Explore the developer tools we offer");?>
</p>
  </div>
</div>
<!-- page header -->

<!-- page content -->
<div class="<?php if ($_smarty_tpl->getValue('system')['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> sg-offcanvas" style="margin-top: -25px;">
  <div class="row">

    <!-- side panel -->
    <div class="col-12 d-block d-md-none sg-offcanvas-sidebar mt20">
      <?php $_smarty_tpl->renderSubTemplate('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>
    <!-- side panel -->

    <!-- content panel -->
    <div class="col-12 sg-offcanvas-mainbar">

      <!-- tabs -->
      <div class="position-relative">
        <div class="content-tabs rounded-sm shadow-sm clearfix">
          <ul>
            <?php if ($_smarty_tpl->getValue('system')['developers_apps_enabled']) {?>
              <li <?php if ($_smarty_tpl->getValue('view') == '') {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"developers",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Documentation");?>

                </a>
              </li>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('user')->_logged_in && $_smarty_tpl->getValue('system')['developers_apps_enabled']) {?>
              <li <?php if ($_smarty_tpl->getValue('view') == "apps" || $_smarty_tpl->getValue('view') == "new" || $_smarty_tpl->getValue('view') == "edit") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/apps">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"admin_panel",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("My Apps");?>

                </a>
              </li>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('system')['developers_share_enabled']) {?>
              <li <?php if ($_smarty_tpl->getValue('view') == "share") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/share">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"share_plugin",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share Plugin");?>

                </a>
              </li>
            <?php }?>
          </ul>
        </div>
      </div>
      <!-- tabs -->

      <?php if ($_smarty_tpl->getValue('view') == '') {?>

        <!-- docs -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"developers",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Documentation");?>

          </div>
          <div class="card-body page-content pt30" style="font-size: 1.1em;">
            <p>
              <small><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("API Version");?>
 <span class="badge bg-secondary">1.1</span></small>
            </p>
            <p>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("This documentation explain how to register, configure, and develop your app so you can successfully use our APIs");?>

            </p>

            <h5 class="mt30 mb20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Create App");?>
</h5>
            <p>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("In order for your app to access our APIs, you must register your app using the");?>
 <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/apps"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Dashboard");?>
</a>. <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Registration creates an App ID that lets us know who you are, helps us distinguish your app from other apps");?>
.
            </p>
            <ol>
              <li class="mb20">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You will need to create a new App");?>

                <a class="btn btn-sm btn-primary ml10" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/new">
                  <i class="fa fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Create New App");?>

                </a>
              </li>
              <li class="mb20">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Once you created your App you will get your");?>
 <span class="badge bg-primary">app_id</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("and");?>
 <span class="badge bg-primary">app_secret</span>
              </li>
            </ol>

            <h5 class="mt30 mb20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Log in With");?>
</h5>
            <p>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Log in With system is a fast and convenient way for people to create accounts and log into your app. Our Log in With system enables two scenarios, authentication and asking for permissions to access people's data. You can use Login With system simply for authentication or for both authentication and data access");?>
.
            </p>
            <ol>
              <li class="mb20">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Starting the OAuth login process, You need to use a link for your app like this");?>
:
                <pre class="mtb10">&lt;a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/api/oauth?app_id=YOUR_APP_ID"&gt;Log in With <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('system')['system_title']);?>
&lt;/a&gt;</pre>
                <p style="font-size: 15px;">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The user will be redirect to Log in With page like this");?>

                </p>
                <div class="text-center">
                  <img class="img-fluid" width="400" src="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->getValue('system')['theme'];?>
/images/screenshots/login_with.png">
                </div>
              </li>
              <li class="mb20">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Once the user accpeted your app, the user will be redirected to your App Redirect URL with");?>
 <span class="badge bg-info">auth_key</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("like this");?>
:
                <pre class="mtb10">https://mydomain.com/my_redirect_url.php?auth_key=AUTH_KEY</pre>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("This");?>
 <span class="badge bg-info">auth_key</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("valid only for one time usage, so once you used it you will not be able to use it again and generate new code you will need to redirect the user to the log in with link again");?>
.
              </li>
            </ol>

            <h5 class="mt30 mb20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Access Token");?>
</h5>
            <p>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Once you get the user approval of your app Log in With window and returned with the");?>
 <span class="badge bg-info">auth_key</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("which means that now you are ready to retrive data from our APIs and to start this process you will need to authorize your app and get the");?>
 <span class="badge bg-danger">access_token</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("and you can follow our steps to learn how to get it");?>
.
            </p>
            <ol>
              <li class="mb20">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("To get an access token, make an HTTP GET request to the following endpoint like this");?>
:
                <pre class="mtb10">
            &lt;?php
            $app_id = "YOUR_APP_ID"; // your app id
            $app_secret = "YOUR_APP_SECRET"; // your app secret
            $auth_key = $_GET['auth_key']; // the returned auth key from previous step

            $get = file_get_contents("<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/api/authorize?app_id=$app_id&app_secret=$app_secret&auth_key=$auth_key");

            $json = json_decode($get, true);
            if(!empty($json['access_token'])) {
                $access_token = $json['access_token']; // your access token
            }
            ?&gt;                                                                                                
                            </pre>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("This");?>
 <span class="badge bg-danger">access_token</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("valid only for only one 1 hour, so once it got invalid you will need to genarte new one by redirect the user to the log in with link again");?>
.
              </li>
            </ol>

            <h5 class="mt30 mb20"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("APIs");?>
</h5>
            <p>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Once you get your");?>
 <span class="badge bg-danger">access_token</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Now you can retrieve informations from our system via HTTP GET requests which supports the following parameters");?>

            </p>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Endpoint");?>
</th>
                    <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Description");?>
</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>api/<span class="badge bg-warning">get_user_info</span></td>
                    <td>
                      <p>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("get user info");?>

                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <p>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You can retrive user info like this");?>

            </p>
            <pre>
            if(!empty($json['access_token'])) {
                $access_token = $json['access_token']; // your access token
                $get = file_get_contents("<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/api/get_user_info?access_token=$access_token");
            }
                        </pre>
            <p>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The result will be");?>
:
            </p>
            <pre>
            {
              "user_info": {
              "user_id": "",
              "user_name": "",
              "user_email": "",
              "user_firstname": "",
              "user_lastname": "",
              "user_gender": "",
              "user_birthdate": "",
              "user_picture": "",
              "user_cover": "",
              "user_registered": "",
              "user_verified": "",
              "user_relationship": "",
              "user_biography": "",
              "user_website": ""
              }
            }
                      </pre>
          </div>
        </div>
        <!-- docs -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "apps") {?>

        <!-- apps -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <a class="btn btn-md btn-primary float-end" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/new">
              <i class="fa fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Create New App");?>

            </a>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"admin_panel",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("My Apps");?>

          </div>
          <div class="card-body">
            <?php if ($_smarty_tpl->getValue('apps')) {?>
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover js_dataTable">
                  <thead>
                    <tr>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("ID");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Name");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App ID");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Secret");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Created");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Actions");?>
</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('apps'), 'app');
$_smarty_tpl->getVariable('app')->iteration = 0;
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('app')->value) {
$foreach0DoElse = false;
$_smarty_tpl->getVariable('app')->iteration++;
$foreach0Backup = clone $_smarty_tpl->getVariable('app');
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->getVariable('app')->iteration;?>
</td>
                        <td>
                          <a target="_blank" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/edit/<?php echo $_smarty_tpl->getValue('app')['app_auth_id'];?>
">
                            <img class="tbl-image" src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('app')['app_icon'];?>
">
                            <?php echo $_smarty_tpl->getValue('app')['app_name'];?>

                          </a>
                        </td>
                        <td><?php echo $_smarty_tpl->getValue('app')['app_auth_id'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('app')['app_auth_secret'];?>
</td>
                        <td>
                          <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('app')['app_date'];?>
"><?php echo $_smarty_tpl->getValue('app')['app_date'];?>
</span>
                        </td>
                        <td>
                          <a data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit");?>
' href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/edit/<?php echo $_smarty_tpl->getValue('app')['app_auth_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                            <i class="fa fa-pencil-alt"></i>
                          </a>
                          <button data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_developers-delete-app" data-id="<?php echo $_smarty_tpl->getValue('app')['app_auth_id'];?>
">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                    <?php
$_smarty_tpl->setVariable('app', $foreach0Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </tbody>
                </table>
              </div>
            <?php } else { ?>
              <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <?php }?>
          </div>
        </div>
        <!-- apps -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "new") {?>

        <!-- new app -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <div class="float-end">
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/apps" class="btn btn-md btn-light">
                <i class="fa fa-arrow-circle-left mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Go Back");?>

              </a>
            </div>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Create New App");?>

          </div>
          <form class="js_ajax-forms" data-url="developers/app.php?do=create">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-md-auto">
                  <div class="form-group">
                    <label class="form-label" for="app_name"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Name");?>
</label>
                    <input type="text" class="form-control" name="app_name">
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your App Name");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_domain"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Domain");?>
</label>
                    <input type="text" class="form-control" name="app_domain">
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your App domain (example: www.domain.com)");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_redirect_url"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Redirect URL");?>
</label>
                    <input type="text" class="form-control" name="app_redirect_url">
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your App Redirect URL (example: https://www.domain.com/test.php)");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_description"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Description");?>
</label>
                    <textarea class="form-control" name="app_description" rows="5"></textarea>
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Set a description for your App (maximum 200 characters)");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_category"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Category");?>
</label>
                    <select class="form-select" name="app_category" id="app_category">
                      <option><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Category");?>
</option>
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach1DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select a category for your App");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_icon"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Icon (1024 x 1024)");?>
</label>
                    <div class="x-image">
                      <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Remove");?>
'>

                      </button>
                      <div class="x-image-loader">
                        <div class="progress x-progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                      <input type="hidden" class="js_x-image-input" name="app_icon">
                    </div>
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Icon (1024 x 1024), supported formats (JPG, PNG)");?>

                    </div>
                  </div>

                  <!-- error -->
                  <div class="alert alert-danger mt15 mb0 x-hidden"></div>
                  <!-- error -->
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Create");?>

              </button>
            </div>
          </form>
        </div>
        <!-- new app -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "edit") {?>

        <!-- edit app -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <div class="float-end">
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/developers/apps" class="btn btn-md btn-light">
                <i class="fa fa-arrow-circle-left mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Go Back");?>

              </a>
            </div>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit App");?>

          </div>
          <form class="js_ajax-forms" data-url="developers/app.php?do=edit&id=<?php echo $_smarty_tpl->getValue('app')['app_auth_id'];?>
">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-md-auto">
                  <div class="form-group">
                    <label class="form-label" for="app_auth_id"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App ID");?>
</label>
                    <input disabled type="text" class="form-control" name="app_auth_id" value="<?php echo $_smarty_tpl->getValue('app')['app_auth_id'];?>
">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_auth_secret"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Secret");?>
</label>
                    <input disabled type="text" class="form-control" name="app_auth_secret" value="<?php echo $_smarty_tpl->getValue('app')['app_auth_secret'];?>
">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_name"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Name");?>
</label>
                    <input type="text" class="form-control" name="app_name" value="<?php echo $_smarty_tpl->getValue('app')['app_name'];?>
">
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your App Name");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_domain"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Domain");?>
</label>
                    <input type="text" class="form-control" name="app_domain" value="<?php echo $_smarty_tpl->getValue('app')['app_domain'];?>
">
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your App domain (example: www.domain.com)");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_redirect_url"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Redirect URL");?>
</label>
                    <input type="text" class="form-control" name="app_redirect_url" value="<?php echo $_smarty_tpl->getValue('app')['app_redirect_url'];?>
">
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your App Redirect URL (example: https://www.domain.com/test.php)");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_description"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Description");?>
</label>
                    <textarea class="form-control" name="app_description" rows="5"><?php echo $_smarty_tpl->getValue('app')['app_description'];?>
</textarea>
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Set a description for your App (maximum 200 characters)");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_category"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Category");?>
</label>
                    <select class="form-select" name="app_category" id="app_category">
                      <option><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Category");?>
</option>
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach2DoElse = false;
?>
                        <?php $_smarty_tpl->renderSubTemplate('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('data_category'=>$_smarty_tpl->getValue('app')['app_category_id']), (int) 0, $_smarty_current_dir);
?>
                      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select a category for your App");?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="app_icon"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Icon (1024 x 1024)");?>
</label>

                    <?php if ($_smarty_tpl->getValue('app')['app_icon'] == '') {?>
                      <div class="x-image">
                        <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Remove");?>
'>

                        </button>
                        <div class="x-image-loader">
                          <div class="progress x-progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                        <input type="hidden" class="js_x-image-input" name="app_icon">
                      </div>
                    <?php } else { ?>
                      <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('app')['app_icon'];?>
')">
                        <button type="button" class="btn-close js_x-image-remover" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Remove");?>
'>

                        </button>
                        <div class="x-image-loader">
                          <div class="progress x-progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                        <input type="hidden" class="js_x-image-input" name="app_icon" value="<?php echo $_smarty_tpl->getValue('app')['app_icon'];?>
">
                      </div>
                    <?php }?>
                    <div class="form-text">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("App Icon (1024 x 1024), supported formats (JPG, PNG)");?>

                    </div>
                  </div>

                  <!-- success -->
                  <div class="alert alert-success mt15 mb0 x-hidden"></div>
                  <!-- success -->

                  <!-- error -->
                  <div class="alert alert-danger mt15 mb0 x-hidden"></div>
                  <!-- error -->
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
</button>
            </div>
          </form>
        </div>
        <!-- edit app -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "share") {?>

        <!-- share plugin -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"share_plugin",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share Plugin");?>

          </div>
          <div class="card-body page-content">
            <h6>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add the following code in your site, inside the head tag");?>
:
            </h6>
            <pre>
            &lt;script&gt;
              function SocialShare(url) {
                  window.open('<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/share?url=' + url, '', 'height=600,width=800');
              }
            &lt;/script&gt;
            </pre>
            <h6>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Then place the share button after changing the URL you want to share to your page HTML");?>
:
            </h6>
            <pre>&lt;button onclick="SocialShare('http://yoursite.com/')"&gt;Share&lt;/button&gt;</pre>
            <h6>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Also you can use this code to share the current page");?>
:
            </h6>
            <pre>&lt;button onclick="SocialShare(window.location.href)"&gt;Share&lt;/button&gt;</pre>
            <h6>
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Example");?>
:
            </h6>
            <?php echo '<script'; ?>
>
              function SocialShare(url) {
                window.open(site_path + '/share?url=' + url, '', 'height=600,width=800');
              }
            <?php echo '</script'; ?>
>
            <button class="btn btn-md btn-primary" onclick="SocialShare(window.location.href)"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share");?>
</button>
          </div>
        </div>
        <!-- share plugin -->

      <?php }?>
    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->renderSubTemplate('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
