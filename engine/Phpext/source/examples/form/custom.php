<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Data/Store.php';
include_once 'PhpExt/Data/ScriptTagProxy.php';
include_once 'PhpExt/Data/JsonReader.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Data/StoreLoadOptions.php';
include_once 'PhpExt/Config/ConfigObject.php';
include_once 'PhpExt/XTemplate.php';
include_once 'PhpExt/Panel.php';
include_once 'PhpExt/DataView.php';
include_once 'PhpExt/Toolbar/Toolbar.php';
include_once 'PhpExt/Toolbar/PagingToolbar.php';

// User Extension
include_once("PhpExtUx/App/SearchField.php");

// Configure Reader and Store

$reader = new PhpExt_Data_JsonReader();
$reader->setRoot("topics")
       ->setTotalProperty("totalCount")
       ->setId("post_id");
$reader->addField(new PhpExt_Data_FieldConfigObject("postId","post_id"));
$reader->addField(new PhpExt_Data_FieldConfigObject("title","topic_title"));
$reader->addField(new PhpExt_Data_FieldConfigObject("topicId","topic_id"));
$reader->addField(new PhpExt_Data_FieldConfigObject("author","author"));
$reader->addField(new PhpExt_Data_FieldConfigObject("lastPost","post_time","date","timestamp"));
$reader->addField(new PhpExt_Data_FieldConfigObject("excerpt","post_text"));

$ds = new PhpExt_Data_Store();
$ds->setProxy(new PhpExt_Data_ScriptTagProxy('http://extjs.com/forum/topics-remote.php'))
   ->setReader($reader)   
   ->setBaseParams(array("limit"=>20,"forumId"=>21));
// ->setBaseParams(new PhpExt_Config_ConfigObject(array("limit"=>20,"forumId"=>21));


// Configure Custom SearchField
$resultTpl = new PhpExt_XTemplate(
		'<tpl for=".">',
        '<div class="search-item">',
            '<h3><span>{lastPost:date("M j, Y")}<br />by {author}</span>',
            '<a href="http://extjs.com/forum/showthread.php?t={topicId}&p={postId}" target="_blank">{title}</a></h3>',
            '<p>{excerpt}</p>',
        '</div></tpl>');

$panel = new PhpExt_Panel();
$panel->setApplyTo("search-panel")
      ->setTitle("Forum Search")
      ->setHeight(300)
      ->setAutoScroll(true);

      
$dv = new PhpExt_DataView("div.search-item");
$dv->setStore($ds)
   ->setTemplate($resultTpl);
$panel->addItem($dv);   

$searchField = new PhpExtUx_App_SearchField();
$searchField->setStore($ds)
            ->setWidth(320);

$tb = $panel->getTopToolbar();
$tb->addTextItem(1,"Search: ");
$tb->addSpacer(2);
$tb->addItem(3, $searchField);

$paging = new PhpExt_Toolbar_PagingToolbar();
$paging->setStore($ds)
       ->setPageSize(20)
       ->setDisplayInfo("Topics {0} - {1} of {2}")
       ->setEmptyMessage("No topics to display");
$panel->setBottomToolbar($paging);

//------------ Ext.OnReady
echo PhpExt_Ext::onReady(
	$ds->getJavascript(false, "ds"),
	$resultTpl->getJavascript(false, "resultTpl"),
	$panel->getJavascript(false, "panel"),
	$ds->load(new PhpExt_Data_StoreLoadOptions(array(
			"start"=>0,"limit"=>0,"forumId"=>21,"query"=>"\"PHP-Ext 0.\""))	
	)
);



?>