<?php
/* Smarty version 4.5.1, created on 2024-09-02 05:20:25
  from '/home/onenetly/public_html/content/themes/default/templates/admin.coinpayments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d54b190302e0_76634675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52462833845e5a8d8dafda83e15e8226218e993e' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/admin.coinpayments.tpl',
      1 => 1684863814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d54b190302e0_76634675 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
  <div class="card-header with-icon">
    <i class="fab fa-bitcoin mr10"></i><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "CoinPayments Transactions" ));?>

  </div>

  <div class="card-body">

    <?php if (!$_smarty_tpl->tpl_vars['system']->value['coinpayments_enabled']) {?>
      <div class="alert alert-warning">
        <div class="icon">
          <i class="fa fa-exclamation-triangle fa-2x"></i>
        </div>
        <div class="text pt5">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "CoinPayments is disabled" ));?>
, <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Make sure you have configured" ));?>
 <a class="alert-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/payments"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payments Settings" ));?>
</a>
        </div>
      </div>
    <?php }?>

    <div class="alert alert-info">
      <div class="icon">
        <i class="fa fa-info-circle fa-2x"></i>
      </div>
      <div class="text pt5">
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "You can visit your CoinPayments account to see the transactions in more details" ));?>

      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover js_dataTable">
        <thead>
          <tr>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "TXN_ID" ));?>
</th>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "User" ));?>
</th>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Product" ));?>
</th>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Amount" ));?>
</th>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Created" ));?>
</th>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Updated" ));?>
</th>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Status" ));?>
</th>
            <th><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Status Message" ));?>
</th>
          </tr>
        </thead>
        <tbody>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['coinpayments_transactions']->value, 'transaction');
$_smarty_tpl->tpl_vars['transaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['transaction']->value) {
$_smarty_tpl->tpl_vars['transaction']->do_else = false;
?>
            <tr>
              <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['transaction_txn_id'];?>
</td>
              <td>
                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['transaction']->value['user_name'];?>
">
                  <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['transaction']->value['user_picture'];?>
">
                  <br>
                  <span class="badge rounded-pill badge-lg bg-secondary">
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {
echo $_smarty_tpl->tpl_vars['transaction']->value['user_name'];
} else {
echo $_smarty_tpl->tpl_vars['transaction']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['transaction']->value['user_lastname'];
}?>
                  </span>
                </a>
              </td>
              <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['product'];?>
</td>
              <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['transaction']->value['amount'] ));?>
</td>
              <td>
                <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['transaction']->value['created_at'];?>
"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['created_at'];?>
</span>
              </td>
              <td>
                <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['transaction']->value['last_update'];?>
"><?php echo $_smarty_tpl->tpl_vars['transaction']->value['last_update'];?>
</span>
              </td>
              <td>
                <?php if ($_smarty_tpl->tpl_vars['transaction']->value['status'] == '-1') {?>
                  <span class="badge rounded-pill badge-lg bg-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Error" ));?>
</span>
                <?php } elseif ($_smarty_tpl->tpl_vars['transaction']->value['status'] == '0') {?>
                  <span class="badge rounded-pill badge-lg bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Processing" ));?>
</span>
                <?php } elseif ($_smarty_tpl->tpl_vars['transaction']->value['status'] == '1') {?>
                  <span class="badge rounded-pill badge-lg bg-warning"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Pending" ));?>
</span>
                <?php } elseif ($_smarty_tpl->tpl_vars['transaction']->value['status'] == '2') {?>
                  <span class="badge rounded-pill badge-lg bg-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Complete" ));?>
</span>
                <?php }?>
              </td>
              <td>
                <?php echo $_smarty_tpl->tpl_vars['transaction']->value['status_message'];?>

              </td>
            </tr>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
      </table>
    </div>
  </div>

</div><?php }
}
