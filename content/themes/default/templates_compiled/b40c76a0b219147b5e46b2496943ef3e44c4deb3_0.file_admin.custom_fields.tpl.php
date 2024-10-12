<?php
/* Smarty version 5.4.1, created on 2024-10-03 20:41:23
  from 'file:admin.custom_fields.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66ff0173673833_71266210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b40c76a0b219147b5e46b2496943ef3e44c4deb3' => 
    array (
      0 => 'admin.custom_fields.tpl',
      1 => 1714416131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66ff0173673833_71266210 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/onenetly/public_html/content/themes/default/templates';
?><div class="card">
  <div class="card-header with-icon">
    <?php if ($_smarty_tpl->getValue('sub_view') == '') {?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('control_panel')['url'];?>
/custom_fields/add" class="btn btn-md btn-primary">
          <i class="fa fa-plus mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add New Field");?>

        </a>
      </div>
    <?php } else { ?>
      <div class="float-end">
        <a href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('control_panel')['url'];?>
/custom_fields" class="btn btn-md btn-light">
          <i class="fa fa-arrow-circle-left mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Go Back");?>

        </a>
      </div>
    <?php }?>
    <i class="fa fa-bars mr10"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Custom Fields");?>

    <?php if ($_smarty_tpl->getValue('sub_view') == "add") {?> &rsaquo; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Add New Field");
}?>
  </div>

  <?php if ($_smarty_tpl->getValue('sub_view') == '') {?>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover js_dataTable">
          <thead>
            <tr>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("ID");?>
</th>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Label");?>
</th>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("For");?>
</th>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Type");?>
</th>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Place");?>
</th>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Order");?>
</th>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Mandatory");?>
</th>
              <th><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Actions");?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rows'), 'row');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('row')->value) {
$foreach0DoElse = false;
?>
              <tr>
                <td><?php echo $_smarty_tpl->getValue('row')['field_id'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('row')['label'];?>
</td>
                <td>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "user") {?><i class="fa fa-user fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("User");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "page") {?><i class="fa fa-flag fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "group") {?><i class="fa fa-users fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "event") {?><i class="fa fa-calendar fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Event");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "product") {?><i class="fa fa-cart-plus fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Product");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "job") {?><i class="fa fa-briefcase fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Job");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "offer") {?><i class="fa fa-tag fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Offer");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['field_for'] == "course") {?><i class="fa fa-book fa-fw mr5"></i><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Course");
}?>
                </td>
                <td>
                  <?php if ($_smarty_tpl->getValue('row')['type'] == "textbox") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Text Box");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['type'] == "textarea") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Text Area");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['type'] == "selectbox") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Box");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['type'] == "multipleselectbox") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Multiple Select");
}?>
                </td>
                <td>
                  <?php if ($_smarty_tpl->getValue('row')['place'] == "basic") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Basic Info");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['place'] == "work") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Work Info");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['place'] == "location") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Location Info");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['place'] == "education") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Education Info");
}?>
                  <?php if ($_smarty_tpl->getValue('row')['place'] == "other") {
echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Other Info");
}?>
                </td>
                <td><?php echo $_smarty_tpl->getValue('row')['field_order'];?>
</td>
                <td>
                  <?php if ($_smarty_tpl->getValue('row')['mandatory']) {?>
                    <span class="badge rounded-pill badge-lg bg-success"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Yes");?>
</span>
                  <?php } else { ?>
                    <span class="badge rounded-pill badge-lg bg-danger"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("No");?>
</span>
                  <?php }?>
                </td>
                <td>
                  <a data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Edit");?>
' href="<?php echo $_smarty_tpl->getValue('system')['system_url'];?>
/<?php echo $_smarty_tpl->getValue('control_panel')['url'];?>
/custom_fields/edit/<?php echo $_smarty_tpl->getValue('row')['field_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                    <i class="fa fa-pencil-alt"></i>
                  </a>
                  <button data-bs-toggle="tooltip" title='<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="custom_field" data-id="<?php echo $_smarty_tpl->getValue('row')['field_id'];?>
">
                    <i class="fa fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          </tbody>
        </table>
      </div>
    </div>

  <?php } elseif ($_smarty_tpl->getValue('sub_view') == "edit") {?>

    <form class="js_ajax-forms" data-url="admin/custom_fields.php?do=edit&id=<?php echo $_smarty_tpl->getValue('data')['field_id'];?>
">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Field For");?>

          </label>
          <div class="col-md-9">
            <select class="form-select" id="js_field-for" name="field_for">
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "user") {?>selected<?php }?> value="user"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("User");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "page") {?>selected<?php }?> value="page"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "group") {?>selected<?php }?> value="group"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "event") {?>selected<?php }?> value="event"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Event");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "product") {?>selected<?php }?> value="product"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Product");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "job") {?>selected<?php }?> value="job"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Job");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "offer") {?>selected<?php }?> value="offer"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Offer");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['field_for'] == "course") {?>selected<?php }?> value="course"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Course");?>
</option>
            </select>
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Where you want to use this field for");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Label");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="label" value="<?php echo $_smarty_tpl->getValue('data')['label'];?>
">
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Type");?>

          </label>
          <div class="col-md-9">
            <select class="form-select" id="js_field-type" name="type">
              <option <?php if ($_smarty_tpl->getValue('data')['type'] == "textbox") {?>selected<?php }?> value="textbox"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Text Box");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['type'] == "textarea") {?>selected<?php }?> value="textarea"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Text Area");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['type'] == "selectbox") {?>selected<?php }?> value="selectbox"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Box");?>
</option>
              <option <?php if ($_smarty_tpl->getValue('data')['type'] == "multipleselectbox") {?>selected<?php }?> value="multipleselectbox"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Multiple Select");?>
</option>
            </select>
          </div>
        </div>

        <div id="js_field-select-options" <?php if ($_smarty_tpl->getValue('data')['type'] != 'selectbox' && $_smarty_tpl->getValue('data')['type'] != 'multipleselectbox') {?>class="x-hidden" <?php }?>>
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Options");?>

            </label>
            <div class="col-md-9">
              <textarea class="form-control" rows="5" name="select_options"><?php echo $_smarty_tpl->getValue('data')['select_options'];?>
</textarea>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("One option per line");?>

              </div>
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Description");?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="description"><?php echo $_smarty_tpl->getValue('data')['description'];?>
</textarea>
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The description will show under the field");?>

            </div>
          </div>
        </div>

        <div id="js_field-place" <?php if ($_smarty_tpl->getValue('data')['field_for'] != 'user') {?>class="x-hidden" <?php }?>>
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Place");?>

            </label>
            <div class="col-md-9">
              <select class="form-select" name="place">
                <option <?php if ($_smarty_tpl->getValue('data')['place'] == "basic") {?>selected<?php }?> value="basic"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Basic Info");?>
</option>
                <option <?php if ($_smarty_tpl->getValue('data')['place'] == "work") {?>selected<?php }?> value="work"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Work Info");?>
</option>
                <option <?php if ($_smarty_tpl->getValue('data')['place'] == "location") {?>selected<?php }?> value="location"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Location Info");?>
</option>
                <option <?php if ($_smarty_tpl->getValue('data')['place'] == "education") {?>selected<?php }?> value="education"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Education Info");?>
</option>
                <option <?php if ($_smarty_tpl->getValue('data')['place'] == "other") {?>selected<?php }?> value="other"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Other Info");?>
</option>
              </select>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Field place in settings page");?>

              </div>
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Value Length");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="length" value="<?php echo $_smarty_tpl->getValue('data')['length'];?>
">
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Default value is 32, and max value is 1000");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Order");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="field_order" value="<?php echo $_smarty_tpl->getValue('data')['field_order'];?>
">
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The order of this field, custom fields will be displayed in ascending order");?>

            </div>
          </div>
        </div>

        <div id="js_field-clickable" <?php if ($_smarty_tpl->getValue('data')['type'] != 'textbox') {?>class="x-hidden" <?php }?>>
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Clickable");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="is_link">
                <input type="checkbox" name="is_link" id="is_link" <?php if ($_smarty_tpl->getValue('data')['is_link']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Make the value shows as link");?>

              </div>
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Mandatory");?>

          </label>
          <div class="col-md-9">
            <label class="switch" for="mandatory">
              <input type="checkbox" name="mandatory" id="mandatory" <?php if ($_smarty_tpl->getValue('data')['mandatory']) {?>checked<?php }?>>
              <span class="slider round"></span>
            </label>
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("User must fill the field");?>

            </div>
          </div>
        </div>

        <div id="js_field-showin" <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('data')['field_for'],array('product','job','offer','course'))) {?>class="x-hidden" <?php }?>>
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show in Registration");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="in_registration">
                <input type="checkbox" name="in_registration" id="in_registration" <?php if ($_smarty_tpl->getValue('data')['in_registration']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show the field in the user registration, create page, create group or create event");?>

              </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show in Target Page");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="in_profile">
                <input type="checkbox" name="in_profile" id="in_profile" <?php if ($_smarty_tpl->getValue('data')['in_profile']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show the field in the user's profile, page, group or event");?>

              </div>
            </div>
          </div>
        </div>

        <div id="js_field-searchable" <?php if ($_smarty_tpl->getValue('data')['field_for'] != "user") {?>class="x-hidden" <?php }?>>
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show in Search");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="in_search">
                <input type="checkbox" name="in_search" id="in_search" <?php if ($_smarty_tpl->getValue('data')['in_search']) {?>checked<?php }?>>
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show the field in the find people page");?>

              </div>
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
        <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
</button>
      </div>
    </form>

  <?php } elseif ($_smarty_tpl->getValue('sub_view') == "add") {?>

    <form class="js_ajax-forms" data-url="admin/custom_fields.php?do=add">
      <div class="card-body">
        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Field For");?>

          </label>
          <div class="col-md-9">
            <select class="form-select" id="js_field-for" name="field_for">
              <option value="user"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("User");?>
</option>
              <option value="page"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Page");?>
</option>
              <option value="group"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Group");?>
</option>
              <option value="event"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Event");?>
</option>
              <option value="product"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Product");?>
</option>
              <option value="job"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Job");?>
</option>
              <option value="offer"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Offer");?>
</option>
              <option value="course"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Course");?>
</option>
            </select>
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Where you want to use this field for");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Label");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="label">
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The label of your custom field, also will be used as a placeholder");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Type");?>

          </label>
          <div class="col-md-9">
            <select class="form-select" id="js_field-type" name="type">
              <option value="textbox"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Text Box");?>
</option>
              <option value="textarea"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Text Area");?>
</option>
              <option value="selectbox"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Box");?>
</option>
              <option value="multipleselectbox"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Multiple Select");?>
</option>
            </select>
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The type of your custom field");?>

            </div>
          </div>
        </div>

        <div id="js_field-select-options" class="x-hidden">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Select Options");?>

            </label>
            <div class="col-md-9">
              <textarea class="form-control" rows="5" name="select_options"></textarea>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("One option per line");?>

              </div>
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Description");?>

          </label>
          <div class="col-md-9">
            <textarea class="form-control" name="description"></textarea>
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The description will show under the field");?>

            </div>
          </div>
        </div>

        <div id="js_field-place">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Place");?>

            </label>
            <div class="col-md-9">
              <select class="form-select" name="place">
                <option value="basic"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Basic Info");?>
</option>
                <option value="work"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Work Info");?>
</option>
                <option value="location"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Location Info");?>
</option>
                <option value="education"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Education Info");?>
</option>
                <option value="other"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Other Info");?>
</option>
              </select>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Field place in settings page");?>

              </div>
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Value Length");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="length" value="32">
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Default value is 32, and max value is 1000");?>

            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Order");?>

          </label>
          <div class="col-md-9">
            <input class="form-control" name="field_order" value="1">
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("The order of this field, custom fields will be displayed in ascending order");?>

            </div>
          </div>
        </div>

        <div id="js_field-clickable">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Clickable");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="is_link">
                <input type="checkbox" name="is_link" id="is_link">
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Make the value shows as link");?>

              </div>
            </div>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-3 form-label">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Mandatory");?>

          </label>
          <div class="col-md-9">
            <label class="switch" for="mandatory">
              <input type="checkbox" name="mandatory" id="mandatory">
              <span class="slider round"></span>
            </label>
            <div class="form-text">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("User must fill the field");?>

            </div>
          </div>
        </div>

        <div id="js_field-showin">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show in Registration");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="in_registration">
                <input type="checkbox" name="in_registration" id="in_registration">
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show the field in the user registration, create page, create group or create event");?>

              </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show in Target Page");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="in_profile">
                <input type="checkbox" name="in_profile" id="in_profile">
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show the field in the user's profile, page, group or event");?>

              </div>
            </div>
          </div>
        </div>

        <div id="js_field-searchable">
          <div class="row form-group">
            <label class="col-md-3 form-label">
              <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show in Search");?>

            </label>
            <div class="col-md-9">
              <label class="switch" for="in_search">
                <input type="checkbox" name="in_search" id="in_search">
                <span class="slider round"></span>
              </label>
              <div class="form-text">
                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Show the field in the find people page");?>

              </div>
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
        <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('__')("Save Changes");?>
</button>
      </div>
    </form>

  <?php }?>
</div><?php }
}
