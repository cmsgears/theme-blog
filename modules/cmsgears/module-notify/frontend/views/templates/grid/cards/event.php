<?php
// Yii Imports
use yii\helpers\Html;

// Config
$dataProvider	= $widget->dataProvider;
$models			= $dataProvider->getModels();

$columns	= count( $widget->cardColumns ) > 0 ? $widget->cardColumns : $widget->gridColumns;
$actions	= $widget->actions;

$actionView = $widget->actionView;
?>
<div class="grid-cards-wrap <?= $widget->layout == 'card' ? 'active' : null ?>">
	<div class="grid-cards row">
		<?php

			if( count( $models ) > 0 ) {

				$gridCards	= $widget->gridCards;
				$root		= $gridCards[ 'root' ];
				$factor		= $gridCards[ 'factor' ];

				foreach( $models as $model ) {

					$id		= $model->id;
					$index	= 0;
					$banner	= $model->banner;
		?>
			<div class="card card-basic card-event <?= $root . $factor ?>">
				<div class="card-content-wrap">
					<div class="card-header">
						<div class="card-bkg align align-center" style="<?= isset( $banner ) ? 'background-image:url(' . $banner->getFileUrl() . ')' : null ?>">
							<?php if( empty( $banner ) && !empty( $model->icon ) ) { ?>
								<i class="<?= $model->icon ?> valign-center"></i>
							<?php } ?>
						</div>
						<div class="card-header-trigger">
							<i class="cmti cmti-list"></i>
						</div>
						<div class="card-header-actions actions">
							<?php if( $model->isEditable() ) { ?>
								<p class="action"><?= Html::a( "Update", [ "update?id=$model->id" ] ) ?></p>
							<?php } ?>
							<p class="action action-pop action-delete" title="Delete" target="<?= $model->id ?>" popup="popup-grid-delete">Delete</p>
						</div>
					</div>
					<div class="card-content cscroller">
						<div class="card-content-title">
							<?= $model->name ?>
						</div>
						<div class="card-content-summary reader">
							<?= $model->description ?>
						</div>
						<div class="card-content-data reader">
							<?= $model->content ?>
						</div>
					</div>
					<div class="card-footer row">
						<div class="card-footer-info col col3x2 bold">
							<?= date( 'F d, Y - g:i:s A', strtotime( $model->scheduledAt ) ) ?>
						</div>
						<div class="card-footer-actions col col3 align align-right">
							<span class="data cmt-choice">
								<label>
									<input class="grid-bulk-single grid-bulk-<?= $id ?>" type="checkbox" data-id=<?= $id ?> />
									<span class="label cmti cmti-checkbox"></span>
								</label>
							</span>
						</div>
					</div>
				</div>
			</div>
		<?php } } ?>
	</div>
</div>
