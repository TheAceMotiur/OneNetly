<?php
/* Smarty version 4.5.1, created on 2024-09-05 04:49:57
  from '/home/onenetly/public_html/content/themes/default/templates/_trending_widget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d938755d3e56_36283258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75d9465cf9c0f0d2ff055d7a62f3f650ac0c0748' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/_trending_widget.tpl',
      1 => 1710793943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
  ),
),false)) {
function content_66d938755d3e56_36283258 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card bg-red border-0">
  <div class="card-header pt20 pb10 bg-transparent border-bottom-0">
    <h6 class="mb0">
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"trend",'class'=>"mr5",'width'=>"20px",'height'=>"20px",'style'=>"fill: #fff;"), 0, false);
?>
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Trending" ));?>

    </h6>
  </div>
  <div class="card-body pt0">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trending_hashtags']->value, 'hashtag');
$_smarty_tpl->tpl_vars['hashtag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hashtag']->value) {
$_smarty_tpl->tpl_vars['hashtag']->do_else = false;
?>
      <a class="trending-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/hashtag/<?php echo $_smarty_tpl->tpl_vars['hashtag']->value['hashtag'];?>
">
        <span class="hash">
          #<?php echo $_smarty_tpl->tpl_vars['hashtag']->value['hashtag'];?>

        </span>
        <span class="frequency">
          <?php echo $_smarty_tpl->tpl_vars['hashtag']->value['frequency'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Posts" ));?>

        </span>
      </a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div><?php }
}
