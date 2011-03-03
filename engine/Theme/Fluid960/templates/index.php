<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <title><?php echo $meta->title; ?></title>
        <meta type="keywords" content="<?php echo $meta->keywords->toString(', '); ?>"/>
        <meta type="description" content="<?php echo $meta->description; ?>"/>
        <?php echo $meta->info; ?>
        <?php echo $scripts; ?>
        <?php echo $styles; ?>
    </head>
    <body>
        <div class="container_12">
            <div class="grid_12" id="header">
                <?= $header ?>
            </div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="grid_12" id="sidebar">
                <?= $sidebar ?>
            </div>
            <div class="grid_12" id="content">
                <?= $content ?>
            </div>
            <div class="clear"></div>
            <div class="grid_12" id="footer">
                <?= $footer ?>
            </div>
            <div class="clear"></div>
    </body>
</html>