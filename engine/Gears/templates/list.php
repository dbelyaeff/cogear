<form method="POST">
    <select name="action-top">
        <option value=""><?= t('Actions')?></option>
        <option value="activate"><?= t('Activate')?></option>
        <option value="deactivate"><?= t('Deactivate')?></option>
        <option value="update"><?= t('Update')?></option>
    </select>
    <input type="submit" value="<?=t('Apply')?>"/>
<? foreach($packages as $name=>$gears): ?>
<h1><span><?= t($name,'Packages')?></span></h1>
<table class="list" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="check-all"><input type="checkbox"/></th>
            <th><?= t('Gear') ?></th>
            <th><?= t('Description') ?></th>
        </tr>
    </thead>
    <?php ksort($gears);?>
    <?php foreach ($gears as $gear): ?>
        <tr class="gear<? if($gear->active):?> active<?endif;?>">
            <th class="check"><input type="checkbox" name="gears[]" value="<?= $gear->gear?>"/></th>
            <td class="name"><b><?= t($gear->name) ?></b></td>
            <td class="description"><?= t($gear->description) ?></td>
        </tr>
        <tr class="controls<? if($gear->active):?> active<?endif;?>">
            <th></th>
            <td class="actions">
                    <?php if($gear->type != Gear::CORE && $gear->package != 'Core'):?>
                    <?= $gear->active ? HTML::a($link.'?action=deactivate&gears[]='.$gear->gear,t('Deactivate')) : HTML::a($link.'?action=activate&gears[]='.$gear->gear,t('Activate'))?><?// HTML::a($link.'?action=delete&gears[]='.$gear->gear,t('Delete'))?>
                    <?php endif;?>                        
            </td>
            <td class="info"><?= t('Version: ').$gear->version?> | <?=t('Author: ').HTML::a('mailto:'.$gear->email, $gear->author)?> | <?= t('Last update: ').df($gear->file->getMTime())?> <?php if($gear->site):?>
| <?= HTML::a($gear->site,t('Visit product website'))?><?endif;?></td>
        </tr>
    <? endforeach; ?>
    <tfoot>
        <tr>
            <th class="check-all"><input type="checkbox"/></th>
            <th><?= t('Gear') ?></th>
            <th><?= t('Description') ?></th>
        </tr>
    </tfoot>
</table>
<? endforeach; ?>
    <select name="action-bottom">
        <option value=""><?= t('Actions')?></option>
        <option value="activate"><?= t('Activate')?></option>
        <option value="deactivate"><?= t('Deactivate')?></option>
        <option value="update"><?= t('Update')?></option>
    </select>
    <input type="submit" value="<?=t('Apply')?>"/>
</form>