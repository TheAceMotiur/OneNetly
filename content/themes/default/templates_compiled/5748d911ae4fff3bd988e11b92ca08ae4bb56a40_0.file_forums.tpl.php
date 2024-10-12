<?php
/* Smarty version 5.4.1, created on 2024-09-29 11:20:34
  from 'file:forums.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f93802c43e81_84166304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5748d911ae4fff3bd988e11b92ca08ae4bb56a40' => 
    array (
      0 => 'forums.tpl',
      1 => 1698934756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__svg_icons.tpl' => 7,
    'file:_no_data.tpl' => 4,
    'file:admin.forums.recursive_options.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
))) {
function content_66f93802c43e81_84166304 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
$_smarty_tpl->renderSubTemplate('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<!-- page header -->
<div class="page-header">
  <img class="floating-img d-none d-md-block" src="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->getValue('system')['theme'];?>
/images/headers/undraw_elements_cipa.svg">
  <div class="circle-2"></div>
  <div class="circle-3"></div>
  <div class="inner">
    <h2><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forums");?>
</h2>
    <p class="text-xlg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('system')['system_description_forums']);?>
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

      <div class="position-relative">
        <!-- tabs -->
        <div class="content-tabs rounded-sm shadow-sm clearfix">
          <ul>
            <li <?php if ($_smarty_tpl->getValue('view') == '') {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"home",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>

              </a>
            </li>
            <?php if ($_smarty_tpl->getValue('user')->_logged_in) {?>
              <li <?php if ($_smarty_tpl->getValue('view') == "my-threads") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/my-threads">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"documents",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("My Threads");?>

                </a>
              </li>
              <li <?php if ($_smarty_tpl->getValue('view') == "my-replies") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/my-replies">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comments",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("My Replies");?>

                </a>
              </li>
            <?php }?>
            <li <?php if ($_smarty_tpl->getValue('view') == "search") {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/search">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"search",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>

              </a>
            </li>
          </ul>
        </div>
        <!-- tabs -->
      </div>

      <?php if ($_smarty_tpl->getValue('view') == '') {?>
        <!-- forums -->
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('forums'), 'forum');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('forum')->value) {
$foreach0DoElse = false;
?>
          <div class="forum-category">
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('forum')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('forum')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('forum')['forum_name']);?>
</a>
            <div class="float-end pointer">
              <i class="fa fa-sort js_forum-toggle"></i>
            </div>
          </div>
          <?php if ($_smarty_tpl->getValue('forum')['childs']) {?>
            <div class="js_forum-toggle-wrapper">
              <div class="row forum-head">
                <div class="col-12 col-sm-8 column">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forums");?>

                </div>
                <div class="col-sm-2 d-none d-sm-block column">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Threads");?>

                </div>
                <div class="col-sm-2 d-none d-sm-block column">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>

                </div>
              </div>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('forum')['childs'], '_forum');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_forum')->value) {
$foreach1DoElse = false;
?>
                <div class="row forum-row">
                  <div class="col-sm-1 d-none d-sm-block column icon">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comments",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  </div>
                  <div class="col-12 col-sm-7 column">
                    <div class="mb5">
                      <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('_forum')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('_forum')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('_forum')['forum_name']);?>
</a></strong>
                      <span class="visible-xs-inline-block">(<?php echo $_smarty_tpl->getValue('_forum')['total_threads'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Threads");?>
 / <?php echo $_smarty_tpl->getValue('_forum')['total_replies'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
)</span>
                    </div>
                    <div class="mb5">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('_forum')['forum_description']);?>

                    </div>
                    <?php if ($_smarty_tpl->getValue('_forum')['childs']) {?>
                      <div class="mb5"><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sub-Forums");?>
:</strong></div>
                      <div>
                        <ul class="sub-forums">
                          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('_forum')['childs'], '__forum', true);
$_smarty_tpl->getVariable('__forum')->iteration = 0;
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('__forum')->value) {
$foreach2DoElse = false;
$_smarty_tpl->getVariable('__forum')->iteration++;
$_smarty_tpl->getVariable('__forum')->last = $_smarty_tpl->getVariable('__forum')->iteration === $_smarty_tpl->getVariable('__forum')->total;
$foreach2Backup = clone $_smarty_tpl->getVariable('__forum');
?>
                            <li><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('__forum')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('_forum')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('__forum')['forum_name']);?>
</a><?php if (!$_smarty_tpl->getVariable('__forum')->last) {?>, <?php }?></li>
                          <?php
$_smarty_tpl->setVariable('__forum', $foreach2Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </ul>
                      </div>
                    <?php }?>
                  </div>
                  <div class="col-sm-2 d-none d-sm-block column text-center">
                    <?php echo $_smarty_tpl->getValue('_forum')['total_threads'];?>

                  </div>
                  <div class="col-sm-2 d-none d-sm-block column text-center">
                    <?php echo $_smarty_tpl->getValue('_forum')['total_replies'];?>

                  </div>
                </div>
              <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
          <?php }?>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        <!-- forums -->

        <!-- forums meta -->
        <?php if ($_smarty_tpl->getValue('system')['forums_online_enabled'] || $_smarty_tpl->getValue('system')['forums_statistics_enabled']) {?>
          <div class="forum-category">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("What's Going On?");?>

          </div>
          <!-- online users -->
          <?php if ($_smarty_tpl->getValue('system')['forums_online_enabled']) {?>
            <div class="forum-meta-head">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Who's online");?>
<span class="badge badge-lg bg-secondary ml5"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('online_users')),0);?>
</span>
            </div>
            <div class="forum-meta-conent">
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('online_users'), '_user', true);
$_smarty_tpl->getVariable('_user')->iteration = 0;
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach3DoElse = false;
$_smarty_tpl->getVariable('_user')->iteration++;
$_smarty_tpl->getVariable('_user')->last = $_smarty_tpl->getVariable('_user')->iteration === $_smarty_tpl->getVariable('_user')->total;
$foreach3Backup = clone $_smarty_tpl->getVariable('_user');
?>
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('_user')['user_name'];?>
">
                  <?php if ($_smarty_tpl->getValue('system')['show_usernames_enabled']) {?>
                    <?php echo $_smarty_tpl->getValue('_user')['user_name'];?>

                  <?php } else { ?>
                    <?php echo $_smarty_tpl->getValue('_user')['user_firstname'];?>
 <?php echo $_smarty_tpl->getValue('_user')['user_lastname'];?>

                  <?php }?>
                </a>
                <?php if (!$_smarty_tpl->getVariable('_user')->last) {?>, <?php }?>
              <?php
$_smarty_tpl->setVariable('_user', $foreach3Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
          <?php }?>
          <!-- online users -->
          <!-- statistics -->
          <?php if ($_smarty_tpl->getValue('system')['forums_statistics_enabled']) {?>
            <div class="forum-meta-head">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forum Statistics");?>

            </div>
            <div class="forum-meta-conent">
              <span class="pr10"><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Threads");?>
</strong>: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('insights')['threads'],0);?>
</span>
              <span class="pr10"><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
</strong>: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('insights')['replies'],0);?>
</span>
              <span class="pr10"><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>
</strong>: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('insights')['users'],0);?>
</span>
            </div>
          <?php }?>
          <!-- statistics -->
        <?php }?>
        <!-- forums meta -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "forum") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <?php if ($_smarty_tpl->getValue('forum')['parents']) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('array_reverse')($_smarty_tpl->getValue('forum')['parents']), 'parent');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('parent')->value) {
$foreach4DoElse = false;
?>
              <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('parent')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('parent')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('parent')['forum_name']);?>
</a></li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php }?>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('forum')['forum_name']);?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- forum title & description -->
        <div class="forum-title clearfix">
          <?php if ($_smarty_tpl->getValue('forum')['forum_section'] != '0') {?>
            <div class="float-end">
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/new-thread/<?php echo $_smarty_tpl->getValue('forum')['forum_id'];?>
" class="btn btn-md btn-success">
                <i class="fa fa-edit mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Write New Thread");?>

              </a>
            </div>
          <?php }?>
          <h1><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('forum')['forum_name']);?>
</h1>
          <p><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('forum')['forum_description']);?>
</p>
        </div>
        <!-- forum title & description -->

        <!-- forum-category -->
        <?php if ($_smarty_tpl->getValue('forum')['forum_section'] == '0') {?>
          <div class="forum-category">
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('forum')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('forum')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('forum')['forum_name']);?>
</a>
          </div>
        <?php }?>
        <!-- forum-category -->

        <!-- childs (forums|sub-forums) -->
        <?php if ($_smarty_tpl->getValue('forum')['childs']) {?>
          <div class="row forum-head">
            <div class="col-12 col-sm-8 column">
              <?php if ($_smarty_tpl->getValue('forum')['forum_section'] == '0') {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forums");
} else {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sub-Forums");
}?>
            </div>
            <div class="col-sm-2 d-none d-sm-block column">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Threads");?>

            </div>
            <div class="col-sm-2 d-none d-sm-block column">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>

            </div>
          </div>
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('forum')['childs'], '_forum');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_forum')->value) {
$foreach5DoElse = false;
?>
            <div class="row forum-row">
              <div class="col-sm-1 d-none d-sm-block column icon">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comments",'class'=>"main-icon",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
              </div>
              <div class="col-12 col-sm-7 column">
                <div class="mb5">
                  <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('_forum')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('_forum')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('_forum')['forum_name']);?>
</a></strong>
                  <span class="visible-xs-inline-block">(<?php echo $_smarty_tpl->getValue('_forum')['total_threads'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Threads");?>
 / <?php echo $_smarty_tpl->getValue('_forum')['total_replies'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
)</span>
                </div>
                <div class="mb5">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('_forum')['forum_description']);?>

                </div>
                <?php if ($_smarty_tpl->getValue('_forum')['childs']) {?>
                  <div class="mb5"><strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Sub-Forums");?>
:</strong></div>
                  <div>
                    <ul class="sub-forums">
                      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('_forum')['childs'], '__forum', true);
$_smarty_tpl->getVariable('__forum')->iteration = 0;
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('__forum')->value) {
$foreach6DoElse = false;
$_smarty_tpl->getVariable('__forum')->iteration++;
$_smarty_tpl->getVariable('__forum')->last = $_smarty_tpl->getVariable('__forum')->iteration === $_smarty_tpl->getVariable('__forum')->total;
$foreach6Backup = clone $_smarty_tpl->getVariable('__forum');
?>
                        <li><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('__forum')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('_forum')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('__forum')['forum_name']);?>
</a><?php if (!$_smarty_tpl->getVariable('__forum')->last) {?>, <?php }?></li>
                      <?php
$_smarty_tpl->setVariable('__forum', $foreach6Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                  </div>
                <?php }?>
              </div>
              <div class="col-sm-2 d-none d-sm-block column text-center">
                <?php echo $_smarty_tpl->getValue('_forum')['total_threads'];?>

              </div>
              <div class="col-sm-2 d-none d-sm-block column text-center">
                <?php echo $_smarty_tpl->getValue('_forum')['total_replies'];?>

              </div>
            </div>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        <?php }?>
        <!-- childs (forums|sub-forums) -->

        <!-- threads -->
        <?php if ($_smarty_tpl->getValue('forum')['forum_section'] != '0') {?>
          <div class="row forum-head threads">
            <div class="col-12 col-sm-8 column">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Thread");?>

            </div>
            <div class="col-sm-2 d-none d-sm-block column">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
 / <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Views");?>

            </div>
            <div class="col-sm-2 d-none d-sm-block column">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Last Post");?>

            </div>
          </div>
          <?php if ($_smarty_tpl->getValue('forum')['threads']) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('forum')['threads'], 'thread');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('thread')->value) {
$foreach7DoElse = false;
?>
              <div class="row forum-row">
                <div class="col-12 col-sm-8 column">
                  <div class="mb5">
                    <strong><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['title_url'];?>
"><?php echo $_smarty_tpl->getValue('thread')['title'];?>
</a></strong>
                  </div>
                  <div class="mb5">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("By");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('thread')['user_name'];?>
"><?php echo $_smarty_tpl->getValue('thread')['user_fullname'];?>
</a> <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['time'];?>
"><?php echo $_smarty_tpl->getValue('thread')['time'];?>
</span>
                  </div>
                </div>
                <div class="col-sm-2 d-none d-sm-block column text-center">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
: <?php echo $_smarty_tpl->getValue('thread')['replies'];?>
<br><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Views");?>
: <?php echo $_smarty_tpl->getValue('thread')['views'];?>

                </div>
                <div class="col-sm-2 d-none d-sm-block column text-center">
                  <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['last_reply'];?>
"><?php echo $_smarty_tpl->getValue('thread')['last_reply'];?>
</span>
                </div>
              </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php echo $_smarty_tpl->getValue('pager');?>

          <?php } else { ?>
            <div class="row forum-row">
              <div class="col-12 column text-center">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("No Threads");?>

              </div>
            </div>
          <?php }?>
        <?php }?>
        <!-- threads -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "thread") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <?php if ($_smarty_tpl->getValue('thread')['forum']['parents']) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('array_reverse')($_smarty_tpl->getValue('thread')['forum']['parents']), 'parent');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('parent')->value) {
$foreach8DoElse = false;
?>
              <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('parent')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('parent')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('parent')['forum_name']);?>
</a></li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php }?>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('thread')['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('thread')['forum']['forum_name']);?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getValue('thread')['title'];?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- thread title -->
        <div class="forum-title clearfix">
          <div class="float-end">
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/new-reply/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
" class="btn btn-md btn-primary">
              <i class="fa fa-reply mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Post Reply");?>

            </a>
          </div>
          <h1><?php echo $_smarty_tpl->getValue('thread')['title'];?>
</h1>
        </div>
        <!-- thread title -->

        <!-- thread -->
        <div class="forum-thread <?php if ($_smarty_tpl->getValue('thread')['replies'] > 0 && $_smarty_tpl->getValue('selected_page') != 1) {?>x-hidden<?php }?>">
          <div class="row">
            <div class="col-12 col-sm-2 text-center">
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('thread')['user_name'];?>
"><img class="avatar" src="<?php echo $_smarty_tpl->getValue('thread')['user_picture'];?>
"></a>
              <h6 class="mt10">
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('thread')['user_name'];?>
"><?php echo $_smarty_tpl->getValue('thread')['user_fullname'];?>
</a>
              </h6>
              <div class="mb5">
                <?php if ($_smarty_tpl->getValue('thread')['user_group'] == 1) {?>
                  <i class="fa fa-shield-alt"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Admin");?>

                <?php } elseif ($_smarty_tpl->getValue('thread')['user_group'] == 2) {?>
                  <i class="fab fa-black-tie"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Moderator");?>

                <?php } else { ?>
                  <i class="fa fa-user"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Member");?>

                <?php }?>
              </div>
              <div>
                <small><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Joined");?>
: <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['user_registered'];?>
"><?php echo $_smarty_tpl->getValue('thread')['user_registered'];?>
</span></small>
              </div>
            </div>
            <div class="col-12 col-sm-10">
              <div class="time clearfix">
                <!-- buttons -->
                <div class="float-end">
                  <?php if ($_smarty_tpl->getValue('thread')['manage_thread']) {?>
                    <a data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit");?>
' href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/edit-thread/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
" class="btn btn-sm btn-light btn-icon btn-rounded">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <button data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete");?>
' class="btn btn-sm btn-light btn-icon btn-rounded js_delete-forum" data-handle="thread" data-id="<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
">
                      <i class="fa fa-trash-alt"></i>
                    </button>
                  <?php } else { ?>
                    <button data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Report");?>
' class="btn btn-sm btn-light btn-icon btn-rounded" data-toggle="modal" data-url="data/report.php?do=create&handle=forum_thread&id=<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
">
                      <i class="fa fa-flag fa-fw"></i>
                    </button>
                  <?php }?>
                </div>
                <!-- buttons -->
                <!-- time -->
                <small><i class="far fa-clock"></i> <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['time'];?>
"><?php echo $_smarty_tpl->getValue('thread')['time'];?>
</span></small>
                <!-- time -->
              </div>
              <div class="text">
                <?php echo $_smarty_tpl->getValue('thread')['parsed_text'];?>

              </div>
            </div>
          </div>
        </div>
        <!-- thread -->

        <!-- replies -->
        <?php if ($_smarty_tpl->getValue('thread')['replies'] > 0) {?>
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('thread')['thread_replies'], 'reply');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('reply')->value) {
$foreach9DoElse = false;
?>
            <div class="forum-thread" id="reply-<?php echo $_smarty_tpl->getValue('reply')['reply_id'];?>
">
              <div class="row">
                <div class="col-12 col-sm-2 text-center">
                  <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('reply')['user_name'];?>
"><img class="avatar" src="<?php echo $_smarty_tpl->getValue('reply')['user_picture'];?>
"></a>
                  <h6 class="mt10">
                    <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('reply')['user_name'];?>
"><?php echo $_smarty_tpl->getValue('reply')['user_fullname'];?>
</a>
                  </h6>
                  <div class="mb5">
                    <?php if ($_smarty_tpl->getValue('reply')['user_group'] == 1) {?>
                      <i class="fa fa-shield-alt"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Admin");?>

                    <?php } elseif ($_smarty_tpl->getValue('reply')['user_group'] == 2) {?>
                      <i class="fab fa-black-tie"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Moderator");?>

                    <?php } else { ?>
                      <i class="fa fa-user"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Member");?>

                    <?php }?>
                  </div>
                  <div>
                    <small><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Joined");?>
: <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('reply')['user_registered'];?>
"><?php echo $_smarty_tpl->getValue('reply')['user_registered'];?>
</span></small>
                  </div>
                </div>
                <div class="col-12 col-sm-10">
                  <div class="time clearfix">
                    <!-- buttons -->
                    <div class="float-end">
                      <a data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Link");?>
' href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['title_url'];?>
#reply-<?php echo $_smarty_tpl->getValue('reply')['reply_id'];?>
" class="btn btn-sm btn-light btn-icon btn-rounded">
                        <i class="fa fa-link"></i>
                      </a>
                      <?php if ($_smarty_tpl->getValue('reply')['manage_reply']) {?>
                        <a data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit");?>
' href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/edit-reply/<?php echo $_smarty_tpl->getValue('reply')['reply_id'];?>
" class="btn btn-sm btn-light btn-icon btn-rounded">
                          <i class="fa fa-pencil-alt"></i>
                        </a>
                        <button data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete");?>
' class="btn btn-sm btn-light btn-icon btn-rounded js_delete-forum" data-handle="reply" data-id="<?php echo $_smarty_tpl->getValue('reply')['reply_id'];?>
">
                          <i class="fa fa-trash-alt"></i>
                        </button>
                      <?php } else { ?>
                        <button data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Report");?>
' class="btn btn-sm btn-light btn-icon btn-rounded" data-toggle="modal" data-url="data/report.php?do=create&handle=forum_reply&id=<?php echo $_smarty_tpl->getValue('reply')['reply_id'];?>
">
                          <i class="fa fa-flag fa-fw"></i>
                        </button>
                      <?php }?>
                    </div>
                    <!-- buttons -->
                    <!-- time -->
                    <small><i class="far fa-clock"></i> <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('reply')['time'];?>
"><?php echo $_smarty_tpl->getValue('reply')['time'];?>
</span></small>
                    <!-- time -->
                  </div>
                  <div class="text">
                    <?php echo $_smarty_tpl->getValue('reply')['parsed_text'];?>

                  </div>
                </div>
              </div>
            </div>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <div class="mt10">
            <?php echo $_smarty_tpl->getValue('pager');?>

          </div>
        <?php }?>
        <!-- replies -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "new-thread") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <?php if ($_smarty_tpl->getValue('forum')['parents']) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('array_reverse')($_smarty_tpl->getValue('forum')['parents']), 'parent');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('parent')->value) {
$foreach10DoElse = false;
?>
              <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('parent')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('parent')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('parent')['forum_name']);?>
</a></li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php }?>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('forum')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('forum')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('forum')['forum_name']);?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Write New Thread");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- new thread -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Write New Thread");?>

          </div>
          <form class="js_ajax-forms" data-url="forums/thread.php?do=create&id=<?php echo $_smarty_tpl->getValue('forum')['forum_id'];?>
">
            <div class="card-body">
              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Title");?>

                </label>
                <div class="col-md-10">
                  <input class="form-control" name="title">
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Content");?>

                </label>
                <div class="col-md-10">
                  <textarea name="text" class="form-control js_wysiwyg"></textarea>
                </div>
              </div>

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Publish");?>
</button>
            </div>
          </form>
        </div>
        <!-- new thread -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "edit-thread") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <?php if ($_smarty_tpl->getValue('thread')['forum']['parents']) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('array_reverse')($_smarty_tpl->getValue('thread')['forum']['parents']), 'parent');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('parent')->value) {
$foreach11DoElse = false;
?>
              <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('parent')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('parent')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('parent')['forum_name']);?>
</a></li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php }?>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('thread')['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('thread')['forum']['forum_name']);?>
</a></li>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['title_url'];?>
"><?php echo $_smarty_tpl->getValue('thread')['title'];?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit Thread");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- edit thread -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit Thread");?>

          </div>
          <form class="js_ajax-forms" data-url="forums/thread.php?do=edit&id=<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
">
            <div class="card-body">
              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Title");?>

                </label>
                <div class="col-md-10">
                  <input class="form-control" name="title" value="<?php echo $_smarty_tpl->getValue('thread')['title'];?>
">
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Content");?>

                </label>
                <div class="col-md-10">
                  <textarea name="text" class="form-control js_wysiwyg"><?php echo $_smarty_tpl->getValue('thread')['text'];?>
</textarea>
                </div>
              </div>

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Update");?>
</button>
            </div>
          </form>
        </div>
        <!-- edit thread -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "new-reply") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <?php if ($_smarty_tpl->getValue('thread')['forum']['parents']) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('array_reverse')($_smarty_tpl->getValue('thread')['forum']['parents']), 'parent');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('parent')->value) {
$foreach12DoElse = false;
?>
              <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('parent')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('parent')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('parent')['forum_name']);?>
</a></li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php }?>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('thread')['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('thread')['forum']['forum_name']);?>
</a></li>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['title_url'];?>
"><?php echo $_smarty_tpl->getValue('thread')['title'];?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Post Reply");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- new reply -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Post Reply");?>

          </div>
          <form class="js_ajax-forms" data-url="forums/reply.php?do=create&id=<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
">
            <div class="card-body">
              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Content");?>

                </label>
                <div class="col-md-10">
                  <textarea name="text" class="form-control js_wysiwyg"></textarea>
                </div>
              </div>

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reply");?>
</button>
            </div>
          </form>
        </div>
        <!-- new reply -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "edit-reply") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <?php if ($_smarty_tpl->getValue('reply')['thread']['forum']['parents']) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getSmarty()->getModifierCallback('array_reverse')($_smarty_tpl->getValue('reply')['thread']['forum']['parents']), 'parent');
$foreach13DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('parent')->value) {
$foreach13DoElse = false;
?>
              <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('parent')['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('parent')['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('parent')['forum_name']);?>
</a></li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php }?>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('reply')['thread']['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('reply')['thread']['forum']['forum_name']);?>
</a></li>
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('reply')['thread']['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['title_url'];?>
"><?php echo $_smarty_tpl->getValue('reply')['thread']['title'];?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit Reply");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- new reply -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <i class="fa fa-reply mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit Reply");?>

          </div>
          <form class="js_ajax-forms" data-url="forums/reply.php?do=edit&id=<?php echo $_smarty_tpl->getValue('reply')['reply_id'];?>
">
            <div class="card-body">
              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Content");?>

                </label>
                <div class="col-md-10">
                  <textarea name="text" class="form-control js_wysiwyg"><?php echo $_smarty_tpl->getValue('reply')['text'];?>
</textarea>
                </div>
              </div>

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Update");?>
</button>
            </div>
          </form>
        </div>
        <!-- new reply -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "my-threads") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("My Threads");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- threads -->
        <?php if ($_smarty_tpl->getValue('threads')) {?>
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('threads'), 'thread');
$foreach14DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('thread')->value) {
$foreach14DoElse = false;
?>
            <div class="forum-result">
              <div class="head">
                <div class="float-end">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forum");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('thread')['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('thread')['forum']['forum_name']);?>
</a>
                </div>
                <i class="far fa-clock mr5"></i><span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['time'];?>
"><?php echo $_smarty_tpl->getValue('thread')['time'];?>
</span>
              </div>
              <div class="content">
                <div class="mb10">
                  <div class="mb5">
                    <strong class="title"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['title_url'];?>
"><?php echo $_smarty_tpl->getValue('thread')['title'];?>
</a></strong>
                    <div class="float-end text-end">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
: <strong><?php echo $_smarty_tpl->getValue('thread')['replies'];?>
</strong><br>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Views");?>
: <strong><?php echo $_smarty_tpl->getValue('thread')['views'];?>
</strong>
                    </div>
                  </div>
                  <div class="mb5">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("By");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('thread')['user_name'];?>
"><?php echo $_smarty_tpl->getValue('thread')['user_fullname'];?>
</a> <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['time'];?>
"><?php echo $_smarty_tpl->getValue('thread')['time'];?>
</span>
                  </div>
                </div>
                <div class="snippet">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('thread')['text_snippet'],300);?>

                </div>
              </div>
            </div>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <div class="mt20">
            <?php echo $_smarty_tpl->getValue('pager');?>

          </div>
        <?php } else { ?>
          <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        <?php }?>
        <!-- threads -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "my-replies") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("My Replies");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- replies -->
        <?php if ($_smarty_tpl->getValue('replies')) {?>
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('replies'), 'reply');
$foreach15DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('reply')->value) {
$foreach15DoElse = false;
?>
            <div class="forum-result">
              <div class="head">
                <div class="float-end">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forum");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('reply')['thread']['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('reply')['thread']['forum']['forum_name']);?>
</a>
                </div>
                <i class="far fa-clock mr5"></i><span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('reply')['time'];?>
"><?php echo $_smarty_tpl->getValue('reply')['time'];?>
</span>
              </div>
              <div class="content">
                <div class="mb10">
                  <div class="mb5">
                    <strong class="title"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('reply')['thread']['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['title_url'];?>
"><?php echo $_smarty_tpl->getValue('reply')['thread']['title'];?>
</a></strong>
                    <div class="float-end text-end">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
: <strong><?php echo $_smarty_tpl->getValue('reply')['thread']['replies'];?>
</strong><br>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Views");?>
: <strong><?php echo $_smarty_tpl->getValue('reply')['thread']['views'];?>
</strong>
                    </div>
                  </div>
                  <div class="mb5">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("By");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['user_name'];?>
"><?php echo $_smarty_tpl->getValue('reply')['thread']['user_fullname'];?>
</a> <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('reply')['thread']['time'];?>
"><?php echo $_smarty_tpl->getValue('reply')['thread']['time'];?>
</span>
                  </div>
                </div>
                <div class="snippet">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('reply')['text_snippet'],300);?>

                </div>
              </div>
            </div>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <div class="mt20">
            <?php echo $_smarty_tpl->getValue('pager');?>

          </div>
        <?php } else { ?>
          <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        <?php }?>
        <!-- replies -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "search") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- search -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"search",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>

          </div>
          <form action="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/search-results" method="get">
            <div class="card-body">
              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Keyword(s)");?>

                </label>
                <div class="col-md-10">
                  <input class="form-control" name="query" required autofocus>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search For");?>

                </label>
                <div class="col-md-10">
                  <select class="form-select" name="type">
                    <option value="threads"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Threads");?>
</option>
                    <option value="replies"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
</option>
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-2 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search in Forum(s)");?>

                </label>
                <div class="col-md-10">
                  <select class="form-select" name="forum">
                    <option value="all"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search All Forums");?>
</option>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('forums'), 'forum');
$foreach16DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('forum')->value) {
$foreach16DoElse = false;
?>
                      <?php $_smarty_tpl->renderSubTemplate('file:admin.forums.recursive_options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="offset-md-2 col-md-10">
                  <div class="checkbox checkbox-primary">
                    <input type="checkbox" name="recursive" id="recursive">
                    <label for="recursive"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Also search in child forums");?>
</label>
                  </div>
                </div>
              </div>

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </div>
            <div class="card-footer text-end">
              <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search");?>
</button>
            </div>
          </form>
        </div>
        <!-- search -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "search-results") {?>

        <!-- breadcrumb -->
        <ol class="breadcrumb forum-breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/"><i class="fa fa-home"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Home");?>
</a></li>
          <li class="breadcrumb-item active"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Search Results");?>
</li>
        </ol>
        <!-- breadcrumb -->

        <!-- search title -->
        <div class="forum-meta-head mt20">
          <div class="float-end">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Results Found");?>
<span class="badge badge-lg bg-secondary ml5"><?php if ($_smarty_tpl->getValue('total')) {
echo $_smarty_tpl->getValue('total');
} else { ?>0<?php }?></span>
          </div>
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Keyword(s)");?>
: <u><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('htmlentities')($_smarty_tpl->getValue('query'),ENT_QUOTES,'utf-8');?>
</u>
        </div>
        <!-- search title -->

        <!-- search results -->
        <?php if ($_smarty_tpl->getValue('type') == "threads") {?>
          <!-- threads -->
          <?php if ($_smarty_tpl->getValue('results')) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('results'), 'thread');
$foreach17DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('thread')->value) {
$foreach17DoElse = false;
?>
              <div class="forum-result">
                <div class="head">
                  <div class="float-end">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forum");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('thread')['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('thread')['forum']['forum_name']);?>
</a>
                  </div>
                  <i class="far fa-clock mr5"></i><span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['time'];?>
"><?php echo $_smarty_tpl->getValue('thread')['time'];?>
</span>
                </div>
                <div class="content">
                  <div class="mb10">
                    <div class="mb5">
                      <strong class="title"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('thread')['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('thread')['title_url'];?>
"><?php echo $_smarty_tpl->getValue('thread')['title'];?>
</a></strong>
                      <div class="float-end text-end">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
: <strong><?php echo $_smarty_tpl->getValue('thread')['replies'];?>
</strong><br>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Views");?>
: <strong><?php echo $_smarty_tpl->getValue('thread')['views'];?>
</strong>
                      </div>
                    </div>
                    <div class="mb5">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("By");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('thread')['user_name'];?>
"><?php echo $_smarty_tpl->getValue('thread')['user_fullname'];?>
</a> <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('thread')['time'];?>
"><?php echo $_smarty_tpl->getValue('thread')['time'];?>
</span>
                    </div>
                  </div>
                  <div class="snippet">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('thread')['text_snippet'],300);?>

                  </div>
                </div>
              </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <div class="mt20">
              <?php echo $_smarty_tpl->getValue('pager');?>

            </div>
          <?php } else { ?>
            <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
          <?php }?>
          <!-- threads -->
        <?php } elseif ($_smarty_tpl->getValue('type') == "replies") {?>
          <!-- replies -->
          <?php if ($_smarty_tpl->getValue('results')) {?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('results'), 'reply');
$foreach18DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('reply')->value) {
$foreach18DoElse = false;
?>
              <div class="forum-result">
                <div class="head">
                  <div class="float-end">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Forum");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/<?php echo $_smarty_tpl->getValue('reply')['thread']['forum']['forum_id'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['forum']['title_url'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('reply')['thread']['forum']['forum_name']);?>
</a>
                  </div>
                  <i class="far fa-clock mr5"></i><span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('reply')['time'];?>
"><?php echo $_smarty_tpl->getValue('reply')['time'];?>
</span>
                </div>
                <div class="content">
                  <div class="mb10">
                    <div class="mb5">
                      <strong class="title"><a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/forums/thread/<?php echo $_smarty_tpl->getValue('reply')['thread']['thread_id'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['title_url'];?>
"><?php echo $_smarty_tpl->getValue('reply')['thread']['title'];?>
</a></strong>
                      <div class="float-end">
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replies");?>
: <strong><?php echo $_smarty_tpl->getValue('reply')['thread']['replies'];?>
</strong><br>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Views");?>
: <strong><?php echo $_smarty_tpl->getValue('reply')['thread']['views'];?>
</strong>
                      </div>
                    </div>
                    <div class="mb5">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("By");?>
: <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('reply')['thread']['user_name'];?>
"><?php echo $_smarty_tpl->getValue('reply')['thread']['user_fullname'];?>
</a> <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('reply')['thread']['time'];?>
"><?php echo $_smarty_tpl->getValue('reply')['thread']['time'];?>
</span>
                    </div>
                  </div>
                  <div class="snippet">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('reply')['text_snippet'],300);?>

                  </div>
                </div>
              </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <div class="mt20">
              <?php echo $_smarty_tpl->getValue('pager');?>

            </div>
          <?php } else { ?>
            <?php $_smarty_tpl->renderSubTemplate('file:_no_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
          <?php }?>
          <!-- replies -->
        <?php }?>
        <!-- search results -->

      <?php }?>
    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->renderSubTemplate('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
