<!DOCTYPE html>
<html lang="ru">
  <head>
	<?=theme('head')?>
    </head>
    
      <body class="body-cg">
		
        <?=theme('before')?>
        
        <!--div class="container">
			
	        <div class="row">
				<div class="span16" id="header"  style="background-color: red">
					<?=theme('header')?>
				</div>
		    </div>
		    
            <div class="row">
				<div class="span3 columns" id="sidebar" style="background-color: green">
					<?=theme('sidebar')?>
				</div>
				<div class="span13 columns" id="content" style="background-color: blue">
					<?=theme('content')?>
				</div>
	        </div>
	        
            <div class="row">
	            <div class="span16" id="footer" style="background-color: coral">
		            <?=theme('footer')?>
	            </div>
	        </div>
	        
        </div-->
        
        <?=theme('after')?>
        




   <!-- Topbar
    ================================================== -->
<div class="topbar-cg topbar-top" data-scrollspy="scrollspy" >
	<div class="topbar-inner-cg">
		<div class="line-top">
			<div class="container">
				<a class="brand" href="#"><span class="glyph s">S</span> HCJ <span class="s">for Cogear</span></a>
				<ul class="navigation-cg">
					<li class="active"><a href="#overview">About</a></li>
					<li><a href="#tags">Tags/Arrow</a></li>
					<li><a href="#button">Buttons</a></li>
					<li><a href="#placeholder">Placeholder</a></li>
					<li><a href="#calendar">Calendar</a></li>				
					<li><a href="#widget">Widget</a></li>
					<li><a href="#navigation">Navigation</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

    <!-- Masthead (blueprinty thing)
    ================================================== -->
    <header class="jumbotron" id="overview">
      <div class="header-cg">
        <div class="container">
          <h1>HTML, CSS, and JS toolkit for <br><a class="cg" href="http://cogear.ru"><span class="glyph">S</span> Cogear</a></h1>
          <p class="lead">
				<strong>HCJ for Cogear</strong> it's HTML, CSS and JS позволяющий расширить возможности <a href="http://twitter.github.com/bootstrap/">Bootstrap, from Twitter</a>
          </p>
        </div><!-- /container -->
      </div>
    </header>


    <div class="container">
		
<!-- Tag
================================================== -->		
<section id="tags">
	<h2 class="hcj">Tags/Arrow</h2>
  <div class="page-header">
    <h3 class="hcj-h3">Tags</h3>
  </div>
	<div class="row">
		<div class="span4">
			&nbsp;
		</div>
		<div class="span12">
			<h4>To the right</h4>
			<p>		
				<span class="label-right"><a href="http://">метка</a></span>
				<span class="label-right skyblue-right"><a href="http://">метка</a></span>
				<span class="label-right aqua-right"><a href="http://">метка</a></span>
				<span class="label-right deeppink-right"><a href="http://">метка</a></span>
				<span class="label-right orchid-right"><a href="http://">метка</a></span>
				<span class="label-right crimson-right"><a href="http://">метка</a></span>
			</p>
			<div class="clear"></div>
			<h4>To the left</h4>
			<p>
				<span class="label-left"><a href="http://">метка</a></span>
				<span class="label-left skyblue-left"><a href="http://">метка</a></span>
				<span class="label-left aqua-left"><a href="http://">метка</a></span>
				<span class="label-left deeppink-left"><a href="http://">метка</a></span>
				<span class="label-left orchid-left"><a href="http://">метка</a></span>
				<span class="label-left crimson-left"><a href="http://">метка</a></span>
			</p>
		</div>
	</div><!-- /row -->


<!-- Arrow
================================================== -->		

  <div class="page-header">
    <h3 class="hcj-h3">Arrow</h3>
  </div>
  <div class="row">
	  	<div class="span4">
			&nbsp;
		</div>
		<div class="span12">
			<h4>To the right</h4>
			<p>			
				<span class="arrow-right"><a href="http://">стрелка</a></span>
				<span class="arrow-right skyblue-right"><a href="http://">стрелка</a></span>
				<span class="arrow-right aqua-right"><a href="http://">стрелка</a></span>
				<span class="arrow-right deeppink-right"><a href="http://">стрелка</a></span>
				<span class="arrow-right orchid-right"><a href="http://">стрелка</a></span>
				<span class="arrow-right crimson-right"><a href="http://">стрелка</a></span> 
			</p>
			<div class="clear"></div>
			<h4>To the left</h4>
			<p>			
				<span class="arrow-left"><a href="http://">стрелка</a></span>
				<span class="arrow-left skyblue-left"><a href="http://">стрелка</a></span>
				<span class="arrow-left aqua-left"><a href="http://">стрелка</a></span>
				<span class="arrow-left deeppink-left"><a href="http://">стрелка</a></span>
				<span class="arrow-left orchid-left"><a href="http://">стрелка</a></span>
				<span class="arrow-left crimson-left"><a href="http://">стрелка</a></span>
			</p>
		</div>
  </div><!-- /row -->


<!-- Arrow with tail
================================================== -->

  <div class="page-header">
    <h3 class="hcj-h3">Arrow with tail</h3>
  </div>
  <div class="row">
	  	<div class="span4">
			&nbsp;
		</div>
		<div class="span12">
			<h4>To the right</h4>
			<p>				
				<span class="arrow-right whitesmoke-right-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-right skyblue-right skyblue-right-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-right aqua-right aqua-right-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-right deeppink-right deeppink-right-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-right orchid-right orchid-right-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-right crimson-right crimson-right-tail"><a href="http://">стрелка</a></span> 
			</p>
			<div class="clear"></div>
			<h4>To the left</h4>
			<p>				
				<span class="arrow-left whitesmoke-left-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-left skyblue-left skyblue-left-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-left aqua-left aqua-left-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-left deeppink-left deeppink-left-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-left orchid-left orchid-left-tail"><a href="http://">стрелка</a></span>
				<span class="arrow-left crimson-left crimson-left-tail"><a href="http://">стрелка</a></span>
			</p>
		</div>
  </div><!-- /row -->
</section>

<!-- Button
================================================== -->		
<section id="button">
	<h2 class="hcj">Button</h2>
  <div class="page-header">
    <h3 class="hcj-h3">Button with a gradient</h3>
  </div>
  <div class="row">
	  	<div class="span4">
			&nbsp;
		</div>
		<div class="span12">
			<p>
				<button class="button" type="reset">найти</button>
				<button class="button skyblue" type="reset">найти</button>
				<button class="button aqua" type="reset">найти</button>
				<button class="button deeppink" type="reset">найти</button>
				<button class="button orchid" type="reset">найти</button>
				<button class="button crimson" type="reset">найти</button>
			</p>
		</div>
  </div><!-- /row -->


<!-- Button for menu
================================================== -->		

  <div class="page-header">
    <h3 class="hcj-h3">Button with a gradient for menu</h3>
  </div>
  <div class="row">
	  	<div class="span4">
			&nbsp;
		</div>
		<div class="span12">
			<p>
				<nav>					
					<ul>
						<li class="skyblue"><a href=""><span class="glyph u">U</span> Блоги</a></li>
						<li class="aqua"><a href=""><span class="glyph u">U</span> Сообщества</a></li>
						<li class="deeppink"><a href=""><span class="glyph u">U</span> Люди</a></li>
						<li class="orchid"><a href=""><span class="glyph u">U</span> Люди</a></li>
						<li class="crimson"><a href=""><span class="glyph u">U</span> Люди</a></li>
					</ul>
				</nav>	
			</p>
		</div>
  </div><!-- /row -->


<!-- Button for menu
================================================== -->		

  <div class="page-header">
    <h3 class="hcj-h3">Button with a gradient for menu with borders</h3>
  </div>
  <div class="row">
	  	<div class="span4">
			&nbsp;
		</div>
		<div class="span12">
			<p>
				<nav>					
					<ul>
						<li class="skyblue border-skyblue"><a href=""><span class="glyph u">U</span> Блоги</a></li>
						<li class="aqua border-aqua"><a href=""><span class="glyph u">U</span> Сообщества</a></li>
						<li class="deeppink border-deeppink"><a href=""><span class="glyph u">U</span> Люди</a></li>
						<li class="orchid border-orchid"><a href=""><span class="glyph u">U</span> Люди</a></li>
						<li class="crimson border-crimson"><a href=""><span class="glyph u">U</span> Люди</a></li>
					</ul>
				</nav>	
			</p>
		</div>
  </div><!-- /row -->
</section>

<!-- Placeholder
================================================== -->	
<section id="placeholder">
	<h2 class="hcj">Placeholde</h2>
  <div class="page-header">
    &nbsp;
  </div>
  <div class="row">
	  	<div class="span4">
			<p>
			Текст-подсказка отображается в поле ввода до того, как это поле получит фокус. 
			</p>
			<p>
			<a href="http://webcloud.se">jQuery-Placeholder</a> (автор Daniel Stocks) плагин нужен для тех браузеров которые не поддерживают HTML5 атрибут placeholder.
			</p>
		</div>
		<div class="span12">
			<p>	  
				<form>
					<input placeholder="поиск&nbsp;по&nbsp;сайту" type="text">
				</form>
			</p>
		</div>
  </div><!-- /row -->
</section> 

<!-- Calendar
================================================== -->		
<section id="calendar">
	<h2 class="hcj">Calendar</h2>
  <div class="page-header">
    &nbsp;
  </div>
  <div class="row">
	  	<div class="span4">
			&nbsp;
		</div>
		<div class="span12">
			<p>
				<span class="calendar"><span class="mount"><span class="a"></span><span class="a b"></span></span>18</span>
				<span class="calendar calendar-skyblue"><span class="mount"><span class="a"></span><span class="a b"></span></span>18</span>
				<span class="calendar calendar-aqua"><span class="mount"><span class="a"></span><span class="a b"></span></span>18</span>
				<span class="calendar calendar-deeppink"><span class="mount"><span class="a"></span><span class="a b"></span></span>18</span>
				<span class="calendar calendar-orchid"><span class="mount"><span class="a"></span><span class="a b"></span></span>18</span>
				<span class="calendar calendar-crimson"><span class="mount"><span class="a"></span><span class="a b"></span></span>18</span>
				<span class="calendar calendar-whitesmoke"><span class="mount"><span class="a"></span><span class="a b"></span></span>18</span>
			</p>
		</div>
  </div><!-- /row -->
</section>
<!-- skyblue aqua deeppink orchid crimson whitesmoke -->

<!-- Warning
================================================== -->	
<section>
	<div class="row alert-message block-message error">
		<div class="span16"><h4 style="color:#DC143C; text-align:center;"><span class="glyph" style="font-size:40px">W</span> Warning: Все, что находится ниже, находится в режиме разработки.</h4></div>
	</div>
</section>

<!-- Widget
================================================== -->		
<section id="widget">
	<h2 class="hcj">Widget</h2>
  <div class="page-header">
    &nbsp;
  </div>
    <div class="row">
    <div class="span-one-third">
		<div class="widget">
			<h2 class="tape-bg left-bg">Заголовок</h2>
			<h2 class="tape-bg right-bg">Заголовок</h2>
			<div>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
			</div>
		</div> 
    </div><!-- /col -->
    
    <div class="span-one-third">
		<div class="widget">	
			<h2 class="top-bg left-bg">Заголовок</h2>
			<h2 class="top-bg right-bg" >Заголовок</h2>
			<div>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
			</div>
		</div> 
		<!--fieldset>
			<legend>Log in</legend>
				<p>Содержимое виджета</p>
		</fieldset-->
    </div><!-- /col -->
    
    <div class="span1">
		&nbsp;
    </div><!-- /col -->
 
    <div class="span4">
		<div class="widget" style="top:40px">			
			<div class="skyblue border-skyblue transformedObject"><a href=""><span class="glyph u">U</span> Блоги</a></div>
			<h2 class="top-bg" style="margin-top:-40px; text-align:center;">Заголовок</h2>
			<div>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
				<p>Содержимое виджета</p>
			</div>
		</div>
    </div><!-- /col -->
  </div><!-- /row -->
</section>


<!-- Navigation
================================================== -->
<section id="navigation">
	<h2 class="hcj">Navigation</h2>
  <div class="page-header">
    &nbsp;
  </div>
  
<!-- Navigation Red
    ================================================== -->
    <div class="topbar-cg" data-scrollspy="scrollspy" >
      <div class="topbar-inner-cg topbar-red">
        <div class="container">
          <a class="brand" style="color:#fff;" href="#"><span class="glyph">S</span> HCJ for Cogear</a>
          <ul class="navigation">
			<li class="active"><a href="#overview">About</a></li>
			<li><a href="#tags">Tags/Arrow</a></li>
			<li><a href="#button">Buttons</a></li>
			<li><a href="#placeholder">Placeholder</a></li>
			<li><a href="#calendar">Calendar</a></li>				
			<li><a href="#widget">Widget</a></li>
			<li><a href="#navigation">Navigation</a></li>
          </ul>
        </div>
      </div>
    </div>

<!-- Navigation White
    ================================================== -->    
    <div class="topbar-cg topbar-white" data-scrollspy="scrollspy" style="margin-top:60px;">
      <div class="topbar-inner-cg">
			<div class="container">
				<a class="brand" href="#"><span class="glyph s">S</span> HCJ <span class="s">for Cogear</span></a>
				<ul class="navigation-cg">
					<li class="active"><a href="#overview">About</a></li>
					<li><a href="#tags">Tags/Arrow</a></li>
					<li><a href="#button">Buttons</a></li>
					<li><a href="#placeholder">Placeholder</a></li>
					<li><a href="#calendar">Calendar</a></li>				
					<li><a href="#widget">Widget</a></li>
					<li><a href="#navigation">Navigation</a></li>
				</ul>
			</div>
      </div>
    </div>
    
</section>



<!-- Warning
================================================== -->	
<section>
	<div class="row alert-message block-message warning">
		<div class="span16"><h4 style="color:#4078A6; text-align:center;"><span class="glyph" style="font-size:40px">R</span> Шпаргалка.</h4></div>
	</div>
</section>



<!-- The color table
================================================== -->
<section id="crib">
	 <h2 class="hcj">The color table</h2>
  <div class="page-header">
    &nbsp;
  </div>
  <!-- Table structure -->
  <div class="row">
    <div class="span4">
		<h2>Список цветов, названия которых понимают браузеры</h2>
		<p>
			Список цветов, которые браузеры понимают "на словах" (при назывании по именам), а не в шестнадцатеричных кодах (HEX).<br>
			Примечание: некоторые цвета распознаются не всеми браузерами.
		</p>
		<h2>Example: Zebra-striped w/ TableSorter.js</h2>
		<p>
		  Taking the previous example, we improve the usefulness of our tables by providing sorting functionality via <a href="http://jquery.com">jQuery</a> and the <a href="http://tablesorter.com/docs/">Tablesorter</a> plugin. <strong>Click any column’s header to change the sort.</strong>
		</p>
    </div>   
    <div class="span12">
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
              <tr>
                <td>&nbsp;85&nbsp;107&nbsp;&nbsp;47</td>
                <td>#556B2F</td>
                <td style="background-color: darkolivegreen">&nbsp;</td>
                <td>darkolivegreen</td></tr>
              <tr>
                <td>255&nbsp;140&nbsp;&nbsp;&nbsp;0</td>
                <td>#FF8C00</td>
                <td style="background-color: darkorange">&nbsp;</td>
                <td>darkorange</td></tr>
              <tr>
                <td>153&nbsp;&nbsp;50&nbsp;204</td>
                <td>#9932CC</td>
                <td style="background-color: darkorchid">&nbsp;</td>
                <td>darkorchid</td></tr>
              <tr>
                <td>139&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0</td>
                <td>#8B0000</td>
                <td style="background-color: darkred">&nbsp;</td>
                <td>darkred</td></tr>
              <tr>
                <td>233&nbsp;150&nbsp;122</td>
                <td>#E9967A</td>
                <td style="background-color: darksalmon">&nbsp;</td>
                <td>darksalmon</td></tr>
              <tr>
                <td>143&nbsp;188&nbsp;143</td>
                <td>#8FBC8F</td>
                <td style="background-color: darkseagreen">&nbsp;</td>
                <td>darkseagreen</td></tr>
              <tr>
                <td>&nbsp;72&nbsp;&nbsp;61&nbsp;139</td>
                <td>#483D8B</td>
                <td style="background-color: darkslateblue">&nbsp;</td>
                <td>darkslateblue</td></tr>
              <tr>
                <td>&nbsp;47&nbsp;&nbsp;79&nbsp;&nbsp;79</td>
                <td>#2F4F4F</td>
                <td style="background-color: darkslategray">&nbsp;</td>
                <td>darkslategray</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;206&nbsp;209</td>
                <td>#00CED1</td>
                <td style="background-color: darkturquoise">&nbsp;</td>
                <td>darkturquoise</td></tr>
              <tr>
                <td>148&nbsp;&nbsp;&nbsp;0&nbsp;211</td>
                <td>#9400D3</td>
                <td style="background-color: darkviolet">&nbsp;</td>
                <td>darkviolet</td></tr>
              <tr>
                <td>255&nbsp;&nbsp;20&nbsp;147</td>
                <td>#FF1493</td>
                <td style="background-color: deeppink">&nbsp;</td>
                <td>deeppink</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;191&nbsp;255</td>
                <td>#00BFFF</td>
                <td style="background-color: deepskyblue">&nbsp;</td>
                <td>deepskyblue</td></tr>
              <tr>
                <td>105&nbsp;105&nbsp;105</td>
                <td>#696969</td>
                <td style="background-color: dimgray">&nbsp;</td>
                <td>dimgray</td></tr>
              <tr>
                <td>&nbsp;30&nbsp;144&nbsp;255</td>
                <td>#1E90FF</td>
                <td style="background-color: dodgerblue">&nbsp;</td>
                <td>dodgerblue</td></tr>
              <tr>
                <td>178&nbsp;&nbsp;34&nbsp;&nbsp;34</td>
                <td>#B22222</td>
                <td style="background-color: firebrick">&nbsp;</td>
                <td>firebrick</td></tr>
              <tr>
                <td>255&nbsp;250&nbsp;240</td>
                <td>#FFFAF0</td>
                <td style="background-color: floralwhite">&nbsp;</td>
                <td>floralwhite</td></tr>
              <tr>
                <td>&nbsp;34&nbsp;139&nbsp;&nbsp;34</td>
                <td>#228B22</td>
                <td style="background-color: forestgreen">&nbsp;</td>
                <td>forestgreen</td></tr>
              <tr>
                <td>255&nbsp;&nbsp;&nbsp;0&nbsp;255</td>
                <td>#FF00FF</td>
                <td style="background-color: fuchsia">&nbsp;</td>
                <td>fuchsia</td></tr>
              <tr>
                <td>220&nbsp;220&nbsp;220</td>
                <td>#DCDCDC</td>
                <td style="background-color: gainsboro">&nbsp;</td>
                <td>gainsboro</td></tr>
              <tr>
                <td>248&nbsp;248&nbsp;255</td>
                <td>#F8F8FF</td>
                <td style="background-color: ghostwhite">&nbsp;</td>
                <td>ghostwhite</td></tr>
              <tr>
                <td>255&nbsp;215&nbsp;&nbsp;&nbsp;0</td>
                <td>#FFD700</td>
                <td style="background-color: gold">&nbsp;</td>
                <td>gold</td></tr>
              <tr>
                <td>218&nbsp;165&nbsp;&nbsp;32</td>
                <td>#DAA520</td>
                <td style="background-color: goldenrod">&nbsp;</td>
                <td>goldenrod</td></tr>
              <tr>
                <td>128&nbsp;128&nbsp;128</td>
                <td>#808080</td>
                <td style="background-color: gray">&nbsp;</td>
                <td>gray</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;128&nbsp;&nbsp;&nbsp;0</td>
                <td>#008000</td>
                <td style="background-color: green">&nbsp;</td>
                <td>green</td></tr>
              <tr>
                <td>173&nbsp;255&nbsp;&nbsp;47</td>
                <td>#ADFF2F</td>
                <td style="background-color: greenyellow">&nbsp;</td>
                <td>greenyellow</td></tr>
              <tr>
                <td>240&nbsp;255&nbsp;240</td>
                <td>#F0FFF0</td>
                <td style="background-color: honeydew">&nbsp;</td>
                <td>honeydew</td></tr>
              <tr>
                <td>255&nbsp;105&nbsp;180</td>
                <td>#FF69B4</td>
                <td style="background-color: hotpink">&nbsp;</td>
                <td>hotpink</td></tr>
              <tr>
                <td>205&nbsp;&nbsp;92&nbsp;&nbsp;92</td>
                <td>#CD5C5C</td>
                <td style="background-color: indianred">&nbsp;</td>
                <td>indianred</td></tr>
              <tr>
                <td>&nbsp;75&nbsp;&nbsp;&nbsp;0&nbsp;130</td>
                <td>#4B0082</td>
                <td style="background-color: indigo">&nbsp;</td>
                <td>indigo</td></tr>
              <tr>
                <td>255&nbsp;255&nbsp;240</td>
                <td>#FFFFF0</td>
                <td style="background-color: ivory">&nbsp;</td>
                <td>ivory</td></tr>
              <tr>
                <td>240&nbsp;230&nbsp;140</td>
                <td>#F0E68C</td>
                <td style="background-color: khaki">&nbsp;</td>
                <td>khaki</td></tr>
              <tr>
                <td>230&nbsp;230&nbsp;250</td>
                <td>#E6E6FA</td>
                <td style="background-color: lavender">&nbsp;</td>
                <td>lavender</td></tr>
              <tr>
                <td>255&nbsp;240&nbsp;245</td>
                <td>#FFF0F5</td>
                <td style="background-color: lavenderblush">&nbsp;</td>
                <td>lavenderblush</td></tr>
              <tr>
                <td>124&nbsp;252&nbsp;&nbsp;&nbsp;0</td>
                <td>#7CFC00</td>
                <td style="background-color: lawngreen">&nbsp;</td>
                <td>lawngreen</td></tr>
              <tr>
                <td>255&nbsp;250&nbsp;205</td>
                <td>#FFFACD</td>
                <td style="background-color: lemonchiffon">&nbsp;</td>
                <td>lemonchiffon</td></tr>
              <tr>
                <td>173&nbsp;216&nbsp;230</td>
                <td>#ADD8E6</td>
                <td style="background-color: lightblue">&nbsp;</td>
                <td>lightblue</td></tr>
              <tr>
                <td>240&nbsp;128&nbsp;128</td>
                <td>#F08080</td>
                <td style="background-color: lightcoral">&nbsp;</td>
                <td>lightcoral</td></tr>
              <tr>
                <td>224&nbsp;255&nbsp;255</td>
                <td>#E0FFFF</td>
                <td style="background-color: lightcyan">&nbsp;</td>
                <td>lightcyan</td></tr>
              <tr>
                <td>250&nbsp;250&nbsp;210</td>
                <td>#FAFAD2</td>
                <td style="background-color: lightgoldenrodyellow">&nbsp;</td>
                <td>lightgoldenrodyellow</td></tr>
              <tr>
                <td>144&nbsp;238&nbsp;144</td>
                <td>#90EE90</td>
                <td style="background-color: lightgreen">&nbsp;</td>
                <td>lightgreen</td></tr>
              <tr>
                <td>211&nbsp;211&nbsp;211</td>
                <td>#D3D3D3</td>
                <td style="background-color: lightgrey">&nbsp;</td>
                <td>lightgrey</td></tr>
              <tr>
                <td>255&nbsp;182&nbsp;193</td>
                <td>#FFB6C1</td>
                <td style="background-color: lightpink">&nbsp;</td>
                <td>lightpink</td></tr>
              <tr>
                <td>255&nbsp;160&nbsp;122</td>
                <td>#FFA07A</td>
                <td style="background-color: lightsalmon">&nbsp;</td>
                <td>lightsalmon</td></tr>
              <tr>
                <td>&nbsp;32&nbsp;178&nbsp;170</td>
                <td>#20B2AA</td>
                <td style="background-color: lightseagreen">&nbsp;</td>
                <td>lightseagreen</td></tr>
              <tr>
                <td>135&nbsp;206&nbsp;250</td>
                <td>#87CEFA</td>
                <td style="background-color: lightskyblue">&nbsp;</td>
                <td>lightskyblue</td></tr>
              <tr>
                <td>119&nbsp;136&nbsp;153</td>
                <td>#778899</td>
                <td style="background-color: lightslategray">&nbsp;</td>
                <td>lightslategray</td></tr>
              <tr>
                <td>176&nbsp;196&nbsp;222</td>
                <td>#B0C4DE</td>
                <td style="background-color: lightsteelblue">&nbsp;</td>
                <td>lightsteelblue</td></tr>
              <tr>
                <td>255&nbsp;255&nbsp;224</td>
                <td>#FFFFE0</td>
                <td style="background-color: lightyellow">&nbsp;</td>
                <td>lightyellow</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;255&nbsp;&nbsp;&nbsp;0</td>
                <td>#00FF00</td>
                <td style="background-color: lime">&nbsp;</td>
                <td>lime</td></tr>
              <tr>
                <td>&nbsp;50&nbsp;205&nbsp;&nbsp;50</td>
                <td>#32CD32</td>
                <td style="background-color: limegreen">&nbsp;</td>
                <td>limegreen</td></tr>
              <tr>
                <td>250&nbsp;240&nbsp;230</td>
                <td>#FAF0E6</td>
                <td style="background-color: linen">&nbsp;</td>
                <td>linen</td></tr>
              <tr>
                <td>255&nbsp;&nbsp;&nbsp;0&nbsp;255</td>
                <td>#FF00FF</td>
                <td style="background-color: magenta">&nbsp;</td>
                <td>magenta</td></tr>
              <tr>
                <td>128&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0</td>
                <td>#800000</td>
                <td style="background-color: maroon">&nbsp;</td>
                <td>maroon</td></tr>
              <tr>
                <td>102&nbsp;205&nbsp;170</td>
                <td>#66CDAA</td>
                <td style="background-color: mediumaquamarine">&nbsp;</td>
                <td>mediumaquamarine</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0&nbsp;205</td>
                <td>#0000CD</td>
                <td style="background-color: mediumblue">&nbsp;</td>
                <td>mediumblue</td></tr>
              <tr>
                <td>186&nbsp;&nbsp;85&nbsp;211</td>
                <td>#BA55D3</td>
                <td style="background-color: mediumorchid">&nbsp;</td>
                <td>mediumorchid</td></tr>
              <tr>
                <td>147&nbsp;112&nbsp;219</td>
                <td>#9370DB</td>
                <td style="background-color: mediumpurple">&nbsp;</td>
                <td>mediumpurple</td></tr>
              <tr>
                <td>&nbsp;60&nbsp;179&nbsp;113</td>
                <td>#3CB371</td>
                <td style="background-color: mediumseagreen">&nbsp;</td>
                <td>mediumseagreen</td></tr>
              <tr>
                <td>123&nbsp;104&nbsp;238</td>
                <td>#7B68EE</td>
                <td style="background-color: mediumslateblue">&nbsp;</td>
                <td>mediumslateblue</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;250&nbsp;154</td>
                <td>#00FA9A</td>
                <td style="background-color: mediumspringgreen">&nbsp;</td>
                <td>mediumspringgreen</td></tr>
              <tr>
                <td>&nbsp;72&nbsp;209&nbsp;204</td>
                <td>#48D1CC</td>
                <td style="background-color: mediumturquoise">&nbsp;</td>
                <td>mediumturquoise</td></tr>
              <tr>
                <td>199&nbsp;&nbsp;21&nbsp;133</td>
                <td>#C71585</td>
                <td style="background-color: mediumvioletred">&nbsp;</td>
                <td>mediumvioletred</td></tr>
              <tr>
                <td>&nbsp;25&nbsp;&nbsp;25&nbsp;112</td>
                <td>#191970</td>
                <td style="background-color: midnightblue">&nbsp;</td>
                <td>midnightblue</td></tr>
              <tr>
                <td>245&nbsp;255&nbsp;250</td>
                <td>#F5FFFA</td>
                <td style="background-color: mintcream">&nbsp;</td>
                <td>mintcream</td></tr>
              <tr>
                <td>255&nbsp;228&nbsp;225</td>
                <td>#FFE4E1</td>
                <td style="background-color: mistyrose">&nbsp;</td>
                <td>mistyrose</td></tr>
              <tr>
                <td>255&nbsp;228&nbsp;181</td>
                <td>#FFE4B5</td>
                <td style="background-color: moccasin">&nbsp;</td>
                <td>moccasin</td></tr>
              <tr>
                <td>255&nbsp;222&nbsp;173</td>
                <td>#FFDEAD</td>
                <td style="background-color: navajowhite">&nbsp;</td>
                <td>navajowhite</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0&nbsp;128</td>
                <td>#000080</td>
                <td style="background-color: navy">&nbsp;</td>
                <td>navy</td></tr>
              <tr>
                <td>253&nbsp;245&nbsp;230</td>
                <td>#FDF5E6</td>
                <td style="background-color: oldlace">&nbsp;</td>
                <td>oldlace</td></tr>
              <tr>
                <td>128&nbsp;128&nbsp;&nbsp;&nbsp;0</td>
                <td>#808000</td>
                <td style="background-color: olive">&nbsp;</td>
                <td>olive</td></tr>
              <tr>
                <td>107&nbsp;142&nbsp;&nbsp;35</td>
                <td>#6B8E23</td>
                <td style="background-color: olivedrab">&nbsp;</td>
                <td>olivedrab</td></tr>
              <tr>
                <td>255&nbsp;165&nbsp;&nbsp;&nbsp;0</td>
                <td>#FFA500</td>
                <td style="background-color: orange">&nbsp;</td>
                <td>orange</td></tr>
              <tr>
                <td>255&nbsp;&nbsp;69&nbsp;&nbsp;&nbsp;0</td>
                <td>#FF4500</td>
                <td style="background-color: orangered">&nbsp;</td>
                <td>orangered</td></tr>
              <tr>
                <td>218&nbsp;112&nbsp;214</td>
                <td>#DA70D6</td>
                <td style="background-color: orchid">&nbsp;</td>
                <td>orchid</td></tr>
              <tr>
                <td>238&nbsp;232&nbsp;170</td>
                <td>#EEE8AA</td>
                <td style="background-color: palegoldenrod">&nbsp;</td>
                <td>palegoldenrod</td></tr>
              <tr>
                <td>152&nbsp;251&nbsp;152</td>
                <td>#98FB98</td>
                <td style="background-color: palegreen">&nbsp;</td>
                <td>palegreen</td></tr>
              <tr>
                <td>175&nbsp;238&nbsp;238</td>
                <td>#AFEEEE</td>
                <td style="background-color: paleturquoise">&nbsp;</td>
                <td>paleturquoise</td></tr>
              <tr>
                <td>219&nbsp;112&nbsp;147</td>
                <td>#DB7093</td>
                <td style="background-color: palevioletred">&nbsp;</td>
                <td>palevioletred</td></tr>
              <tr>
                <td>255&nbsp;239&nbsp;213</td>
                <td>#FFEFD5</td>
                <td style="background-color: papayawhip">&nbsp;</td>
                <td>papayawhip</td></tr>
              <tr>
                <td>255&nbsp;218&nbsp;185</td>
                <td>#FFDAB9</td>
                <td style="background-color: peachpuff">&nbsp;</td>
                <td>peachpuff</td></tr>
              <tr>
                <td>205&nbsp;133&nbsp;&nbsp;63</td>
                <td>#CD853F</td>
                <td style="background-color: peru">&nbsp;</td>
                <td>peru</td></tr>
              <tr>
                <td>255&nbsp;192&nbsp;203</td>
                <td>#FFC0CB</td>
                <td style="background-color: pink">&nbsp;</td>
                <td>pink</td></tr>
              <tr>
                <td>221&nbsp;160&nbsp;221</td>
                <td>#DDA0DD</td>
                <td style="background-color: plum">&nbsp;</td>
                <td>plum</td></tr>
              <tr>
                <td>176&nbsp;224&nbsp;230</td>
                <td>#B0E0E6</td>
                <td style="background-color: powderblue">&nbsp;</td>
                <td>powderblue</td></tr>
              <tr>
                <td>128&nbsp;&nbsp;&nbsp;0&nbsp;128</td>
                <td>#800080</td>
                <td style="background-color: purple">&nbsp;</td>
                <td>purple</td></tr>
              <tr>
                <td>255&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;0</td>
                <td>#FF0000</td>
                <td style="background-color: red">&nbsp;</td>
                <td>red</td></tr>
              <tr>
                <td>188&nbsp;143&nbsp;143</td>
                <td>#BC8F8F</td>
                <td style="background-color: rosybrown">&nbsp;</td>
                <td>rosybrown</td></tr>
              <tr>
                <td>&nbsp;65&nbsp;105&nbsp;225</td>
                <td>#4169E1</td>
                <td style="background-color: royalblue">&nbsp;</td>
                <td>royalblue</td></tr>
              <tr>
                <td>139&nbsp;&nbsp;69&nbsp;&nbsp;19</td>
                <td>#8B4513</td>
                <td style="background-color: saddlebrown">&nbsp;</td>
                <td>saddlebrown</td></tr>
              <tr>
                <td>250&nbsp;128&nbsp;114</td>
                <td>#FA8072</td>
                <td style="background-color: salmon">&nbsp;</td>
                <td>salmon</td></tr>
              <tr>
                <td>244&nbsp;164&nbsp;&nbsp;96</td>
                <td>#F4A460</td>
                <td style="background-color: sandybrown">&nbsp;</td>
                <td>sandybrown</td></tr>
              <tr>
                <td>&nbsp;46&nbsp;139&nbsp;&nbsp;87</td>
                <td>#2E8B57</td>
                <td style="background-color: seagreen">&nbsp;</td>
                <td>seagreen</td></tr>
              <tr>
                <td>255&nbsp;245&nbsp;238</td>
                <td>#FFF5EE</td>
                <td style="background-color: seashell">&nbsp;</td>
                <td>seashell</td></tr>
              <tr>
                <td>160&nbsp;&nbsp;82&nbsp;&nbsp;45</td>
                <td>#A0522D</td>
                <td style="background-color: sienna">&nbsp;</td>
                <td>sienna</td></tr>
              <tr>
                <td>192&nbsp;192&nbsp;192</td>
                <td>#C0C0C0</td>
                <td style="background-color: silver">&nbsp;</td>
                <td>silver</td></tr>
              <tr>
                <td>135&nbsp;206&nbsp;235</td>
                <td>#87CEEB</td>
                <td style="background-color: skyblue">&nbsp;</td>
                <td>skyblue</td></tr>
              <tr>
                <td>106&nbsp;&nbsp;90&nbsp;205</td>
                <td>#6A5ACD</td>
                <td style="background-color: slateblue">&nbsp;</td>
                <td>slateblue</td></tr>
              <tr>
                <td>112&nbsp;128&nbsp;144</td>
                <td>#708090</td>
                <td style="background-color: slategray">&nbsp;</td>
                <td>slategray</td></tr>
              <tr>
                <td>255&nbsp;250&nbsp;250</td>
                <td>#FFFAFA</td>
                <td style="background-color: snow">&nbsp;</td>
                <td>snow</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;255&nbsp;127</td>
                <td>#00FF7F</td>
                <td style="background-color: springgreen">&nbsp;</td>
                <td>springgreen</td></tr>
              <tr>
                <td>&nbsp;70&nbsp;130&nbsp;180</td>
                <td>#4682B4</td>
                <td style="background-color: steelblue">&nbsp;</td>
                <td>steelblue</td></tr>
              <tr>
                <td>210&nbsp;180&nbsp;140</td>
                <td>#D2B48C</td>
                <td style="background-color: tan">&nbsp;</td>
                <td>tan</td></tr>
              <tr>
                <td>&nbsp;&nbsp;0&nbsp;128&nbsp;128</td>
                <td>#008080</td>
                <td style="background-color: teal">&nbsp;</td>
                <td>teal</td></tr>
              <tr>
                <td>216&nbsp;191&nbsp;216</td>
                <td>#D8BFD8</td>
                <td style="background-color: thistle">&nbsp;</td>
                <td>thistle</td></tr>
              <tr>
                <td>255&nbsp;&nbsp;99&nbsp;&nbsp;71</td>
                <td>#FF6347</td>
                <td style="background-color: tomato">&nbsp;</td>
                <td>tomato</td></tr>
              <tr>
                <td>&nbsp;64&nbsp;224&nbsp;208</td>
                <td>#40E0D0</td>
                <td style="background-color: turquoise">&nbsp;</td>
                <td>turquoise</td></tr>
              <tr>
                <td>238&nbsp;130&nbsp;238</td>
                <td>#EE82EE</td>
                <td style="background-color: violet">&nbsp;</td>
                <td>violet</td></tr>
              <tr>
                <td>245&nbsp;222&nbsp;179</td>
                <td>#F5DEB3</td>
                <td style="background-color: wheat">&nbsp;</td>
                <td>wheat</td></tr>
              <tr>
                <td>255&nbsp;255&nbsp;255</td>
                <td>#FFFFFF</td>
                <td style="background-color: white">&nbsp;</td>
                <td>white</td></tr>
              <tr>
                <td>245&nbsp;245&nbsp;245</td>
                <td>#F5F5F5</td>
                <td style="background-color: whitesmoke">&nbsp;</td>
                <td>whitesmoke</td></tr>
              <tr>
                <td>255&nbsp;255&nbsp;&nbsp;&nbsp;0</td>
                <td>#FFFF00</td>
                <td style="background-color: yellow">&nbsp;</td>
                <td>yellow</td></tr>
              <tr>
                <td>154&nbsp;205&nbsp;&nbsp;50</td>
                <td>#9ACD32</td>
                <td style="background-color: yellowgreen">&nbsp;</td>
                <td>yellowgreen</td></tr>
        </tbody>
      </table>

    </div>
  </div><!-- /row -->
</section>

    </div><!-- /container -->

    <footer class="footer-cg">
      <div class="container">
        <p class="pull-right"><a href="#overview">Back to top</a></p>
        <p>
          Designed and built  Naumov Aleksandr <script type="text/javascript">t='.com';document.write("<a href='mailto:inet" + "lover@g"+"mail"+t+"'>inet" + "lover@gma"+"il"+t+"</a>");</script><br />
          Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.
        </p>
      </div>
    </footer>

    <!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script-->

  </body>
</html>
