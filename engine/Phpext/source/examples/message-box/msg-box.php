<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Element.php';
include_once 'PhpExt/Handler.php';
include_once 'PhpExt/MessageBox.php';
include_once 'PhpExt/MessageBoxOptions.php';
include_once 'PhpExt/ProgressBarWaitConfig.php';

$mb1Element = PhpExt_Element::getById('mb1');
$mb1Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::confirm("Confirm","Are you sure you want to do that", PhpExt_Javascript::variable('showResult')), 
    array("e"));   

$mb2Element = PhpExt_Element::getById('mb2');
$mb2Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::prompt("Name","Please enter your name:", PhpExt_Javascript::variable('showResultText')), 
    array("e"));      

$mb3Element = PhpExt_Element::getById('mb3');
$mb3Options = PhpExt_MessageBoxOptions::createMsgOptions()
    ->setTitle('Address')
    ->setMsg('Please enter your address:')
    ->setWidth(300)
    ->setButtons(PhpExt_MessageBox::OKCANCEL())
    ->setMultiline(true)
    ->setFn(PhpExt_Javascript::variable('showResultText'))
    ->setAnimEl('mb3');
$mb3Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::show($mb3Options)
    );

$mb4Element = PhpExt_Element::getById('mb4');
$mb4Options = PhpExt_MessageBoxOptions::createMsgOptions()
    ->setTitle('Save Changes?')
    ->setMsg('You are closing a tab that has unsaved changes. <br />Would you like to save your changes?')    
    ->setButtons(PhpExt_MessageBox::YESNOCANCEL())    
    ->setFn(PhpExt_Javascript::variable('showResult'))
    ->setAnimEl('mb4')
    ->setIcon(PhpExt_MessageBox::QUESTION());
$mb4Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::show($mb4Options)
    );    
    
$mb6Element = PhpExt_Element::getById('mb6');
$mb6Options = PhpExt_MessageBoxOptions::createMsgOptions()
    ->setTitle('Please wait')
    ->setMsg('Loading items...')   
    ->setProgressText('Initializing...')
    ->setWidth(300)
    ->setProgress(true)
    ->setClosable(false) 
    ->setAnimEl('mb6');
$mb6Hide = PhpExt_MessageBox::hide()->output();
$mb6Progress = PhpExt_MessageBox::updateProgress(
                        PhpExt_Javascript::variable("i"), 
                        PhpExt_Javascript::inlineStm("Math.round(100*i)+'% completed'"))->output();
$mb6Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::show($mb6Options)->output()."
		// this hideous block creates the bogus progress
       var f = function(v){
            return function(){
                if(v == 12){
                    ".$mb6Hide.";
                    Ext.example.msg('Done', 'Your fake items were loaded!');
                }else{
                    var i = v/11;
					".$mb6Progress.";                    
                }
           };
       };
       for(var i = 1; i < 13; i++){
           setTimeout(f(i), i*500);
       }"
    );     
    
  
$mb7Element = PhpExt_Element::getById('mb7');
$mb7Options = PhpExt_MessageBoxOptions::createMsgOptions()    
    ->setMsg('Saving your data, please wait...')
    ->setProgressText('Saving...')
    ->setWait(true)
    ->setWaitConfig(PhpExt_ProgressBarWaitConfig::createWaitConfig()->setInterval(200))
    ->setIcon('ext-mb-download')
    ->setAnimEl('mb7');
$mb7Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::show($mb7Options)->output()."
		setTimeout(function(){
            //This simulates a long-running operation like a database save or XHR call.
            //In real code, this would be in a callback function.
            ".PhpExt_MessageBox::hide()->output().";
            Ext.example.msg('Done', 'Your fake data was saved!');
        }, 8000);"
    );  

$mb8Element = PhpExt_Element::getById('mb8');
$mb8Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::alert("Status","Changes saved successfully.", PhpExt_Javascript::variable('showResult')) 
    );     
    
$comboValues = PhpExt_Javascript::stm("
	//Add these values dynamically so they aren't hard-coded in the html
    Ext.fly('info').dom.value = Ext.MessageBox.INFO;
    Ext.fly('question').dom.value = Ext.MessageBox.QUESTION;
    Ext.fly('warning').dom.value = Ext.MessageBox.WARNING;
    Ext.fly('error').dom.value = Ext.MessageBox.ERROR;
"); 

$mb9Element = PhpExt_Element::getById('mb9');
$mb9Options = PhpExt_MessageBoxOptions::createMsgOptions()
    ->setTitle('Icon Support')
    ->setMsg('Here is a message with an icon!')    
    ->setButtons(PhpExt_MessageBox::OK())    
    ->setFn(PhpExt_Javascript::variable('showResult'))
    ->setAnimEl('mb9')
    ->setIcon(PhpExt_Javascript::variable("Ext.get('icons').dom.value"));
$mb9Handler = PhpExt_Javascript::functionDef(null, 
    PhpExt_MessageBox::show($mb9Options)
    );
    
    
$showResult = PhpExt_Javascript::stm(    
    "function showResult(btn){
        Ext.example.msg('Button Click', 'You clicked the {0} button', btn);
    };");

$showResultText = PhpExt_Javascript::stm(    
    "function showResultText(btn, text){
        Ext.example.msg('Button Click', 'You clicked the {0} button and entered the text \"{1}\".', btn, text);
    };");
    
echo PhpExt_Ext::OnReady(
	$mb1Element->on("click", $mb1Handler),
	$mb2Element->on("click", $mb2Handler),
	$mb3Element->on("click", $mb3Handler),
	$mb4Element->on("click", $mb4Handler),
	$mb6Element->on("click", $mb6Handler),
	$mb7Element->on("click", $mb7Handler),
	$mb8Element->on("click", $mb8Handler),
	$comboValues,
	$mb9Element->on("click", $mb9Handler),
	$showResult,
	$showResultText
);
?>