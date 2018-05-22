<?php
// Yii Imports
use yii\helpers\ArrayHelper;

// CMG Imports
use cmsgears\widgets\elements\blocks\BlockWidget;

$blocks		= isset( $settings ) ? $settings->blocks : true;
$blockType	= isset( $settings ) ? $settings->blockType : null;
?>

<?php
	if( $blocks ) {
?>
		<div class="block-wrap page-block-wrap">
<?php
		$blocks = $model->activeBlocks;

		if( !empty( $blockType ) ) {

			$tblocks	= Yii::$app->factory->get( 'blockService' )->getByType( $blockType );
			$blocks		= ArrayHelper::merge( $blocks, $tblocks );
		}

		foreach( $blocks as $block ) {

			echo BlockWidget::widget( [ 'model' => $block ] );
		}
?>
		</div>
<?php
	}
?>
