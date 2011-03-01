<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Panel.php';

$p = new PhpExt_Panel();
$p->setTitle("My Panel")
  ->setCollapsible(true)
  ->setRenderTo(PhpExt_Javascript::variable("Ext.get('centercolumn')"))
  ->setWidth(400)
  ->setHtml(PhpExt_Javascript::variable("Ext.example.bogusMarkup"));  
    
echo PhpExt_Ext::OnReady(
	$p->getJavascript(false, "p")
);
?>