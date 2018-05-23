<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\elements\Nav;

// SF Imports
use themes\blog\Theme;
?>
<header class="header header-basic header-landing header-fixed shadow shadow-primary">
	<div class="header-logo">
		<div class="logo valign-center">
			<?= Html::a( "<img class=\"fluid\" src=\"" . Yii::getAlias( '@images' ) . "/logo.png\">", [ '/' ], null ) ?>
		</div>
	</div>
	<div id="btn-menu-mobile">
		<i class="cmti cmti-menu cmti-action"></i>
	</div>
	<?= Nav::widget([
		'view' => $this, 'slug' => Theme::MENU_MAIN,
		'options' => [ 'id' => 'menu-main-mobile', 'class' => 'vnav uppercase' ]
	])?>
</header>
<div class="menu-main-wrap row row-xlarge">
	<?= Nav::widget([
		'view' => $this, 'slug' => Theme::MENU_MAIN,
		'options' => [ 'id' => 'menu-main', 'class' => 'nav uppercase' ]
	])?>
</div>
