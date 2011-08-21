<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$cogear->get('site.lang','en');?>">
<head>
	<?=theme('head')?>
    </head>
    <body>
        <div class="container">
	        <div class="row">
				<div class="span16" id="header">
					<?=theme('header')?>
				</div>
		    </div>
            <div class="row">
				<div class="span5 columns" id="content">
					<?=theme('sidebar')?>
				</div>
				<div class="span11 columns" id="sidebar">
					<?=theme('content')?>
				</div>
	        </div>
            <div class="row">
	            <div class="span16" id="footer">
		            <?=theme('footer')?>
	            </div>
	        </div>
        </div>
        <?=theme('after')?>
    </body>
</html>