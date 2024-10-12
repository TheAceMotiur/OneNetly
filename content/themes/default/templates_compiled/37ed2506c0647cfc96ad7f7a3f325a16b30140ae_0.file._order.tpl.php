<?php
/* Smarty version 4.5.1, created on 2024-09-02 05:05:35
  from '/home/onenetly/public_html/content/themes/default/templates/_order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d5479f6dc5f0_89186792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37ed2506c0647cfc96ad7f7a3f325a16b30140ae' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/_order.tpl',
      1 => 1710271537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 4,
  ),
),false)) {
function content_66d5479f6dc5f0_89186792 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/onenetly/public_html/vendor/smarty/smarty/libs/plugins/modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="card">
  <div class="card-header ptb30 plr30">
    <div class="row">
      <div class="col-md-3">
        <div><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Order" ));?>
 #:</strong></div>
        <?php echo $_smarty_tpl->tpl_vars['order']->value['order_hash'];?>

      </div>

      <div class="col-md-3">
        <div><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Order Placed" ));?>
:</strong></div>
        <?php echo $_smarty_tpl->tpl_vars['order']->value['insert_time'];?>

      </div>

      <div class="col-md-3">
        <div><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Status" ));?>
:</strong></div>
        <?php if ($_smarty_tpl->tpl_vars['order']->value['status'] == "canceled") {?>
          <span class="badge badge-lg bg-danger"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value['status'] )) ));?>
</span>
        <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['status'] == "delivered") {?>
          <span class="badge badge-lg bg-success"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value['status'] )) ));?>
</span>
        <?php } else { ?>
          <span class="badge badge-lg bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'ucfirst' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( $_smarty_tpl->tpl_vars['order']->value['status'] )) ));?>
</span>
        <?php }?>
      </div>

      <div class="col-md-3 text-end">
        <?php if (!$_smarty_tpl->tpl_vars['for_admin']->value) {?>
          <!-- update order -->
          <?php if ($_smarty_tpl->tpl_vars['sales']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['order']->value['status'] != "delivered" && $_smarty_tpl->tpl_vars['order']->value['status'] != "canceled") {?>
              <button class="btn btn-md btn-outline-primary" data-toggle="modal" data-url="users/orders.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "UPDATE" ));?>

              </button>
            <?php }?>
          <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['order']->value['status'] != "delivered" && $_smarty_tpl->tpl_vars['order']->value['status'] != "canceled") {?>
              <button class="btn btn-md btn-outline-primary" data-toggle="modal" data-url="users/orders.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "UPDATE" ));?>

              </button>
            <?php }?>
          <?php }?>
          <!-- update order -->

          <!-- invoice -->
          <button class="btn btn-md btn-outline-success js_shopping-download-invoice" data-id="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "INVOICE" ));?>

          </button>
          <!-- invoice -->
        <?php }?>
      </div>
    </div>
  </div>
  <div class="card-body page-content">
    <div class="row">

      <div class="col-md-5 mb30">
        <!-- Tracking Details -->
        <div class="section-title mb20">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linked_accounts",'class'=>"main-icon mr5",'width'=>"20px",'height'=>"20px"), 0, false);
?>
          <?php if ($_smarty_tpl->tpl_vars['order']->value['is_digital']) {?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Download Details" ));?>

          <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Tracking Details" ));?>

          <?php }?>
        </div>
        <div class="plr20">
          <?php if ($_smarty_tpl->tpl_vars['order']->value['is_digital']) {?>
            <div class="mb20">
              <div class="mb10">
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Download Link" ));?>
:</strong>
              </div>
              <?php if ($_smarty_tpl->tpl_vars['order']->value['items'][0]['post']['product']['product_file_source']) {?>
                <div>
                  <a class="btn btn-md btn-outline-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['order']->value['items'][0]['post']['product']['product_file_source'];?>
" target="_blank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Download" ));?>
</a>
                </div>
              <?php } else { ?>
                <div>
                  <a class="btn btn-md btn-outline-primary" href="<?php echo $_smarty_tpl->tpl_vars['order']->value['items'][0]['post']['product']['product_download_url'];?>
" target="_blank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Download" ));?>
</a>
                </div>
              <?php }?>
            </div>
          <?php } else { ?>
            <div class="mb20">
              <div>
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Tracking Link" ));?>
:</strong>
              </div>
              <div>
                <?php if ($_smarty_tpl->tpl_vars['order']->value['tracking_link']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['order']->value['tracking_link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['order']->value['tracking_link'];?>
</a><?php } else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "N/A" ));
}?>
              </div>
            </div>

            <div class="mb20">
              <div>
                <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Tracking Number" ));?>
:</strong>
              </div>
              <div>
                <?php if ($_smarty_tpl->tpl_vars['order']->value['tracking_number']) {
echo $_smarty_tpl->tpl_vars['order']->value['tracking_number'];
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "N/A" ));
}?>
              </div>
            </div>
          <?php }?>
        </div>
        <!-- Tracking Details -->

        <!-- Shipping Addresses -->
        <div class="section-title mt30 mb20">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'class'=>"main-icon mr5",'width'=>"20px",'height'=>"20px"), 0, true);
?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Shipping Addresses" ));?>

        </div>
        <div class="payment-plans">
          <div class="payment-plan full">
            <div class="text-xlg"><strong><?php echo $_smarty_tpl->tpl_vars['order']->value['buyer_fullname'];?>
</strong></div>
            <div><?php echo $_smarty_tpl->tpl_vars['order']->value['address_details'];?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['order']->value['address_city'];?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['order']->value['address_country'];?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['order']->value['address_zip_code'];?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['order']->value['address_phone'];?>
</div>
          </div>
        </div>
      </div>
      <!-- Shipping Addresses -->

      <div class="col-md-7">
        <!-- Payments -->
        <div class="section-title mb20">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"monetization",'class'=>"main-icon mr5",'width'=>"20px",'height'=>"20px"), 0, true);
?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Payments" ));?>

        </div>
        <div class="plr20">
          <div class="mb5">
            <span class="text-lg"><?php if ($_smarty_tpl->tpl_vars['sales']->value) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Subtotal" ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Total" ));
}?>:</span>
            <span class="float-end">
              <span class="text-lg">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['order']->value['sub_total'],2),$_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'],$_smarty_tpl->tpl_vars['system']->value['system_currency_dir'] ));?>

              </span>
            </span>
          </div>
          <?php if ($_smarty_tpl->tpl_vars['sales']->value) {?>
            <div class="mb5">
              <span class="text-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Commission" ));?>
:</span>
              <span class="float-end">
                <span class="text-lg">
                  - <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['order']->value['total_commission'],2),$_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'],$_smarty_tpl->tpl_vars['system']->value['system_currency_dir'] ));?>

                </span>
              </span>
            </div>
            <div class="divider mtb5"></div>
            <div class="mb5">
              <span class="text-lg"><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Total" ));?>
:</strong></span>
              <span class="float-end">
                <span class="text-lg">
                  <strong>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( smarty_modifier_number_format($_smarty_tpl->tpl_vars['order']->value['final_price'],2),$_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'],$_smarty_tpl->tpl_vars['system']->value['system_currency_dir'] ));?>

                  </strong>
                </span>
              </span>
            </div>
          <?php }?>
        </div>
        <!-- Payments -->

        <!-- Order Items -->
        <div class="section-title mt30 mb20">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"main-icon mr5",'width'=>"20px",'height'=>"20px"), 0, true);
?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Items" ));?>

        </div>
        <div class="row">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['items'], 'order_item');
$_smarty_tpl->tpl_vars['order_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order_item']->value) {
$_smarty_tpl->tpl_vars['order_item']->do_else = false;
?>
            <div class="col-lg-6">
              <div class="card product active">
                <div class="product-image">
                  <div class="product-price">
                    <?php if ($_smarty_tpl->tpl_vars['order_item']->value['post']['product']['price'] > 0) {?>
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'print_money' ][ 0 ], array( $_smarty_tpl->tpl_vars['order_item']->value['post']['product']['price'] ));?>

                    <?php } else { ?>
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Free" ));?>

                    <?php }?>
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['order_item']->value['post']['photos_num'] > 0) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['order_item']->value['post']['photos'][0]['source'];?>
">
                  <?php } else { ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/blank_product.png">
                  <?php }?>
                </div>
                <div class="product-info plr15">
                  <div class="product-meta title">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['order_item']->value['post']['post_id'];?>
" class="title"><?php echo $_smarty_tpl->tpl_vars['order_item']->value['post']['product']['name'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['order_item']->value['post']['product']['status'] == "new") {?>
                      <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "New" ));?>
</span>
                    <?php } else { ?>
                      <span class="badge bg-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Used" ));?>
</span>
                    <?php }?>
                  </div>
                  <div class="mt20">
                    <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Qty:" ));?>
</strong>
                    <?php echo $_smarty_tpl->tpl_vars['order_item']->value['quantity'];?>

                  </div>
                </div>
              </div>
            </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <!-- Order Items -->
      </div>
    </div>
  </div>
</div><?php }
}
