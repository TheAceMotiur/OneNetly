<?php
/* Smarty version 4.5.1, created on 2024-08-31 08:36:49
  from '/home/onenetly/public_html/content/themes/default/templates/settings.profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66d2d62142ae87_31896370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e215c55047a116badb5177266faf82f2aeaf6feb' => 
    array (
      0 => '/home/onenetly/public_html/content/themes/default/templates/settings.profile.tpl',
      1 => 1710333975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 14,
    'file:__custom_fields.tpl' => 5,
  ),
),false)) {
function content_66d2d62142ae87_31896370 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
  <div class="card-header with-icon">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, false);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Basic" ));?>

  </div>
  <form class="js_ajax-forms" data-url="users/settings.php?edit=basic">
    <div class="card-body">
      <?php if (!$_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled'] && $_smarty_tpl->tpl_vars['user']->value->_data['user_verified']) {?>
        <div class="alert alert-warning">
          <div class="icon">
            <i class="fa fa-exclamation-triangle fa-2x"></i>
          </div>
          <div class="text">
            <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Attention" ));?>
</strong><br>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Your account is already verified if you changed your name you will lose the verification badge" ));?>

          </div>
        </div>
      <?php }?>

      <div class="row">
        <?php if (!$_smarty_tpl->tpl_vars['system']->value['show_usernames_enabled']) {?>
          <div class="form-group col-md-6">
            <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "First Name" ));?>
</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_firstname'];?>
">
          </div>

          <div class="form-group col-md-6">
            <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Last Name" ));?>
</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_lastname'];?>
">
          </div>
        <?php }?>

        <?php if (!$_smarty_tpl->tpl_vars['system']->value['genders_disabled']) {?>
          <div class="form-group col-md-6">
            <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "I am" ));?>
</label>
            <select class="form-select" name="gender">
              <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Sex" ));?>
</option>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genders']->value, 'gender');
$_smarty_tpl->tpl_vars['gender']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gender']->value) {
$_smarty_tpl->tpl_vars['gender']->do_else = false;
?>
                <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_gender'] == $_smarty_tpl->tpl_vars['gender']->value['gender_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['gender']->value['gender_name'];?>
</option>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
          </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['system']->value['relationship_info_enabled']) {?>
          <div class="form-group col-md-6">
            <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Relationship Status" ));?>
</label>
            <select class="form-select" name="relationship">
              <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Relationship" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_relationship'] == "single") {?>selected<?php }?> value="single"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Single" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_relationship'] == "relationship") {?>selected<?php }?> value="relationship"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "In a relationship" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_relationship'] == "married") {?>selected<?php }?> value="married"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Married" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_relationship'] == "complicated") {?>selected<?php }?> value="complicated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "It's complicated" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_relationship'] == "separated") {?>selected<?php }?> value="separated"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Separated" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_relationship'] == "divorced") {?>selected<?php }?> value="divorced"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Divorced" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_relationship'] == "widowed") {?>selected<?php }?> value="widowed"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Widowed" ));?>
</option>
            </select>
          </div>
        <?php }?>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Country" ));?>
</label>
          <select class="form-select" name="country">
            <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Country" ));?>
</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_country'] == $_smarty_tpl->tpl_vars['country']->value['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['country']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['system']->value['website_info_enabled']) {?>
          <div class="form-group col-md-6">
            <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website" ));?>
</label>
            <input type="text" class="form-control" name="website" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_website'];?>
">
            <div class="form-text">
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website link must start with http:// or https://" ));?>

            </div>
          </div>
        <?php }?>
      </div>

      <div class="form-group">
        <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Birthdate" ));?>
</label>
        <div class="row">
          <div class="col">
            <select class="form-select" name="birth_month">
              <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Month" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '1') {?>selected<?php }?> value="1"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jan" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '2') {?>selected<?php }?> value="2"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Feb" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '3') {?>selected<?php }?> value="3"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Mar" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '4') {?>selected<?php }?> value="4"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Apr" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '5') {?>selected<?php }?> value="5"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "May" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '6') {?>selected<?php }?> value="6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jun" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '7') {?>selected<?php }?> value="7"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Jul" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '8') {?>selected<?php }?> value="8"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Aug" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '9') {?>selected<?php }?> value="9"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Sep" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '10') {?>selected<?php }?> value="10"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Oct" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '11') {?>selected<?php }?> value="11"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Nov" ));?>
</option>
              <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['month'] == '12') {?>selected<?php }?> value="12"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Dec" ));?>
</option>
            </select>
          </div>
          <div class="col">
            <select class="form-select" name="birth_day">
              <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Day" ));?>
</option>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['day'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
              <?php }
}
?>
            </select>
          </div>
          <div class="col">
            <select class="form-select" name="birth_year">
              <option value="none"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Select Year" ));?>
</option>
              <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2023+1 - (1905) : 1905-(2023)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1905, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_birthdate_parsed']['year'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
              <?php }
}
?>
            </select>
          </div>
        </div>
      </div>

      <?php if ($_smarty_tpl->tpl_vars['system']->value['biography_info_enabled']) {?>
        <div class="form-group">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "About Me" ));?>
</label>
          <textarea class="form-control" name="biography"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_biography'];?>
</textarea>
        </div>
      <?php }?>

      <!-- custom fields -->
      <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['basic']) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['basic'],'_registration'=>false), 0, false);
?>
      <?php }?>
      <!-- custom fields -->

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

<?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "work") {?>
  <div class="card-header with-icon">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, true);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work" ));?>

  </div>
  <form class="js_ajax-forms" data-url="users/settings.php?edit=work">
    <div class="card-body">
      <div class="form-group">
        <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Title" ));?>
</label>
        <input type="text" class="form-control" name="work_title" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_work_title'];?>
">
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Place" ));?>
</label>
          <input type="text" class="form-control" name="work_place" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_work_place'];?>
">
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Work Website" ));?>
</label>
          <input type="text" class="form-control" name="work_url" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_work_url'];?>
">
          <div class="form-text">
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Website link must start with http:// or https://" ));?>

          </div>
        </div>
      </div>

      <!-- custom fields -->
      <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['work']) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['work'],'_registration'=>false), 0, true);
?>
      <?php }?>
      <!-- custom fields -->

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

<?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "location") {?>
  <div class="card-header with-icon">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, true);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Location" ));?>

  </div>
  <form class="js_ajax-forms" data-url="users/settings.php?edit=location">
    <div class="card-body">
      <div class="form-group">
        <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Current City" ));?>
</label>
        <input type="text" class="form-control js_geocomplete" name="city" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_current_city'];?>
">
      </div>

      <div class="form-group">
        <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Hometown" ));?>
</label>
        <input type="text" class="form-control js_geocomplete" name="hometown" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_hometown'];?>
">
      </div>

      <!-- custom fields -->
      <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['location']) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['location'],'_registration'=>false), 0, true);
?>
      <?php }?>
      <!-- custom fields -->

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

<?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "education") {?>
  <div class="card-header with-icon">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, true);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Education" ));?>

  </div>
  <form class="js_ajax-forms" data-url="users/settings.php?edit=education">
    <div class="card-body">
      <div class="form-group">
        <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "School" ));?>
</label>
        <input type="text" class="form-control" name="edu_school" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_edu_school'];?>
">
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Major" ));?>
</label>
          <input type="text" class="form-control" name="edu_major" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_edu_major'];?>
">
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Class" ));?>
</label>
          <input type="text" class="form-control" name="edu_class" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_edu_class'];?>
">
        </div>
      </div>

      <!-- custom fields -->
      <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['education']) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['education'],'_registration'=>false), 0, true);
?>
      <?php }?>
      <!-- custom fields -->

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

<?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "other") {?>
  <div class="card-header with-icon">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, true);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Other" ));?>

  </div>
  <form class="js_ajax-forms" data-url="users/settings.php?edit=other">
    <div class="card-body">
      <!-- custom fields -->
      <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['other'],'_registration'=>false), 0, true);
?>
      <?php }?>
      <!-- custom fields -->

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

<?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "social") {?>
  <div class="card-header with-icon">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, true);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Social Links" ));?>

  </div>
  <form class="js_ajax-forms" data-url="users/settings.php?edit=social">
    <div class="card-body">
      <div class="row">
        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Facebook Profile URL" ));?>
</label>
          <div class="input-group">
            <span class="input-group-text bg-transparent">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"facebook",'width'=>"22px",'height'=>"22px"), 0, true);
?>
            </span>
            <input type="text" class="form-control" name="facebook" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_social_facebook'];?>
">
          </div>
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "X Profile URL" ));?>
</label>
          <div class="input-group">
            <span class="input-group-text bg-transparent">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitter",'width'=>"22px",'height'=>"22px"), 0, true);
?>
            </span>
            <input type="text" class="form-control" name="twitter" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_social_twitter'];?>
">
          </div>
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "YouTube Profile URL" ));?>
</label>
          <div class="input-group">
            <span class="input-group-text bg-transparent">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"youtube",'width'=>"22px",'height'=>"22px"), 0, true);
?>
            </span>
            <input type="text" class="form-control" name="youtube" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_social_youtube'];?>
">
          </div>
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Instagram Profile URL" ));?>
</label>
          <div class="input-group">
            <span class="input-group-text bg-transparent">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"instagram",'width'=>"22px",'height'=>"22px"), 0, true);
?>
            </span>
            <input type="text" class="form-control" name="instagram" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_social_instagram'];?>
">
          </div>
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Twitch Profile URL" ));?>
</label>
          <div class="input-group">
            <span class="input-group-text bg-transparent">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"twitch",'width'=>"22px",'height'=>"22px"), 0, true);
?>
            </span>
            <input type="text" class="form-control" name="twitch" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_social_twitch'];?>
">
          </div>
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "LinkedIn Profile URL" ));?>
</label>
          <div class="input-group">
            <span class="input-group-text bg-transparent">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"linkedin",'width'=>"22px",'height'=>"22px"), 0, true);
?>
            </span>
            <input type="text" class="form-control" name="linkedin" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_social_linkedin'];?>
">
          </div>
        </div>

        <div class="form-group col-md-6">
          <label class="form-label"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Vkontakte Profile URL" ));?>
</label>
          <div class="input-group">
            <span class="input-group-text bg-transparent">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"vk",'width'=>"22px",'height'=>"22px"), 0, true);
?>
            </span>
            <input type="text" class="form-control" name="vkontakte" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_social_vkontakte'];?>
">
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

<?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "design") {?>
  <div class="card-header with-icon">
    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"edit_profile",'class'=>"main-icon mr15",'width'=>"24px",'height'=>"24px"), 0, true);
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Design" ));?>

  </div>
  <form class="js_ajax-forms" data-url="users/settings.php?edit=design">
    <div class="card-body">
      <div class="row form-group">
        <label class="col-md-3 form-label">
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Profile Background" ));?>

        </label>
        <div class="col-md-9">
          <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_profile_background'] == '') {?>
            <div class="x-image">
              <button type="button" class="btn-close x-hidden js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'>

              </button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="user_profile_background" value="">
            </div>
          <?php } else { ?>
            <div class="x-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_profile_background'];?>
')">
              <button type="button" class="btn-close js_x-image-remover" title='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ '__' ][ 0 ], array( "Remove" ));?>
'></button>
              <div class="x-image-loader">
                <div class="progress x-progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
              <input type="hidden" class="js_x-image-input" name="user_profile_background" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_profile_background'];?>
">
            </div>
          <?php }?>
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

<?php }
}
}
