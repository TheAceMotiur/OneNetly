<?php
/* Smarty version 5.4.1, created on 2024-10-09 10:07:40
  from 'file:_trending_widget.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_670655ec7e7759_35092042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a71e8005222e235f1fed84927e7a6ba24f69d920' => 
    array (
      0 => '_trending_widget.tpl',
      1 => 1710793943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
))) {
function content_670655ec7e7759_35092042 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="card bg-red border-0">
  <div class="card-header pt20 pb10 bg-transparent border-bottom-0">
    <h6 class="mb0">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"trend",'class'=>"mr5",'width'=>"20px",'height'=>"20px",'style'=>"fill: #fff;"), (int) 0, $_smarty_current_dir);
?>
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Trending");?>

    </h6>
  </div>
  <div class="card-body pt0">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('trending_hashtags'), 'hashtag');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('hashtag')->value) {
$foreach0DoElse = false;
?>
      <a class="trending-item" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/search/hashtag/<?php echo $_smarty_tpl->getValue('hashtag')['hashtag'];?>
">
        <span class="hash">
          #<?php echo $_smarty_tpl->getValue('hashtag')['hashtag'];?>

        </span>
        <span class="frequency">
          <?php echo $_smarty_tpl->getValue('hashtag')['frequency'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Posts");?>

        </span>
      </a>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
  </div>
</div><?php }
}
