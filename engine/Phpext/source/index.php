<?php

$httpHost = "http://".$_SERVER['HTTP_HOST'];
$docRoot = str_replace("\\","/",$_SERVER['DOCUMENT_ROOT']);
$dir = str_replace("\\","/",dirname(__FILE__));
$baseUrl = str_replace($docRoot,$httpHost,$dir);

$page_id = (isset($_GET['id'])?$_GET['id']:'intro');

$PAGE_TITLE = "";
switch($page_id) {
	case 'docs': $PAGE_TITLE = "- Docs"; break;
	case 'download': $PAGE_TITLE = "- Download"; break;
	default: $PAGE_TITLE = ""; break;
}
require_once 'header.php';

	
$file = realpath("./".$page_id.".php");
if (file_exists($file))
	require_once $file;
else
	echo "Invalid id: $page_id";

require_once 'footer.php';

?>