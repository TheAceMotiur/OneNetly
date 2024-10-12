<?php
/* Smarty version 5.4.1, created on 2024-09-29 22:05:16
  from 'file:_chatbox.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66f9cf1c657a65_57345147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '019e7bd208851650a89abfcfec399baaceeeca03' => 
    array (
      0 => '_chatbox.tpl',
      1 => 1703080742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 4,
    'file:ajax.chat.conversation.messages.tpl' => 1,
  ),
))) {
function content_66f9cf1c657a65_57345147 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="card panel-messages" data-cid="<?php echo $_smarty_tpl->getValue('_node')['chatbox_conversation']['conversation_id'];?>
">
  <div class="card-header">
    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Chatbox");?>

  </div>
  <div class="card-body">
    <?php if (($_smarty_tpl->getValue('_node_type') == "group" && $_smarty_tpl->getValue('_node')['i_joined'] == "approved") || ($_smarty_tpl->getValue('_node_type') == "event" && ($_smarty_tpl->getValue('event')['i_joined']['is_going'] || $_smarty_tpl->getValue('event')['i_joined']['is_interested']))) {?>
      <div class="chat-conversations js_scroller" data-slimScroll-height="420px" data-slimScroll-start="bottom">
        <?php $_smarty_tpl->renderSubTemplate('file:ajax.chat.conversation.messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('conversation'=>$_smarty_tpl->getValue('_node')['chatbox_conversation']), (int) 0, $_smarty_current_dir);
?>
      </div>
      <div class="chat-typing">
        <i class="far fa-comment-dots mr5"></i><span class="loading-dots"><span class="js_chat-typing-users"></span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Typing");?>
</span>
      </div>
      <div class="chat-voice-notes">
        <div class="voice-recording-wrapper" data-handle="chat">
          <!-- processing message -->
          <div class="x-hidden js_voice-processing-message">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), (int) 0, $_smarty_current_dir);
?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Processing");?>
<span class="loading-dots"></span>
          </div>
          <!-- processing message -->

          <!-- success message -->
          <div class="x-hidden js_voice-success-message">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), (int) 0, $_smarty_current_dir);
?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Voice note recorded successfully");?>

            <div class="float-end">
              <button type="button" class="btn-close js_voice-remove"></button>
            </div>
          </div>
          <!-- success message -->

          <!-- start recording -->
          <div class="btn-voice-start js_voice-start">
            <i class="fas fa-microphone mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Record");?>

          </div>
          <!-- start recording -->

          <!-- stop recording -->
          <div class="btn-voice-stop js_voice-stop" style="display: none">
            <i class="far fa-stop-circle mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Recording");?>
 <span class="js_voice-timer">00:00</span>
          </div>
          <!-- stop recording -->
        </div>
      </div>
      <div class="chat-attachments attachments clearfix x-hidden">
        <ul>
          <li class="loading">
            <div class="progress x-progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </li>
        </ul>
      </div>
      <div class="x-form chat-form">
        <div class="chat-form-message">
          <textarea class="js_autosize js_post-message" dir="auto" rows="1" placeholder='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Write a message");?>
'></textarea>
        </div>
        <ul class="x-form-tools clearfix">
          <?php if ($_smarty_tpl->getValue('system')['chat_photos_enabled']) {?>
            <li class="x-form-tools-attach">
              <i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i>
            </li>
          <?php }?>
          <?php if ($_smarty_tpl->getValue('system')['voice_notes_chat_enabled']) {?>
            <li class="x-form-tools-voice js_chat-voice-notes-toggle">
              <i class="fas fa-microphone fa-lg fa-fw"></i>
            </li>
          <?php }?>
          <li class="x-form-tools-emoji js_emoji-menu-toggle">
            <i class="far fa-smile-wink fa-lg fa-fw"></i>
          </li>
          <li class="x-form-tools-post js_post-message">
            <i class="far fa-paper-plane fa-lg fa-fw"></i>
          </li>
        </ul>
      </div>
    </div>
  <?php } else { ?>
    <div class="text-center text-muted" style="padding-top: 60px; min-height: 510px;">
      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"empty",'class'=>"mb20",'width'=>"96px",'height'=>"96px"), (int) 0, $_smarty_current_dir);
?>
      <p class="mt10 mb0"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Join the");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('_node_type'));?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("to join the chatbox");?>
</p>
    </div>
  <?php }?>
</div><?php }
}
