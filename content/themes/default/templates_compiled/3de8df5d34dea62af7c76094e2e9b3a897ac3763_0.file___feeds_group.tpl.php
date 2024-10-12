<?php
/* Smarty version 5.4.1, created on 2024-09-29 10:32:35
  from 'file:__feeds_group.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f92cc3573fc1_97364788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3de8df5d34dea62af7c76094e2e9b3a897ac3763' => 
    array (
      0 => '__feeds_group.tpl',
      1 => 1711794569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
))) {
function content_66f92cc3573fc1_97364788 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
if ($_smarty_tpl->getValue('_tpl') == "box") {?>
  <li class="col-md-6 col-lg-3">
    <div class="ui-box <?php if ($_smarty_tpl->getValue('_darker')) {?>darker<?php }?>">
      <div class="img">
        <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('_group')['group_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>">
          <img alt="<?php echo $_smarty_tpl->getValue('_group')['group_title'];?>
" src="<?php echo $_smarty_tpl->getValue('_group')['group_picture'];?>
" />
        </a>
      </div>
      <div class="mt10">
        <a class="h6" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('_group')['group_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('_group')['group_title'],30);?>
</a>
        <?php if (!$_smarty_tpl->getValue('_group')['monetization_plan']) {?>
          <div><?php echo $_smarty_tpl->getValue('_group')['group_members'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>
</div>
        <?php }?>
      </div>
      <?php if ($_smarty_tpl->getValue('_group')['monetization_plan']) {?>
        <div class="mt10">
          <span class="badge bg-info"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getValue('_group')['monetization_plan']['price']);?>
 / <?php if ($_smarty_tpl->getValue('_group')['monetization_plan']['period_num'] != '1') {
echo $_smarty_tpl->getValue('_group')['monetization_plan']['period_num'];
}?> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getSmarty()->getModifierCallback('ucfirst')($_smarty_tpl->getValue('_group')['monetization_plan']['period']));?>
</span>
        </div>
      <?php }?>
      <div class="mt10">
        <?php if ($_smarty_tpl->getValue('_connection') == 'unsubscribe') {?>
          <?php if ($_smarty_tpl->getValue('user')->_data['user_id'] == $_smarty_tpl->getValue('_group')['plan_user_id']) {?>
            <button type="button" class="btn btn-sm btn-danger js_unsubscribe-plan" data-id="<?php echo $_smarty_tpl->getValue('_group')['plan_id'];?>
">
              <i class="fa fa-trash mr5"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Unsubscribe");?>

            </button>
          <?php }?>
        <?php } else { ?>
          <?php if ($_smarty_tpl->getValue('_group')['i_joined'] == "approved") {?>
            <button type="button" class="btn btn-sm btn-success <?php if (!$_smarty_tpl->getValue('_no_action')) {?>btn-delete<?php }?> js_leave-group" data-id="<?php echo $_smarty_tpl->getValue('_group')['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->getValue('_group')['group_privacy'];?>
">
              <i class="fa fa-check mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Joined");?>

            </button>
          <?php } elseif ($_smarty_tpl->getValue('_group')['i_joined'] == "pending") {?>
            <button type="button" class="btn btn-sm btn-warning js_leave-group" data-id="<?php echo $_smarty_tpl->getValue('_group')['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->getValue('_group')['group_privacy'];?>
">
              <i class="fa fa-clock mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Pending");?>

            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-success js_join-group" data-id="<?php echo $_smarty_tpl->getValue('_group')['group_id'];?>
" data-privacy="<?php if ($_smarty_tpl->getValue('user')->_data['user_id'] == $_smarty_tpl->getValue('_group')['group_admin']) {?>public<?php } else {
echo $_smarty_tpl->getValue('_group')['group_privacy'];
}?>">
              <i class="fa fa-user-plus mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Join");?>

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
/groups/<?php echo $_smarty_tpl->getValue('_group')['group_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>">
        <img src="<?php echo $_smarty_tpl->getValue('_group')['group_picture'];?>
" alt="<?php echo $_smarty_tpl->getValue('_group')['group_title'];?>
">
      </a>
      <div class="data-content">
        <div class="float-end">
          <?php if ($_smarty_tpl->getValue('_group')['i_joined'] == "approved") {?>
            <button type="button" class="btn btn-sm btn-success <?php if (!$_smarty_tpl->getValue('_no_action')) {?>btn-delete<?php }?> js_leave-group" data-id="<?php echo $_smarty_tpl->getValue('_group')['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->getValue('_group')['group_privacy'];?>
">
              <i class="fa fa-check mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Joined");?>

            </button>
          <?php } elseif ($_smarty_tpl->getValue('_group')['i_joined'] == "pending") {?>
            <button type="button" class="btn btn-sm btn-warning js_leave-group" data-id="<?php echo $_smarty_tpl->getValue('_group')['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->getValue('_group')['group_privacy'];?>
">
              <i class="fa fa-clock mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Pending");?>

            </button>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-light rounded-pill js_join-group" data-id="<?php echo $_smarty_tpl->getValue('_group')['group_id'];?>
" data-privacy="<?php if ($_smarty_tpl->getValue('user')->_data['user_id'] == $_smarty_tpl->getValue('_group')['group_admin']) {?>public<?php } else {
echo $_smarty_tpl->getValue('_group')['group_privacy'];
}?>">
              <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linked_accounts",'class'=>"main-icon",'width'=>"20px",'height'=>"20px"), (int) 0, $_smarty_current_dir);
?>
            </button>
          <?php }?>
        </div>
        <div>
          <span class="name">
            <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/groups/<?php echo $_smarty_tpl->getValue('_group')['group_name'];
if ($_smarty_tpl->getValue('_search')) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('_group')['group_title'],30);?>
</a>
          </span>
          <div><?php echo $_smarty_tpl->getValue('_group')['group_members'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Members");?>
</div>
        </div>
      </div>
    </div>
  </li>
<?php }
}
}
