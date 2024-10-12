<?php
/* Smarty version 4.5.1, created on 2024-08-31 09:38:02
  from '/home/onenetly/public_html/content/themes/default/templates/_album.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2e47ac86a32_80040720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c0ec1ef286a56fba065ed36de7b4597533dcab6' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/_album.tpl',
      1 => 1692629811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_photo.tpl' => 1,
  ),
),false)) {
function content_66d2e47ac86a32_80040720 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<!-- album buttons -->
<?php if ($_smarty_tpl->tpl_vars['album']->value['manage_album'] && $_smarty_tpl->tpl_vars['album']->value['can_delete']) {?>
  <div class="text-center">
    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill ml5 mb5" data-toggle="modal" data-url="albums/modal.php?do=edit_title&id=<?php echo $_smarty_tpl->tpl_vars['album']->value['album_id'];?>
">
      <i class="fa fa-pencil-alt mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Edit Album" ));?>

    </button>
    <?php if ($_smarty_tpl->tpl_vars['system']->value['photos_enabled']) {?>
      <button type="button" class="btn btn-sm btn-outline-primary rounded-pill ml5 mb5" data-toggle="modal" data-url="albums/modal.php?do=add_photos&id=<?php echo $_smarty_tpl->tpl_vars['album']->value['album_id'];?>
">
        <i class="fa fa-plus-circle mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Add Photos" ));?>

      </button>
    <?php }?>
    <button type="button" class="btn btn-sm btn-outline-danger rounded-pill ml5 mb5 js_delete-album" data-id="<?php echo $_smarty_tpl->tpl_vars['album']->value['album_id'];?>
">
      <i class="fa fa-trash-alt mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Delete Album" ));?>

    </button>
  </div>
<?php }?>
<!-- album buttons -->

<!-- album title & meta -->
<div class="album-title">
  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['album']->value['title'] ));?>

</div>
<div class="album-meta">
  <?php if ($_smarty_tpl->tpl_vars['album']->value['privacy'] == "me") {?>
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <i class="fa fa-lock" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Only Me" ));?>
'></i>
  <?php } elseif ($_smarty_tpl->tpl_vars['album']->value['privacy'] == "friends") {?>
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <i class="fa fa-users" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Friends" ));?>
'></i>
  <?php } elseif ($_smarty_tpl->tpl_vars['album']->value['privacy'] == "public") {?>
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <i class="fa fa-globe" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Public" ));?>
'></i>
  <?php } elseif ($_smarty_tpl->tpl_vars['album']->value['privacy'] == "custom") {?>
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <i class="fa fa-cog" data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shared with" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Custom People" ));?>
'></i>
  <?php }?>
</div>
<!-- album title & meta -->

<!-- photos -->
<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['album']->value['photos']) > 0) {?>
  <ul class="row">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['album']->value['photos'], 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
      <?php $_smarty_tpl->_subTemplateRender('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>"album",'_manage'=>$_smarty_tpl->tpl_vars['album']->value['manage_album']), 0, true);
?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
  <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['album']->value['photos']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
    <!-- see-more -->
    <div class="alert alert-post see-more mt20 js_see-more" data-get="photos" data-id="<?php echo $_smarty_tpl->tpl_vars['album']->value['album_id'];?>
" data-type='album'>
      <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "See More" ));?>
</span>
      <div class="loader loader_small x-hidden"></div>
    </div>
    <!-- see-more -->
  <?php }
} else { ?>
  <p class="text-center text-muted mt10">
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "This album is empty" ));?>

  </p>
<?php }?>
<!-- photos --><?php }
}
