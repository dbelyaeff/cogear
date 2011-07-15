<?if($value):?>
<div class="image-preview" id="image-preview-<?=$attributes['name']?>"><?=HTML::img($value,'',$image)?></div>
<?endif;?>
<?=HTML::input($attributes)?>

<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=<?=$attributes['name']?>]').ajaxFileUpload({
            target: '#image-preview-<?=$attributes['name']?> > img'
        });
    });
</script>