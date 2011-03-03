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
                <div class="grid_4 alpha">
                    <a href="<?= Url::link('/admin')?>"><img src="<?= $theme->folder ?>/img/logo.png" class="header_logo" alt="COGEAR" /></a>
                </div>
                <div id="site_name" class="grid_3">
                    <?=HTML::a(Url::link('http://'.SITE_URL),$cogear->get('site.name',SITE_URL));?>
                </div>
                <div id="header_auth" class="grid_3 prefix_6 omega">
                    <div class="box"><p>
                    <?= t('Welcome, ', 'User'); ?> <a href="<?= Url::gear('user',$cogear->user->login)?>" class="user_link"><?= $cogear->user->login; ?></a>
			| <a href="<?= Url::gear('user','logout'); ?>"><?= t('Logout', 'User'); ?></a>
                        </p>
                    </div>
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

            <div id="content" class="grid_14 omega box">
                <div>
                <?= $content?>
                </div>
            </div>
            
            </div>
            <div class="clear"></div>

            <!-- FOOTER -->
            <div id="footer" class="grid_16">
                <div id="footer_gear" class="grid_12 alpha"> <p>
                </div>
                <div id="footer_stat" class="grid_4 omega box">
                    <div class="padding-10">
                    <?= $footer ?>
                    </div>
                </div>
            </div>
            <!-- /FOOTER -->
    <?event('theme.body.after')?>
    </body>
</html>