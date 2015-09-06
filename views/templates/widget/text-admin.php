<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin( [ 'id' => 'frm-widget-meta', 'options' => ['class' => 'frm-split' ] ] );?>

<?= $form->field( $model, 'data[title]' )->label( 'Title' ); ?>
<?= $form->field( $model, 'data[content]' )->label( 'Content' ); ?>

<div class="box-filler"></div>

<?=Html::a( "Cancel", [ '/cmgcms/widget/all' ], ['class' => 'btn' ] );?>
<input type="submit" value="Update" />

<?php ActiveForm::end(); ?>