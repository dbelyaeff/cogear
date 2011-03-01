<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Panel.php';
include_once 'PhpExt/TabPanel.php';
include_once 'PhpExt/Viewport.php';
include_once 'PhpExt/Layout/FitLayout.php';
include_once 'PhpExt/Layout/AccordionLayout.php';
include_once 'PhpExt/Layout/TabLayout.php';
include_once 'PhpExt/Layout/BorderLayout.php';
include_once 'PhpExt/Layout/BorderLayoutData.php';
include_once 'PhpExt/Layout/TabLayoutData.php';
include_once 'PhpExt/Grid/PropertyGrid.php';


/*
 * The container component for the border layout can also be a PhpExt_Viewport which will
 * fill the space provided by the browser. In these example a Panel is used to keep the website layout. 
 * See API Documentation for more info on Viewport.
 * 
 */
$viewport = new PhpExt_Panel();
$viewport->setHeight(600); 
$viewport->setLayout(new PhpExt_Layout_BorderLayout());

// Norht Region
$north = new PhpExt_BoxComponent();
$north->setEl("north");
$north->setHeight(32); 
$viewport->addItem($north, PhpExt_Layout_BorderLayoutData::createNorthRegion());

// South Region
$south = new PhpExt_Panel();
$south->setContentElement("south")
      ->setCollapsible(true)
      ->setTitle("South")           
      ->setHeight(100);
$viewport->addItem($south,
    PhpExt_Layout_BorderLayoutData::createSouthRegion()
        ->setSplit(true)
        ->setMinSize(100)
        ->setMaxSize(200)
        ->setMargins("0 0 0 0"));      
      
// East Region
$east = new PhpExt_Panel();
$east->setTitle("East Size")
     ->setCollapsible(true)
     ->setWidth(225)
     ->setLayout(new PhpExt_Layout_FitLayout());

$eastTabs = new PhpExt_TabPanel();
$eastTabs->setActiveTab(1)
         ->setTabPosition(PhpExt_TabPanel::TAB_POSITON_BOTTOM)
         ->setBorder(false);
// Tab 1
$t1 = new PhpExt_Panel();
$t1->setHtml('<p>A TabPanel component can be a region.</p>')
   ->setTitle("A Tab")
   ->setAutoScroll(true);
$eastTabs->addItem($t1);

// Tab 2
$propGrid = new PhpExt_Grid_PropertyGrid();
$propGrid->setTitle("Property Grid");    
$propGrid->setSource(array(
	"(name)"=>"Properties Grid",
	"grouping"=>false,
	"autoFitColumns"=>true,
	"productionQuality"=> false,
	"created"=>"new Date(Date.parse('10/15/2006'))",
	"tested"=> false,
	"version"=> .01,
	"borderWidth"=> 1
));
$eastTabs->addItem($propGrid, new PhpExt_Layout_TabLayoutData(true));

$east->addItem($eastTabs);
$viewport->addItem($east, 
    PhpExt_Layout_BorderLayoutData::createEastRegion()
        ->setSplit(true)
        ->setMinSize(175)
        ->setMaxSize(400)
        ->setMargins("0 5 0 0"));

// West Region        
$west = new PhpExt_Panel();
$west->setTitle("West")
     ->setCollapsible(true)     
     ->setWidth(200)
     ->setId("west-panel");
$accordion = new PhpExt_Layout_AccordionLayout();
$accordion->setAnimate(true);
$west->setLayout($accordion);     

// panel 1
$p1 = new PhpExt_Panel();
$p1->setContentElement("west")
   ->setTitle("Navigation")
   ->setBorder(false)
   ->setIconCssClass("nav");
$west->addItem($p1);    

// panel 2
$p2 = new PhpExt_Panel();
$p2->setHtml('<p>Some settings in here.</p>')
   ->setTitle("Settings")
   ->setBorder(false)
   ->setIconCssClass("settings");
$west->addItem($p2);

$viewport->addItem($west, 
    PhpExt_Layout_BorderLayoutData::createWestRegion()
        ->setSplit(true)
        ->setMinSize(175)
        ->setMaxSize(400)
        ->setMargins("0 0 0 5"));        


// Center Region
$center = new PhpExt_TabPanel();
$center->setActiveTab(0);

$tabLayout = new PhpExt_Layout_TabLayout();
$tabLayout->setDeferredRender(true);
$center->setLayout($tabLayout);

$c1 = new PhpExt_Panel();
$c1->setContentElement("center1")
   ->setTitle("Close Me")
   ->setAutoScroll(true);   
$center->addItem($c1, new PhpExt_Layout_TabLayoutData(true));

$c2 = new PhpExt_Panel();
$c2->setContentElement("center2")
   ->setTitle("Center Panel")
   ->setAutoScroll(true);   
$center->addItem($c2);

$viewport->addItem($center, 
    PhpExt_Layout_BorderLayoutData::createCenterRegion());
        

echo PhpExt_Ext::OnReady(
	$viewport->getJavascript(false, "v"),
	$viewport->render("viewport")
);


?>