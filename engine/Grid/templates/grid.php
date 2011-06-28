<table class="grid" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <? foreach ($grid->fields as $name => $field): ?>
                <th id="<?= $grid->getId()?>-<?= $name ?>" <?=$field->width?'width="'.$field->width.'"':''?>><?= $field->label ?></th>
            <? endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <? foreach ($grid->lines as $line): ?>
            <tr <? if ($line->class): ?><?= $line->class ?><? endif ?>>
                <? foreach ($line as $key => $row): ?>
                    <?=$row->render()?>;
                <? endforeach; ?>
            </tr>
        <? endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <? foreach ($grid->fields as $name => $field): ?>
                <th id="<?= $grid->getId() ?>-<?= $name ?>"><?= $field->label ?></th>
            <? endforeach; ?>
        </tr>
    </tfoot>
    <? /*
    <?php foreach ($gears as $gear): ?>
        <tr class="gear<? if ($gear->active): ?> active<? endif; ?>">
            <th class="check"><input type="checkbox" name="gears[]" value="<?= $gear->gear ?>"/></th>
            <td class="name"><b><?= t($gear->name) ?></b></td>
            <td class="description"><?= t($gear->description) ?></td>
        </tr>
        <tr class="controls<? if ($gear->active): ?> active<? endif; ?>">
            <th></th>
            <td class="actions">
                <?php if ($gear->type != Gear::CORE && $gear->package != 'Core'): ?>
                    <?= $gear->active ? HTML::a($link . '?action=deactivate&gears[]=' . $gear->gear, t('Deactivate')) : HTML::a($link . '?action=activate&gears[]=' . $gear->gear, t('Activate')) ?><? // HTML::a($link.'?action=delete&gears[]='.$gear->gear,t('Delete'))?>
                <?php endif; ?>                        
            </td>
            <td class="info"><?= t('Version: ') . $gear->version ?> | <?= t('Author: ') . HTML::a('mailto:' . $gear->email, $gear->author) ?> | <?= t('Last update: ') . df($gear->file->getMTime()) ?> <?php if ($gear->site): ?>
                    | <?= HTML::a($gear->site, t('Visit product website')) ?><? endif; ?></td>
        </tr>
    <? endforeach; ?>
     * 
     */
    ?>
</table>