<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Data/Store.php';
include_once 'PhpExt/Data/XmlReader.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Grid/ColumnModel.php';
include_once 'PhpExt/Grid/ColumnConfigObject.php';
include_once 'PhpExt/Grid/GridPanel.php';

// Xml Reader
$reader = new PhpExt_Data_XmlReader();
$reader->setRecord("Item")
       ->setTotalRecords("@total")
       ->setId("ASIN"); 
$reader->addField(new PhpExt_Data_FieldConfigObject("Author", "ItemAttributes > Author"));
$reader->addField(new PhpExt_Data_FieldConfigObject("Title"));
$reader->addField(new PhpExt_Data_FieldConfigObject("Manufacturer"));
$reader->addField(new PhpExt_Data_FieldConfigObject("ProductGroup"));




// Store
$store = new PhpExt_Data_Store();
$store->setUrl("examples/grid/sheldon.xml")
      ->setReader($reader);
      
// ColumnModel
$colModel = new PhpExt_Grid_ColumnModel();
$colModel->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Author","Author",null,120, null, null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Title","Title",null,180,null,null, null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Manufacturer","Manufacturer",null,115,null,null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Product Group","ProductGroup",null,100,null,null, true));
         


// Grid
$grid = new PhpExt_Grid_GridPanel();
$grid->setStore($store)
     ->setColumnModel($colModel)
     ->setHeight(200)
     ->setWidth(540)
     ->setTitle("Xml Grid");

// Ext.OnReady -----------------------
echo PhpExt_Ext::onReady(
	$store->getJavascript(false, "store"),
	$grid->getJavascript(false, "grid"),
	$grid->render("example-grid"),
	$store->load()	
);


?>