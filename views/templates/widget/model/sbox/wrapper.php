<?php
// Yii Imports
use yii\helpers\Html;

$model	= $widget->widgetObj;
$data	= json_decode( $model->data );
?>

<?php if( strlen( $modelsHtml ) > 0 ) { ?>

	<div <?= Html::renderTagAttributes( $widget->wrapperOptions ) ?>>
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
