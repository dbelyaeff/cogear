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
    <a href="<?=l('vizitcard/site')?>" class="button"><?=t('Continue')?></a>
</p>
<?endif;?>

      <table id="sortTableExample">
        <thead>
          <tr>
            <th class="header">RGB</th>
            <th class="header">HEX</th>
            <th class="">ЦВЕТ</th>
            <th class="header">СЛОВО</th>
          </tr>
        </thead>
        <tbody>
              <tr>
                <td>240&nbsp;248&nbsp;255</td>
                <td>#F0F8FF</td>
                <td style="background-color: aliceblue">&nbsp;</td>
                <td>aliceblue</td></tr>
              <tr>
                <td>250&nbsp;235&nbsp;215</td>
                <td>#FAEBD7</td>
                <td style="background-color: antiquewhite">&nbsp;</td>
                <td>antiquewhite</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;255&nbsp;255</td>
                <td>#00FFFF</td>
                <td style="background-color: aqua">&nbsp;</td>
                <td>aqua</td></tr>
              <tr>
                <td>127&nbsp;255&nbsp;212</td>
                <td>#7FFFD4</td>
                <td style="background-color: aquamarine">&nbsp;</td>
                <td>aquamarine</td></tr>
              <tr>
                <td>240&nbsp;255&nbsp;255</td>
                <td>#F0FFFF</td>
                <td style="background-color: azure">&nbsp;</td>
                <td>azure</td></tr>
              <tr>
                <td>245&nbsp;245&nbsp;220</td>
                <td>#F5F5DC</td>
                <td style="background-color: beige">&nbsp;</td>
                <td>beige</td></tr>
              <tr>
                <td>255&nbsp;228&nbsp;196</td>
                <td>#FFE4C4</td>
                <td style="background-color: bisque">&nbsp;</td>
                <td>bisque</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0</td>
                <td>#000000</td>
                <td style="background-color: black">&nbsp;</td>
                <td>black</td></tr>
              <tr>
                <td>255&nbsp;235&nbsp;205</td>
                <td>#FFEBCD</td>
                <td style="background-color: blanchedalmond">&nbsp;</td>
                <td>blanchedalmond</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0&nbsp;255</td>
                <td>#0000FF</td>
                <td style="background-color: blue">&nbsp;</td>
                <td>blue</td></tr>
              <tr>
                <td>138&nbsp;&nbsp;43&nbsp;226</td>
                <td>#8A2BE2</td>
                <td style="background-color: blueviolet">&nbsp;</td>
                <td>blueviolet</td></tr>
              <tr>
                <td>165&nbsp;&nbsp;42&nbsp;&nbsp;42</td>
                <td>#A52A2A</td>
                <td style="background-color: brown">&nbsp;</td>
                <td>brown</td></tr>
              <tr>
                <td>222&nbsp;184&nbsp;135</td>
                <td>#DEB887</td>
                <td style="background-color: burlywood">&nbsp;</td>
                <td>burlywood</td></tr>
              <tr>
                <td>&nbsp;95&nbsp;158&nbsp;160</td>
                <td>#5F9EA0</td>
                <td style="background-color: cadetblue">&nbsp;</td>
                <td>cadetblue</td></tr>
              <tr>
                <td>127&nbsp;255&nbsp;&nbsp;&nbsp;0</td>
                <td>#7FFF00</td>
                <td style="background-color: chartreuse">&nbsp;</td>
                <td>chartreuse</td></tr>
              <tr>
                <td>210&nbsp;105&nbsp;&nbsp;30</td>
                <td>#D2691E</td>
                <td style="background-color: chocolate">&nbsp;</td>
                <td>chocolate</td></tr>
              <tr>
                <td>255&nbsp;127&nbsp;&nbsp;80</td>
                <td>#FF7F50</td>
                <td style="background-color: coral">&nbsp;</td>
                <td>coral</td></tr>
              <tr>
                <td>100&nbsp;149&nbsp;237</td>
                <td>#6495ED</td>
                <td style="background-color: cornflowerblue">&nbsp;</td>
                <td>cornflowerblue</td></tr>
              <tr>
                <td>255&nbsp;248&nbsp;220</td>
                <td>#FFF8DC</td>
                <td style="background-color: cornsilk">&nbsp;</td>
                <td>cornsilk</td></tr>
              <tr>
                <td>220&nbsp;&nbsp;20&nbsp;&nbsp;60</td>
                <td>#DC143C</td>
                <td style="background-color: crimson">&nbsp;</td>
                <td>crimson</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;255&nbsp;255</td>
                <td>#00FFFF</td>
                <td style="background-color: cyan">&nbsp;</td>
                <td>cyan</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0&nbsp;139</td>
                <td>#00008B</td>
                <td style="background-color: darkblue">&nbsp;</td>
                <td>darkblue</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;139&nbsp;139</td>
                <td>#008B8B</td>
                <td style="background-color: darkcyan">&nbsp;</td>
                <td>darkcyan</td></tr>
              <tr>
                <td>184&nbsp;134&nbsp;&nbsp;11</td>
                <td>#B8860B</td>
                <td style="background-color: darkgoldenrod">&nbsp;</td>
                <td>darkgoldenrod</td></tr>
              <tr>
                <td>169&nbsp;169&nbsp;169</td>
                <td>#A9A9A9</td>
                <td style="background-color: darkgray">&nbsp;</td>
                <td>darkgray</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;100&nbsp;&nbsp;&nbsp;0</td>
                <td>#006400</td>
                <td style="background-color: darkgreen">&nbsp;</td>
                <td>darkgreen</td></tr>
              <tr>
                <td>189&nbsp;183&nbsp;107</td>
                <td>#BDB76B</td>
                <td style="background-color: darkkhaki">&nbsp;</td>
                <td>darkkhaki</td></tr>
              <tr>
                <td>139&nbsp;&nbsp;&nbsp;0&nbsp;139</td>
                <td>#8B008B</td>
                <td style="background-color: darkmagenta">&nbsp;</td>
                <td>darkmagenta</td></tr>
        </tbody>
      </table>
