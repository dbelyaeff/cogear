<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath('../../library'));
include_once 'PhpExt/Javascript.php';
PhpExt_Javascript::sendContentType();

include_once 'PhpExt/Ext.php';
include_once 'PhpExt/Data/Store.php';
include_once 'PhpExt/Data/ScriptTagProxy.php';
include_once 'PhpExt/Data/JsonReader.php';
include_once 'PhpExt/Data/FieldConfigObject.php';
include_once 'PhpExt/Config/ConfigObject.php';
include_once 'PhpExt/XTemplate.php';
include_once 'PhpExt/Form/ComboBox.php';
include_once 'PhpExt/Listener.php';


$ds = new PhpExt_Data_Store();
$ds->setProxy(new PhpExt_Data_ScriptTagProxy('http://extjs.com/forum/topics-remote.php'));

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
$ds->setReader($reader);
$ds->setBaseParams(array("limit"=>20,"forumId"=>21));

$resultTpl = new PhpExt_XTemplate(
		'<tpl for="."><div class="search-item">',
            '<h3><span>{lastPost:date("M j, Y")}<br />by {author}</span>{title}</h3>',
            '{excerpt}',
        '</div></tpl>');

$search = new PhpExt_Form_ComboBox(null, "searchbox");
$search->setStore($ds)
       ->setDisplayField("title")
       ->setTypeAhead(false)
       ->setLoadingText("Searching...")
       ->setWidth(570)
       ->setPageSize(10)
       ->setHideTrigger(true)
       ->setTemplate($resultTpl)
       ->setApplyTo("fsearch")
       ->setItemCssSelector("div.search-item")
       ->attachListener("onSelect", new PhpExt_Listener(
		PhpExt_Javascript::functionDef(null,
			"window.location =
                String.format('http://extjs.com/forum/showthread.php?t={0}&p={1}', record.data.topicId, record.id)",
			array("record"))
		));


//------------ Ext.OnReady
echo PhpExt_Ext::onReady(
	$ds->getJavascript(false, "ds"),
	$resultTpl->getJavascript(false, "resultTpl"),
	$search->getJavascript(false, "search")		
);



?>