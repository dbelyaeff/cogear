<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Handler.php';
include_once 'PhpExt/QuickTips.php';
include_once 'PhpExt/Data/Record.php';
include_once 'PhpExt/Data/Store.php';
include_once 'PhpExt/Data/XmlReader.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Data/SortInfoConfigObject.php';
include_once 'PhpExt/Grid/ColumnModel.php';
include_once 'PhpExt/Grid/ColumnConfigObject.php';
include_once 'PhpExt/Grid/EditorGridPanel.php';
include_once 'PhpExt/Form/TextField.php';
include_once 'PhpExt/Form/NumberField.php';
include_once 'PhpExt/Form/DateField.php';
include_once 'PhpExt/Form/ComboBox.php';

include_once 'PhpExtUx/Grid/CheckColumn.php';

   
    
$formatDate = PhpExt_Javascript::functionDef("formatDate",
	"return value ? value.dateFormat('M d, Y') : '';",
	array("value"));

// custom column plugin example	
$checkColumn = new PhpExtUx_Grid_CheckColumn("Indoor?");
$checkColumn->setDataIndex("indoor");
$checkColumn->setWidth(55);	
	
// the column model has information about grid columns
//dataIndex maps the column to the specific data field in
// the data store (created below)
// ColumnModel
$txtCommon = PhpExt_Form_TextField::createTextField('txtCommon')->setAllowBlank(false);

$cmbLight = PhpExt_Form_ComboBox::createComboBox("cmbLight")
         		->setTypeAhead(true)
         		->setTriggerAction(PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL)
         		->setTransform("light")
         		->setLazyRender(true)
         		->setListCssClass('x-combo-list-small');

$txtPrice = PhpExt_Form_NumberField::createNumberField("txtPrice")
				->setAllowBlank(false)
				->setAllowNegative(false)
				->setMaxValue(100000);

$dtAvailable = PhpExt_Form_DateField::createDateField("dtAvaliable")
				->setFormat("m/d/y")
				->setMinValue("01/01/06")
				->setDisabledDays(array(0, 6))
				->setDisabledDaysText("Plants are not available on the weekends");
				
$colModel = new PhpExt_Grid_ColumnModel();
$colModel->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Common Name","common","common",220)
			->setEditor($txtCommon))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Light","light",null,130)
         	->setEditor($cmbLight))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Price","price","price",70,PhpExt_Ext::HALIGN_RIGHT,"usMoney")
         	->setEditor($txtPrice))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Avaliable","availDate","availDate",95,null,PhpExt_Javascript::variable('formatDate'))
         	->setEditor($dtAvailable))
         ->addColumn($checkColumn);

// this could be inline, but we want to define the Plant record
// type so we can add records dynamically
$fields = new PhpExt_Data_FieldConfigObjectCollection();
$fields->add(new PhpExt_Data_FieldConfigObject("common",null,PhpExt_Data_FieldConfigObject::TYPE_STRING));
$fields->add(new PhpExt_Data_FieldConfigObject("botanical",null,PhpExt_Data_FieldConfigObject::TYPE_STRING));
$fields->add(new PhpExt_Data_FieldConfigObject("light"));
$fields->add(new PhpExt_Data_FieldConfigObject("price",null,PhpExt_Data_FieldConfigObject::TYPE_FLOAT));
$fields->add(new PhpExt_Data_FieldConfigObject("availDate","availability",PhpExt_Data_FieldConfigObject::TYPE_DATE,"m/d/Y"));
$fields->add(new PhpExt_Data_FieldConfigObject("indoor",null,PhpExt_Data_FieldConfigObject::TYPE_BOOLEAN));

$plant = PhpExt_Data_Record::create($fields);         
         
// Reader
$reader = new PhpExt_Data_XmlReader();
$reader->setRecord("plant");
$reader->setRecordType("Plant");

// Store
$store = new PhpExt_Data_Store();
$store->setUrl("examples/grid/plants.xml")
      ->setReader($reader)
      ->setSortInfo(new PhpExt_Data_SortInfoConfigObject("common"));


// Grid
$grid = new PhpExt_Grid_EditorGridPanel();
$grid->setClicksToEdit(1)
     ->setStore($store)     
     ->setColumnModel($colModel)
     ->setAutoExpandColumn("common")
     ->setFrame(true)     
     ->setHeight(300)
     ->setWidth(600)
     ->setTitle("Edit Plants?")
     ->setRenderTo("editor-grid");
$grid->getPlugins()->add($checkColumn);

$grid->getTopToolbar()->addButton("add","Add Plant",null,
    new PhpExt_Handler(
        PhpExt_Javascript::inlineStm("var p = new Plant({
            common: 'New Plant 1',
            light: 'Mostly Shade',
            price: 0,
            availDate: (new Date()).clearTime(),
            indoor: false
        });
        grid.stopEditing();
        store.insert(0, p);
        grid.startEditing(0, 0);")
    ));
        
// Ext.OnReady -----------------------
echo PhpExt_Ext::onReady(
	PhpExt_QuickTips::init(),
	$formatDate,
	$checkColumn->getJavascript(false, "checkColumn"),
	$colModel->getJavascript(false,"cm"),
	//$cmbLight->getJavascript(false, "cmb"),
	//$cmbLight->render(PhpExt_Javascript::variable("document.body")),
	PhpExt_Javascript::assignNew("Plant", $plant),
	$store->getJavascript(false, "store"),
	$grid->getJavascript(false, "grid"),	
	$store->load()
);


?>