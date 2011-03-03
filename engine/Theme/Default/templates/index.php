<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $cogear->get('site.lang','en');?>">
<head>
    <title><?php echo $meta->title; ?></title>
    <meta type="keywords" content="<?php echo $meta->keywords->toString(', '); ?>"/>
    <meta type="description" content="<?php echo $meta->description; ?>"/>
    <?php echo $meta->info; ?>
    <?php echo $scripts; ?>
    <?php echo $styles; ?>
    </head>
    <body>
        <?= $sidebar?>
        <?= $content?>
        <?= $footer?>
        <?php if(isset($debug)) echo $debug;?>
    </body>
</html>