<?php
/* Smarty version 5.4.1, created on 2024-10-01 03:01:08
  from 'file:ajax.search.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fb65f455c5f2_34514440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8e0bcc1799475b62c7d973e48f13a62106f5c8c' => 
    array (
      0 => 'ajax.search.tpl',
      1 => 1647975821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_user.tpl' => 1,
    'file:__feeds_page.tpl' => 1,
    'file:__feeds_group.tpl' => 1,
    'file:__feeds_event.tpl' => 1,
  ),
))) {
function content_66fb65f455c5f2_34514440 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="js_scroller">
  <ul>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('results'), 'result');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('result')->value) {
$foreach0DoElse = false;
?>
      <?php if ($_smarty_tpl->getValue('result')['type'] == "user") {?>
        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_user'=>$_smarty_tpl->getValue('result'),'_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('result')['connection'],'_search'=>true), (int) 0, $_smarty_current_dir);
?>

      <?php } elseif ($_smarty_tpl->getValue('result')['type'] == "page") {?>
        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_page'=>$_smarty_tpl->getValue('result'),'_tpl'=>"list",'_search'=>true), (int) 0, $_smarty_current_dir);
?>

      <?php } elseif ($_smarty_tpl->getValue('result')['type'] == "group") {?>
        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_group'=>$_smarty_tpl->getValue('result'),'_tpl'=>"list",'_search'=>true), (int) 0, $_smarty_current_dir);
?>

      <?php } elseif ($_smarty_tpl->getValue('result')['type'] == "event") {?>
        <?php $_smarty_tpl->renderSubTemplate('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_event'=>$_smarty_tpl->getValue('result'),'_tpl'=>"list",'_search'=>true), (int) 0, $_smarty_current_dir);
?>

      <?php }?>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
  </ul>
</div><?php }
}
