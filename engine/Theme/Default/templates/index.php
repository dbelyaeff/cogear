<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$cogear->get('site.lang','en');?>">
<head>
           <title><?=$meta->title; ?></title>
        <meta type="keywords" content="<?=$meta->keywords->toString(', '); ?>"/>
        <meta type="description" content="<?=$meta->description; ?>"/>
        <?=$meta->info; ?>
        <?=$scripts; ?>
        <?=$styles; ?>
        <?event('theme.head.meta')?>
    </head>
    <body>
        <?event('theme.body.before')?>
        <div class="container_16" id="body">
            <div class="grid_16" id="header">
                <div class="grid_7 alpha" id="logo">
                    <?= HTML::a('/',HTML::img(config('theme.logo',$theme->folder.'/images/logo.png'),config('site.name')))?>
                </div>
            </div>
            <div class="grid_12" id="content">
                <?=$content; ?>
            </div>
            <div class="grid_4" id="sidebar">
                <?=$sidebar; ?>
            </div>
            <div class="grid_16" id="footer"><?=$footer?></div>
        </div>
        <?event('theme.body.after')?>
    </body>
</html>