<?php
/* Smarty version 4.5.1, created on 2024-09-02 03:49:44
  from '/home/onenetly/public_html/content/themes/default/templates/ajax.who_reacts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d535d80f33b4_33656677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '685a5c00841b7d0a55b557b8e257a38670587860' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/ajax.who_reacts.tpl',
      1 => 1692724640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__reaction_emojis.tpl' => 1,
    'file:__feeds_user.tpl' => 1,
  ),
),false)) {
function content_66d535d80f33b4_33656677 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<div class="modal-header with-nav">
  <div class="modal-title">
    <!-- panel nav -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['reaction_type']->value == "all") {?>active<?php }?>" href="#" data-toggle="modal" data-url="posts/who_reacts.php?<?php echo $_smarty_tpl->tpl_vars['get']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&reaction_type=all">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "All" ));?>

        </a>
      </li>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reactions_enabled']->value, 'reaction');
$_smarty_tpl->tpl_vars['reaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reaction']->value) {
$_smarty_tpl->tpl_vars['reaction']->do_else = false;
?>
        <li class="nav-item">
          <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['reaction_type']->value == $_smarty_tpl->tpl_vars['reaction']->value['reaction']) {?>active<?php }?>" href="#" data-toggle="modal" data-url="posts/who_reacts.php?<?php echo $_smarty_tpl->tpl_vars['get']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&reaction_type=<?php echo $_smarty_tpl->tpl_vars['reaction']->value['reaction'];?>
">
            <div style="height: 19px;">
              <div class="inline-emoji no_animation">
                <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['reaction']->value['reaction']), 0, true);
?>
              </div>
            </div>
          </a>
        </li>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    <!-- panel nav -->
  </div>
  <!-- close -->
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  <!-- close -->
</div>
<div class="modal-body">
  <?php if ($_smarty_tpl->tpl_vars['users']->value) {?>
    <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"],'_reaction'=>$_smarty_tpl->tpl_vars['_user']->value["reaction"]), 0, true);
?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['users']->value) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
      <!-- see-more -->
      <div class="alert alert-info see-more js_see-more" data-get="<?php echo $_smarty_tpl->tpl_vars['handle']->value;?>
_reactions" data-filter="<?php echo $_smarty_tpl->tpl_vars['reaction_type']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
        <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "See More" ));?>
</span>
        <div class="loader loader_small x-hidden"></div>
      </div>
      <!-- see-more -->
    <?php }?>
  <?php } else { ?>
    <p class="text-center text-muted">
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "No reactions yet" ));?>

    </p>
  <?php }?>
</div><?php }
}
