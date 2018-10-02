<?php
// Yii Imports
use yii\helpers\Html;

$model	= $widget->widgetObj;
$data	= json_decode( $model->data );

$settings = isset( $data->settings ) ? $data->settings : [];

$header			= !empty( $settings->header ) ? $settings->header : false;
$headerTitle	= !empty( $settings->headerTitle ) && $settings->headerTitle && !empty( $model->displayName ) ? $model->displayName : $widget->title;
?>

<?php if( strlen( $modelsHtml ) > 0 ) { ?>

	<div <?= Html::renderTagAttributes( $widget->wrapperOptions ) ?>>
		<?php if( $header && !empty( $headerTitle ) ) { ?>
			<div class="card-page-wrap-title"><?= $headerTitle ?></div>
		<?php } ?>
		<?= $modelsHtml ?>
	</div>

<?php } ?>
