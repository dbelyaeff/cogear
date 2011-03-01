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
        <div class="container_16">
            <!-- HEADER -->
            <div id="header" class="grid_16">
                <img src="<?= $theme->folder ?>/img/logo.png" class="header_logo" alt="COGEAR" />
                <div><?=HTML::a(Url::link('http://'.SITE_URL),$cogear->get('site.name',SITE_URL));?></div>
                <div class="header_auth">
                    <?= t('Welcome, ', 'User'); ?> <a href="#" class="user_link"><?= $cogear->user->login; ?></a>
			| <a href="<?= Url::link('/user/logout/'); ?>"><?= t('Logout', 'User'); ?></a>
                </div>
            </div>
            <!-- /HEADER -->
            <div class="clear"></div>
            <div id="wrapper" class="grid_16">
            <!-- SIDEBAR -->
            <div id="sidebar" class="grid_2 alpha">
	       <?= $sidebar?>
            </div>
            <!-- /SIDEBAR -->

            <div id="content" class="grid_14 omega">
                <?= $content?>
            </div>
            
            </div>
            <div class="clear"></div>

            <!-- FOOTER -->
            <div id="footer" class="grid_16">
                <div class="footer_gear"> </div>
                <a href="http://cogear.ru" class="footer_logo_text">cogear <span>v.2.01</span></a>
                <div class="footer_stat">
                    <?= $footer ?>
                </div>
            </div>
            <!-- /FOOTER -->
    <?event('theme.body.after')?>
    </body>
</html>