<?= t('Before start system must check your server for requirements. <br/>Just look at the table below and follow the instructions.') ?>
<?
    $success = TRUE;
?>
<table id="requirements" class="bordered-table zebra-striped">
    <thead>
    <th>#</th>
    <th><?=t('Name')?></th>
    <th><?=t('Current')?></th>
    <th><?=t('Required')?></th>
    <th><?=t('Test')?></th>
</thead>
<tbody>
    <?
    $php_version = phpversion();
    $passed = version_compare($php_version, '5.2.6', '>=');
    ?>
    <tr class="<?= $passed ? 'success' : 'failure' ?>">
        <td>1.</td>
        <td><?= t('PHP Version') ?></td><td>
            <?= $php_version ?>
        </td><td>
            5.2.6
        </td>
        <td >
            <span class="label <?= $passed ? 'success' : 'important' ?>"><?=t($passed ? 'Passed' : 'Error')?></span>
        </td>
    </tr>
</tbody>
</table>
<?if($success):?>
<p align="center">
    <a href="<?=l('install/site')?>" class="button"><?=t('Continue')?></a>
</p>
<?endif;?>