<?php
/* Smarty version 5.4.1, created on 2024-10-10 19:36:49
  from 'file:admin.tools.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67082cd1b08819_97435228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46dd4d1a236e5f97ed9127d7d67848a49a29cbb0' => 
    array (
      0 => 'admin.tools.tpl',
      1 => 1722094727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 10,
    'file:__categories.recursive_options.tpl' => 2,
  ),
))) {
function content_67082cd1b08819_97435228 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="card">

  <?php if ($_smarty_tpl->getValue('sub_view') == "faker") {?>

    <!-- card-header -->
    <div class="card-header with-icon with-nav">
      <!-- panel title -->
      <div class="mb20">
        <i class="fa fa-toolbox mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Tools");?>
 &rsaquo; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Fake Generator");?>

      </div>
      <!-- panel title -->

      <!-- panel nav -->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#Users" data-bs-toggle="tab">
            <i class="fa fa-user fa-fw mr5"></i><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Users");?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Pages" data-bs-toggle="tab">
            <i class="fa fa-flag fa-fw mr5"></i><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Pages");?>
</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Groups" data-bs-toggle="tab">
            <i class="fa fa-users fa-fw mr5"></i><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Groups");?>
</strong>
          </a>
        </li>
      </ul>
      <!-- panel nav -->
    </div>
    <!-- card-header -->

    <!-- tab-content -->
    <div class="tab-content">
      <!-- Users -->
      <div class="tab-pane active" id="Users">
        <form class="js_ajax-forms" data-url="admin/tools.php?do=faker&handle=users">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"profile",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Random Pictures");?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Profile pictures will be generated randomly and may be dublicated");?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="users_random_Avatar">
                  <input type="checkbox" name="random_Avatar" id="users_random_Avatar">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Number of Users");?>

              </label>
              <div class="col-md-9">
                <input type="number" class="form-control" name="users_num" value="10">
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("How many users you want to generate (Maximum is 1000 per request)");?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Password");?>

              </label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="default_password">
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("This password will be used for all generated accounts (Default is 123456789)");?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Names Language");?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="language">
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('system')['languages'], 'language');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('language')->value) {
$foreach0DoElse = false;
?>
                    <?php $_smarty_tpl->assign('parts', $_smarty_tpl->getSmarty()->getModifierCallback('explode')('_',$_smarty_tpl->getValue('language')['code']), false, NULL);?>
                    <option <?php if ($_smarty_tpl->getValue('system')['default_language']['language_id'] == $_smarty_tpl->getValue('language')['language_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->getValue('parts')[0];?>
_<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('strtoupper')($_smarty_tpl->getValue('parts')[1]);?>
"><?php echo $_smarty_tpl->getValue('language')['title'];?>
</option>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select the language of generated names");?>

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
            <button type="submit" class="btn btn-danger"><i class="fa fa-bolt mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Generate");?>
</button>
          </div>
        </form>
      </div>
      <!-- Users -->

      <!-- Pages -->
      <div class="tab-pane" id="Pages">
        <form class="js_ajax-forms" data-url="admin/tools.php?do=faker&handle=pages">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"profile",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Random Pictures");?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Profile pictures will be generated randomly and may be dublicated");?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="pages_random_Avatar">
                  <input type="checkbox" name="random_Avatar" id="pages_random_Avatar">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Number of Pages");?>

              </label>
              <div class="col-md-9">
                <input type="number" class="form-control" name="pages_num" value="10">
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("How many pages you want to generate (Maximum is 1000 per request)");?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Names Language");?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="language">
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('system')['languages'], 'language');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('language')->value) {
$foreach1DoElse = false;
?>
                    <?php $_smarty_tpl->assign('parts', $_smarty_tpl->getSmarty()->getModifierCallback('explode')('_',$_smarty_tpl->getValue('language')['code']), false, NULL);?>
                    <option <?php if ($_smarty_tpl->getValue('system')['default_language']['language_id'] == $_smarty_tpl->getValue('language')['language_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->getValue('parts')[0];?>
_<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('strtoupper')($_smarty_tpl->getValue('parts')[1]);?>
"><?php echo $_smarty_tpl->getValue('language')['title'];?>
</option>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select the language of generated names");?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page Category");?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="category" id="category">
                  <option><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Category");?>
</option>
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pages_categories'), 'category');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach2DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Country");?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="country" id="country">
                  <option><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Country");?>
</option>
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('countries'), 'country');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach3DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('country')['country_id'];?>
"><?php echo $_smarty_tpl->getValue('country')['country_name'];?>
</option>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
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
            <button type="submit" class="btn btn-danger"><i class="fa fa-bolt mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Generate");?>
</button>
          </div>
        </form>
      </div>
      <!-- Pages -->

      <!-- Groups -->
      <div class="tab-pane" id="Groups">
        <form class="js_ajax-forms" data-url="admin/tools.php?do=faker&handle=groups">
          <div class="card-body">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"profile",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Random Pictures");?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Profile pictures will be generated randomly and may be dublicated");?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="groups_random_Avatar">
                  <input type="checkbox" name="random_Avatar" id="groups_random_Avatar">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Number of Groups");?>

              </label>
              <div class="col-md-9">
                <input type="number" class="form-control" name="groups_num" value="10">
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("How many groups you want to generate (Maximum is 1000 per request)");?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Names Language");?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="language">
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('system')['languages'], 'language');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('language')->value) {
$foreach4DoElse = false;
?>
                    <?php $_smarty_tpl->assign('parts', $_smarty_tpl->getSmarty()->getModifierCallback('explode')('_',$_smarty_tpl->getValue('language')['code']), false, NULL);?>
                    <option <?php if ($_smarty_tpl->getValue('system')['default_language']['language_id'] == $_smarty_tpl->getValue('language')['language_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->getValue('parts')[0];?>
_<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('strtoupper')($_smarty_tpl->getValue('parts')[1]);?>
"><?php echo $_smarty_tpl->getValue('language')['title'];?>
</option>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select the language of generated names");?>

                </div>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group Category");?>

              </label>
              <div class="col-md-9">
                <select class="form-select" name="category" id="category">
                  <option><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Category");?>
</option>
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('groups_categories'), 'category');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach5DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate('file:__categories.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
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
            <button type="submit" class="btn btn-danger"><i class="fa fa-bolt mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Generate");?>
</button>
          </div>
        </form>
      </div>
      <!-- Groups -->
    </div>
    <!-- tab-content -->

  <?php } elseif ($_smarty_tpl->getValue('sub_view') == "auto-connect") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-toolbox mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Tools");?>
 &rsaquo; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Connect");?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Auto Connect -->
    <form class="js_ajax-forms" data-url="admin/tools.php?do=auto-connect">
      <div class="card-body">
        <div class="alert alert-info">
          <div class="icon">
            <i class="fa fa-info-circle fa-2x"></i>
          </div>
          <div class="text pt5">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Before add custom auto-connect make sure you enabled getting started and location data is required");?>
.
          </div>
        </div>
        <div class="heading-small mb20">
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Friend");?>

        </div>
        <div class="pl-md-4">
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"friends",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Friend");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("When a user creates a new account, select which users you want to auto friend");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="auto_friend">
                <input type="checkbox" name="auto_friend" id="auto_friend" <?php if ($_smarty_tpl->getValue('system')['auto_friend']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- auto-freind-nodes -->
          <div class="js_auto-friend-nodes-list">
            <!-- auto-freind-system -->
            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Users");?>

              </label>
              <div class="col-md-9">
                <input type="text" class="js_tagify-ajax x-hidden" data-handle="users" name="auto_friend_users" value='<?php echo $_smarty_tpl->getValue('system')['auto_friend_users'];?>
'>
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for users you want new accounts to auto friend");?>
 (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("All Countries");?>
)
                </div>
              </div>
            </div>
            <!-- auto-freind-system -->
            <!-- auto-freind-custom -->
            <?php if ($_smarty_tpl->getValue('rows')['friend']) {?>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rows')['friend'], 'node');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('node')->value) {
$foreach6DoElse = false;
?>
                <div class="auto-connect-node">
                  <div class="row">
                    <label class="col-md-3 form-label">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Users");?>

                    </label>
                    <div class="col-md-9">
                      <select class="form-select mb10" name="auto_friend_country_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('countries'), 'country');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach7DoElse = false;
?>
                          <option <?php if ($_smarty_tpl->getValue('node')['country_id'] == $_smarty_tpl->getValue('country')['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->getValue('country')['country_id'];?>
"><?php echo $_smarty_tpl->getValue('country')['country_name'];?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </select>
                      <input type="text" class="js_tagify-ajax x-hidden" data-handle="users" name="auto_friend_nodes_ids_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
" value='<?php echo $_smarty_tpl->getValue('node')['nodes_ids'];?>
'>
                      <div class="form-text">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for users you want new accounts to auto connect");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("to this country");?>

                      </div>
                    </div>
                  </div>
                </div>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php }?>
            <!-- auto-freind-custom -->
          </div>
          <!-- auto-freind-nodes -->
          <!-- add-auto-connect-node -->
          <div class="add-auto-connect-node js_add-auto-connect-node" data-handle="friend">
            <i class="fas fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add Auto Friend Users For Specific Country");?>

          </div>
          <!-- add-auto-connect-node -->
        </div>

        <div class="divider"></div>

        <div class="heading-small mb20">
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Follow");?>

        </div>
        <div class="pl-md-4">
          <div class="form-table-row">
            <div class="avatar">
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"followers",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
            </div>
            <div>
              <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Follow");?>
</div>
              <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("When a user creates a new account, select which users you want to auto follow");?>
</div>
            </div>
            <div class="text-end">
              <label class="switch" for="auto_follow">
                <input type="checkbox" name="auto_follow" id="auto_follow" <?php if ($_smarty_tpl->getValue('system')['auto_follow']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
            </div>
          </div>
          <!-- auto-follow-nodes -->
          <div class="js_auto-follow-nodes-list">
            <!-- auto-follow-system -->
            <div class="row form-group">
              <label class="col-md-3 form-label">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Users");?>

              </label>
              <div class="col-md-9">
                <input type="text" class="js_tagify-ajax x-hidden" data-handle="users" name="auto_follow_users" value='<?php echo $_smarty_tpl->getValue('system')['auto_follow_users'];?>
'>
                <div class="form-text">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for users you want new accounts to auto follow");?>
 (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("All Countries");?>
)
                </div>
              </div>
            </div>
            <!-- auto-follow-system -->
            <!-- auto-follow-custom -->
            <?php if ($_smarty_tpl->getValue('rows')['follow']) {?>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rows')['follow'], 'node');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('node')->value) {
$foreach8DoElse = false;
?>
                <div class="auto-connect-node">
                  <div class="row">
                    <label class="col-md-3 form-label">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Users");?>

                    </label>
                    <div class="col-md-9">
                      <select class="form-control mb10" name="auto_follow_country_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('countries'), 'country');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach9DoElse = false;
?>
                          <option <?php if ($_smarty_tpl->getValue('node')['country_id'] == $_smarty_tpl->getValue('country')['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->getValue('country')['country_id'];?>
"><?php echo $_smarty_tpl->getValue('country')['country_name'];?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </select>
                      <input type="text" class="js_tagify-ajax x-hidden" data-handle="users" name="auto_follow_nodes_ids_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
" value='<?php echo $_smarty_tpl->getValue('node')['nodes_ids'];?>
'>
                      <div class="form-text">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for users you want new accounts to auto connect");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("to this country");?>

                      </div>
                    </div>
                  </div>
                </div>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php }?>
            <!-- auto-follow-custom -->
          </div>
          <!-- auto-follow-nodes -->
          <!-- add-auto-connect-node -->
          <div class="add-auto-connect-node js_add-auto-connect-node" data-handle="follow">
            <i class="fas fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add Auto Follow Users For Specific Country");?>

          </div>
          <!-- add-auto-connect-node -->
        </div>

        <div class="divider"></div>

        <?php if ($_smarty_tpl->getValue('system')['pages_enabled']) {?>
          <div class="heading-small mb20">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Like");?>

          </div>
          <div class="pl-md-4">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Like");?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("When a user creates a new account, select which pages you want to auto like");?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="auto_like">
                  <input type="checkbox" name="auto_like" id="auto_like" <?php if ($_smarty_tpl->getValue('system')['auto_like']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <!-- auto-like-nodes -->
            <div class="js_auto-like-nodes-list">
              <!-- auto-like-system -->
              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Pages");?>

                </label>
                <div class="col-md-9">
                  <input type="text" class="js_tagify-ajax x-hidden" data-handle="pages" name="auto_like_pages" value='<?php echo $_smarty_tpl->getValue('system')['auto_like_pages'];?>
'>
                  <div class="form-text">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for pages you want new accounts to auto like");?>
 (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("All Countries");?>
)
                  </div>
                </div>
              </div>
              <!-- auto-like-system -->
              <!-- auto-like-custom -->
              <?php if ($_smarty_tpl->getValue('rows')['like']) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rows')['like'], 'node');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('node')->value) {
$foreach10DoElse = false;
?>
                  <div class="auto-connect-node">
                    <div class="row">
                      <label class="col-md-3 form-label">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Pages");?>

                      </label>
                      <div class="col-md-9">
                        <select class="form-select mb10" name="auto_like_country_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
">
                          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('countries'), 'country');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach11DoElse = false;
?>
                            <option <?php if ($_smarty_tpl->getValue('node')['country_id'] == $_smarty_tpl->getValue('country')['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->getValue('country')['country_id'];?>
"><?php echo $_smarty_tpl->getValue('country')['country_name'];?>
</option>
                          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                        <input type="text" class="js_tagify-ajax x-hidden" data-handle="pages" name="auto_like_nodes_ids_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
" value='<?php echo $_smarty_tpl->getValue('node')['nodes_ids'];?>
'>
                        <div class="form-text">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for pages you want new accounts to auto connect");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("to this country");?>

                        </div>
                      </div>
                    </div>
                  </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              <?php }?>
              <!-- auto-like-custom -->
            </div>
            <!-- auto-like-nodes -->
            <!-- add-auto-connect-node -->
            <div class="add-auto-connect-node js_add-auto-connect-node" data-handle="like">
              <i class="fas fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add Auto Like Pages For Specific Country");?>

            </div>
            <!-- add-auto-connect-node -->
          </div>

          <div class="divider"></div>
        <?php }?>

        <?php if ($_smarty_tpl->getValue('system')['groups_enabled']) {?>
          <div class="heading-small mb20">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Join");?>

          </div>
          <div class="pl-md-4">
            <div class="form-table-row">
              <div class="avatar">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), (int) 0, $_smarty_current_dir);
?>
              </div>
              <div>
                <div class="form-label h6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Auto Join");?>
</div>
                <div class="form-text d-none d-sm-block"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("When a user creates a new account, select which groups you want to auto join");?>
</div>
              </div>
              <div class="text-end">
                <label class="switch" for="auto_join">
                  <input type="checkbox" name="auto_join" id="auto_join" <?php if ($_smarty_tpl->getValue('system')['auto_join']) {?>checked<?php }?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <!-- auto-join-nodes -->
            <div class="js_auto-join-nodes-list">
              <!-- auto-join-system -->
              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Groups");?>

                </label>
                <div class="col-md-9">
                  <input type="text" class="js_tagify-ajax x-hidden" data-handle="groups" name="auto_join_groups" value='<?php echo $_smarty_tpl->getValue('system')['auto_join_groups'];?>
'>
                  <div class="form-text">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for groups you want new accounts to auto join");?>
 (<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("All Countries");?>
)
                  </div>
                </div>
              </div>
              <!-- auto-join-system -->
              <!-- auto-join-custom -->
              <?php if ($_smarty_tpl->getValue('rows')['join']) {?>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rows')['join'], 'node');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('node')->value) {
$foreach12DoElse = false;
?>
                  <div class="auto-connect-node">
                    <div class="row">
                      <label class="col-md-3 form-label">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Groups");?>

                      </label>
                      <div class="col-md-9">
                        <select class="form-select mb10" name="auto_join_country_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
">
                          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('countries'), 'country');
$foreach13DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('country')->value) {
$foreach13DoElse = false;
?>
                            <option <?php if ($_smarty_tpl->getValue('node')['country_id'] == $_smarty_tpl->getValue('country')['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->getValue('country')['country_id'];?>
"><?php echo $_smarty_tpl->getValue('country')['country_name'];?>
</option>
                          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                        <input type="text" class="js_tagify-ajax x-hidden" data-handle="groups" name="auto_join_nodes_ids_<?php echo $_smarty_tpl->getValue('node')['country_id'];?>
" value='<?php echo $_smarty_tpl->getValue('node')['nodes_ids'];?>
'>
                        <div class="form-text">
                          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search for groups you want new accounts to auto connect");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("to this country");?>

                        </div>
                      </div>
                    </div>
                  </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              <?php }?>
              <!-- auto-join-custom -->
            </div>
            <!-- auto-join-nodes -->
            <!-- add-auto-connect-node -->
            <div class="add-auto-connect-node js_add-auto-connect-node" data-handle="join">
              <i class="fas fa-plus-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add Auto Join Groups For Specific Country");?>

            </div>
            <!-- add-auto-connect-node -->
          </div>
        <?php }?>

        <!-- success -->
        <div class="alert alert-success mt15 mb0 x-hidden"></div>
        <!-- success -->

        <!-- error -->
        <div class="alert alert-danger mt15 mb0 x-hidden"></div>
        <!-- error -->
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
</button>
      </div>
    </form>
    <!-- Auto Connect -->

  <?php } elseif ($_smarty_tpl->getValue('sub_view') == "garbage-collector") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-toolbox mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Tools");?>
 &rsaquo; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Garbage Collector");?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Garbage Collector -->
    <form class="js_ajax-forms" data-url="admin/tools.php?do=garbage-collector">
      <div class="card-body">

        <div class="alert alert-info">
          <div class="icon">
            <i class="fa fa-info-circle fa-2x"></i>
          </div>
          <div class="text pt5">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Garbage collector will perform the selected action and might take some time");?>

          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("What you want to do");?>

          </label>
          <div class="col-md-9">
            <select class="form-select" name="delete">
              <option value="users_not_activated"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete all not activated accounts");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_activated'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
              <option value="users_not_logged_week"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete users who did not login from 1 week");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_logged_week'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
              <option value="users_not_logged_month"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete users who did not login from 1 month");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_logged_month'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
              <option value="users_not_logged_3_months"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete users who did not login from 3 months");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_logged_3_months'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
              <option value="users_not_logged_6_months"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete users who did not login from 6 months");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_logged_6_months'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
              <option value="users_not_logged_9_months"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete users who did not login from 9 months");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_logged_9_months'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
              <option value="users_not_logged_year"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete users who did not login from 1 year");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_logged_year'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
              <option value="posts_longer_week"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete posts that are longer than 1 week");?>
 (<?php echo $_smarty_tpl->getValue('insights')['posts_longer_week'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("post");?>
)</option>
              <option value="posts_longer_month"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete posts that are longer than 1 month");?>
 (<?php echo $_smarty_tpl->getValue('insights')['posts_longer_month'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("post");?>
)</option>
              <option value="posts_longer_year"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete posts that are longer than 1 year");?>
 (<?php echo $_smarty_tpl->getValue('insights')['posts_longer_year'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("post");?>
)</option>
              <option value="packages"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reset all expired subscribers and their boosted posts and pages");?>
</option>
              <option value="user_points"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reset all users points");?>
</option>
              <option value="orphaned_data"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete orphaned data");?>
</option>
              <option value="clear_compiled_templates"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete compiled templates files");?>
</option>
              <option value="resend_activation_emails"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Resend Activation Emails");?>
 (<?php echo $_smarty_tpl->getValue('insights')['users_not_activated'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("user");?>
)</option>
            </select>
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
        <button type="submit" class="btn btn-danger"><i class="fa fa-bolt mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Run");?>
</button>
      </div>
    </form>
    <!-- Garbage Collector -->

  <?php } elseif ($_smarty_tpl->getValue('sub_view') == "backups") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-toolbox mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Tools");?>
 &rsaquo; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Backup Database & Files");?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Backup Database & Files -->
    <form class="js_ajax-forms" data-url="admin/tools.php?do=backups">
      <div class="card-body">

        <div class="alert alert-primary">
          <div class="icon">
            <i class="fa fa-server fa-2x"></i>
          </div>
          <div class="text">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You last backup");?>
 <span class="badge rounded-pill badge-lg bg-warning"><?php if ($_smarty_tpl->getValue('system')['last_backup_time']) {
echo $_smarty_tpl->getValue('system')['last_backup_time'];
} else {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("N/A");
}?></span><br>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You can find backups in");?>
 <strong>content/backups</strong><br>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Taking backup might take some time and you can download backups via FTP");?>

          </div>
        </div>

        <div class="h5 mb20 text-center">
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select which backup you would like to generate");?>

        </div>
        <!-- backup options -->
        <div class="text-center">
          <!-- Database -->
          <input class="x-hidden input-label" type="radio" name="backup_option" value="datebase_backup" id="datebase_backup" />
          <label class="button-label" for="datebase_backup">
            <div class="icon">
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"database",'class'=>"main-icon",'width'=>"32px",'height'=>"32px"), (int) 0, $_smarty_current_dir);
?>
            </div>
            <div class="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Database");?>
</div>
          </label>
          <!-- Database -->
          <!-- Files -->
          <input class="x-hidden input-label" type="radio" name="backup_option" value="files_backup" id="files_backup" />
          <label class="button-label" for="files_backup">
            <div class="icon">
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"files",'class'=>"main-icon",'width'=>"32px",'height'=>"32px"), (int) 0, $_smarty_current_dir);
?>
            </div>
            <div class="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Files");?>
</div>
          </label>
          <!-- Files -->
          <!-- Full -->
          <input class="x-hidden input-label" type="radio" name="backup_option" value="full_backup" id="full_backup" />
          <label class="button-label" for="full_backup">
            <div class="icon">
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"server",'class'=>"main-icon",'width'=>"32px",'height'=>"32px"), (int) 0, $_smarty_current_dir);
?>
            </div>
            <div class="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Full Backup");?>
</div>
          </label>
          <!-- Full -->
        </div>
        <!-- backup options -->

        <!-- success -->
        <div class="alert alert-success mt10 mb0 x-hidden"></div>
        <!-- success -->

        <!-- error -->
        <div class="alert alert-danger mt10 mb0 x-hidden"></div>
        <!-- error -->
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-danger"><i class="fa fa-bolt mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Run");?>
</button>
      </div>
    </form>
    <!-- Backup Database & Files -->

  <?php } elseif ($_smarty_tpl->getValue('sub_view') == "reset") {?>

    <!-- card-header -->
    <div class="card-header with-icon">
      <!-- panel title -->
      <i class="fa fa-toolbox mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Tools");?>
 &rsaquo; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Factory Reset");?>

      <!-- panel title -->
    </div>
    <!-- card-header -->

    <!-- Factory Reset -->
    <div class="card-body">
      <div class="alert alert-warning">
        <div class="icon">
          <i class="fa fa-exclamation-triangle fa-2x"></i>
        </div>
        <div class="text pt5">
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Once you reset your website all data will be deleted and it will be like having a fresh installation");?>
<br>
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("(Note: All system settings will be saved)");?>

        </div>
      </div>

      <div class="text-center">
        <button class="btn btn-danger js_admin-reset">
          <i class="fa fa-trash fa-lg mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reset Everything");?>

        </button>
      </div>
    </div>
    <!-- Factory Reset -->

  <?php }?>

</div><?php }
}
