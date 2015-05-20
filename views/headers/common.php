<?php
use yii\helpers\Html;
use yii\helpers\Url;
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
	            <li><a href="<?= Url::toRoute( ["/"] ) ?>">HOME</a></li>
	            <li><a href="<?= Url::toRoute( ["/blog"] ) ?>">BLOG</a></li>	  
			</ul>
		</div> 
	</div>  
</header>
