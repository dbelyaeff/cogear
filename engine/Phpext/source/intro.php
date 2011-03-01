    <h2 style="margin-bottom:5px;">The PHP-Ext Open Source Project</h2>
	<p class="justified">PHP-Ext is an open source widget library written for PHP 4 and 5 to empower the UI Layer.<br>
	It is based on <a href="http://extjs.com">Ext JS</a> javascript widgets which provide a standard 
	and powerful API to build Rich Internet Applications.  It basically works as a convenient wrapper
	for the Ext JS Javascript Objects.
	</p>
	<p class="justified">Among other features, PHP-Ext provides useful and common controls to create forms, rich comboboxes, powerful grids and menus.
	It also promotes the use of JSON and XML client/server communication to populate forms and grids using Ajax.
	Additionally it has a Javascript helper to ease the javascript code generation and use.
	</p>	
	<p class="justified">This project still in beta so keep comming for the final release.  Take a look at the samples.
	</p>
	<p>
	Feel free to download the src and samples to try it out and don't forget to write back your comments and suggestions.
	</p>
	
	<div class="columns_container">		
		<div class="column">
			<div class="infobox">
				<span class="title">Download<a href="?id=download"><img src="images/import2.png" /></a></span>				
				<div>
					<ul>
					<li class="star"><a href="?id=download">Download 0.8.3</a></li>					
					<li><a href="?id=download">Older Versions</a></li>
					<li><a href="?id=docs">Offline Documentation</a></li>
					</ul>
				</div>
			</div>
			<div class="infobox">
				<span class="title">Explore<img src="images/view.png" /></span>
				<div>
					<ul>
					<li class="star"><a href="examples">Live Samples</a></li>
					<li class="star"><a href="docs/api">API Documentation</a></li>
					<li><a href="http://code.google.com/p/php-ext/source/browse/">Browse Source (SVN Repository)</a></li>
					<li><a href="http://code.google.com/p/php-ext/issues/list">Issue Tracker</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="infobox">
				<span class="title">Blog<a href="http://php-ext.quimera-solutions.com/blog/feeds/"><img src="images/xml.gif" /></a></span>
				<div>
					<ul>
<?php

if (function_exists('simplexml_load_file')) {
	// Show top 5 entries on the Blog
	$feedxml = "http://php-ext.quimera-solutions.com/blog/feeds/rss2.xml";
	$feed = simplexml_load_file($feedxml); 
	$count = 0;
	foreach($feed->channel->item as $item) {
	    $star = $count == 0 ? 'class="star"' : '';
	    echo '<li '.$star.'><a href="'.$item->link.'">'.$item->title.'</a></li>';
	    
	    if (++$count == 5)
	        break;
	} 
} else {
    echo '<li class="star"><a href="http://php-ext.quimera-solutions.com/blog">View entries</a></li>'; 
}

?>
					<li class="syndicate"><a href="http://php-ext.quimera-solutions.com/blog/feeds">Syndicate</a></li>
					</ul>
				</div>
			</div>
			<div class="infobox">
				<table border=0 style="background-color: #fff; padding: 5px;" cellspacing=0>
				  <tr><td>
				  <img src="http://groups.google.com/groups/img/3nb/groups_bar.gif"
				         height=26 width=132 alt="Google Groups">
				  </td></tr>
				  <tr><td style="padding-left: 5px">
				  Send comments and questions.  Share ideas and opinions.<br>
				  <b>Subscribe to PHP-Ext Discussion Group</b>
				  </td></tr>
				  <form action="http://groups.google.com/group/php-ext/boxsubscribe">
				  <tr><td style="padding-left: 5px;">
				  Email: <input type=text name=email>
				  <input type=submit name="sub" value="Subscribe">
				  </td></tr>
				</form>
				<tr><td align=right>
				  <a href="http://groups.google.com/group/php-ext">Visit this group</a>
				</td></tr>
				</table>
			</div>
		</div>
		
	</div>
				
	
	
