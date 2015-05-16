<?php
use yii\helpers\Html;
use cmsgears\core\widgets\AjaxLogin;
?>
<header id="header" class="header-main">
	<div class="header-desktop clearfix">
		<div class="colf12x3 logo">
			<?=Html::a( "<img class='fluid' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/' ], null )?>
		</div>
		<div class="colf12x9 wrap-nav">
			<a class="fa fa-bars mobile-nav-icon"></a>			
			<ul class="nav-main">
	            <li><a>HOME</a></li>
	            <li><a>BLOG</a></li>
	            <li><a>PORTFOLIO</a></li> 
	            <li><a>CONTACT US</a></li>
			</ul>
		</div> 
	</div>  
</header>
