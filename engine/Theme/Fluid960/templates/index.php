<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <?=theme('head')?>
    </head>
    <body>
        <?=theme('before')?>
        <div class="container_12">
            <div class="grid_12" id="header">
                <?=theme('head')?>
            </div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="grid_12" id="sidebar">
                <?=theme('sidebar')?>
            </div>
            <div class="grid_12" id="content">
                <?=theme('content')?>
            </div>
            <div class="clear"></div>
            <div class="grid_12" id="footer">
                <?=theme('footer')?>
            </div>
        </div>
        <?=theme('after')?>
    </body>
</html>