<div id="cogear-dialog">
<script>
$(function() {
	$('#cogear-dialog').lightbox_me({
		centered: false,
		overlaySpeed: 100,
		closeClick:	false,
		modalCSS: {top: '140px'},
		overlayCSS:	{background: 'black', opacity: .2},
		destroyOnClose: true
	});
});
</script>
<table class="lightface">
	<tbody>
	<tr>
		<td class="topLeft" style="visibility: visible; zoom: 1; opacity: 0.4; "></td><td class="topCenter" style="visibility: visible; zoom: 1; opacity: 0.4; "></td><td class="topRight" style="visibility: visible; zoom: 1; opacity: 0.4; "></td></tr><tr><td class="centerLeft" style="visibility: visible; zoom: 1; opacity: 0.4; "></td><td class="centerCenter">
			<div class="lightfaceContent" style="width: 500px; ">
				<div class="lightfaceTitle <?php echo $class?>"><?php echo $title?></div>
				<div class="lightfaceMessageBox" style="height: auto; ">
					<?php echo $content?>
				</div>
				<div class="lightfaceFooter" style="display: block; ">
					<input type="button" value="<?=t("Ok");?>">
					<input type="button" class="close" value="<?=t("Cancel");?>">
				</div>
			</div>
		</td><td class="centerRight" style="visibility: visible; zoom: 1; opacity: 0.4; "></td></tr><tr><td class="bottomLeft" style="visibility: visible; zoom: 1; opacity: 0.4; "></td><td class="bottomCenter" style="visibility: visible; zoom: 1; opacity: 0.4; "></td><td class="bottomRight" style="visibility: visible; zoom: 1; opacity: 0.4; "></td>
	</tr>
	</tbody>
</table>
</div>