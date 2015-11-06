<?php
use yii\helpers\Html;
use yii\helpers\Url;

use cmsgears\widgets\dnav\DynamicNav;
?>
<header id="header-main" class="header-main content-80 max-cols clearfix">
	<a id="nav-mobile-icon" class="cmti cmti-2x cmti-list"></a>
	<div class="colf12x3">
		<?=Html::a( "<img class='fluid logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/' ], null )?>
	</div>
	<div class="colf12x9">
		<div class="nav-main stick-bottom">			
			<?=DynamicNav::widget( [ 'view' => $this, 'options' => [ 'class' => 'nav' ] ] );?>
		</div>
	</div>
	<?=DynamicNav::widget( [ 'view' => $this, 'options' => [ 'id' => 'nav-mobile', 'class' => 'nav nav-mobile' ] ] );?>
</header>