<?php
/* Smarty version 5.4.1, created on 2024-09-30 16:38:33
  from 'file:settings.points.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66fad4092ec9c2_28710452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bd33be62611b77880f783c28aa9107b1960bd9c' => 
    array (
      0 => 'settings.points.tpl',
      1 => 1717008147,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
    'file:_no_transactions.tpl' => 2,
  ),
))) {
function content_66fad4092ec9c2_28710452 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="card-header with-icon">
  <?php $_smarty_tpl->renderSubTemplate('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"points",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), (int) 0, $_smarty_current_dir);
?>
  <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>

</div>
<div class="card-body">
  <?php if ($_smarty_tpl->getValue('sub_view') == '') {?>
    <div class="alert alert-info">
      <div class="text">
        <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points System");?>
</strong><br>
        <?php if ($_smarty_tpl->getValue('system')['points_per_currency'] > 0) {?>
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Each");?>
 <strong><?php echo $_smarty_tpl->getValue('system')['points_per_currency'];?>
</strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("points equal");?>
 <strong><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')("1");?>
</strong>.
          <br>
        <?php }?>
        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your daily points limit is");?>
 <strong><span class="badge rounded-pill bg-warning"><?php if ($_smarty_tpl->getValue('system')['packages_enabled'] && $_smarty_tpl->getValue('user')->_data['user_subscribed']) {
echo $_smarty_tpl->getValue('system')['points_limit_pro'];
} else {
echo $_smarty_tpl->getValue('system')['points_limit_user'];
}?></span></strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
, <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You have");?>
 <strong><span class="badge rounded-pill bg-danger"><?php echo $_smarty_tpl->getValue('remaining_points');?>
</span></strong> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("remaining points");?>

        <br>
        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your daily points limit will be reset after 24 hours from your last valid earned action");?>

        <br>
        <?php if ($_smarty_tpl->getValue('system')['points_per_currency'] > 0 && $_smarty_tpl->getValue('system')['points_money_withdraw_enabled']) {?>
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You can withdraw your money");?>

        <?php }?>
        <?php if ($_smarty_tpl->getValue('system')['points_per_currency'] > 0 && $_smarty_tpl->getValue('system')['points_money_transfer_enabled']) {?>
          <?php if ($_smarty_tpl->getValue('system')['points_money_withdraw_enabled']) {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("or");?>
 <?php }?>
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("You can transfer your money to your");?>
 <a class="alert-link" href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/wallet" target="_blank"><i class="fa fa-wallet"></i> <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("wallet");?>
</a>
        <?php }?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-newspaper icon bg-gradient-success"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_post'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For creating a new post");?>
</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-eye icon bg-gradient-success"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_post_view'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For each post view");?>
</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-comments icon bg-gradient-primary"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_post_comment'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For any comment on your post");?>
</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-smile icon bg-gradient-danger"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_post_reaction'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For any reaction on your post");?>
</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-comments icon bg-gradient-primary"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_comment'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For commenting any post");?>
</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-smile icon bg-gradient-danger"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_reaction'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For reacting on any post");?>
</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-users icon bg-gradient-warning"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_follow'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For each follower you got");?>
</span>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-exchange-alt icon bg-gradient-purple"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->getValue('system')['points_per_referred'];?>
</span><br>
            <span class="text-lg"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</span><br>
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For referring user");?>
</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt20">
      <!-- points balance -->
      <div class="<?php if ($_smarty_tpl->getValue('system')['points_per_currency'] > 0) {?>col-sm-6<?php } else { ?>col-sm-12<?php }?>">
        <div class="section-title mb20">
          <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points Balance");?>

        </div>
        <div class="stat-panel bg-gradient-teal">
          <div class="stat-cell">
            <i class="fa fa-piggy-bank bg-icon"></i>
            <div class="h3 mtb10">
              <?php echo $_smarty_tpl->getValue('user')->_data['user_points'];?>
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>

            </div>
          </div>
        </div>
      </div>
      <!-- points balance -->

      <!-- money balance -->
      <?php if ($_smarty_tpl->getValue('system')['points_per_currency']) {?>
        <div class="col-sm-6">
          <div class="section-title mb20">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points Money Balance");?>

          </div>
          <div class="stat-panel bg-primary">
            <div class="stat-cell">
              <i class="fa fas fa-donate bg-icon"></i>
              <div class="h3 mtb10">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')(((1/$_smarty_tpl->getValue('system')['points_per_currency'])*$_smarty_tpl->getValue('user')->_data['user_points']),2));?>

              </div>
            </div>
          </div>
        </div>
      <?php }?>
      <!-- money balance -->
    </div>

    <!-- points transactions -->
    <div class="mtb20">
      <div class="section-title mt10 mb20">
        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points Transactions");?>

      </div>
      <?php if ($_smarty_tpl->getValue('transactions')) {?>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover js_dataTable">
            <thead>
              <tr>
                <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("ID");?>
</th>
                <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Points");?>
</th>
                <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("From");?>
</th>
                <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Time");?>
</th>
              </tr>
            </thead>
            <tbody>
              <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('transactions'), 'transaction');
$_smarty_tpl->getVariable('transaction')->iteration = 0;
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('transaction')->value) {
$foreach0DoElse = false;
$_smarty_tpl->getVariable('transaction')->iteration++;
$foreach0Backup = clone $_smarty_tpl->getVariable('transaction');
?>
                <tr>
                  <td><?php echo $_smarty_tpl->getVariable('transaction')->iteration;?>
</td>
                  <td><span class="badge rounded-pill badge-lg bg-light text-primary"><?php echo $_smarty_tpl->getValue('transaction')['points'];?>
</span></td>
                  <td>
                    <?php if ($_smarty_tpl->getValue('transaction')['node_type'] == "post") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Added Post");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "post_view") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Post View");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "post_comment") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Received Comment");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "post_reaction") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Received Reaction");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "comment") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Added Comment");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "posts_reactions") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Added Post Reaction");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "posts_photos_reactions") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Added Post Photo Reaction");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "posts_comments_reactions") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Added Comment Reaction");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "follow") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Followed");?>

                    <?php } elseif ($_smarty_tpl->getValue('transaction')['node_type'] == "referred") {?>
                      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Referred User");?>

                    <?php }?>
                  </td>
                  <td><span class="js_moment" data-time="<?php echo $_smarty_tpl->getValue('transaction')['time'];?>
"><?php echo $_smarty_tpl->getValue('transaction')['time'];?>
</span></td>
                </tr>
              <?php
$_smarty_tpl->setVariable('transaction', $foreach0Backup);
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
    <!-- points transactions -->
  <?php } elseif ($_smarty_tpl->getValue('sub_view') == "payments") {?>
    <div class="heading-small mb20">
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Withdrawal Request");?>

    </div>
    <div class="pl-md-4">
      <form class="js_ajax-forms" data-url="users/withdraw.php?type=points">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Your Balance");?>

          </label>
          <div class="col-md-9">
            <h6>
              <span class="badge badge-lg bg-info">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getSmarty()->getModifierCallback('number_format')(((1/$_smarty_tpl->getValue('system')['points_per_currency'])*$_smarty_tpl->getValue('user')->_data['user_points']),2));?>

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
 <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('print_money')($_smarty_tpl->getValue('system')['points_min_withdrawal']);?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Payment Method");?>

          </label>
          <div class="col-md-9">
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("paypal",$_smarty_tpl->getValue('system')['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_paypal" value="paypal" class="form-check-input">
                <label class="form-check-label" for="method_paypal"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("PayPal");?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("skrill",$_smarty_tpl->getValue('system')['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_skrill" value="skrill" class="form-check-input">
                <label class="form-check-label" for="method_skrill"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Skrill");?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("moneypoolscash",$_smarty_tpl->getValue('system')['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_moneypoolscash" value="moneypoolscash" class="form-check-input">
                <label class="form-check-label" for="method_moneypoolscash"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("MoneyPoolsCash");?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("bank",$_smarty_tpl->getValue('system')['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_bank" value="bank" class="form-check-input">
                <label class="form-check-label" for="method_bank"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Bank Transfer");?>
</label>
              </div>
            <?php }?>
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')("custom",$_smarty_tpl->getValue('system')['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_custom" value="custom" class="form-check-input">
                <label class="form-check-label" for="method_custom"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')($_smarty_tpl->getValue('system')['points_payment_method_custom']);?>
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
    </div>

    <div class="divider"></div>

    <div class="heading-small mb20">
      <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Withdrawal History");?>

    </div>
    <div class="pl-md-4">
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
                      <?php echo $_smarty_tpl->getValue('system')['points_payment_method_custom'];?>

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
  <?php }?>
</div><?php }
}
