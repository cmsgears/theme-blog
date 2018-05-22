<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\elements\Nav;

// SF Imports
use themes\blog\Theme;
?>
<header id="header-main" class="header header-basic header-public header-fixed shadow shadow-primary">
	<div class="header-logo">
		<div class="logo">
			<?= Html::a( "<img class=\"fluid\" src=\"" . Yii::getAlias( '@images' ) . "/logo.png\">", [ '/' ], null ) ?>
		</div>
		<div class="logo-small">
			<?= Html::a( "<img class=\"fluid\" class=\"hidden-easy\" src=\"" . Yii::getAlias( '@images' ) . "/logo-small.png\">", [ '/' ], null ) ?>
		</div>
	</div>
	<?= Nav::widget([
		'view' => $this, 'slug' => Theme::MENU_SECONDARY,
		'options' => [ 'id' => 'menu-main', 'class' => 'nav uppercase' ]
	])?>
	<div id="btn-menu-mobile">
		<i class="cmti cmti-menu cmti-action"></i>
	</div>
	<?= Nav::widget([
		'view' => $this, 'slug' => Theme::MENU_SECONDARY,
		'options' => [ 'id' => 'menu-main-mobile', 'class' => 'vnav uppercase' ]
	])?>
</header>
