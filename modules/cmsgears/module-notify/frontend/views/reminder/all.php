<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\popup\Popup;
use cmsgears\widgets\grid\DataGrid;

// Config
$coreProperties = $this->context->getCoreProperties();
$apixBase		= $this->context->apixBase;

// Page
$this->title = 'Reminders | ' . $coreProperties->getSiteName();

// Sidebar
//$this->context->sidebar	= [ 'parent' => 'sidebar-dashboard' ];

// Breadcrumbs
$this->context->breadcrumbs	= [
	'base' => [ [ 'label' => 'Home', 'url' =>  Url::toRoute( [ '/home' ], true ) ] ],
	'all' => [ [ 'label' => 'Reminders' ] ]
];

// View Templates
$moduleTemplates	= '@themes/basic/modules/cmsgears/module-notify/frontend/views/templates';
$breezeTemplates	= '@breeze/templates/widget/native';
?>
<?= DataGrid::widget([
	'dataProvider' => $dataProvider, 'add' => false, 'addUrl' => 'create', 'data' => [ ],
	'title' => 'Reminders', 'options' => [ 'class' => 'grid-data grid-data-default' ],
	'searchColumns' => [ 'title' => 'Title', 'desc' => 'Description', 'content' => 'Content' ],
	'sortColumns' => [
		'title' => 'Title',
		'consumed' => 'Read', 'trash' => 'Trash',
		'cdate' => 'Created At', 'udate' => 'Updated At'
	],
	'filters' => [
		'consumed' => [ 'new' => 'New', 'read' => 'Read' ],
		'trash' => [ 'trash' => 'Trash' ]
	],
	'reportColumns' => [
		'title' => [ 'title' => 'Title', 'type' => 'text' ],
		'desc' => [ 'title' => 'Description', 'type' => 'text' ],
		'content' => [ 'title' => 'Content', 'type' => 'text' ],
		'consumed' => [ 'title' => 'Read', 'type' => 'flag' ],
		'trash' => [ 'title' => 'Trash', 'type' => 'flag' ]
	],
	'bulkPopup' => 'popup-grid-bulk',
	'bulkActions' => [
		'consumed' => [ 'new' => 'New', 'read' => 'Read' ],
		'trash' => [ 'trash' => 'Trash' ],
		'model' => [ 'delete' => 'Delete' ]
	],
	'header' => false, 'footer' => true,
	'grid' => true, 'columns' => [ 'root' => 'colf colf15', 'factor' => [ null, 'x3', 'x3', 'x7', null ] ],
	'gridColumns' => [
		'bulk' => 'Action',
		'event' => [ 'title' => 'Event', 'generate' => function( $model ) {
			$event	= $model->event;
			$title	= $event->name;
			$date	= date( 'F d, Y', strtotime( $event->scheduledAt ) );

			return "<p class=\"bold\">$title</p><p>$date</p>";
		}],
		'reminder' => [ 'title' => 'Reminder', 'generate' => function( $model ) {
			$title	= isset( $model->link ) ? "<a href='" . Url::to( [ $model->link ], true) . "'>$model->title</a>" : $model->title;

			return "<p class=\"bold\">$title</p>";
		}],
		'content' => [ 'title' => 'Content', 'generate' => function( $model ) {
			return !empty( $model->description ) ? "<p class=\"bold\">{$model->description}</p><p>{$model->content}</p>" : $model->content;
		}],
		'actions' => 'Actions'
	],
	'gridCards' => [ 'root' => 'col col12', 'factor' => 'x3' ],
	'templateDir' => "$breezeTemplates/grid", 'template' => 'default',
	//'dataView' => "$moduleTemplates/grid/data/reminder",
	//'cardView' => "$moduleTemplates/grid/cards/reminder",
	'actionView' => "$moduleTemplates/grid/actions/reminder"
]) ?>

<?= Popup::widget([
	'title' => 'Apply Bulk Action', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/popup/grid/default"  ), 'template' => 'bulk',
	'data' => [ 'model' => 'Reminder', 'app' => 'grid', 'controller' => 'crud', 'action' => 'bulk', 'url' => "$apixBase/bulk" ]
])?>

<?= Popup::widget([
	'title' => 'Delete Reminder', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/popup/grid/default" ), 'template' => 'delete',
	'data' => [ 'model' => 'Reminder', 'app' => 'grid', 'controller' => 'crud', 'action' => 'delete', 'url' => "$apixBase/delete?id=" ]
])?>
