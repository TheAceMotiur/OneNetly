<?php
/* Smarty version 4.5.1, created on 2024-09-02 05:46:40
  from '/home/onenetly/public_html/content/themes/default/templates/_chatbox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d551405ea327_30029768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce0b743055019ea650dd73afa5e5d2ea17de369e' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/_chatbox.tpl',
      1 => 1703080742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 4,
    'file:ajax.chat.conversation.messages.tpl' => 1,
  ),
),false)) {
function content_66d551405ea327_30029768 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card panel-messages" data-cid="<?php echo $_smarty_tpl->tpl_vars['_node']->value['chatbox_conversation']['conversation_id'];?>
">
  <div class="card-header">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"chat",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), 0, false);
?>
    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Chatbox" ));?>

  </div>
  <div class="card-body">
    <?php if (($_smarty_tpl->tpl_vars['_node_type']->value == "group" && $_smarty_tpl->tpl_vars['_node']->value['i_joined'] == "approved") || ($_smarty_tpl->tpl_vars['_node_type']->value == "event" && ($_smarty_tpl->tpl_vars['event']->value['i_joined']['is_going'] || $_smarty_tpl->tpl_vars['event']->value['i_joined']['is_interested']))) {?>
      <div class="chat-conversations js_scroller" data-slimScroll-height="420px" data-slimScroll-start="bottom">
        <?php $_smarty_tpl->_subTemplateRender('file:ajax.chat.conversation.messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('conversation'=>$_smarty_tpl->tpl_vars['_node']->value['chatbox_conversation']), 0, false);
?>
      </div>
      <div class="chat-typing">
        <i class="far fa-comment-dots mr5"></i><span class="loading-dots"><span class="js_chat-typing-users"></span> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Typing" ));?>
</span>
      </div>
      <div class="chat-voice-notes">
        <div class="voice-recording-wrapper" data-handle="chat">
          <!-- processing message -->
          <div class="x-hidden js_voice-processing-message">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Processing" ));?>
<span class="loading-dots"></span>
          </div>
          <!-- processing message -->

          <!-- success message -->
          <div class="x-hidden js_voice-success-message">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"main-icon mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Voice note recorded successfully" ));?>

            <div class="float-end">
              <button type="button" class="btn-close js_voice-remove"></button>
            </div>
          </div>
          <!-- success message -->

          <!-- start recording -->
          <div class="btn-voice-start js_voice-start">
            <i class="fas fa-microphone mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Record" ));?>

          </div>
          <!-- start recording -->

          <!-- stop recording -->
          <div class="btn-voice-stop js_voice-stop" style="display: none">
            <i class="far fa-stop-circle mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Recording" ));?>
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
          <textarea class="js_autosize js_post-message" dir="auto" rows="1" placeholder='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Write a message" ));?>
'></textarea>
        </div>
        <ul class="x-form-tools clearfix">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_photos_enabled']) {?>
            <li class="x-form-tools-attach">
              <i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i>
            </li>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {?>
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
      <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"empty",'class'=>"mb20",'width'=>"96px",'height'=>"96px"), 0, true);
?>
      <p class="mt10 mb0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Join the" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['_node_type']->value ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "to join the chatbox" ));?>
</p>
    </div>
  <?php }?>
</div><?php }
}
