<div class="form-element <? if($required){?>required<?}?><? if(isset($class)){echo ' '.$class;}?>" id="<?=$form->getId()?>-<?=$name?>">
<? if($label){?><label for="<?=$name?>"><?=$label?><? if($required){?> *<?}?></label><?}?>
<?=$code?>
<? if(sizeof($errors) > 0){?><div class="errors"><?=$errors->toString('<br/>')?></div><?}?>
<? if($description){?><div class="description" id="<?=$id?>-description"><?=$description?></div><?}?>
</div>
