<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $cogear->get('site.lang', 'en'); ?>">
    <head>
        <? event('head') ?>
    </head>
    <body>
        <? event('before') ?> 
        <div class="container_16">
            <!-- HEADER -->
            <div id="header" class="grid_16">
                <a href="<?= Url::link('/admin') ?>"><img src="<?= $theme->folder ?>/images/logo.png" class="header_logo" alt="COGEAR" /></a>
                <?= HTML::a(Url::link('http://' . SITE_URL), $cogear->get('site.name', SITE_URL)); ?>
            </div>
            <!-- /HEADER -->

            <!-- SIDEBAR -->
            <div class="grid_2" id="sidebar">
                <? event('sidebar') ?> 
            </div>
            <!-- /SIDEBAR -->


            <div class="grid_14" id="content">
                <?= $top_menu ?>
                <div id="top_title"<?if($top_menu){?> class="no-corners"<?}?>>
                    <? if (sizeof($meta->title) > 0): ?>
                        <h1><?= reset($meta->title) ?></h1>
                    <? endif; ?>
                </div>
                <div id="wrapper">
                    <!-- CONTENT --> 
                    <? event('content') ?> 
                    <!-- /CONTENT --> 

                </div>
            </div>

            <div class="grid_16">
                <div id="debug">
                    <? event('debug') ?>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <div id="footer">
            <div class="footer_gear"> </div>
            <p class="fl_r"><a href="http://cogear.ru" ><i>cogear</i> &copy;</a></p>
        </div>
        <!-- /FOOTER -->
        <? event('after') ?>
    </body>
</html>
