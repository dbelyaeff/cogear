<table id="<?=$id?>"></table>
<div id="<?=$pager?>"></div>
<script type="text/javascript">
    $(function(){
        $("#<?=$id?>").jqGrid(<?=json_encode($config->toArray())?>);
    });
</script>