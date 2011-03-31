<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $cogear->get('site.lang', 'en'); ?>">
    <head>
        <title><?php echo $meta->title->toString($cogear->get('site.title_separator',' &laquo; ')); ?></title>
        <meta type="keywords" content="<?php echo $meta->keywords->toString(', '); ?>"/>
        <meta type="description" content="<?php echo $meta->description; ?>"/>
        <?php echo $meta->info; ?>
        <?php echo $scripts; ?>
        <?php echo $styles; ?>
        <?event('theme.head.meta')?>
    </head>
<body>
    <?event('theme.body.before')?> 
<div class="container">
    <!-- HEADER -->
    <div class="header">
        <a href="<?= Url::link('/admin')?>"><img src="<?= $theme->folder ?>/images/logo.png" class="header_logo" alt="COGEAR" /></a>
        <h2><?=HTML::a(Url::link('http://'.SITE_URL),$cogear->get('site.name',SITE_URL));?></h2>
    </div>
    <!-- /HEADER -->


    <div class="content_wrapper">
        <div class="content_column">
            <?= $top_menu->render('Admin_Menu.top_menu')?>
            <div class="top_title">
                <h1><?= $meta->title->toString(' → ')?></h1>
            </div>
            <div class="content_body">

            <!-- CONTENT --> 
            <?= $content?> 
            <!-- /CONTENT --> 

            </div>
        </div>
    </div>


    <!-- SIDEBAR -->
    <div class="sidebar">
        <?= $sidebar?> 
        </div>
    </div>
    <!-- /SIDEBAR -->


    <!-- FOOTER -->
    <div class="footer">
        <div class="footer_gear"> </div>
        <a href="http://cogear.ru" class="footer_logo_text" title="Сайт сообщества COGEAR">cogear <span>v.2.01</span></a>
        <div class="footer_stat">
            <?= $footer ?>
        </div>
    </div>
    <!-- /FOOTER -->


</div>

<?event('theme.body.after')?>

</body>
</html>
