<?php
/* Smarty version 5.4.1, created on 2024-10-02 11:54:24
  from 'file:ajax.chat.conversation.messages.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fd34700717e9_85182465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e898d88d22c0daec2f7f6ece2e41b086692832e5' => 
    array (
      0 => 'ajax.chat.conversation.messages.tpl',
      1 => 1647975782,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ajax.chat.messages.tpl' => 1,
  ),
))) {
function content_66fd34700717e9_85182465 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
if ($_smarty_tpl->getValue('conversation')['total_messages'] >= $_smarty_tpl->getValue('system')['max_results']) {?>
  <!-- see-more -->
  <div class="alert alert-chat see-more small js_see-more" data-id=<?php echo $_smarty_tpl->getValue('conversation')['conversation_id'];?>
 data-get="messages">
    <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Loading Older Messages");?>
</span>
    <div class="loader loader_small x-hidden"></div>
  </div>
  <!-- see-more -->
<?php }?>

<ul>
  <?php $_smarty_tpl->renderSubTemplate('file:ajax.chat.messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('messages'=>$_smarty_tpl->getValue('conversation')['messages']), (int) 0, $_smarty_current_dir);
?>
</ul><?php }
}
