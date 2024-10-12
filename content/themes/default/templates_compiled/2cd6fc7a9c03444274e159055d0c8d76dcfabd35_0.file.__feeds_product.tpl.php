<?php
/* Smarty version 4.5.1, created on 2024-09-01 08:43:09
  from '/home/onenetly/public_html/content/themes/default/templates/__feeds_product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d4291d75e436_77923113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cd6fc7a9c03444274e159055d0c8d76dcfabd35' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/__feeds_product.tpl',
      1 => 1710678834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_need_subscription.tpl' => 1,
    'file:__svg_icons.tpl' => 3,
  ),
),false)) {
function content_66d4291d75e436_77923113 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="col-md-6 col-lg-4">
  <div class="card product <?php if ($_smarty_tpl->tpl_vars['_boosted']->value) {?>boosted<?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['_boosted']->value) {?>
      <div class="boosted-icon" data-bs-toggle="tooltip" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Promoted" ));?>
">
        <i class="fa fa-bullhorn"></i>
      </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['post']->value['needs_subscription']) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->_subTemplateRender('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
      </a>
    <?php } else { ?>
      <div class="product-image">
        <div class="product-price">
          <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['price'] > 0) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['product']['price'] ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Free" ));?>

          <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['post']->value['photos_num'] > 0) {?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value['photos'][0]['source'];?>
">
        <?php } else { ?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/blank_product.png">
        <?php }?>
        <div class="product-overlay">
          <a class="btn btn-sm btn-outline-secondary rounded-pill" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "More" ));?>

          </a>
        </div>
      </div>
      <div class="product-info">
        <div class="product-meta title">
          <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" class="title"><?php echo $_smarty_tpl->tpl_vars['post']->value['product']['name'];?>
</a>
          <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['is_digital']) {?>
            <span class="badge bg-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Digital" ));?>
</span>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['status'] == "new") {?>
            <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "New" ));?>
</span>
          <?php } else { ?>
            <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Used" ));?>
</span>
          <?php }?>
        </div>
        <div class="product-meta">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"market",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, false);
?>
          <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['available']) {?>
            <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['quantity'] > 0) {?>
              <span class="badge badge-lg bg-light text-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "In stock" ));?>
</span>
            <?php } else { ?>
              <span class="badge badge-lg bg-light text-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Out of stock" ));?>
</span>
            <?php }?>
          <?php } else { ?>
            <span class="badge badge-lg bg-light text-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "SOLD" ));?>
</span>
          <?php }?>
        </div>
        <div class="product-meta">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
          <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['location']) {
echo $_smarty_tpl->tpl_vars['post']->value['product']['location'];
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "N/A" ));
}?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['posts_reviews_enabled']) {?>
          <div class="product-meta">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"star",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?>
            <span><?php echo $_smarty_tpl->tpl_vars['post']->value['reviews_count'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Reviews" ));?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate']) {?>
              <span class="review-stars small ml5">
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 1) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 2) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 3) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 4) {?>checked<?php }?>"></i>
                <i class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['post']->value['post_rate'] >= 5) {?>checked<?php }?>"></i>
              </span>
              <span class="badge bg-light text-primary"><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['post']->value['post_rate'],1);?>
</span>
            <?php }?>
          </div>
        <?php }?>
      </div>
    <?php }?>
  </div>
</div><?php }
}
