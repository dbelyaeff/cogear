<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Data/SimpleStore.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Form/ComboBox.php';
include_once 'PhpExt/QuickTips.php';

// simple array store
$store = new PhpExt_Data_SimpleStore();
$store->addField("abbr");
$store->addField("state");
$store->addField("nick"); 
$store->setData(PhpExt_Javascript::variable("Ext.exampledata.states")); // from states.js

$combo = new PhpExt_Form_ComboBox();
$combo->setStore($store)
      ->setDisplayField("state")
      ->setTypeAhead(true)
      ->setMode(PhpExt_Form_ComboBox::MODE_LOCAL)
      ->setTriggerAction(PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL)
      ->setEmptyText("Select a state...")
      ->setSelectOnFocus(true)
      ->setApplyTo("local-states");

$comboWithTooltip = new PhpExt_Form_ComboBox();
$comboWithTooltip->setTemplate('<tpl for="."><div ext:qtip="{state}. {nick}" class="x-combo-list-item">{state}</div></tpl>')
                 ->setStore($store)
                 ->setDisplayField("state")
                 ->setTypeAhead(true)
                 ->setMode(PhpExt_Form_ComboBox::MODE_LOCAL)
                 ->setTriggerAction(PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL)
                 ->setEmptyText("Select a state...")
                 ->setSelectOnFocus(true)
                 ->setApplyTo("local-states-with-qtip");

$converted = new PhpExt_Form_ComboBox();
$converted->setTypeAhead(true)
          ->setTriggerAction(PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL)
          ->setTransform("state")
          ->setWidth(135)
          ->setForceSelection(true);
    
echo PhpExt_Ext::onReady(
	PhpExt_Javascript::stm(PhpExt_QuickTips::init()),
	$store->getJavascript(false, "store"),
	$combo->getJavascript(false, "combo"),	
	$comboWithTooltip->getJavascript(false, "comboWithTooltip"),
	$converted->getJavascript(false, "converted")
);

?>