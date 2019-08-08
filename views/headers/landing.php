<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\elements\Nav;

// Blog Imports
use themes\blog\Theme;

$banner			= Yii::$app->core->site->banner;
$headerClass	= isset( $banner ) ? 'header-basic header-landing header-banner' : 'header-basic header-landing header-banner-no';
?>
<header class="header <?= $headerClass ?> shadow shadow-primary">
	<?php if( isset( $banner ) ) { ?>
		<div class="max-area bkg-image layer" style="background-image:url(<?= $banner->getFileUrl() ?>);"></div>
		<div class="texture texture-black layer layer-1"></div>
	<?php } ?>
	<div class="row layer layer-2">
		<div class="header-logo">
			<div class="logo">
				<?= Html::a( "<img src=\"" . Yii::getAlias( '@images' ) . "/logo.png\">", [ '/' ], null ) ?>
			</div>
		</div>
		<div id="mobile-actions">
			<span id="btn-menu-mobile" class="mobile-action">
				<i class="cmti cmti-menu"></i>
			</span>
		</div>
	</div>
	<div id="menu-mobile-wrap" class="relative">
		<?= Nav::widget([
			'view' => $this, 'slug' => Theme::MENU_MAIN,
			'options' => [ 'id' => 'menu-main-mobile', 'class' => 'vnav uppercase' ]
		])?>
	</div>
</header>
<div class="menu-main-wrap row row-xlarge">
	<?= Nav::widget([
		'view' => $this, 'slug' => Theme::MENU_MAIN,
		'options' => [ 'id' => 'menu-main', 'class' => 'nav uppercase' ]
	])?>
</div>
