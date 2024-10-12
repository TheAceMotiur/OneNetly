<?php
/* Smarty version 4.5.1, created on 2024-09-04 23:08:57
  from '/home/onenetly/public_html/content/themes/default/templates/settings.points.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d8e889bbf589_43784305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c87277e933e46868a4df5df3a2d0dee906f0854' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/settings.points.tpl',
      1 => 1685364572,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
    'file:_no_transactions.tpl' => 1,
  ),
),false)) {
function content_66d8e889bbf589_43784305 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="card-header with-icon">
  <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"points",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
?>
  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>

</div>
<div class="card-body">
  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
    <div class="alert alert-info">
      <div class="text">
        <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points System" ));?>
</strong><br>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Each" ));?>
 <strong><?php echo $_smarty_tpl->tpl_vars['system']->value['points_per_currency'];?>
</strong> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "points equal" ));?>
 <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( "1" ));?>
</strong>.
        <br>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your daily points limit is" ));?>
 <strong><span class="badge rounded-pill bg-warning"><?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {
echo $_smarty_tpl->tpl_vars['system']->value['points_limit_pro'];
} else {
echo $_smarty_tpl->tpl_vars['system']->value['points_limit_user'];
}?></span></strong> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>
, <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You have" ));?>
 <strong><span class="badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['remaining_points']->value;?>
</span></strong> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "remaining points" ));?>

        <br>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your daily points limit will be reset after 24 hours from your last valid earned action" ));?>

        <br>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['points_money_withdraw_enabled']) {?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can withdraw your money" ));?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['system']->value['points_money_transfer_enabled']) {?>
          <?php if ($_smarty_tpl->tpl_vars['system']->value['points_money_withdraw_enabled']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "or" ));?>
 <?php }?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can transfer your money to your" ));?>
 <a class="alert-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/wallet" target="_blank"><i class="fa fa-wallet"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "wallet" ));?>
</a>
        <?php }?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-newspaper icon bg-gradient-success"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['system']->value['points_per_post'];?>
</span><br>
            <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>
</span><br>
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For creating a new post" ));?>
</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-eye icon bg-gradient-success"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['system']->value['points_per_post_view'];?>
</span><br>
            <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>
</span><br>
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For each post view" ));?>
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
            <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['system']->value['points_per_comment'];?>
</span><br>
            <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>
</span><br>
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For commenting any post" ));?>
</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-smile icon bg-gradient-danger"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['system']->value['points_per_reaction'];?>
</span><br>
            <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>
</span><br>
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For reacting on any post" ));?>
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
            <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['system']->value['points_per_follow'];?>
</span><br>
            <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>
</span><br>
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For each follower you got" ));?>
</span>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="stat-panel border">
          <div class="stat-cell">
            <i class="fa fa-exchange-alt icon bg-gradient-purple"></i>
            <span class="text-xxlg"><?php echo $_smarty_tpl->tpl_vars['system']->value['points_per_referred'];?>
</span><br>
            <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>
</span><br>
            <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "For referring user" ));?>
</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- points balance -->
      <div class="col-sm-6">
        <div class="section-title mb20">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points Balance" ));?>

        </div>
        <div class="stat-panel bg-info">
          <div class="stat-cell">
            <i class="fa fa-piggy-bank bg-icon"></i>
            <div class="h3 mtb10">
              <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_points'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points" ));?>

            </div>
          </div>
        </div>
      </div>
      <!-- points balance -->

      <!-- money balance -->
      <div class="col-sm-6">
        <div class="section-title mb20">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Points Money Balance" ));?>

        </div>
        <div class="stat-panel bg-primary">
          <div class="stat-cell">
            <i class="fa fas fa-donate bg-icon"></i>
            <div class="h3 mtb10">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format(((1/$_smarty_tpl->tpl_vars['system']->value['points_per_currency'])*$_smarty_tpl->tpl_vars['user']->value->_data['user_points']),2) ));?>

            </div>
          </div>
        </div>
      </div>
      <!-- money balance -->
    </div>
  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>
    <div class="heading-small mb20">
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Withdrawal Request" ));?>

    </div>
    <div class="pl-md-4">
      <form class="js_ajax-forms" data-url="users/withdraw.php?type=points">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your Balance" ));?>

          </label>
          <div class="col-md-9">
            <h6>
              <span class="badge badge-lg bg-info">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format(((1/$_smarty_tpl->tpl_vars['system']->value['points_per_currency'])*$_smarty_tpl->tpl_vars['user']->value->_data['user_points']),2) ));?>

              </span>
            </h6>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Amount" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency'];?>
)
          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="amount">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The minimum withdrawal request amount is" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['points_min_withdrawal'] ));?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payment Method" ));?>

          </label>
          <div class="col-md-9">
            <?php if (in_array("paypal",$_smarty_tpl->tpl_vars['system']->value['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_paypal" value="paypal" class="form-check-input">
                <label class="form-check-label" for="method_paypal"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "PayPal" ));?>
</label>
              </div>
            <?php }?>
            <?php if (in_array("skrill",$_smarty_tpl->tpl_vars['system']->value['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_skrill" value="skrill" class="form-check-input">
                <label class="form-check-label" for="method_skrill"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Skrill" ));?>
</label>
              </div>
            <?php }?>
            <?php if (in_array("moneypoolscash",$_smarty_tpl->tpl_vars['system']->value['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_moneypoolscash" value="moneypoolscash" class="form-check-input">
                <label class="form-check-label" for="method_moneypoolscash"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "MoneyPoolsCash" ));?>
</label>
              </div>
            <?php }?>
            <?php if (in_array("bank",$_smarty_tpl->tpl_vars['system']->value['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_bank" value="bank" class="form-check-input">
                <label class="form-check-label" for="method_bank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Transfer" ));?>
</label>
              </div>
            <?php }?>
            <?php if (in_array("custom",$_smarty_tpl->tpl_vars['system']->value['points_payment_method_array'])) {?>
              <div class="form-check form-check-inline">
                <input type="radio" name="method" id="method_custom" value="custom" class="form-check-input">
                <label class="form-check-label" for="method_custom"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['system']->value['points_payment_method_custom'] ));?>
</label>
              </div>
            <?php }?>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Transfer To" ));?>

          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="method_value">
          </div>
        </div>

        <div class="row">
          <div class="col-md-9 offset-md-3">
            <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make a withdrawal" ));?>
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
      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Withdrawal History" ));?>

    </div>
    <div class="pl-md-4">
      <?php if ($_smarty_tpl->tpl_vars['payments']->value) {?>
        <div class="table-responsive mt20">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ID" ));?>
</th>
                <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Amount" ));?>
</th>
                <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Method" ));?>
</th>
                <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Transfer To" ));?>
</th>
                <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Time" ));?>
</th>
                <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Status" ));?>
</th>
              </tr>
            </thead>
            <tbody>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'payment');
$_smarty_tpl->tpl_vars['payment']->iteration = 0;
$_smarty_tpl->tpl_vars['payment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->do_else = false;
$_smarty_tpl->tpl_vars['payment']->iteration++;
$__foreach_payment_0_saved = $_smarty_tpl->tpl_vars['payment'];
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['payment']->iteration;?>
</td>
                  <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['payment']->value['amount'],2) ));?>
</td>
                  <td>
                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['method'] == "custom") {?>
                      <?php echo $_smarty_tpl->tpl_vars['system']->value['points_payment_method_custom'];?>

                    <?php } else { ?>
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['payment']->value['method'] ));?>

                    <?php }?>
                  </td>
                  <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['method_value'];?>
</td>
                  <td>
                    <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['payment']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['payment']->value['time'];?>
</span>
                  </td>
                  <td>
                    <?php if ($_smarty_tpl->tpl_vars['payment']->value['status'] == '0') {?>
                      <span class="badge rounded-pill badge-lg bg-warning"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pending" ));?>
</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['payment']->value['status'] == '1') {?>
                      <span class="badge rounded-pill badge-lg bg-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Approved" ));?>
</span>
                    <?php } else { ?>
                      <span class="badge rounded-pill badge-lg bg-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Declined" ));?>
</span>
                    <?php }?>
                  </td>
                </tr>
              <?php
$_smarty_tpl->tpl_vars['payment'] = $__foreach_payment_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
          </table>
        </div>
      <?php } else { ?>
        <?php $_smarty_tpl->_subTemplateRender('file:_no_transactions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php }?>
    </div>
  <?php }?>
</div><?php }
}
