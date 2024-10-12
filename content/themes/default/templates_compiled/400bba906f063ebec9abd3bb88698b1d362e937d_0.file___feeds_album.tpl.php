<?php
/* Smarty version 5.4.1, created on 2024-09-29 11:16:21
  from 'file:__feeds_album.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f9370556d412_53560983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '400bba906f063ebec9abd3bb88698b1d362e937d' => 
    array (
      0 => '__feeds_album.tpl',
      1 => 1723653046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f9370556d412_53560983 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="col-sm-6 col-md-4 col-lg-3">
  <div class="album-card">
    <?php if ($_smarty_tpl->getValue('album')['cover']['blur']) {?><div class="x-blured"><?php }?>
      <a class="album-cover" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('album')['path'];?>
/album/<?php echo $_smarty_tpl->getValue('album')['album_id'];?>
" style="background-image:url(<?php echo $_smarty_tpl->getValue('album')['cover']['source'];?>
);">
      </a>
      <?php if ($_smarty_tpl->getValue('album')['cover']['blur']) {?>
    </div><?php }?>
    <div class="album-details">
      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('album')['path'];?>
/album/<?php echo $_smarty_tpl->getValue('album')['album_id'];?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('album')['title']);?>
</a>
      <div>
        <?php echo $_smarty_tpl->getValue('album')['photos_count'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("photos");?>

        <div class="float-end">
          <?php if ($_smarty_tpl->getValue('album')['privacy'] == "me") {?>
            <i class="fa fa-lock" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Shared with");?>
: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Only Me");?>
'></i>
          <?php } elseif ($_smarty_tpl->getValue('album')['privacy'] == "friends") {?>
            <i class="fa fa-users" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Shared with");?>
: <?php if ($_smarty_tpl->getValue('system')['friends_enabled']) {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Friends");
} else {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Followers");
}?>'></i>
          <?php } elseif ($_smarty_tpl->getValue('album')['privacy'] == "public") {?>
            <i class="fa fa-globe" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Shared with");?>
: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Public");?>
'></i>
          <?php } elseif ($_smarty_tpl->getValue('album')['privacy'] == "custom") {?>
            <i class="fa fa-cog" data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Shared with");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Custom People");?>
'></i>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div><?php }
}
