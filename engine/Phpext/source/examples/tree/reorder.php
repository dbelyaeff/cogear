<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Tree/TreePanel.php';
include_once 'PhpExt/Tree/TreeLoader.php';
include_once 'PhpExt/Tree/AsyncTreeNode.php';

$loader = new PhpExt_Tree_TreeLoader();
$loader->setDataUrl("examples/tree/get-nodes.php");

$tree = new PhpExt_Tree_TreePanel();
$tree->setUseArrows(true)
    ->setAnimate(true)
    ->setEnableDd(true)
    ->setContainerScroll(true)
    ->setLoader($loader)
    ->setAutoScroll(true);    

$root = new PhpExt_Tree_AsyncTreeNode();
$root->setText("PHP-Ext Examples")
     ->setDraggable(false)
     ->setId("examples");
     
    
echo PhpExt_Ext::OnReady(
    $tree->getJavascript(false, "tree"),
    $root->getJavascript(false, "root"),
    $tree->setRootNode($root),
    $tree->render("tree-div"),
    $root->expand()	
);
?>