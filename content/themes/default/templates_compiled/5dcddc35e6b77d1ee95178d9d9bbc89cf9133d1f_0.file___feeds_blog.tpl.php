<?php
/* Smarty version 5.4.1, created on 2024-09-29 12:47:31
  from 'file:__feeds_blog.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f94c6361df38_26910362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dcddc35e6b77d1ee95178d9d9bbc89cf9133d1f' => 
    array (
      0 => '__feeds_blog.tpl',
      1 => 1726851578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_need_payment.tpl' => 2,
    'file:_need_subscription.tpl' => 2,
    'file:_need_pro_package.tpl' => 2,
    'file:_need_age_verification.tpl' => 2,
  ),
))) {
function content_66f94c6361df38_26910362 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
if ($_smarty_tpl->getValue('_tpl') == "featured") {?>
  <div class="<?php if ($_smarty_tpl->getValue('_iteration') == 1) {?>col-sm-12 col-md-8 col-lg-6<?php } else { ?>col-sm-6 col-md-4 col-lg-3<?php }?>">
    <a href="<?php if ($_smarty_tpl->getValue('blog')['needs_payment'] || $_smarty_tpl->getValue('blog')['needs_subscription'] || $_smarty_tpl->getValue('blog')['needs_pro_package'] || $_smarty_tpl->getValue('blog')['needs_age_verification']) {
echo $_smarty_tpl->getValue('system')['system_url'];?>
/posts/<?php echo $_smarty_tpl->getValue('blog')['post_id'];
} else {
echo $_smarty_tpl->getValue('system')['system_url'];?>
/blogs/<?php echo $_smarty_tpl->getValue('blog')['post_id'];?>
/<?php echo $_smarty_tpl->getValue('blog')['blog']['title_url'];
}?>" class="blog-container <?php if ($_smarty_tpl->getValue('_iteration') == 1) {?>primary<?php }?>">
      <?php if ($_smarty_tpl->getValue('blog')['needs_payment']) {?>
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_payment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post_id'=>$_smarty_tpl->getValue('blog')['post_id'],'price'=>$_smarty_tpl->getValue('blog')['post_price']), (int) 0, $_smarty_current_dir);
?>
        </div>
      <?php } elseif ($_smarty_tpl->getValue('blog')['needs_subscription']) {?>
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
      <?php } elseif ($_smarty_tpl->getValue('blog')['needs_pro_package']) {?>
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_pro_package.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
      <?php } elseif ($_smarty_tpl->getValue('blog')['needs_age_verification']) {?>
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_age_verification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
      <?php } else { ?>
        <div class="blog-image">
          <img src="<?php echo $_smarty_tpl->getValue('blog')['blog']['parsed_cover'];?>
">
        </div>
        <div class="blog-content">
          <h3><?php echo $_smarty_tpl->getValue('blog')['blog']['title'];?>
</h3>
          <div class="text"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('blog')['blog']['text_snippet'],400);?>
</div>
          <div>
            <div class="post-avatar">
              <div class="post-avatar-picture small" style="background-image:url('<?php echo $_smarty_tpl->getValue('blog')['post_author_picture'];?>
');">
              </div>
            </div>
            <div class="post-meta">
              <span class="text-link">
                <?php echo $_smarty_tpl->getValue('blog')['post_author_name'];?>

              </span>
              <div class="post-time">
                <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('blog')['time'];?>
"><?php echo $_smarty_tpl->getValue('blog')['time'];?>
</span>
              </div>
            </div>
          </div>
        </div>
      <?php }?>
      <div class="blog-more">
        <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("More");?>
</span>
      </div>
    </a>
  </div>
<?php } else { ?>
  <div class="post-media list">
    <?php if ($_smarty_tpl->getValue('blog')['needs_payment']) {?>
      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/posts/<?php echo $_smarty_tpl->getValue('blog')['post_id'];?>
">
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_payment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post_id'=>$_smarty_tpl->getValue('blog')['post_id'],'price'=>$_smarty_tpl->getValue('blog')['post_price'],'paid_text'=>$_smarty_tpl->getValue('blog')['paid_text']), (int) 0, $_smarty_current_dir);
?>
        </div>
      </a>
    <?php } elseif ($_smarty_tpl->getValue('blog')['needs_subscription']) {?>
      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/posts/<?php echo $_smarty_tpl->getValue('blog')['post_id'];?>
">
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_subscription.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
      </a>
    <?php } elseif ($_smarty_tpl->getValue('blog')['needs_pro_package']) {?>
      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/posts/<?php echo $_smarty_tpl->getValue('blog')['post_id'];?>
">
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_pro_package.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
      </a>
    <?php } elseif ($_smarty_tpl->getValue('blog')['needs_age_verification']) {?>
      <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/posts/<?php echo $_smarty_tpl->getValue('blog')['post_id'];?>
">
        <div class="ptb20 plr20">
          <?php $_smarty_tpl->renderSubTemplate('file:_need_age_verification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        </div>
      </a>
    <?php } else { ?>
      <div class="post-media-image-wrapper">
        <a class="post-media-image" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/blogs/<?php echo $_smarty_tpl->getValue('blog')['post_id'];?>
/<?php echo $_smarty_tpl->getValue('blog')['blog']['title_url'];?>
">
          <div style="padding-top: 50%; background-position: center center; background-size: cover; background-image:url('<?php echo $_smarty_tpl->getValue('blog')['blog']['parsed_cover'];?>
');"></div>
        </a>
        <div class="post-media-image-meta">
          <a class="blog-category <?php if ($_smarty_tpl->getValue('_small')) {?>small<?php }?>" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/blogs/category/<?php echo $_smarty_tpl->getValue('blog')['blog']['category_id'];?>
/<?php echo $_smarty_tpl->getValue('blog')['blog']['category_url'];?>
">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('blog')['blog']['category_name']);?>

          </a>
        </div>
      </div>
      <div class="post-media-meta">
        <a class="title mb5" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/blogs/<?php echo $_smarty_tpl->getValue('blog')['post_id'];?>
/<?php echo $_smarty_tpl->getValue('blog')['blog']['title_url'];?>
"><?php echo $_smarty_tpl->getValue('blog')['blog']['title'];?>
</a>
        <div class="text mb5">
          <?php if ($_smarty_tpl->getValue('_small')) {?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('blog')['blog']['text_snippet'],100);?>

          <?php } else { ?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('blog')['blog']['text_snippet'],500);?>

          <?php }?>
        </div>
        <div class="info">
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("By");?>

          <span class="js_user-popover pr10" data-type="<?php echo $_smarty_tpl->getValue('blog')['user_type'];?>
" data-uid="<?php echo $_smarty_tpl->getValue('blog')['user_id'];?>
">
            <a href="<?php echo $_smarty_tpl->getValue('blog')['post_author_url'];?>
"><?php echo $_smarty_tpl->getValue('blog')['post_author_name'];?>
</a>
          </span>
          <i class="fa fa-clock pr5"></i><span class="js_moment pr10" data-time="<?php echo $_smarty_tpl->getValue('blog')['time'];?>
"><?php echo $_smarty_tpl->getValue('blog')['time'];?>
</span>
          <i class="fa fa-comments pr5"></i><span class="pr10"><?php echo $_smarty_tpl->getValue('blog')['comments_formatted'];?>
</span>
          <i class="fa fa-eye pr5"></i><span class="pr10"><?php echo $_smarty_tpl->getValue('blog')['views_formatted'];?>
</span>
        </div>
      </div>
    <?php }?>
  </div>
<?php }
}
}
