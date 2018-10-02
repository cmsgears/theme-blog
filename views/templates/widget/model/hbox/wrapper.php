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
			<div class="card-list-wrap-title margin margin-bottom-small"><?= $headerTitle ?></div><hr />
		<?php } ?>
		<?= $modelsHtml ?>
	</div>

	<?php if( $widget->pagination && $widget->paging && !empty( $widget->pageLinks ) ) { ?>
		<div class="filler-height filler-height-medium"></div>
		<div class="pagination pagination-full clearfix">
			<div class="page-info">
				<?php //$widget->pageInfo ?>
			</div>
			<div class="page-links">
				<?= $widget->pageLinks ?>
			</div>
		</div>
	<?php } ?>

<?php } ?>
