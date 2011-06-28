<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <?event('head')?>
    </head>
    <body>
        <?event('before')?>
        <div class="container_12">
            <div class="grid_12" id="header">
                <?event('head')?>
            </div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="grid_12" id="sidebar">
                <?event('sidebar')?>
            </div>
            <div class="grid_12" id="content">
                <?event('content')?>
            </div>
            <div class="clear"></div>
            <div class="grid_12" id="footer">
                <?event('footer')?>
            </div>
        </div>
        <?event('after')?>
    </body>
</html>