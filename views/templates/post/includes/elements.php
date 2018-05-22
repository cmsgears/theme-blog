<?php
// Yii Imports
use yii\helpers\ArrayHelper;

// CMG Imports
use cmsgears\widgets\elements\elements\ElementWidget;

$elements		= isset( $settings ) ? $settings->elements : true;
$elementType	= isset( $settings ) ? $settings->elementType : null;
?>

<?php if( $elements ) { ?>
	<div class="block-box-wrap <?= $boxWrapClass ?>">
		<?php
			$elements = $model->activeElements;

			if( !empty( $elementType ) ) {

				$telements	= Yii::$app->factory->get( 'elementService' )->getByType( $elementType );
				$elements	= ArrayHelper::merge( $elements, $telements );
			}

			foreach( $elements as $element ) {

				echo ElementWidget::widget( [ 'model' => $element ] );
			}
		?>
	</div>
<?php } ?>
