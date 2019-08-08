<?php
// Yii Imports
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\files\widgets\ImageUploader;
use cmsgears\icons\widgets\IconChooser;

use cmsgears\core\common\utilities\CodeGenUtil;
use cmsgears\core\common\utilities\DateUtil;

// Config
$coreProperties = $this->context->getCoreProperties();

$returnUrl = $this->context->returnUrl;

// Page
$this->title = 'Update Calendar Event | ' . $coreProperties->getSiteName();

// Sidebar
$this->context->sidebar	= [ 'parent' => 'sidebar-calendar' ];

// Breadcrumbs
$this->context->breadcrumbs	= [
	'base' => [
		[ 'label' => 'Home', 'url' =>  Url::toRoute( [ '/home' ], true ) ],
		[ 'label' => 'Calendar', 'url' =>  $this->context->returnUrl ]
	],
	'update' => [ [ 'label' => 'Update Event' ] ]
];

$countOptions = CodeGenUtil::getRange( 1, 5 );
?>
<div class="data-crud-wrap">
	<div class="data-crud-wrap-main">
		<div class="data-crud">
			<div class="data-crud-title">Add Calendar Event</div>
			<?php $form = ActiveForm::begin( [ 'id' => 'frm-calendar', 'options' => [ 'class' => 'form' ] ] ); ?>
			<div class="data-crud-form">
				<div class="row max-cols-50">
					<div class="col col2">
						<label>Banner</label>
						<?= ImageUploader::widget( [ 'model' => $banner ] ) ?>
					</div>
					<div class="col col2">
						<?= IconChooser::widget( [ 'model' => $model, 'options' => [ 'class' => 'icon-picker-wrap' ] ] ) ?>
					</div>
				</div>
				<div class="row max-cols-50">
					<div class="col col2">
						<?= $form->field( $model, 'name' ) ?>
					</div>
					<div class="col col2">
						<?= Yii::$app->formDesigner->getIconInput( $form, $model, 'scheduledAt', [ 'options' => [ 'class' => 'datetimepicker' ], 'right' => true, 'icon' => 'cmti cmti-calendar' ] ) ?>
					</div>
				</div>
				<div class="row max-cols-50">
					<div class="col col2">
						<?= $form->field( $model, 'description' )->textarea() ?>
					</div>
					<div class="col col2">
						<?= $form->field( $model, 'content' )->textarea()->label( 'Details' ) ?>
					</div>
				</div>
				<div class="row max-cols-50">
					<div class="col col4">
						<?= $form->field( $model, 'status' )->dropDownList( $statusMap, [ 'class' => 'cmt-select' ] ) ?>
					</div>
				</div>
			</div>
			<div class="bold text text-large-4 text-primary-l">Reminders before Event</div>
			<div class="filler-height filler-height-small"></div>
			<div class="data-crud-form">
				<div class="row max-cols-100">
					<div class="col col3">
						<?= $form->field( $model, 'preReminderCount' )->dropDownList( $countOptions, [ 'class' => 'cmt-select' ] )->label( 'Reminder Count' ) ?>
					</div>
					<div class="col col3">
						<?= $form->field( $model, 'preReminderInterval' )->label( 'Reminder Interval' ) ?>
					</div>
					<div class="col col3">
						<?= $form->field( $model, 'preIntervalUnit' )->dropDownList( DateUtil::$lowDurationMap, [ 'class' => 'cmt-select' ] )->label( 'Reminder Units' ) ?>
					</div>
				</div>
			</div>
			<div class="filler-height filler-height-small"></div>
			<div class="bold text text-large-4 text-primary-l">Reminders after Event</div>
			<div class="filler-height filler-height-small"></div>
			<div class="data-crud-form">
				<div class="row max-cols-100">
					<div class="col col3">
						<?= $form->field( $model, 'postReminderCount' )->dropDownList( $countOptions, [ 'class' => 'cmt-select' ] )->label( 'Reminder Count' ) ?>
					</div>
					<div class="col col3">
						<?= $form->field( $model, 'postReminderInterval' )->label( 'Reminder Interval' ) ?>
					</div>
					<div class="col col3">
						<?= $form->field( $model, 'postIntervalUnit' )->dropDownList( DateUtil::$lowDurationMap, [ 'class' => 'cmt-select' ] )->label( 'Reminder Units' ) ?>
					</div>
				</div>
			</div>
			<div class="filler-height filler-height-small"></div>
			<div class="data-crud-actions">
				<?= Html::a( 'Cancel', $returnUrl, [ 'class' => 'btn btn-small' ] ); ?>
				<input class="frm-element-small" type="submit" value="Update" />
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
