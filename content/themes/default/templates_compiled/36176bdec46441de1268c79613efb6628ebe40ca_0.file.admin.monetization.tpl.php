<?php
/* Smarty version 4.5.1, created on 2024-09-02 05:19:36
  from '/home/onenetly/public_html/content/themes/default/templates/admin.monetization.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d54ae8038fa8_30473089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36176bdec46441de1268c79613efb6628ebe40ca' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/admin.monetization.tpl',
      1 => 1705930199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 4,
  ),
),false)) {
function content_66d54ae8038fa8_30473089 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="card">
  <div class="card-header with-icon">
    <i class="fa fa-coins mr5"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Monetization" ));?>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?> &rsaquo; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payment Requests" ));
}?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>

    <form class="js_ajax-forms" data-url="admin/monetization.php?do=settings">
      <div class="card-body">
        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, false);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Monetization Enabled" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable monetization to enable your users to earn money from their content" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/payments"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payments Settings" ));?>
</a>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="monetization_enabled">
              <input type="checkbox" name="monetization_enabled" id="monetization_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider dashed"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wallet",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users Can Subscribe Via Wallet Balance" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Enable users to subscribe via their wallet balance" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have enabled" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/wallet"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Wallet System" ));?>
</a>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="monetization_wallet_payment_enabled">
              <input type="checkbox" name="monetization_wallet_payment_enabled" id="monetization_wallet_payment_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_wallet_payment_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider dashed"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"withdrawal",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users Can Withdraw Earned Money" ));?>
</div>
            <div class="form-text d-none d-sm-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If enabled users will be able to withdraw earned money" ));?>
</div>
          </div>
          <div class="text-end">
            <label class="switch" for="monetization_money_withdraw_enabled">
              <input type="checkbox" name="monetization_money_withdraw_enabled" id="monetization_money_withdraw_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_money_withdraw_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payment Method" ));?>

          </label>
          <div class="col-md-9">
            <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" name="method_paypal" id="method_paypal" <?php if (in_array("paypal",$_smarty_tpl->tpl_vars['system']->value['monetization_payment_method_array'])) {?>checked<?php }?>>
              <label class="form-check-label" for="method_paypal"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "PayPal" ));?>
</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" name="method_skrill" id="method_skrill" <?php if (in_array("skrill",$_smarty_tpl->tpl_vars['system']->value['monetization_payment_method_array'])) {?>checked<?php }?>>
              <label class="form-check-label" for="method_skrill"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Skrill" ));?>
</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" name="method_moneypoolscash" id="method_moneypoolscash" <?php if (in_array("moneypoolscash",$_smarty_tpl->tpl_vars['system']->value['monetization_payment_method_array'])) {?>checked<?php }?>>
              <label class="form-check-label" for="method_moneypoolscash"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "MoneyPoolsCash" ));?>
</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" name="method_bank" id="method_bank" <?php if (in_array("bank",$_smarty_tpl->tpl_vars['system']->value['monetization_payment_method_array'])) {?>checked<?php }?>>
              <label class="form-check-label" for="method_bank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Bank Transfer" ));?>
</label>
            </div>
            <div class="form-check form-check-inline" id="js_custome-withdrawal">
              <input type="checkbox" class="form-check-input" name="method_custom" id="method_custom" <?php if (in_array("custom",$_smarty_tpl->tpl_vars['system']->value['monetization_payment_method_array'])) {?>checked<?php }?>>
              <label class="form-check-label" for="method_custom"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Custom Method" ));?>
</label>
            </div>
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users can send withdrawal requests via any of these methods" ));?>

            </div>
          </div>
        </div>

        <div id="js_custome-withdrawal-name" <?php if (!in_array("custom",$_smarty_tpl->tpl_vars['system']->value['monetization_payment_method_array'])) {?>class="x-hidden" <?php }?>>
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Custom Method Name" ));?>

            </label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="monetization_payment_method_custom" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['monetization_payment_method_custom'];?>
">
              <div class="form-text">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Set the name of your custom withdrawal payment method" ));?>

              </div>
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Minimum Withdrawal Request" ));?>
 (<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency'];?>
)
          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="monetization_min_withdrawal" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['monetization_min_withdrawal'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "The minimum amount of money so user can send a withdrawal request" ));?>

            </div>
          </div>
        </div>

        <div class="divider dashed"></div>

        <div class="form-table-row">
          <div class="avatar">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"wallet",'class'=>"main-icon",'width'=>"40px",'height'=>"40px"), 0, true);
?>
          </div>
          <div>
            <div class="form-label h6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Users Can Transfer Earned Money To Wallet" ));?>
</div>
            <div class="form-text d-none d-sm-block">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "If wallet enabled users will be able to transfer earned money to their wallet" ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have enabled" ));?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/wallet"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Wallet System" ));?>
</a>
            </div>
          </div>
          <div class="text-end">
            <label class="switch" for="monetization_money_transfer_enabled">
              <input type="checkbox" name="monetization_money_transfer_enabled" id="monetization_money_transfer_enabled" <?php if ($_smarty_tpl->tpl_vars['system']->value['monetization_money_transfer_enabled']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <div class="divider dashed"></div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Commission" ));?>
 (%)
          </label>
          <div class="col-md-9">
            <input type="text" class="form-control" name="monetization_commission" value="<?php echo $_smarty_tpl->tpl_vars['system']->value['monetization_commission'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Leave it 0 if you don't want to get any commissions" ));?>

            </div>
          </div>
        </div>

        <!-- success -->
        <div class="alert alert-success mt15 mb0 x-hidden"></div>
        <!-- success -->

        <!-- error -->
        <div class="alert alert-danger mt15 mb0 x-hidden"></div>
        <!-- error -->
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Save Changes" ));?>
</button>
      </div>
    </form>

  <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>

    <div class="card-body">

      <div class="alert alert-info">
        <div class="icon">
          <i class="fa fa-info-circle fa-2x"></i>
        </div>
        <div class="text pt5">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You will need to make the payments from your Paypal, Skrill, Bank Account... etc" ));?>
. <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "After making the payment you can mark the payment request as paid" ));?>
.
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover js_dataTable">
          <thead>
            <tr>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "ID" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "User" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Amount" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Method" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Transfer To" ));?>
</th>
              <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Actions" ));?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['payment_id'];?>
</td>
                <td>
                  <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
">
                    <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_picture'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['row']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['row']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['user_lastname'];
}?>
                  </a>
                </td>
                <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['row']->value['amount'],2) ));?>
</td>
                <td>
                  <span class="badge rounded-pill badge-lg bg-<?php echo $_smarty_tpl->tpl_vars['row']->value['method_color'];?>
">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( $_smarty_tpl->tpl_vars['row']->value['method'] ));?>

                  </span>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['method_value'];?>
</td>
                <td>
                  <button data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mark as Paid" ));?>
' class="btn btn-sm btn-icon btn-rounded btn-success js_admin-withdraw" data-type="monetization" data-handle="approve" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['payment_id'];?>
">
                    <i class="fa fa-check"></i>
                  </button>
                  <button data-bs-toggle="tooltip" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Decline" ));?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-withdraw" data-type="monetization" data-handle="decline" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['payment_id'];?>
">
                    <i class="fa fa-times"></i>
                  </button>
                </td>
              </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </tbody>
        </table>
      </div>
    </div>

  <?php }?>
</div><?php }
}
