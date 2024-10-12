<?php
/* Smarty version 5.4.1, created on 2024-09-29 10:32:35
  from 'file:__feeds_page.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f92cc354af41_53842682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6303b9dee369b2cee59a7fbce3208871ced56cf9' => 
    array (
      0 => '__feeds_page.tpl',
      1 => 1711794538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 3,
  ),
))) {
function content_66f92cc354af41_53842682 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
if ($_smarty_tpl->getValue('_tpl') == "box") {?>
  <li class="col-md-6 col-lg-3">
    <div class="ui-box <?php if ($_smarty_tpl->getValue('_darker')) {?>darker<?php }?>">
      <div class="img">
        <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('_page')['page_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>">
          <img alt="<?php echo $_smarty_tpl->getValue('_page')['page_title'];?>
" src="<?php echo $_smarty_tpl->getValue('_page')['page_picture'];?>
" />
        </a>
      </div>
      <div class="mt10">
        <span class="js_user-popover" data-uid="<?php echo $_smarty_tpl->getValue('_page')['page_id'];?>
" data-type="page">
          <a class="h6" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('_page')['page_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('_page')['page_title'],30);?>
</a>
        </span>
        <?php if ($_smarty_tpl->getValue('_page')['page_verified']) {?>
          <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Verified Page");?>
'>
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
          </span>
        <?php }?>
        <?php if (!$_smarty_tpl->getValue('_page')['monetization_plan']) {?>
          <div><?php echo $_smarty_tpl->getValue('_page')['page_likes'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Likes");?>
</div>
        <?php }?>
      </div>
      <?php if ($_smarty_tpl->getValue('_page')['monetization_plan']) {?>
        <div class="mt10">
          <span class="badge bg-info"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getValue('_page')['monetization_plan']['price']);?>
 / <?php if ($_smarty_tpl->getValue('_page')['monetization_plan']['period_num'] != '1') {
echo $_smarty_tpl->getValue('_page')['monetization_plan']['period_num'];
}?> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getSmarty()->getModifierCallback('ucfirst')($_smarty_tpl->getValue('_page')['monetization_plan']['period']));?>
</span>
        </div>
      <?php }?>
      <div class="mt10">
        <?php if ($_smarty_tpl->getValue('_connection') == 'unsubscribe') {?>
          <?php if ($_smarty_tpl->getValue('user')->_data['user_id'] == $_smarty_tpl->getValue('_page')['plan_user_id']) {?>
            <button type="button" class="btn btn-sm btn-danger js_unsubscribe-plan" data-id="<?php echo $_smarty_tpl->getValue('_page')['plan_id'];?>
">
              <i class="fa fa-trash mr5"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Unsubscribe");?>

            </button>
          <?php }?>
        <?php } else { ?>
          <?php if ($_smarty_tpl->getValue('_page')['i_like']) {?>
            <button type="button" class="btn btn-sm btn-primary js_unlike-page" data-id="<?php echo $_smarty_tpl->getValue('_page')['page_id'];?>
">
              <i class="fa fa-heart mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Unlike");?>

            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-primary js_like-page" data-id="<?php echo $_smarty_tpl->getValue('_page')['page_id'];?>
">
              <i class="fa fa-heart mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Like");?>

            </button>
          <?php }?>
        <?php }?>
      </div>
    </div>
  </li>
<?php } elseif ($_smarty_tpl->getValue('_tpl') == "list") {?>
  <li class="feeds-item">
    <div class="data-container <?php if ($_smarty_tpl->getValue('_small')) {?>small<?php }?>">
      <a class="data-avatar" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('_page')['page_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>">
        <img src="<?php echo $_smarty_tpl->getValue('_page')['page_picture'];?>
" alt="<?php echo $_smarty_tpl->getValue('_page')['page_title'];?>
">
      </a>
      <div class="data-content">
        <div class="float-end">
          <?php if ($_smarty_tpl->getValue('_page')['i_like']) {?>
            <button type="button" class="btn btn-sm btn-primary js_unlike-page" data-id="<?php echo $_smarty_tpl->getValue('_page')['page_id'];?>
">
              <i class="fa fa-heart mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Unlike");?>

            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-light rounded-pill js_like-page" data-id="<?php echo $_smarty_tpl->getValue('_page')['page_id'];?>
">
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"plus",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
            </button>
          <?php }?>
        </div>
        <div>
          <span class="name js_user-popover" data-uid="<?php echo $_smarty_tpl->getValue('_page')['page_id'];?>
" data-type="page">
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/pages/<?php echo $_smarty_tpl->getValue('_page')['page_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('_page')['page_title'],30);?>
</a>
          </span>
          <?php if ($_smarty_tpl->getValue('_page')['page_verified']) {?>
            <span class="verified-badge" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Verified Page");?>
'>
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"verified_badge",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
            </span>
          <?php }?>
          <div><?php echo $_smarty_tpl->getValue('_page')['page_likes'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Likes");?>
</div>
        </div>
      </div>
    </div>
  </li>
<?php }
}
}
