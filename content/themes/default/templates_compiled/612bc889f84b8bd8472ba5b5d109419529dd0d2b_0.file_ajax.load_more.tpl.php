<?php
/* Smarty version 5.4.1, created on 2024-09-29 14:48:38
  from 'file:ajax.load_more.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f968c6cfff06_43036186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '612bc889f84b8bd8472ba5b5d109419529dd0d2b' => 
    array (
      0 => 'ajax.load_more.tpl',
      1 => 1727366667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_ads.tpl' => 1,
    'file:_ads_campaigns.tpl' => 1,
    'file:__svg_icons.tpl' => 1,
    'file:__feeds_post.tpl' => 3,
    'file:__feeds_reel.tpl' => 1,
    'file:__feeds_product.tpl' => 1,
    'file:__feeds_blog.tpl' => 2,
    'file:__feeds_funding.tpl' => 1,
    'file:__feeds_comment.tpl' => 2,
    'file:__feeds_photo.tpl' => 2,
    'file:__feeds_profile_photo.tpl' => 1,
    'file:__feeds_album.tpl' => 1,
    'file:__feeds_video.tpl' => 2,
    'file:__feeds_user.tpl' => 11,
    'file:__feeds_page.tpl' => 5,
    'file:__feeds_group.tpl' => 4,
    'file:__feeds_event.tpl' => 3,
    'file:__feeds_game.tpl' => 1,
    'file:__feeds_notification.tpl' => 1,
    'file:__feeds_conversation.tpl' => 1,
    'file:__feeds_message.tpl' => 1,
    'file:__feeds_candidate.tpl' => 1,
    'file:_order.tpl' => 2,
    'file:__feeds_activity.tpl' => 1,
  ),
))) {
function content_66f968c6cfff06_43036186 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
if ($_smarty_tpl->getValue('get') == 'newsfeed' || $_smarty_tpl->getValue('get') == 'posts_profile' || $_smarty_tpl->getValue('get') == 'posts_page' || $_smarty_tpl->getValue('get') == 'posts_group' || $_smarty_tpl->getValue('get') == 'posts_group_pending' || $_smarty_tpl->getValue('get') == 'posts_group_pending_all' || $_smarty_tpl->getValue('get') == 'posts_event' || $_smarty_tpl->getValue('get') == 'posts_event_pending' || $_smarty_tpl->getValue('get') == 'posts_event_pending_all' || $_smarty_tpl->getValue('get') == 'saved' || $_smarty_tpl->getValue('get') == 'memories' || $_smarty_tpl->getValue('get') == 'boosted' || $_smarty_tpl->getValue('get') == 'popular' || $_smarty_tpl->getValue('get') == 'discover' || $_smarty_tpl->getValue('get') == 'watch') {?>
  <?php $_smarty_tpl->renderSubTemplate('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php $_smarty_tpl->renderSubTemplate('file:_ads_campaigns.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

  <?php if ($_smarty_tpl->getValue('get') == 'newsfeed') {?>
    <!-- suggested reels -->
    <?php if ($_smarty_tpl->getValue('reels')) {?>
      <div class="card">
        <div class="card-header bg-transparent">
          <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"reels",'class'=>"main-icon mr5",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
          <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Reels");?>
</span>
        </div>
        <div class="card-body pb30">
          <div class="reels-box-wrapper js_reels_slick">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('reels'), 'reel');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('reel')->value) {
$foreach0DoElse = false;
?>
              <a class="reel-box" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/reels/<?php echo $_smarty_tpl->getValue('reel')['post_id'];?>
">
                <div class="views"><i class="fa fa-play mr5"></i><?php echo $_smarty_tpl->getValue('reel')['views_formatted'];?>
</div>
                <video class="js_video-plyr" data-reel="true" data-disabled="true" id="reel-suggestion-<?php echo $_smarty_tpl->getValue('post')['reel']['reel_id'];?>
" <?php if ($_smarty_tpl->getValue('reel')['reel']['thumbnail']) {?>data-poster="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['thumbnail'];?>
" <?php }?> preload="auto">
                  <?php if (empty($_smarty_tpl->getValue('reel')['reel']['source_240p']) && empty($_smarty_tpl->getValue('reel')['reel']['source_360p']) && empty($_smarty_tpl->getValue('reel')['reel']['source_480p']) && empty($_smarty_tpl->getValue('reel')['reel']['source_720p']) && empty($_smarty_tpl->getValue('reel')['reel']['source_1080p']) && empty($_smarty_tpl->getValue('reel')['reel']['source_1440p']) && empty($_smarty_tpl->getValue('reel')['reel']['source_2160p'])) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source'];?>
" type="video/mp4">
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('reel')['reel']['source_240p']) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source_240p'];?>
" type="video/mp4" label="240p" res="240">
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('reel')['reel']['source_360p']) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source_360p'];?>
" type="video/mp4" label="360p" res="360">
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('reel')['reel']['source_480p']) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source_480p'];?>
" type="video/mp4" label="480p" res="480">
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('reel')['reel']['source_720p']) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source_720p'];?>
" type="video/mp4" label="720p" res="720">
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('reel')['reel']['source_1080p']) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source_1080p'];?>
" type="video/mp4" label="1080p" res="1080">
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('reel')['reel']['source_1440p']) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source_1440p'];?>
" type="video/mp4" label="1440p" res="1440">
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('reel')['reel']['source_2160p']) {?>
                    <source src="<?php echo $_smarty_tpl->getValue('system')['system_uploads'];?>
/<?php echo $_smarty_tpl->getValue('reel')['reel']['source_2160p'];?>
" type="video/mp4" label="2160p" res="2160">
                  <?php }?>
                </video>
              </a>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          </div>
        </div>
      </div>
    <?php }?>
    <!-- suggested reels -->
  <?php }?>

  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'post');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach1DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>$_smarty_tpl->getValue('get')), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

<?php } elseif ($_smarty_tpl->getValue('get') == 'reels') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'post');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach2DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_reel.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_hidden'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'products_profile' || $_smarty_tpl->getValue('get') == 'products_page' || $_smarty_tpl->getValue('get') == 'products_group' || $_smarty_tpl->getValue('get') == 'products_event') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'post');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach3DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'shares') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'post');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach4DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_snippet'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'blogs') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'blog');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('blog')->value) {
$foreach5DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_blog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"featured"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'category_blogs') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'blog');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('blog')->value) {
$foreach6DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_blog.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'funding') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'funding');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('funding')->value) {
$foreach7DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_funding.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'post_comments' || $_smarty_tpl->getValue('get') == 'post_comments_top' || $_smarty_tpl->getValue('get') == 'post_comments_all' || $_smarty_tpl->getValue('get') == 'photo_comments' || $_smarty_tpl->getValue('get') == 'photo_comments_top' || $_smarty_tpl->getValue('get') == 'photo_comments_all') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'comment');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach8DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_comment'=>$_smarty_tpl->getValue('comment')), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'comment_replies') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'comment');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach9DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_comment'=>$_smarty_tpl->getValue('comment'),'_is_reply'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'photos') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'photo');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('photo')->value) {
$foreach10DoElse = false;
?>
    <?php if ($_smarty_tpl->getValue('type') == "user") {?>
      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>$_smarty_tpl->getValue('context'),'_can_pin'=>true), (int) 0, $_smarty_current_dir);
?>
    <?php } else { ?>
      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>$_smarty_tpl->getValue('context')), (int) 0, $_smarty_current_dir);
?>
    <?php }?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'profile_photos') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'photo');
$foreach11DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('photo')->value) {
$foreach11DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_profile_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_filter'=>$_smarty_tpl->getValue('filter')), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'albums') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'album');
$foreach12DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('album')->value) {
$foreach12DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'videos') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'video');
$foreach13DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('video')->value) {
$foreach13DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'videos_reels') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'video');
$foreach14DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('video')->value) {
$foreach14DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_is_reel'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'post_reactions' || $_smarty_tpl->getValue('get') == 'photo_reactions' || $_smarty_tpl->getValue('get') == 'comment_reactions' || $_smarty_tpl->getValue('get') == 'donors' || $_smarty_tpl->getValue('get') == 'voters' || $_smarty_tpl->getValue('get') == 'blocks' || $_smarty_tpl->getValue('get') == 'affiliates' || $_smarty_tpl->getValue('get') == 'group_requests') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach15DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach15DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_reaction'=>$_smarty_tpl->getValue('_user')["reaction"],'_donation'=>$_smarty_tpl->getValue('_user')['donation_amount'],'_donation_time'=>$_smarty_tpl->getValue('_user')['donation_time']), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'friend_requests') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach16DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach16DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"request"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'friend_requests_sent') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach17DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach17DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"cancel"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'mutual_friends') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach18DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach18DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"remove"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'new_people') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach19DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach19DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"add"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'friends') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach20DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach20DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->getValue('_user')["connection"],'_top_friends'=>true,'_darker'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'followers' || $_smarty_tpl->getValue('get') == 'followings' || $_smarty_tpl->getValue('get') == 'subscribers' || $_smarty_tpl->getValue('get') == 'page_invites' || $_smarty_tpl->getValue('get') == 'group_members' || $_smarty_tpl->getValue('get') == 'group_invites' || $_smarty_tpl->getValue('get') == 'event_going' || $_smarty_tpl->getValue('get') == 'event_interested' || $_smarty_tpl->getValue('get') == 'event_invited' || $_smarty_tpl->getValue('get') == 'event_invites') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach21DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach21DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_darker'=>true,'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'subscriptions') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_subscription');
$foreach22DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_subscription')->value) {
$foreach22DoElse = false;
?>
    <?php if ($_smarty_tpl->getValue('_subscription')['node_type'] == "profile") {?>
      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_user'=>$_smarty_tpl->getValue('_subscription'),'_tpl'=>"box",'_connection'=>'unsubscribe','_darker'=>true), (int) 0, $_smarty_current_dir);
?>
    <?php } elseif ($_smarty_tpl->getValue('_subscription')['node_type'] == "page") {?>
      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_page'=>$_smarty_tpl->getValue('_subscription'),'_tpl'=>"box",'_connection'=>'unsubscribe','_darker'=>true), (int) 0, $_smarty_current_dir);
?>
    <?php } elseif ($_smarty_tpl->getValue('_subscription')['node_type'] == "group") {?>
      <?php $_smarty_tpl->renderSubTemplate('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_group'=>$_smarty_tpl->getValue('_subscription'),'_tpl'=>"box",'_connection'=>'unsubscribe','_darker'=>true), (int) 0, $_smarty_current_dir);
?>
    <?php }?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'page_members' || $_smarty_tpl->getValue('get') == 'page_admins' || $_smarty_tpl->getValue('get') == 'group_members_manage' || $_smarty_tpl->getValue('get') == 'group_admins') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach23DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach23DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'pages' || $_smarty_tpl->getValue('get') == 'suggested_pages' || $_smarty_tpl->getValue('get') == 'category_pages' || $_smarty_tpl->getValue('get') == 'liked_pages') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_page');
$foreach24DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_page')->value) {
$foreach24DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'profile_pages') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_page');
$foreach25DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_page')->value) {
$foreach25DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box','_darker'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'boosted_pages') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_page');
$foreach26DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_page')->value) {
$foreach26DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'list'), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'groups' || $_smarty_tpl->getValue('get') == 'suggested_groups' || $_smarty_tpl->getValue('get') == 'category_groups' || $_smarty_tpl->getValue('get') == 'joined_groups') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_group');
$foreach27DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_group')->value) {
$foreach27DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'profile_groups') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_group');
$foreach28DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_group')->value) {
$foreach28DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box','_darker'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'events' || $_smarty_tpl->getValue('get') == 'suggested_events' || $_smarty_tpl->getValue('get') == 'category_events' || $_smarty_tpl->getValue('get') == 'going_events' || $_smarty_tpl->getValue('get') == 'interested_events' || $_smarty_tpl->getValue('get') == 'invited_events') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_event');
$foreach29DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_event')->value) {
$foreach29DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'profile_events' || $_smarty_tpl->getValue('get') == 'page_events') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_event');
$foreach30DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_event')->value) {
$foreach30DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box','_darker'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'games' || $_smarty_tpl->getValue('get') == 'genre_games' || $_smarty_tpl->getValue('get') == 'played_games') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_game');
$foreach31DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_game')->value) {
$foreach31DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_game.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>'box'), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'notifications') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'notification');
$foreach32DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('notification')->value) {
$foreach32DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_notification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'conversations') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'conversation');
$foreach33DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('conversation')->value) {
$foreach33DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_conversation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'messages') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'message');
$foreach34DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('message')->value) {
$foreach34DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_message.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'job_candidates' || $_smarty_tpl->getValue('get') == 'course_candidates') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'candidate');
$foreach35DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('candidate')->value) {
$foreach35DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_candidate.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'search_posts' || $_smarty_tpl->getValue('get') == 'search_blogs') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'post');
$foreach36DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach36DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'search_users') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach37DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach37DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')['connection']), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'search_pages') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_page');
$foreach38DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_page')->value) {
$foreach38DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'search_groups') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_group');
$foreach39DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_group')->value) {
$foreach39DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'search_events') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_event');
$foreach40DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_event')->value) {
$foreach40DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'orders') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'order');
$foreach41DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach41DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:_order.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'sales_orders') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'order');
$foreach42DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach42DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:_order.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sales'=>true), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'page_activities') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'activity');
$foreach43DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('activity')->value) {
$foreach43DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_activity.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


<?php } elseif ($_smarty_tpl->getValue('get') == 'page_activities_users' || $_smarty_tpl->getValue('get') == 'page_activities_permission_requests') {?>
  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), '_user');
$foreach44DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('_user')->value) {
$foreach44DoElse = false;
?>
    <?php $_smarty_tpl->renderSubTemplate('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->getValue('_user')["connection"]), (int) 0, $_smarty_current_dir);
?>
  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

<?php }
}
}
