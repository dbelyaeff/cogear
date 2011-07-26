<div class="menu tabs" id="<?= $menu->getName() ?>">
    <ul>
        <? foreach ($menu as $item): ?>
            <li<?if($item->class){?> class="<?=$item->class?>"<?}?>>
                <a href="<?= $item->getUri() ?>"><?= $item->value ?></a>
            </li>
        <? endforeach ?>
    </ul>
</div>