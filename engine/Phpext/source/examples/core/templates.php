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


$data = array(
	'name'=>'Jack Slocum',
    'company'=> 'Ext JS, LLC',
    'address'=> '4 Red Bulls Drive',
    'city'=> 'Cleveland',
    'state'=> 'Ohio',
    'zip'=> '44102',
    'kids'=> array ( array(
            'name'=>'Sara Grace',
            'age'=>3
            ),array(
            'name'=>'Zachary',
            'age'=>2
            ),array(
            'name'=>'John James',
            'age'=>0
            ))
);


/* Example 1: Basic Template */
$t = new PhpExt_Template(
	"<p>Name: {name}</p>",
	"<p>Company: {company}</p>",
	'<p>Location: {city}, {state}</p>');
	
$p = new PhpExt_Panel();
$p->setTitle('Basic Template')
  ->setWidth('300')
  ->setHtml('<p><i>Apply the template to see results here</i></p>');
$tb = $p->getTopToolbar();
$tb->addButton("apply","Apply Template", null, 
	new PhpExt_Handler(
		PhpExt_Javascript::stm($t->getJavascript(false,"tpl")),
		$t->overwrite(PhpExt_Javascript::variable("p.body"),PhpExt_Javascript::variable("data"))
		)
	);
$p->setRenderTo(PhpExt_Javascript::inlineStm("Ext.get('centercolumn')"));


/** Example 2: XTemplate */
$t2 = new PhpExt_XTemplate(
	'<p>Name: {name}</p>',
    '<p>Company: {company}</p>',
    '<p>Location: {city}, {state}</p>',
    '<p>Kids: ',
    '<tpl for="kids" if="name==\\\'Jack Slocum\\\'">',
    '<tpl if="age &gt; 1"><p>{#}. {parent.name}\\\'s kid - {name}</p></tpl>',
    '</tpl></p>');
//$t2->VarName = "tpl2";

$p2 = new PhpExt_Panel();
$p2->setTitle('XTemplate')
   ->setWidth('300')
   ->setHtml('<p><i>Apply the template to see results here</i></p>');
$tb2 = $p2->getTopToolbar();
$tb2->addButton("apply","Apply Template", null, 
	new PhpExt_Handler(
		PhpExt_Javascript::stm($t2->getJavascript(false,"tpl2")),
		$t2->overwrite(PhpExt_Javascript::variable("p2.body"),PhpExt_Javascript::variable("data"))
		)
	);
$p2->setRenderTo(PhpExt_Javascript::variable("Ext.get('centercolumn')"));

echo PhpExt_Ext::onReady(
	PhpExt_Javascript::stm("var data = ".PhpExt_Javascript::jsonEncode($data).";"),
	$p->getJavascript(false, "p"),
	$p2->getJavascript(false, "p2")
);





?>