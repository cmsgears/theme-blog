<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\elements\Nav;

// Blog Imports
use themes\blog\Theme;
?>
<header id="header-main" class="header header-main header-basic header-basic-duo header-fixed shadow shadow-primary">
	<div class="row">
		<div class="header-logo">
			<div class="logo">
				<?= Html::a( "<img src=\"" . Yii::getAlias( '@images' ) . "/logo.png\">", [ '/' ], null ) ?>
			</div>
			<div class="logo-small">
				<?= Html::a( "<img src=\"" . Yii::getAlias( '@images' ) . "/logo-small.png\">", [ '/' ], null ) ?>
			</div>
		</div>
		<?= Nav::widget([
			'view' => $this, 'slug' => Theme::MENU_SECONDARY,
			'options' => [ 'id' => 'menu-main', 'class' => 'nav uppercase' ]
		])?>
		<div id="mobile-actions">
			<span id="btn-menu-mobile" class="mobile-action">
				<i class="cmti cmti-menu"></i>
			</span>
		</div>
	</div>
	<div id="menu-mobile-wrap" class="relative">
		<?= Nav::widget([
			'view' => $this, 'slug' => Theme::MENU_SECONDARY,
			'options' => [ 'id' => 'menu-main-mobile', 'class' => 'vnav uppercase' ]
		])?>
	</div>
</header>
