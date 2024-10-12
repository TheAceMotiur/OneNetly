<?php
/* Smarty version 5.4.1, created on 2024-10-02 15:05:16
  from 'file:wallet.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fd612cc06d17_54381162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e847e1aaa1b4399e9fc99e9f23ca2cffc2f1c99' => 
    array (
      0 => 'wallet.tpl',
      1 => 1722865328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__svg_icons.tpl' => 11,
    'file:_no_transactions.tpl' => 2,
    'file:_footer.tpl' => 1,
  ),
))) {
function content_66fd612cc06d17_54381162 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
$_smarty_tpl->renderSubTemplate('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_smarty_tpl->renderSubTemplate('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<!-- page header -->
<div class="page-header">
  <img class="floating-img d-none d-md-block" src="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->getValue('system')['theme'];?>
/images/headers/undraw_wallet_aym5.svg">
  <div class="circle-2"></div>
  <div class="circle-3"></div>
  <div class="inner">
    <h2><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Wallet");?>
</h2>
    <p class="text-xlg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Send and Transfer Money");?>
</p>
  </div>
</div>
<!-- page header -->

<!-- page content -->
<div class="<?php if ($_smarty_tpl->getValue('system')['fluid_design']) {?>container-fluid<?php } else { ?>container<?php }?> sg-offcanvas" style="margin-top: -25px;">
  <div class="row">

    <!-- side panel -->
    <div class="col-12 d-block d-md-none sg-offcanvas-sidebar">
      <?php $_smarty_tpl->renderSubTemplate('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>
    <!-- side panel -->

    <!-- content panel -->
    <div class="col-12 sg-offcanvas-mainbar">

      <!-- tabs -->
      <div class="position-relative">
        <div class="content-tabs rounded-sm shadow-sm clearfix">
          <ul>
            <li <?php if ($_smarty_tpl->getValue('view') == '') {?>class="active" <?php }?>>
              <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/wallet">
                <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wallet",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Wallet");?>

              </a>
            </li>
            <?php if ($_smarty_tpl->getValue('system')['wallet_withdrawal_enabled']) {?>
              <li <?php if ($_smarty_tpl->getValue('view') == "payments") {?>class="active" <?php }?>>
                <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/wallet/payments">
                  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"payments",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Payments");?>

                </a>
              </li>
            <?php }?>
          </ul>
        </div>
      </div>
      <!-- tabs -->

      <?php if ($_smarty_tpl->getValue('view') == '') {?>

        <!-- wallet -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wallet",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Wallet");?>

          </div>
          <div class="card-body page-content">
            <?php if ($_smarty_tpl->getValue('wallet_transfer_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_transfer_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("transfer transaction successfuly sent");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_replenish_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Congratulation! Your wallet credit replenished successfully with");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_replenish_amount'),2));?>
</span>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_withdraw_affiliates_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Congratulation! Your wallet credit replenished successfully with");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_withdraw_affiliates_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("from your affiliates credit");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_withdraw_points_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Congratulation! Your wallet credit replenished successfully with");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_withdraw_points_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("from your points credit");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_withdraw_market_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Congratulation! Your wallet credit replenished successfully with");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_withdraw_market_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("from your market credit");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_withdraw_funding_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Congratulation! Your wallet credit replenished successfully with");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_withdraw_funding_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("from your funding credit");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_withdraw_monetization_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Congratulation! Your wallet credit replenished successfully with");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_withdraw_monetization_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("from your monetization credit");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_package_payment_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_package_payment_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("payment transaction successfuly done");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_monetization_payment_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_monetization_payment_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("payment transaction successfuly done");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_paid_post_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_paid_post_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("payment transaction successfuly done");?>

              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getValue('wallet_donate_amount')) {?>
              <div class="alert alert-success mb20">
                <i class="fas fa-check-circle mr5"></i>
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your");?>
 <span class="badge rounded-pill badge-lg bg-secondary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('wallet_donate_amount'),2));?>
</span> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("payment transaction successfuly done");?>

              </div>
            <?php }?>

            <div class="row">
              <!-- credit -->
              <div class="col-md-5">
                <div class="section-title mb20">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your Credit");?>

                </div>
                <div class="stat-panel bg-gradient-info">
                  <div class="stat-cell small">
                    <i class="fa fa-money-bill-alt bg-icon"></i>
                    <div class="h3 mtb10">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('user')->_data['user_wallet_balance'],2));?>

                    </div>
                  </div>
                </div>
              </div>
              <!-- credit -->

              <!-- send & recieve money -->
              <div class="col-md-7">
                <div class="section-title mb20">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Send & Recieve Money");?>

                </div>
                <div class="d-grid">
                  <?php if ($_smarty_tpl->getValue('system')['wallet_transfer_enabled']) {?>
                    <button class="btn btn-outline-primary mb10" data-toggle="modal" data-url="#wallet-transfer">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wallet_transfer",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Send Money");?>

                    </button>
                  <?php }?>
                </div>

                <div class="d-grid gap-2">
                  <button class="btn btn-outline-primary" data-toggle="modal" data-url="#wallet-replenish">
                    <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"payments",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replenish Credit");?>

                  </button>
                  <?php if ($_smarty_tpl->getValue('system')['affiliates_enabled'] && $_smarty_tpl->getValue('system')['affiliates_money_transfer_enabled']) {?>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-url="#wallet-withdraw-affiliates">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"affiliates",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Affiliates Credit");?>

                    </button>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('system')['points_enabled'] && $_smarty_tpl->getValue('system')['points_per_currency'] > 0 && $_smarty_tpl->getValue('system')['points_money_transfer_enabled']) {?>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-url="#wallet-withdraw-points">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"points",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points Credit");?>

                    </button>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('user')->_data['can_sell_products'] && $_smarty_tpl->getValue('system')['market_money_transfer_enabled'] && $_smarty_tpl->getValue('system')['market_shopping_cart_enabled']) {?>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-url="#wallet-withdraw-market">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"market",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Marketplace Credit");?>

                    </button>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('user')->_data['can_raise_funding'] && $_smarty_tpl->getValue('system')['funding_money_transfer_enabled']) {?>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-url="#wallet-withdraw-funding">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"funding",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Funding Credit");?>

                    </button>
                  <?php }?>
                  <?php if ($_smarty_tpl->getValue('user')->_data['can_monetize_content'] && $_smarty_tpl->getValue('system')['monetization_money_transfer_enabled']) {?>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-url="#wallet-withdraw-monetization">
                      <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization Credit");?>

                    </button>
                  <?php }?>
                </div>
              </div>
              <!-- send & recieve money -->

              <!-- wallet transactions -->
              <div class="col-12 mt20">
                <div class="section-title mt10 mb20">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Wallet Transactions");?>

                </div>
                <?php if ($_smarty_tpl->getValue('transactions')) {?>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover js_dataTable">
                      <thead>
                        <tr>
                          <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("ID");?>
</th>
                          <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Amount");?>
</th>
                          <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("From / To");?>
</th>
                          <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Time");?>
</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('transactions'), 'transaction');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('transaction')->value) {
$foreach0DoElse = false;
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->getValue('transaction')['transaction_id'];?>
</td>
                            <td>
                              <?php if ($_smarty_tpl->getValue('transaction')['type'] == "out") {?>
                                <span class="badge rounded-pill badge-lg bg-danger mr5"><i class="far fa-arrow-alt-circle-down"></i></span>
                                <strong class="text-danger"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transaction')['amount'],2));?>
</strong>
                              <?php } else { ?>
                                <span class="badge rounded-pill badge-lg bg-success mr5"><i class="far fa-arrow-alt-circle-up"></i></span>
                                <strong class="text-success"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('transaction')['amount'],2));?>
</strong>
                              <?php }?>
                            </td>
                            <td>
                              <?php if ($_smarty_tpl->getValue('transaction')['type'] == "out") {?>
                                <span class="badge rounded-pill badge-lg bg-danger mr10"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("To");?>
</span>
                              <?php } else { ?>
                                <span class="badge rounded-pill badge-lg bg-success mr10"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("From");?>
</span>
                              <?php }?>
                              <?php if ($_smarty_tpl->getValue('transaction')['node_type'] == "user" || $_smarty_tpl->getValue('transaction')['node_type'] == "tip") {?>
                                <?php if ($_smarty_tpl->getValue('transaction')['node_type'] == "tip") {?>
                                  <span class="badge rounded-pill badge-lg bg-secondary mr10"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Tip");?>
</span>
                                <?php }?>
                                <a target="_blank" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('transaction')['user_name'];?>
">
                                  <img class="tbl-image" src="<?php echo $_smarty_tpl->getValue('transaction')['user_picture'];?>
" style="float: none;">
                                  <?php if ($_smarty_tpl->getValue('system')['show_usernames_enabled']) {?>
                                    <?php echo $_smarty_tpl->getValue('transaction')['user_name'];?>

                                  <?php } else { ?>
                                    <?php echo $_smarty_tpl->getValue('transaction')['user_firstname'];?>
 <?php echo $_smarty_tpl->getValue('transaction')['user_lastname'];?>

                                  <?php }?>
                                </a>
                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "recharge") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Replenish Credit");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "withdraw_wallet") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Wallet Withdrawal");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "withdraw_affiliates") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Affiliates Credit");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "withdraw_points") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points Credit");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "withdraw_market") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Market Credit");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "withdraw_funding") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Funding Credit");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "withdraw_monetization") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Monetization Credit");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "package_payment") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Buy Pro Package");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "subscribe_profile" || $_smarty_tpl->getValue('transaction')['node_type'] == "subscribe_user") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribe to Profile");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "subscribe_page") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribe to Page");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "subscribe_group") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Subscribe to Group");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "paid_post") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Paid Post");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "donate") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Donate");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "market") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Market Purchase");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "paid_chat_message") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Paid Chat Message");?>

                              <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "paid_call") {?>
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Paid Call");?>

                              <?php }?>
                            </td>
                            <td><span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('transaction')['date'];?>
"><?php echo $_smarty_tpl->getValue('transaction')['date'];?>
</span></td>
                          </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </tbody>
                    </table>
                  </div>
                <?php } else { ?>
                  <?php $_smarty_tpl->renderSubTemplate('file:_no_transactions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                <?php }?>
              </div>
              <!-- wallet transactions -->
            </div>
          </div>
        </div>
        <!-- wallet -->

      <?php } elseif ($_smarty_tpl->getValue('view') == "payments") {?>

        <!-- payments -->
        <div class="card mt20">
          <div class="card-header with-icon">
            <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"payments",'class'=>"main-icon mr10",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Payments");?>

          </div>
          <div class="card-body page-content">
            <div class="section-title mt10 mb20">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Withdrawal Request");?>

            </div>
            <form class="js_ajax-forms" data-url="users/withdraw.php?type=wallet">
              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your Balance");?>

                </label>
                <div class="col-md-9">
                  <h6>
                    <span class="badge badge-lg bg-info">
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('user')->_data['user_wallet_balance'],2));?>

                    </span>
                  </h6>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Amount");?>
 (<?php echo $_smarty_tpl->getValue('system')['system_currency'];?>
)
                </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="amount">
                  <div class="form-text">
                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The minimum withdrawal request amount is");?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getValue('system')['wallet_min_withdrawal']);?>

                  </div>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Payment Method");?>

                </label>
                <div class="col-md-9">
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("paypal",$_smarty_tpl->getValue('system')['wallet_payment_method_array'])) {?>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="method" id="method_paypal" value="paypal" class="form-check-input">
                      <label class="form-check-label" for="method_paypal"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("PayPal");?>
</label>
                    </div>
                  <?php }?>
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("skrill",$_smarty_tpl->getValue('system')['wallet_payment_method_array'])) {?>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="method" id="method_skrill" value="skrill" class="form-check-input">
                      <label class="form-check-label" for="method_skrill"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Skrill");?>
</label>
                    </div>
                  <?php }?>
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("moneypoolscash",$_smarty_tpl->getValue('system')['wallet_payment_method_array'])) {?>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="method" id="method_moneypoolscash" value="moneypoolscash" class="form-check-input">
                      <label class="form-check-label" for="method_moneypoolscash"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("MoneyPoolsCash");?>
</label>
                    </div>
                  <?php }?>
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("bank",$_smarty_tpl->getValue('system')['wallet_payment_method_array'])) {?>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="method" id="method_bank" value="bank" class="form-check-input">
                      <label class="form-check-label" for="method_bank"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Bank Transfer");?>
</label>
                    </div>
                  <?php }?>
                  <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("custom",$_smarty_tpl->getValue('system')['wallet_payment_method_array'])) {?>
                    <div class="form-check form-check-inline">
                      <input type="radio" name="method" id="method_custom" value="custom" class="form-check-input">
                      <label class="form-check-label" for="method_custom"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('system')['wallet_payment_method_custom']);?>
</label>
                    </div>
                  <?php }?>
                </div>
              </div>

              <div class="row form-group">
                <label class="col-md-3 form-label">
                  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Transfer To");?>

                </label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="method_value">
                </div>
              </div>

              <div class="row">
                <div class="col-md-9 offset-md-3">
                  <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Make a withdrawal");?>
</button>
                </div>
              </div>

              <!-- success -->
              <div class="alert alert-success mt15 mb0 x-hidden"></div>
              <!-- success -->

              <!-- error -->
              <div class="alert alert-danger mt15 mb0 x-hidden"></div>
              <!-- error -->
            </form>

            <div class="section-title mt20 mb20">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Withdrawal History");?>

            </div>
            <?php if ($_smarty_tpl->getValue('payments')) {?>
              <div class="table-responsive mt20">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("ID");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Amount");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Method");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Transfer To");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Time");?>
</th>
                      <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Status");?>
</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('payments'), 'payment');
$_smarty_tpl->getVariable('payment')->iteration = 0;
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('payment')->value) {
$foreach1DoElse = false;
$_smarty_tpl->getVariable('payment')->iteration++;
$foreach1Backup = clone $_smarty_tpl->getVariable('payment');
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->getVariable('payment')->iteration;?>
</td>
                        <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('payment')['amount'],2));?>
</td>
                        <td>
                          <?php if ($_smarty_tpl->getValue('payment')['method'] == "custom") {?>
                            <?php echo $_smarty_tpl->getValue('system')['wallet_payment_method_custom'];?>

                          <?php } else { ?>
                            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('ucfirst')($_smarty_tpl->getValue('payment')['method']);?>

                          <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->getValue('payment')['method_value'];?>
</td>
                        <td>
                          <span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('payment')['time'];?>
"><?php echo $_smarty_tpl->getValue('payment')['time'];?>
</span>
                        </td>
                        <td>
                          <?php if ($_smarty_tpl->getValue('payment')['status'] == '0') {?>
                            <span class="badge rounded-pill badge-lg bg-warning"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Pending");?>
</span>
                          <?php } elseif ($_smarty_tpl->getValue('payment')['status'] == '1') {?>
                            <span class="badge rounded-pill badge-lg bg-success"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Approved");?>
</span>
                          <?php } else { ?>
                            <span class="badge rounded-pill badge-lg bg-danger"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Declined");?>
</span>
                          <?php }?>
                        </td>
                      </tr>
                    <?php
$_smarty_tpl->setVariable('payment', $foreach1Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                  </tbody>
                </table>
              </div>
            <?php } else { ?>
              <?php $_smarty_tpl->renderSubTemplate('file:_no_transactions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <?php }?>
          </div>
        </div>
        <!-- payments -->

      <?php }?>
    </div>
    <!-- content panel -->

  </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->renderSubTemplate('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
