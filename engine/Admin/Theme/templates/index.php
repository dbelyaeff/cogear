<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $cogear->get('site.lang', 'en'); ?>">
    <head>
        <?event('head')?>
    </head>
<body>
    <?event('before')?> 
<div class="container">
    <!-- HEADER -->
    <div class="header">
        <a href="<?= Url::link('/admin')?>"><img src="<?= $theme->folder ?>/images/logo.png" class="header_logo" alt="COGEAR" /></a>
        <h2><?=HTML::a(Url::link('http://'.SITE_URL),$cogear->get('site.name',SITE_URL));?></h2>
    </div>
    <!-- /HEADER -->


    <div class="content_wrapper">
        <div class="content_column">
            <?= $top_menu?>
            <div class="top_title">
                <? if(sizeof($meta->title) > 0):?>
                <h1><?= reset($meta->title)?></h1>
                <? endif; ?>
            </div>
            <div class="content_body">

            <!-- CONTENT --> 
            <?event('content')?> 
            <!-- /CONTENT --> 

            </div>
        </div>
    </div>


    <!-- SIDEBAR -->
    <div class="sidebar">
        <?event('sidebar')?> 
        </div>
    </div>
    <!-- /SIDEBAR -->


    <!-- FOOTER -->
    <div class="footer">
        <div class="footer_gear"> </div>
        <a href="http://cogear.ru" class="footer_logo_text" title="Сайт сообщества COGEAR">cogear <span>v.2.01</span></a>
        <div class="footer_stat">
            <?event('footer')?>
        </div>
    </div>
    <!-- /FOOTER -->


</div>
<?event('after')?>
</body>
</html>
