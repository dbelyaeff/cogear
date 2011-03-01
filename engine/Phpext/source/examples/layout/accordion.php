<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));

include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Handler.php';
include_once 'PhpExt/Template.php';
include_once 'PhpExt/XTemplate.php';
include_once 'PhpExt/Panel.php';
include_once 'PhpExt/Toolbar/Toolbar.php';

include_once "PhpExt/Ext.php";
include_once "PhpExt/Panel.php";
include_once "PhpExt/Layout/AccordionLayout.php";
/*
$accordionPanel = new PhpExt_Panel();
$accordionPanel->setTitle("Accordion Sample")
               ->setWidth(500)
               ->setHeight(600);

$accordion = new PhpExt_Layout_AccordionLayout();
$accordion->setTitleCollapse(true)
		  
		  ->setActiveOnTop(true)
          ->setAnimate(true)
          ;

$accordionPanel->setLayout($accordion);

$p1 = new PhpExt_Panel();
$p1->setTitle("Navigation")
   ->setHtml("This <bt>is the navigation panel");

$p2 = new PhpExt_Panel();
$p2->setTitle("Settings")
   ->setHtml("This <br>is the settings panel");

$accordionPanel->addItem($p1);
$accordionPanel->addItem($p2); 
$accordionPanel->setRenderTo(PhpExt_Javascript::inlineStm("Ext.get('centercolumn')"));

*/


$accordionPanel = new PhpExt_Panel();
$accordionPanel->setTitle("Accordion Sample")
			   ->setWidth(500)
			   ->setHeight(300);

$accordion = new PhpExt_Layout_AccordionLayout();
$accordion->setTitleCollapse(true)
		  ->setAnimate(true);

$accordionPanel->setLayout($accordion);

$p1 = new PhpExt_Panel();
$p1->setTitle("Navigation")
   ->setHtml("This <bt>is the navigation panel");
   
$p2 = new PhpExt_Panel();
$p2->setTitle("Settings")
   ->setHtml("This <br>is the settings panel");
   
$accordionPanel->addItem($p1);
$accordionPanel->addItem($p2);
$accordionPanel->setRenderTo(PhpExt_Javascript::inlineStm("Ext.get('centercolumn')"));

echo PhpExt_Ext::onReady(
	$accordionPanel->getJavascript(false, "accordionPanel")
);





?>