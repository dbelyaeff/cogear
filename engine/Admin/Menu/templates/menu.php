<div id="admin-menu">
    <?php foreach($data as $section):?>
    <div class="box">
    <h4><b><?= isset($section['#value']['active']) ? $section['#value']['text'] : HTML::a($section['#value']['link'],$section['#value']['text'])?></b></h4>
        <?php unset($section['#value']); ?>
    <ul>
        <?php foreach($section as $key=>$element):?>
            <li><?= isset($element['active']) ? $element['text'] : HTML::a($element['link'],$element['text'])?></li>
        <?php endforeach; ?>
    </ul>
    </div>
    <?php endforeach; ?>
    
</div>