<?php
$httpHost = "http://".$_SERVER['HTTP_HOST'];
$docRoot = str_replace("\\","/",realpath($_SERVER['DOCUMENT_ROOT']));
$dir = str_replace("\\","/",realpath(dirname(__FILE__)."/.."));
$baseUrl = str_replace($docRoot,$httpHost,$dir);

$extjsCheck = realpath(dirname(__FILE__)."/../resources/ext-2.0.2/ext-core.js");

if ($extjsCheck !== false) {
	set_include_path(get_include_path().PATH_SEPARATOR.realpath("../library"));
	include_once 'PhpExt/Ext.php';
	include_once 'PhpExt/Window.php';	
	include_once 'PhpExt/AutoLoadConfigObject.php';
	include_once 'PhpExt/Layout/FitLayout.php';
	include_once 'PhpExt/TabPanel.php';
	include_once 'PhpExt/Panel.php';
	
	$example_id = @$_GET['eid'];
	$file = $example_id . ".php";
	
	$win = new PhpExt_Window();
	$win->setTitle("Sample Source: " . $file)	
	   ->setWidth(500)
	   ->setHeight(500)
	   ->setLayout(new PhpExt_Layout_FitLayout())
	   ->setResizable(false)
	   ->setCloseAction(PhpExt_Window::CLOSE_ACTION_HIDE)
	   ->setBodyBorder(false)
	   ->setPlain(true);
	
	// PHP Source
	$phpTab = new PhpExt_Panel();
	$phpTab->setTitle("PHP Source")
	      ->setLayout(new PhpExt_Layout_FitLayout())
	      ->setAutoLoad(new PhpExt_AutoLoadConfigObject($baseUrl."/examples/viewsource.php",array("file"=>$file)))
		  ->getAutoLoad()
		      ->setScripts(true)
		      ->setMethod(PhpExt_AutoLoadConfigObject::AUTO_LOAD_METHOD_GET);

    // Generated JS
	$jsTab = new PhpExt_Panel();
	$jsTab->setTitle("Generated JS")
	      ->setLayout(new PhpExt_Layout_FitLayout())
	      ->setAutoLoad(new PhpExt_AutoLoadConfigObject($baseUrl."/examples/viewjs.php",array("file"=>$file)))
		  ->getAutoLoad()
		      ->setScripts(true)
		      ->setMethod(PhpExt_AutoLoadConfigObject::AUTO_LOAD_METHOD_GET);
		      
    $tabs = new PhpExt_TabPanel();
	$tabs->setActiveTab(0)
	    ->setPlain(true)
	    ->setFrame(false)
	    ->addItem($phpTab)
	    ->addItem($jsTab);
	$win->addItem($tabs);    	      	   
	      	
	$customHeaders = '
	    <link rel="stylesheet" type="text/css" href="resources/ext-2.0.2/resources/css/ext-all.css" />
	
	    <!-- GC -->
	 	<!-- LIBS -->
	 	<script type="text/javascript" src="resources/ext-2.0.2/adapter/ext/ext-base.js"></script>
	 	<!-- ENDLIBS -->
	
	    <script type="text/javascript" src="resources/ext-2.0.2/ext-all.js"></script>
	    <script type="text/javascript" src="examples/examples.js"></script>
	    
	    <script type="text/javascript" src="resources/codepress/codepress.js"></script>
		
		<script>'.
		$win->getJavascript(false, "w").'			
	    </script>
	    <!-- Common Styles for the examples -->
	    <link rel="stylesheet" type="text/css" href="examples/examples.css" />
	    ';
	    /*
	    <script>'.
		$w->getJavascript(false, "w").'
		'.$w2->getJavascript(false, "w2").'
	    </script>';*/
}

$example_id = isset($_GET['eid']) ? $_GET['eid'] : null;

$PAGE_TITLE = '- Samples';
if ($example_id != null)
    $PAGE_TITLE .= ": $example_id";
require_once '../header.php';

if ($extjsCheck === false) {
	echo "<p style=\"color:red; font-weight: bold\">Ext JS 2.0.2 Not Installed.  
Please see INSTALL.txt for information regarding proper installation.</p>";
}


if ($example_id == null) {
	require_once 'examples.php';
}
else {
	$example_id = $_GET['eid'];
	$file = realpath("./".$example_id.".html");
	if (file_exists($file)) {

		if ($extjsCheck !== false) {		
			echo '<button onclick="w.show()" style="float:right">View Source</button>';
		}
		
		require_once $file;
	}
	else
		echo "Invalid example: $example_id";
}



require_once '../footer.php';

?>