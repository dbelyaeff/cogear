   
    
    <h2 style="margin-bottom:5px;">Download</h2>
	<p class="justified">PHP-Ext is licensed under the <a href="http://www.gnu.org/licenses/lgpl.html">GNU Lesser General Public Licence (LGPL), v 3.0.</a>
	</p>
	<p class="justified">
		<h3>PHP-Ext Library & Samples</h3>
		<b>Version 0.8.3</b><br />
		<a href="http://php-ext.googlecode.com/files/phpext-0.8.3.zip">PHP-Ext 0.8.3 (Library Only)</a><br>
		<a href="http://php-ext.googlecode.com/files/phpext-full-0.8.3.zip">PHP-Ext 0.8.3 Full (Library + Samples + Docs)</a><br>
		<br />
		
		<b>Version 0.8.2</b><br />
		<a href="http://php-ext.googlecode.com/files/phpext-0.8.2.zip">PHP-Ext 0.8.2 (Library Only)</a><br>
		<a href="http://php-ext.googlecode.com/files/phpext-full-0.8.2.zip">PHP-Ext 0.8.2 Full (Library + Samples + Docs)</a><br>
		<br />
		
		<b>Version 0.8.1</b><br />
		<a href="http://php-ext.googlecode.com/files/phpext-0.8.zip">PHP-Ext 0.8.1 (Library Only)</a><br>
		<a href="http://php-ext.googlecode.com/files/phpext-full-0.8.1.zip">PHP-Ext 0.8.1 Full (Library + Samples + Docs)</a><br>
	</p>	
	<p class="justified">This project depends on Ext 2.0. It is not bundled with PHP-Ext. Feel free to read the <a href="http://extjs.com/license">licensing options</a> and download it from
	<a href="http://extjs.com/download">http://extjs.com/download</a>.
	</p>
	
	<div id="changelog">
	<h2 style="margin-bottom:5px;">ChangeLog</h2>
<?php 

$lines = file("./CHANGELOG.txt");


$logs = array();
$curversion = null;
for($i=2;$i<count($lines);$i++) {
    if (strpos($lines[$i], "==") === 0) {
        $curversion = str_replace("==","", $lines[$i]);
        $logs[$curversion]['version'] = $curversion;        
        $logs[$curversion]['date'] = $lines[$i+1];
        $logs[$curversion]['log'] = "";
        $i+= 2;        
    }
    else {
        $logs[$curversion]['log'] .= $lines[$i];
    }
}

foreach($logs as $log) {
    echo '<div class="version">
	<span class="number">'.$log['version'].'</span>
	<span class="date">'.$log['date'].'</span>
	<pre>'.$log['log'].'</pre>
	</div>
	';
}

?>
	</div>
