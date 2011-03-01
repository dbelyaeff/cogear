<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Data/Store.php';
include_once 'PhpExt/Data/ArrayReader.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Grid/ColumnModel.php';
include_once 'PhpExt/Grid/ColumnConfigObject.php';
include_once 'PhpExt/Panel.php';
include_once 'PhpExt/Grid/GridPanel.php';
include_once 'PhpExt/Grid/RowSelectionModel.php';
include_once 'PhpExt/Listener.php';
include_once 'PhpExt/Config/ConfigObject.php';
include_once 'PhpExt/Form/FormPanel.php';
include_once 'PhpExt/Form/FieldSet.php';
include_once 'PhpExt/Form/TextField.php';
include_once 'PhpExt/QuickTips.php';
include_once 'PhpExt/Layout/ColumnLayout.php';
include_once 'PhpExt/Layout/ColumnLayoutData.php';
include_once 'PhpExt/Layout/FitLayout.php';


// Sample Data
$myData = array(
        array('3m Co',71.72,0.02,0.03,'9/1 12:00am'),
        array('Alcoa Inc',29.01,0.42,1.47,'9/1 12:00am'),
        array('Altria Group Inc',83.81,0.28,0.34,'9/1 12:00am'),
        array('American Express Company',52.55,0.01,0.02,'9/1 12:00am'),
        array('American International Group, Inc.',64.13,0.31,0.49,'9/1 12:00am'),
        array('AT&T Inc.',31.61,-0.48,-1.54,'9/1 12:00am'),
        array('Boeing Co.',75.43,0.53,0.71,'9/1 12:00am'),
        array('Caterpillar Inc.',67.27,0.92,1.39,'9/1 12:00am'),
        array('Citigroup, Inc.',49.37,0.02,0.04,'9/1 12:00am'),
        array('E.I. du Pont de Nemours and Company',40.48,0.51,1.28,'9/1 12:00am'),
        array('Exxon Mobil Corp',68.1,-0.43,-0.64,'9/1 12:00am'),
        array('General Electric Company',34.14,-0.08,-0.23,'9/1 12:00am'),
        array('General Motors Corporation',30.27,1.09,3.74,'9/1 12:00am'),
        array('Hewlett-Packard Co.',36.53,-0.03,-0.08,'9/1 12:00am'),
        array('Honeywell Intl Inc',38.77,0.05,0.13,'9/1 12:00am'),
        array('Intel Corporation',19.88,0.31,1.58,'9/1 12:00am'),
        array('International Business Machines',81.41,0.44,0.54,'9/1 12:00am'),
        array('Johnson & Johnson',64.72,0.06,0.09,'9/1 12:00am'),
        array('JP Morgan & Chase & Co',45.73,0.07,0.15,'9/1 12:00am'),
        array('McDonald\'s Corporation',36.76,0.86,2.40,'9/1 12:00am'),
        array('Merck & Co., Inc.',40.96,0.41,1.01,'9/1 12:00am'),
        array('Microsoft Corporation',25.84,0.14,0.54,'9/1 12:00am'),
        array('Pfizer Inc',27.96,0.4,1.45,'9/1 12:00am'),
        array('The Coca-Cola Company',45.07,0.26,0.58,'9/1 12:00am'),
        array('The Home Depot, Inc.',34.64,0.35,1.02,'9/1 12:00am'),
        array('The Procter & Gamble Company',61.91,0.01,0.02,'9/1 12:00am'),
        array('United Technologies Corporation',63.26,0.55,0.88,'9/1 12:00am'),
        array('Verizon Communications',35.57,0.39,1.11,'9/1 12:00am'),
        array('Wal-Mart Stores, Inc.',45.45,0.73,1.63,'9/1 12:00am')
    );
    
// Store
$store = new PhpExt_Data_Store();
$reader = new PhpExt_Data_ArrayReader();
$reader->addField(new PhpExt_Data_FieldConfigObject("company"));
$reader->addField(new PhpExt_Data_FieldConfigObject("price",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("change",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("pctChange",null,"float"));
$reader->addField(new PhpExt_Data_FieldConfigObject("lastChange",null,"date","n/j h:ia",null,null,null));
$store->setReader($reader)
      ->setData(PhpExt_Javascript::variable("data"));
/* Data array could be used directly also as
 $store->setData($myData)
*/      

$italicRenderer = PhpExt_Javascript::functionDef("italic","return '<i>' + value + '</i>'",array("value"));
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

// ColumnModel
$colModel = new PhpExt_Grid_ColumnModel();
$colModel->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Company","company","company",160, null, null, true, false))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Price","price",null,75,null,PhpExt_Javascript::variable("Ext.util.Format.usMoney"), null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Change","change",null,75,null,PhpExt_Javascript::variable('change'), null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("% Change","pctChange",null,75,null,PhpExt_Javascript::variable('pctChange'), null, true))
         ->addColumn(PhpExt_Grid_ColumnConfigObject::createColumn("Last Updated","lastChange",null,75,null,PhpExt_Javascript::variable("Ext.util.Format.dateRenderer('m/d/Y')"), null, true));


// Form Panel
$gridForm = new PhpExt_Form_FormPanel("company-form");
$gridForm->setFrame(true)
         ->setLabelAlign(PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT)
         ->setTitle("Company Data")
         ->setBodyStyle("padding: 5px;")
         ->setWidth(750)
         ->setLayout(new PhpExt_Layout_ColumnLayout());

// Setup Grid
$leftPanel = new PhpExt_Panel();
$leftPanel->setLayout(new PhpExt_Layout_FitLayout());

$selModel = new PhpExt_Grid_RowSelectionModel();
$selModel->setSingleSelect(true)
         ->attachListener("rowselect", 
			new PhpExt_Listener(PhpExt_Javascript::functionDef(null,
				"Ext.getCmp(\"company-form\").getForm().loadRecord(rec);",
				array("sm","row","rec")))
			);
$grid = new PhpExt_Grid_GridPanel();
$grid->setStore($store)
     ->setColumnModel($colModel)
     ->setSelectionModel($selModel)
     ->setAutoExpandColumn("company")
     ->setHeight(350)
     ->setTitle("Company Data")
     ->setBorder(true)
     ->attachListener("render",
		new PhpExt_Listener(PhpExt_Javascript::functionDef(null, 
			"g.getSelectionModel().selectRow(0);", array("g")),
			null, 10)
		);
$leftPanel->addItem($grid);
$gridForm->addItem($leftPanel, new PhpExt_Layout_ColumnLayoutData(0.6));

// Setup Fields
$rightPanel = new PhpExt_Form_FieldSet();
$rightPanel->setLabelWidth(90)
           ->setTitle("Company Details")
           ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>140)))
           ->setDefaultType("textfield")
           ->setAutoHeight(true)
           ->setBodyStyle(PhpExt_Javascript::inlineStm("Ext.isIE ? 'padding:0 0 5px 15px;' : 'padding:10px 15px;'"))
           ->setBorder(false)
           ->setCssStyle(new PhpExt_Config_ConfigObject(array(
	                        "margin-left"=>"10px",
	                        "margin-right"=>PhpExt_Javascript::inlineStm('Ext.isIE6 ? (Ext.isStrict ? "-10px" : "-13px") : "0"')))
	                     ); 
$rightPanel->addItem(PhpExt_Form_TextField::createTextField("company","Name"));
$rightPanel->addItem(PhpExt_Form_TextField::createTextField("price","Price"));
$rightPanel->addItem(PhpExt_Form_TextField::createTextField("pctChange","% Change"));
$rightPanel->addItem(PhpExt_Form_TextField::createTextField("lastChange","Last Updated"));

$gridForm->addItem($rightPanel, new PhpExt_Layout_ColumnLayoutData(0.4));
$gridForm->setRenderTo(PhpExt_Javascript::variable("Ext.get('centercolumn')"));


//****************************** onReady

echo PhpExt_Ext::onReady(
	PhpExt_Javascript::stm(PhpExt_QuickTips::init()),
	PhpExt_Javascript::assign("data",PhpExt_Javascript::valueToJavascript($myData)),
	//PhpExt_Javascript::valueToJavascript($myData),
	$store->getJavascript(false, "ds"),
	$italicRenderer,
	$changeRenderer,
	$pctChangeRenderer,
	$colModel->getJavascript(false, "colModel"),
	$gridForm->getJavascript(false, "gridForm")
);

?>