<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Form/FormPanel.php';
include_once 'PhpExt/Config/ConfigObject.php';
include_once 'PhpExt/Form/TextField.php';
include_once 'PhpExt/Form/TimeField.php';
include_once 'PhpExt/Form/FieldSet.php';
include_once 'PhpExt/Form/HtmlEditor.php';
include_once 'PhpExt/Button.php';
include_once 'PhpExt/Panel.php';
include_once 'PhpExt/TabPanel.php';
include_once 'PhpExt/QuickTips.php';
include_once 'PhpExt/Layout/ColumnLayout.php';
include_once 'PhpExt/Layout/FormLayout.php';
include_once 'PhpExt/Layout/FitLayout.php';
include_once 'PhpExt/Layout/AnchorLayoutData.php';
include_once 'PhpExt/Layout/ColumnLayoutData.php';


//****************************** Simple Form
$simple = new PhpExt_Form_FormPanel();
$simple->setLabelWidth(75)
       ->setUrl("save-form.php")
       ->setFrame(true)
       ->setTitle("Simple Form")
       ->setBodyStyle("padding:5px 5px 0")
       ->setWidth(350)
       ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>230)))
       ->setDefaultType("textfield");
      
$firstName = PhpExt_Form_TextField::createTextField("first","First Name")
               ->setAllowBlank(false);
$lastName  = PhpExt_Form_TextField::createTextField("last","Last Name");
$company   = PhpExt_Form_TextField::createTextField("company","Company");
$email     = PhpExt_Form_TextField::createTextField("email","Email", null, PhpExt_Form_FormPanel::VTYPE_EMAIL);               
$time      = PhpExt_Form_TimeField::createTimeField("time", "Time")
               ->setMinValue("8:00am")
               ->setMaxValue("6:00pm");

$simple->addItem($firstName)
       ->addItem($lastName)
       ->addItem($company)
       ->addItem($email)
       ->addItem($time);
               
$simple->addButton(PhpExt_Button::createTextButton("Save"));
$simple->addButton(PhpExt_Button::createTextButton("Cancel"));
       





//****************************** Adding Fieldset
$fsf = new PhpExt_Form_FormPanel();
$fsf->setLabelWidth(75)
       ->setUrl("save-form.php")
       ->setFrame(true)
       ->setTitle("Simple Form with FieldSets")
       ->setBodyStyle("padding:5px 5px 0")
       ->setWidth(350);

//- Fielset 1
$fieldset1 = new PhpExt_Form_FieldSet();
$fieldset1->setCheckboxToggle(true)
          ->setTitle("User Information")
          ->setAutoHeight(true)
          ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>210)))
          ->setCollapsed(true);
// Use the helper function to easily create fields to add them inline
$fieldset1->addItem(PhpExt_Form_TextField::createTextField("first","First Name")
                      ->setAllowBlank(false))
          ->addItem(PhpExt_Form_TextField::createTextField("last","Last Name"))
          ->addItem(PhpExt_Form_TextField::createTextField("company","Company"))
          ->addItem(PhpExt_Form_TextField::createTextField("email","Email")
                      ->setVType(PhpExt_Form_FormPanel::VTYPE_EMAIL));          
$fsf->addItem($fieldset1);

//- Fieldset 2
$fieldset2 = new PhpExt_Form_FieldSet();
$fieldset2->setTitle("Phone Number")
          ->setCollapsible(true)
          ->setAutoHeight(true)
          ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>210)))
          ->addItem(PhpExt_Form_TextField::createTextField("home","Home")
                      ->setValue("(888) 555-1212"))
          ->addItem(PhpExt_Form_TextField::createTextField("business","Business"))  
          ->addItem(PhpExt_Form_TextField::createTextField("mobile","Mobile"))
          ->addItem(PhpExt_Form_TextField::createTextField("fax","Fax"));
$fsf->addItem($fieldset2);

//- Buttons
$fsf->addButton(PhpExt_Button::createTextButton("Save"));
$fsf->addButton(PhpExt_Button::createTextButton("Cancel"));





//****************************** A little more complex
$top = new PhpExt_Form_FormPanel();
$top->setLabelAlign(PhpExt_Form_FormPanel::LABEL_ALIGN_TOP)
    ->setFrame(true)
    ->setTitle("Multi Column, Nested Layouts and Anchoring")
    ->setBodyStyle("padding:5px 5px 0")
    ->setWidth(600);

    
$columnPanel = new PhpExt_Panel();
// using ColumnLayout
$columnPanel->setLayout(new PhpExt_Layout_ColumnLayout());
$top->addItem($columnPanel);

//- First column
$firstColumn = new PhpExt_Panel();
// Use FormLayout to enable field labels and autoarrange fields on the panel
$firstColumn->setLayout(new PhpExt_Layout_FormLayout());
// Anchor the field to 95% of the panel by setting AnchorLayoutData (FormLayout extends AnchorLayout)
$firstColumn->addItem(
	            PhpExt_Form_TextField::createTextField("first","First Name")
	                ->setTabIndex(1),
	            new PhpExt_Layout_AnchorLayoutData("95%")
	          )
	        ->addItem(
	            PhpExt_Form_TextField::createTextField("company","Company")
	                ->setTabIndex(3),
	            new PhpExt_Layout_AnchorLayoutData("95%")
	          );
// adds the panel as a 50% column using ColumnLayoutData           
$columnPanel->addItem($firstColumn, new PhpExt_Layout_ColumnLayoutData(0.5));

//- Second column
$secondColumn = new PhpExt_Panel();
$secondColumn->setLayout(new PhpExt_Layout_FormLayout())
	         ->addItem(
	             PhpExt_Form_TextField::createTextField("last","Last Name")
	                 ->setTabIndex(2),
	             new PhpExt_Layout_AnchorLayoutData("95%"))
             ->addItem(
	             PhpExt_Form_TextField::createTextField("email","Email")           
	                 ->setVType(PhpExt_Form_FormPanel::VTYPE_EMAIL)
	                 ->setTabIndex(4),
	             new PhpExt_Layout_AnchorLayoutData("95%"));
$columnPanel->addItem($secondColumn, new PhpExt_Layout_ColumnLayoutData(0.5));

// Add an HtmlEditor directly to the form, underneath the two columns 
$top->addItem(PhpExt_Form_HtmlEditor::createHtmlEditor("bio","Biography","bio")
                ->setTabIndex(5)                               
                ->setHeight(200),
              new PhpExt_Layout_AnchorLayoutData("98%"));

//- Buttons              
$top->addButton(PhpExt_Button::createTextButton("Save"));
$top->addButton(PhpExt_Button::createTextButton("Cancel"));






//****************************** Form as Tabs
$tabs = new PhpExt_Form_FormPanel();
$tabs->setBorder(false)
     ->setLabelWidth(75)
     ->setWidth(350);

$tabPanel = new PhpExt_TabPanel();
$tabPanel->setActiveTab(0)
         ->setDefaults(new PhpExt_Config_ConfigObject(array("autoHeight"=>true,"bodyStyle"=>"padding:10px")));

$detailsTab = new PhpExt_Panel();
$detailsTab->setTitle("Personal Details")
       ->setLayout(new PhpExt_Layout_FormLayout())
       ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>230)))
       ->setDefaultType("textfield")
	   ->addItem(PhpExt_Form_TextField::createTextField("first","First Name")
	               ->setAllowBlank(false)
	               ->setValue("Jack"))	               
       ->addItem(PhpExt_Form_TextField::createTextField("company","Company")
                   ->setValue("Slocum"))
       ->addItem(PhpExt_Form_TextField::createTextField("last","Last Name")
                   ->setValue("Ext JS"))
       ->addItem(PhpExt_Form_TextField::createTextField("email","Email")
                   ->setVType(PhpExt_Form_FormPanel::VTYPE_EMAIL));

$phonesTab = new PhpExt_Panel();
$phonesTab->setTitle("Phone Numbers")
          ->setLayout(new PhpExt_Layout_FormLayout())
          ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>230)))
          ->setDefaultType("textfield")
          ->addItem(PhpExt_Form_TextField::createTextField("home","Home")
                      ->setValue("(888) 555-1212"))
          ->addItem(PhpExt_Form_TextField::createTextField("business","Business"))
          ->addItem(PhpExt_Form_TextField::createTextField("mobile","Mobile"))
          ->addItem(PhpExt_Form_TextField::createTextField("fax","Fax"));

$tabPanel->addItem($detailsTab);
$tabPanel->addItem($phonesTab);
$tabs->addItem($tabPanel);

$tabs->addButton(PhpExt_Button::createTextButton("Save"));
$tabs->addButton(PhpExt_Button::createTextButton("Cancel"));





//******************************* Form Tabs 2

$tabs2 = new PhpExt_Form_FormPanel();
$tabs2->setLabelAlign(PhpExt_Form_FormPanel::LABEL_ALIGN_TOP)
      ->setTitle("Inner Tabs")
      ->setBodyStyle("padding:5px")
      ->setWidth(600);

$columnPanel2 = new PhpExt_Panel();
// using ColumnLayout
$columnPanel2->setBorder(false)
             ->setLayout(new PhpExt_Layout_ColumnLayout());
$tabs2->addItem($columnPanel2);

//- First column
$firstColumn2 = new PhpExt_Panel();
// Use FormLayout to enable field labels and autoarrange fields on the panel
$firstColumn2->setBorder(false)
             ->setLayout(new PhpExt_Layout_FormLayout());
            
// Anchor the field to 95% of the panel by setting AnchorLayoutData (FormLayout extends AnchorLayout)
$firstColumn2->addItem(
		         PhpExt_Form_TextField::createTextField("first","First Name"),
		         new PhpExt_Layout_AnchorLayoutData("95%")
		       )
		     ->addItem(
		         PhpExt_Form_TextField::createTextField("company","Company"),
		         new PhpExt_Layout_AnchorLayoutData("95%")
		       );
// adds the panel as a 50% column using ColumnLayoutData           
$columnPanel2->addItem($firstColumn2, new PhpExt_Layout_ColumnLayoutData(0.5));

//- Second column
$secondColumn2 = new PhpExt_Panel();
$secondColumn2->setBorder(false)
              ->setLayout(new PhpExt_Layout_FormLayout())
		      ->addItem(
		           PhpExt_Form_TextField::createTextField("last","Last Name"),
		           new PhpExt_Layout_AnchorLayoutData("95%"))
		      ->addItem(
		           PhpExt_Form_TextField::createTextField("email","Email")
		               ->setVType(PhpExt_Form_FormPanel::VTYPE_EMAIL),
		           new PhpExt_Layout_AnchorLayoutData("95%"));
$columnPanel2->addItem($secondColumn2, new PhpExt_Layout_ColumnLayoutData(0.5));      

//- Tab Panel
$tabPanel2 = new PhpExt_TabPanel();
$tabPanel2->setPlain(true)
          ->setActiveTab(0)
          ->setHeight(235)
          ->setDefaults(new PhpExt_Config_ConfigObject(array("bodyStyle"=>"padding:10px")));

$detailsTab2 = new PhpExt_Panel();
$detailsTab2->setTitle("Personal Details")
	       ->setLayout(new PhpExt_Layout_FormLayout())
	       ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>230)))
	       ->setDefaultType("textfield")
		   ->addItem(PhpExt_Form_TextField::createTextField("first","First Name")
		               ->setAllowBlank(false)
		               ->setValue("Jack"))	               
	       ->addItem(PhpExt_Form_TextField::createTextField("company","Company")
	                   ->setValue("Slocum"))
	       ->addItem(PhpExt_Form_TextField::createTextField("last","Last Name")
	                   ->setValue("Ext JS"))
	       ->addItem(PhpExt_Form_TextField::createTextField("email","Email")
	                   ->setVType(PhpExt_Form_FormPanel::VTYPE_EMAIL));

$phonesTab2 = new PhpExt_Panel();
$phonesTab2->setTitle("Phone Numbers")
          ->setLayout(new PhpExt_Layout_FormLayout())
          ->setDefaults(new PhpExt_Config_ConfigObject(array("width"=>230)))
          ->setDefaultType("textfield")
          ->addItem(PhpExt_Form_TextField::createTextField("home","Home")
                      ->setValue("(888) 555-1212"))
          ->addItem(PhpExt_Form_TextField::createTextField("business","Business"))
          ->addItem(PhpExt_Form_TextField::createTextField("mobile","Mobile"))
          ->addItem(PhpExt_Form_TextField::createTextField("fax","Fax"));

$bioTab = new PhpExt_Panel();
$bioTab->setCssClass("x-plain")
       ->setTitle("Biography")
       ->setLayout(new PhpExt_Layout_FitLayout())
       ->addItem(PhpExt_Form_HtmlEditor::createHtmlEditor("bio2","Biography","bio2"));

$tabPanel2->addItem($detailsTab2);
$tabPanel2->addItem($phonesTab2);
$tabPanel2->addItem($bioTab);
$tabs2->addItem($tabPanel2);

$tabs2->addButton(PhpExt_Button::createTextButton("Save"));
$tabs2->addButton(PhpExt_Button::createTextButton("Cancel"));

//****************************** onReady

echo PhpExt_Ext::onReady(
	PhpExt_QuickTips::init(),
	PhpExt_Javascript::assign("bd","Ext.get('centercolumn')"),
	PhpExt_Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 1 - Very Simple'})"),
	$simple->getJavascript(false, "simple"),	
	$simple->render(PhpExt_Javascript::variable("Ext.get('centercolumn')")),
	PhpExt_Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 2 - Adding fieldsets'})"),
	$fsf->getJavascript(false, "fsf"),
	$fsf->render(PhpExt_Javascript::variable("Ext.get('centercolumn')")),
	PhpExt_Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 3 - A little more complex'})"),
	$top->getJavascript(false, "top"),
	$top->render(PhpExt_Javascript::variable("Ext.get('centercolumn')")),
	PhpExt_Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 4 - Forms can be a TabPanel...'})"),
	$tabs->getJavascript(false, "tabs"),
	$tabs->render(PhpExt_Javascript::variable("Ext.get('centercolumn')")),
	PhpExt_Javascript::stm("bd.createChild({tag: 'h2', html: 'Form 5 - ... and forms can contain TabPanel(s)'})"),
	$tabs2->getJavascript(false, "tabs2"),
	$tabs2->render(PhpExt_Javascript::variable("Ext.get('centercolumn')"))
);

?>