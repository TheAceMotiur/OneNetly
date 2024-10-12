<?php
/* Smarty version 5.4.1, created on 2024-10-01 13:26:16
  from 'file:ajax.share.publisher.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fbf8789300c3_30057979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb3a7871d89c734d4c0d4577de95bfc3ed3d2fad' => 
    array (
      0 => 'ajax.share.publisher.tpl',
      1 => 1727195541,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 5,
    'file:__social_share.tpl' => 2,
  ),
))) {
function content_66fbf8789300c3_30057979 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="modal-header">
  <h6 class="modal-title">
    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"share",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share");?>

  </h6>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form class="js_ajax-forms" data-url="posts/share.php?do=publish&post_id=<?php echo $_smarty_tpl->getValue('post')['post_id'];?>
">
  <div class="modal-body">

    <?php if ($_smarty_tpl->getValue('photo')) {?>
      <div class="h6 text-center">
        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Photo link");?>

      </div>

      <div style="margin: 25px auto;">
        <div class="input-group">
          <input type="text" disabled class="form-control" value="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/photos/<?php echo $_smarty_tpl->getValue('photo')['photo_id'];?>
">
          <button type="button" class="btn btn-light js_clipboard" data-clipboard-text="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/photos/<?php echo $_smarty_tpl->getValue('photo')['photo_id'];?>
" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Copy");?>
'>
            <i class="fas fa-copy"></i>
          </button>
        </div>
      </div>

      <?php if ($_smarty_tpl->getValue('system')['social_share_enabled']) {?>
        <div class="post-social-share">
          <?php $_smarty_tpl->renderSubTemplate('file:__social_share.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_link'=>((string)$_smarty_tpl->getValue('system')['system_url'])."/photos/".((string)$_smarty_tpl->getValue('photo')['photo_id'])), (int) 0, $_smarty_current_dir);
?>
        </div>
      <?php }?>

      <div class="h6 text-center">
        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Post link");?>

      </div>
    <?php }?>

    <div style="margin: 25px auto;">
      <div class="input-group">
        <input type="text" disabled class="form-control" value="<?php echo $_smarty_tpl->getValue('post')['share_link'];?>
">
        <button type="button" class="btn btn-light js_clipboard" data-clipboard-text="<?php echo $_smarty_tpl->getValue('post')['share_link'];?>
" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Copy");?>
'>
          <i class="fas fa-copy"></i>
        </button>
      </div>
    </div>

    <?php if ($_smarty_tpl->getValue('system')['social_share_enabled']) {?>
      <div class="post-social-share">
        <?php $_smarty_tpl->renderSubTemplate('file:__social_share.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_link'=>((string)$_smarty_tpl->getValue('post')['share_link'])), (int) 0, $_smarty_current_dir);
?>
      </div>
    <?php }?>

    <div class="h5 text-center">
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share to");?>

    </div>

    <!-- share to options -->
    <div class="mb20 text-center">
      <!-- timeline -->
      <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_timeline" value="timeline" checked="checked" />
      <label class="button-label small" for="share_to_timeline">
        <div class="icon">
          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"newsfeed",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
        </div>
        <div class="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Timeline");?>
</div>
      </label>
      <!-- timeline -->
      <!-- page -->
      <?php if ($_smarty_tpl->getValue('system')['pages_enabled'] && $_smarty_tpl->getValue('pages')) {?>
        <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_page" value="page" />
        <label class="button-label small" for="share_to_page">
          <div class="icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
          </div>
          <div class="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page");?>
</div>
        </label>
      <?php }?>
      <!-- page -->
      <!-- group -->
      <?php if ($_smarty_tpl->getValue('system')['groups_enabled'] && $_smarty_tpl->getValue('groups')) {?>
        <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_group" value="group" />
        <label class="button-label small" for="share_to_group">
          <div class="icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
          </div>
          <div class="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group");?>
</div>
        </label>
      <?php }?>
      <!-- group -->
      <!-- event -->
      <?php if ($_smarty_tpl->getValue('system')['events_enabled'] && $_smarty_tpl->getValue('events')) {?>
        <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_event" value="event" />
        <label class="button-label small" for="share_to_event">
          <div class="icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
          </div>
          <div class="title"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Event");?>
</div>
        </label>
      <?php }?>
      <!-- event -->
    </div>
    <!-- share to options -->

    <div id="js_share-to-page" class="x-hidden">
      <div class="form-group">
        <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Page");?>
</label>
        <select class="form-select" name="page">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pages'), 'page');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('page')->value) {
$foreach0DoElse = false;
?>
            <option value="<?php echo $_smarty_tpl->getValue('page')['page_id'];?>
"><?php echo $_smarty_tpl->getValue('page')['page_title'];?>
</option>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
      </div>
    </div>

    <div id="js_share-to-group" class="x-hidden">
      <div class="form-group">
        <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Group");?>
</label>
        <select class="form-select" name="group">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('groups'), 'group');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('group')->value) {
$foreach1DoElse = false;
?>
            <option value="<?php echo $_smarty_tpl->getValue('group')['group_id'];?>
"><?php echo $_smarty_tpl->getValue('group')['group_title'];?>
</option>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
      </div>
    </div>

    <div id="js_share-to-event" class="x-hidden">
      <div class="form-group">
        <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Event");?>
</label>
        <select class="form-select" name="event">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('events'), 'event');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('event')->value) {
$foreach2DoElse = false;
?>
            <option value="<?php echo $_smarty_tpl->getValue('event')['event_id'];?>
"><?php echo $_smarty_tpl->getValue('event')['event_title'];?>
</option>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-label"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Message");?>
</label>
          <textarea name="message" rows="3" dir="auto" class="form-control"></textarea>
        </div>
      </div>
    </div>

    <!-- error -->
    <div class="alert alert-danger mt15 mb0 x-hidden"></div>
    <!-- error -->
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Share");?>
</button>
  </div>
</form>

<?php echo '<script'; ?>
>
  /* share post */
  $('input[type=radio][name=share_to]').on('change', function() {
    switch ($(this).val()) {
      case 'timeline':
        $('#js_share-to-page').hide();
        $('#js_share-to-group').hide();
        $('#js_share-to-event').hide();
        break;
      case 'page':
        $('#js_share-to-page').fadeIn();
        $('#js_share-to-group').hide();
        $('#js_share-to-event').hide();
        break;
      case 'group':
        $('#js_share-to-page').hide();
        $('#js_share-to-group').fadeIn();
        $('#js_share-to-event').hide();
        break;
      case 'event':
        $('#js_share-to-page').hide();
        $('#js_share-to-group').hide();
        $('#js_share-to-event').fadeIn();
        break;
    }
  });
<?php echo '</script'; ?>
><?php }
}
