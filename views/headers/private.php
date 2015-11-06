<?php
use \Yii;
use yii\helpers\Html;

use cmsgears\widgets\nav\BasicNav;

$privateMenuItems = [
	    [ 'label' => 'Home', 'url' => ['/home'] ],
	    [ 'label' => 'Settings', 'url' => ['#'], 'options' => [ 'id' => 'btn-settings' ] ]
	];

$privateMenuItemsMobile = [
	    [ 'label' => 'Home', 'url' => ['/home'] ],
	    [ 'label' => 'Settings', 'url' => ['#'], 'options' => [ 'id' => 'btn-settings-mobile' ] ]
	];

$settingsMenuItems = [
	    [ 'label' => 'Profile', 'url' => ['/profile'] ],
	    [ 'label' => 'Logout', 'url' => ['/logout'] ]
	];
?>
<header id="header-main" class="header-main content-80 max-cols clearfix">
	<a id="nav-mobile-icon" class="cmti cmti-2x cmti-list"></a>
	<div class="colf12x3">
		<?=Html::a( "<img class='fluid logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/' ], null )?>
	</div>
	<div class="colf12x9">
		<div class="nav-main stick-bottom">
			<?= BasicNav::widget([
	                'options' => [ 'class' => 'nav' ],
	                'items' => $privateMenuItems
	            ]);
			?>
		</div>
	</div>
	<?= BasicNav::widget([
            'options' => [ 'id' => 'nav-mobile', 'class' => 'nav nav-mobile' ],
            'items' => $privateMenuItemsMobile
        ]);
	?>
	<div id="box-settings" class='popout-header'>
		<?= BasicNav::widget([
                'options' => [ 'class' => 'nav-settings' ],
                'items' => $settingsMenuItems
            ]);
		?>
	</div>
</header>