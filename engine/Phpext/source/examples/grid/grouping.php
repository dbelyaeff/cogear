<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Data/GroupingStore.php';
include_once 'PhpExt/Data/ArrayReader.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Data/SortInfoConfigObject.php';
include_once 'PhpExt/Grid/ColumnModel.php';
include_once 'PhpExt/Grid/ColumnConfigObject.php';
include_once 'PhpExt/Grid/GridPanel.php';
include_once 'PhpExt/Grid/GroupingView.php';


// Sample Data
$myData = array(
    array('3m Co',71.72,0.02,0.03,'4/2 12:00am', 'Manufacturing'),
    array('Alcoa Inc',29.01,0.42,1.47,'4/1 12:00am', 'Manufacturing'),
    array('Altria Group Inc',83.81,0.28,0.34,'4/3 12:00am', 'Manufacturing'),
    array('American Express Company',52.55,0.01,0.02,'4/8 12:00am', 'Finance'),
    array('American International Group, Inc.',64.13,0.31,0.49,'4/1 12:00am', 'Services'),
    array('AT&T Inc.',31.61,-0.48,-1.54,'4/8 12:00am', 'Services'),
    array('Boeing Co.',75.43,0.53,0.71,'4/8 12:00am', 'Manufacturing'),
    array('Caterpillar Inc.',67.27,0.92,1.39,'4/1 12:00am', 'Services'),
    array('Citigroup, Inc.',49.37,0.02,0.04,'4/4 12:00am', 'Finance'),
    array('E.I. du Pont de Nemours and Company',40.48,0.51,1.28,'4/1 12:00am', 'Manufacturing'),
    array('Exxon Mobil Corp',68.1,-0.43,-0.64,'4/3 12:00am', 'Manufacturing'),
    array('General Electric Company',34.14,-0.08,-0.23,'4/3 12:00am', 'Manufacturing'),
    array('General Motors Corporation',30.27,1.09,3.74,'4/3 12:00am', 'Automotive'),
    array('Hewlett-Packard Co.',36.53,-0.03,-0.08,'4/3 12:00am', 'Computer'),
    array('Honeywell Intl Inc',38.77,0.05,0.13,'4/3 12:00am', 'Manufacturing'),
    array('Intel Corporation',19.88,0.31,1.58,'4/2 12:00am', 'Computer'),
    array('International Business Machines',81.41,0.44,0.54,'4/1 12:00am', 'Computer'),
    array('Johnson & Johnson',64.72,0.06,0.09,'4/2 12:00am', 'Medical'),
    array('JP Morgan & Chase & Co',45.73,0.07,0.15,'4/2 12:00am', 'Finance'),
    array('McDonald\'s Corporation',36.76,0.86,2.40,'4/2 12:00am', 'Food'),
    array('Merck & Co., Inc.',40.96,0.41,1.01,'4/2 12:00am', 'Medical'),
    array('Microsoft Corporation',25.84,0.14,0.54,'4/2 12:00am', 'Computer'),
    array('Pfizer Inc',27.96,0.4,1.45,'4/8 12:00am', 'Services', 'Medical'),
    array('The Coca-Cola Company',45.07,0.26,0.58,'4/1 12:00am', 'Food'),
    array('The Home Depot, Inc.',34.64,0.35,1.02,'4/8 12:00am', 'Retail'),
    array('The Procter & Gamble Company',61.91,0.01,0.02,'4/1 12:00am', 'Manufacturing'),
    array('United Technologies Corporation',63.26,0.55,0.88,'4/1 12:00am', 'Computer'),
    array('Verizon Communications',35.57,0.39,1.11,'4/3 12:00am', 'Services'),
    array('Wal-Mart Stores, Inc.',45.45,0.73,1.63,'4/3 12:00am', 'Retail'),
    array('Walt Disney Company (The) (Holding Company)',29.89,0.24,0.81,'4/1 12:00am', 'Services')
    );
    
    
$changeRenderer = PhpExt_Javascript::functionDef("change","if(val > 0){
            return '<span style=\"color:green;\">' + val + '</span>';
        }else if(val < 0){
            return '<span style=\"color:red;\">' + val + '</span>';
        }
        return val;",array("val"));


$reader = new PhpExt_Data_ArrayReader();
$reader->addField(new PhpExt_Data_FieldConfigObject("company"));
$reader->addField(new PhpExt_Data_FieldConfigObject("price",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("change",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("pctChange",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("lastChange",null,"date","n/j h:ia"));
$reader->addField(new PhpExt_Data_FieldConfigObject("industry"));

// Store
$store = new PhpExt_Data_GroupingStore();
$store->setSortInfo(new PhpExt_Data_SortInfoConfigObject("company"));
$store->setGroupField("industry");
$store->setReader($reader);
$store->setData($myData);

// ColumnModel
$colModel = new PhpExt_Grid_ColumnModel();
$colModel->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Company","company","company",60, null, null, true, false))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Price","price",null,20,null,PhpExt_Javascript::variable("Ext.util.Format.usMoney"), true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Change","change",null,20,null,PhpExt_Javascript::variable('change'), true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Industry","industry",null,20,null,null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Last Updated","lastChange",null,20,null,PhpExt_Javascript::variable("Ext.util.Format.dateRenderer('m/d/Y')"), true));
         
// View
$view = new PhpExt_Grid_GroupingView();
$view->setForceFit(true);
$view->setGroupTextTemplate('{text} ({[values.rs.length]} {[values.rs.length > 1 ? "Items" : "Item"]})');

// Grid
$grid = new PhpExt_Grid_GridPanel();
$grid->setStore($store)
     ->setColumnModel($colModel)
     ->setView($view)
     ->setFrame(true)
     ->setCollapsible(true)
     ->setAnimCollapse(true)
     ->setTitle("Grouping Example")
     ->setIconCssClass("icon-grid")
     ->setRenderTo("grouping-example")
     ->setWidth(700)
     ->setHeight(450); 

// Ext.OnReady -----------------------
echo PhpExt_Ext::onReady(
	PhpExt_Javascript::assignNew("myData",PhpExt_Javascript::valueToJavascript($myData)),
	$changeRenderer,
	$store->getJavascript(false, "store"),	
	$grid->getJavascript(false, "grid")
);


?>