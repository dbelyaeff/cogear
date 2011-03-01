<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$cogear->get('site.lang','en');?>">
<head>
           <title><?=$meta->title; ?></title>
        <meta type="keywords" content="<?=$meta->keywords->toString(', '); ?>"/>
        <meta type="description" content="<?=$meta->description; ?>"/>
        <?=$meta->info; ?>
        <?=$scripts; ?>
        <?=$styles; ?>
    </head>
    <body>
        <div class="container_12">
            <div class="grid_12" id="header">
                <?=$header; ?>
            </div>
            <div class="grid_9" id="content">
                <?=$content; ?>
            </div>
            <div class="grid_3" id="sidebar">
                <?=$sidebar; ?>
            </div>
            <div class="grid_12" id="footer"><?=$footer?></div>
        </div>
    </body>
</html>