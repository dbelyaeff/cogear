<?php
/* 
 * @author Matthias Benkwitz
 * @website http://www.bui-hinsche.de
 */ 
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();
$httpHost = "http://".$_SERVER['HTTP_HOST'];
$docRoot = str_replace("\\","/",realpath($_SERVER['DOCUMENT_ROOT']));
$dir = str_replace("\\","/",realpath(dirname(__FILE__)."/.."));
$baseUrl = str_replace($docRoot,$httpHost,$dir);

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Data/SimpleStore.php';
include_once 'PhpExt/Data/ArrayReader.php';
include_once 'PhpExt/Data/JsonReader.php';
include_once 'PhpExt/Data/ScriptTagProxy.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Data/StoreLoadOptions.php';
include_once 'PhpExt/Data/HttpProxy.php';
include_once 'PhpExt/Data/JsonStore.php';

include_once 'PhpExt/Toolbar/PagingToolbar.php';
include_once 'PhpExt/Grid/ColumnModel.php';
include_once 'PhpExt/Grid/ColumnConfigObject.php';
include_once 'PhpExt/Grid/GridPanel.php';


include_once 'PhpExt/Data/GroupingStore.php';
include_once 'PhpExt/Data/SortInfoConfigObject.php';

include_once 'PhpExt/Grid/GroupingView.php';


$PageSize = 10;


$changeRenderer = PhpExt_Javascript::functionDef("change","if(val > 0){
            return '<span style=\"color:green;\">' + val + '</span>';
        }else if(val < 0){
            return '<span style=\"color:red;\">' + val + '</span>';
        }
        return val;",array("val"));
$pctChangeRenderer = PhpExt_Javascript::functionDef("pctChange","if(val > 0){
            return '<span style=\"color:green;\">' + val + '%</span>';
        }else if(val < 0){
            return '<span style=\"color:red;\">' + val + '%</span>';
        }
        return val;",array("val"));


$reader = new PhpExt_Data_JsonReader();
$reader->setRoot("topics")
       ->setTotalProperty("totalCount")
       ->setId("id");
$reader->addField(new PhpExt_Data_FieldConfigObject("company"));
$reader->addField(new PhpExt_Data_FieldConfigObject("price",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("change",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("pctChange",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("lastChange",null,"date","n/j h:ia"));
$reader->addField(new PhpExt_Data_FieldConfigObject("industry"));

// Sort
$sort = new PhpExt_Data_SortInfoConfigObject("company");
$sort->setDirection("ASC");

// View
$view = new PhpExt_Grid_GroupingView();
$view->setForceFit(true)
->setGroupTextTemplate('{text} ({[values.rs.length]} {[values.rs.length > 1 ? "Items" : "Item"]})');


// Store
$store = new PhpExt_Data_GroupingStore();
$store->setGroupField("industry");
$store->setSortInfo($sort);
$store->setUrl($baseUrl.'/grid/json_exampledata.php')
   ->setReader($reader)
   ->setBaseParams(array("limit"=>$PageSize));



// ColumnModel
$colModel = new PhpExt_Grid_ColumnModel();
$colModel->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Company","company","company",160, null, null, true, false))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Price","price",null,75,null,PhpExt_Javascript::variable("Ext.util.Format.usMoney"), true, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Change","change",null,75,null,PhpExt_Javascript::variable('change'), null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("% Change","pctChange",null,75,null,PhpExt_Javascript::variable('pctChange'), null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Last Updated","lastChange",null,85,null,PhpExt_Javascript::variable("Ext.util.Format.dateRenderer('m/d/Y')"), null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Industry","industry",null,85,null,null, true, true));

// Grid
$grid = new PhpExt_Grid_GridPanel();
$grid->setStore($store)
     ->setColumnModel($colModel)
     ->setStripeRows(true)
     ->setAutoExpandColumn("company")
     ->setHeight(350)
     ->setWidth(600)
     ->setTitle("Grouping Json Grid")
     ->setView($view);

// paging
$paging = new PhpExt_Toolbar_PagingToolbar();
$paging->setStore($store)
       ->setPageSize($PageSize)
       ->setDisplayInfo("Topics {0} - {1} of {2}")
       ->setEmptyMessage("No topics to display");
$grid->setBottomToolbar($paging);
// Ext.OnReady -----------------------
echo PhpExt_Ext::onReady(
	$changeRenderer,
	$pctChangeRenderer,
	$store->getJavascript(false, "store"),
	$store->load(new PhpExt_Data_StoreLoadOptions(array(
			"start"=>0,"limit"=>$PageSize))
	),
	$grid->getJavascript(false, "grid"),
	$grid->render("grid-example")
);


?>