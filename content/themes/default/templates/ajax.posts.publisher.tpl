<div class="modal-body ptb0 plr0">
  {include file='_publisher.tpl' _quick_mode=true _modal_mode=true _handle="me" _node_can_monetize_content=$user->_data['can_monetize_content'] _node_monetization_enabled=$user->_data['user_monetization_enabled'] _node_monetization_plans=$user->_data['user_monetization_plans'] _privacy=true}
</div>

<script>
  $(document).ready(function() {
    $('.publisher textarea').trigger('click');
  });
</script>