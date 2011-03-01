<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Window.php';
include_once 'PhpExt/Form/FormPanel.php';
include_once 'PhpExt/Form/TextField.php';
include_once 'PhpExt/Form/TextArea.php';
include_once 'PhpExt/Button.php';
include_once 'PhpExt/Layout/FitLayout.php';
include_once 'PhpExt/Layout/AnchorLayoutData.php';

$form = new PhpExt_Form_FormPanel();
// Properties can be set by using the closures...
$form->setBaseCssClass("x-plain")
    ->setLabelWidth(55)
    ->setUrl("save-form.php")
    ->setDefaultType("textfield");    

// or in the traditional way.    
$textfield1 = new PhpExt_Form_TextField();
$textfield1->setName("to");
$textfield1->setFieldLabel("Send To");
$form->addItem($textfield1, new PhpExt_Layout_AnchorLayoutData("100%")); // anchor width by percentage

$textfield2 = PhpExt_Form_TextField::createTextField("subject","Subject");
$form->addItem($textfield2, new PhpExt_Layout_AnchorLayoutData("100%"));

$textarea = PhpExt_Form_TextArea::createTextArea("msg")
         ->setHideLabel(true);
$form->addItem($textarea, new PhpExt_Layout_AnchorLayoutData("100% -53"));
         

$window = new PhpExt_Window();
$window->setTitle("Resize Me")
       ->setWidth(500)
       ->setHeight(300)
       ->setMinWidth(300)
       ->setMinHeight(200)
       ->setLayout(new PhpExt_Layout_FitLayout())
       ->setPlain(true)
       ->setBodyStyle("padding:5px")
       ->setButtonAlign(PhpExt_Ext::HALIGN_CENTER);
$window->addButton(PhpExt_Button::createTextButton("Send"));
$window->addButton(PhpExt_Button::createTextButton("Cancel"));
$window->addItem($form);       

echo PhpExt_Ext::onReady(	
	$form->getJavascript(false, "form"),
	$window->getJavascript(false, "window"),
	$window->show()
);

?>