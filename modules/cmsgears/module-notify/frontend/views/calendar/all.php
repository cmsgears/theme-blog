<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\widgets\popup\Popup;
use cmsgears\widgets\grid\DataGrid;

// Config
$coreProperties		= $this->context->getCoreProperties();
$moduleTemplates	= '@themes/basic/modules/cmsgears/module-notify/frontend/views/templates';
$breezeTemplates	= '@breeze/templates/widget/native';

$apixBase = $this->context->apixBase;

// Page
$this->title = 'Calendar Events | ' . $coreProperties->getSiteName();

// Sidebar
$this->context->sidebar	= [ 'parent' => 'sidebar-calendar' ];

// Breadcrumbs
$this->context->breadcrumbs	= [
	'base' => [ [ 'label' => 'Home', 'url' =>  Url::toRoute( [ '/home' ], true ) ] ],
	'all' => [ [ 'label' => 'Calendar' ] ]
];
?>
<?= DataGrid::widget([
	'dataProvider' => $dataProvider, 'add' => true, 'addUrl' => 'add', 'data' => [ ],
	'title' => 'Calendar Events', 'options' => [ 'class' => 'grid-data grid-data-default' ],
	'searchColumns' => [ 'name' => 'Name', 'desc' => 'Description', 'content' => 'Content' ],
	'sortColumns' => [
		'name' => 'Name',
		'sdate' => 'Scheduled At', 'cdate' => 'Created At', 'udate' => 'Updated At'
	],
	'filters' => [
		'status' => [ 'new' => 'New', 'cancelled' => 'Cancelled', 'active' => 'Active', 'expired' => 'Expired' ]
	],
	'reportColumns' => [
		'name' => [ 'title' => 'Name', 'type' => 'text' ],
		'desc' => [ 'title' => 'Description', 'type' => 'text' ],
		'content' => [ 'title' => 'Content', 'type' => 'text' ],
		'status' => [ 'title' => 'Status', 'type' => 'select', 'options' => $statusMap ]
	],
	'bulkPopup' => 'popup-grid-bulk',
	'bulkActions' => [
		'status' => [ 'cancelled' => 'Cancel', 'active' => 'Activate' ],
		'model' => [ 'delete' => 'Delete' ]
	],
	'header' => false, 'footer' => true,
	'grid' => true, 'columns' => [ 'root' => 'colf colf15', 'factor' => [ null, 'x3', 'x10', null ] ],
	'gridColumns' => [
		'bulk' => 'Action',
		'name' => [ 'title' => 'Name', 'generate' => function( $model ) {
			$title	= $model->name;
			$date	= date( 'F d, Y', strtotime( $model->scheduledAt ) );

			return "<p class=\"bold\">$title</p><p>$date</p>";
		}],
		'content' => [ 'title' => 'Content', 'generate' => function( $model ) {
			return !empty( $model->description ) ? "<p class=\"bold\">{$model->description}</p><p>{$model->content}</p>" : $model->content;
		}],
		'actions' => 'Actions'
	],
	'gridCards' => [ 'root' => 'col col12', 'factor' => 'x4' ],
	'templateDir' => "$breezeTemplates/grid", 'template' => 'default',
	//'dataView' => "$moduleTemplates/grid/data/event",
	'cardView' => "$moduleTemplates/grid/cards/event",
	'actionView' => "$moduleTemplates/grid/actions/event",
	'headView' => "$moduleTemplates/grid/head/event"
]) ?>

<?= Popup::widget([
	'title' => 'Apply Bulk Action', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/popup/grid/default"  ), 'template' => 'bulk',
	'data' => [ 'model' => 'Event', 'app' => 'grid', 'controller' => 'crud', 'action' => 'bulk', 'url' => "$apixBase/bulk" ]
])?>

<?= Popup::widget([
	'title' => 'Delete Event', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/popup/grid/default" ), 'template' => 'delete',
	'data' => [ 'model' => 'Event', 'app' => 'grid', 'controller' => 'crud', 'action' => 'delete', 'url' => "$apixBase/delete?id=" ]
])?>
