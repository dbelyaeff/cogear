<? foreach ($packages as $package => $gears): ?>
    <div class="package">
        <h1><?= $package ?></h1>
        <? $tpl = new Template('Gears.gear')?>
        <? foreach ($gears as $name => $gear): ?>
            <?  
                $tpl->reset();    
                $tpl->assign($gear->info()); 
                echo $tpl->render();
            ?>
    <? endforeach; ?>
    </div>
<? endforeach; ?>
