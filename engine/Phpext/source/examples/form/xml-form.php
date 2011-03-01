<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Form/FormPanel.php';
include_once 'PhpExt/Data/XmlReader.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Data/SimpleStore.php';
include_once 'PhpExt/Form/FieldSet.php';
include_once 'PhpExt/Form/TextField.php';
include_once 'PhpExt/Form/DateField.php';
include_once 'PhpExt/Form/ComboBox.php';
include_once 'PhpExt/Config/ConfigObject.php';
include_once 'PhpExt/Button.php';
include_once 'PhpExt/Handler.php';
include_once 'PhpExt/QuickTips.php';

include_once 'PhpExtUx/Form/XmlErrorReader.php';



$fs = new PhpExt_Form_FormPanel();
$fs->setFrame(true)
  ->setTitle("XML Form")
  ->setLabelAlign(PhpExt_Form_FormPanel::LABEL_ALIGN_RIGHT)
  ->setLabelWidth(85)
  ->setWidth(340)  
  ->setWaitMsgTarget(true);

// configure how to read the XML Data
$reader = new PhpExt_Data_XmlReader();
$reader->setRecord("contact")
       ->setSuccess("@success");
$reader->addField(new PhpExt_Data_FieldConfigObject("first","name/first")); // custom mapping
$reader->addField(new PhpExt_Data_FieldConfigObject("last","name/last"));
$reader->addField(new PhpExt_Data_FieldConfigObject("company","company"));
$reader->addField(new PhpExt_Data_FieldConfigObject("email","email"));
$reader->addField(new PhpExt_Data_FieldConfigObject("state","state"));
$reader->addField(new PhpExt_Data_FieldConfigObject("dob","dob","date","m/d/Y")); // custom data types
$fs->setReader($reader);

$fs->setErrorReader(new PhpExtUx_Form_XmlErrorReader());
$fset = new PhpExt_Form_FieldSet();
$fset->setTitle("Contact Information")
     ->setAutoHeight(true)
     ->setDefaultType("textfield")
     ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>190)))
     ->addItem(PhpExt_Form_TextField::createTextField("first","First Name"))
     ->addItem(PhpExt_Form_TextField::createTextField("last","Last Name"))
     ->addItem(PhpExt_Form_TextField::createTextField("company","Company"))
     ->addItem(PhpExt_Form_TextField::createTextField("email","Email",null,PhpExt_Form_FormPanel::VTYPE_EMAIL));
    
$combo = PhpExt_Form_ComboBox::createComboBox("state","State")
            ->setValueField("abbr")
            ->setDisplayField("state")
            ->setTypeAhead(true)
            ->setMode(PhpExt_Form_ComboBox::MODE_LOCAL)
            ->setTriggerAction(PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL)
            ->setEmptyText("Select a state...")
            ->setSelectOnFocus(true);

$store = new PhpExt_Data_SimpleStore();
$store->addField("abbr");
$store->addField("state");
$store->setData(PhpExt_Javascript::variable("Ext.exampledata.states"));
$combo->setStore($store);

$fset->addItem($combo);

$fset->addItem(PhpExt_Form_DateField::createDateField( "dob", "Data of Birth")
                ->setAllowBlank(false));

$fs->addItem($fset);
$fs->addButton(PhpExt_Button::createTextButton("Load", 
	new PhpExt_Handler(PhpExt_Javascript::stm("fs.getForm().load({url:'examples/form/xml-form.xml', waitMsg:'Loading',method: 'GET'})"))
	));

$submitBtn = PhpExt_Button::createTextButton("Submit", 
	new PhpExt_Handler(PhpExt_Javascript::stm("fs.getForm().submit({url:'examples/form/xml-errors.xml', waitMsg:'Saving Data...'})"))
	);		
$fs->addButton($submitBtn);


//****************************** onReady

echo PhpExt_Ext::onReady(
	PhpExt_Javascript::stm(PhpExt_QuickTips::init()),
	PhpExt_Javascript::assign("Ext.form.Field.prototype.msgTarget",PhpExt_Javascript::valueToJavascript(PhpExt_Form_FormPanel::MSG_TARGET_SIDE)),
	$fs->getJavascript(false, "fs"),
	PhpExt_Javascript::assignNew("submit",$submitBtn->getJavascript()),
	$fs->render("form-ct")
);
?>