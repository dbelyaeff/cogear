<ul>
<?foreach($accounts as $account):?>
    <li><?if($account->photo):?>
        <img src="<?=$account->photo?>">
    <?endif?>
         <a href="<?=$account->identity?>"><?=$account->full_name?></a>
    </li>    
<? endforeach; ?>
</ul>