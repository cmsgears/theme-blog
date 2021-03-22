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
$this->title = 'Activities | ' . $coreProperties->getSiteTitle();

// Sidebar
//$this->context->sidebar	= [ 'parent' => 'sidebar-dashboard' ];

// Breadcrumbs
$this->context->breadcrumbs	= [
	'base' => [ [ 'label' => 'Home', 'url' =>  Url::toRoute( [ '/home' ], true ) ] ],
	'all' => [ [ 'label' => 'Activities' ] ]
];
?>
<?= DataGrid::widget([
	'dataProvider' => $dataProvider, 'add' => false, 'addUrl' => 'create', 'data' => [ ],
	'title' => 'Activities', 'options' => [ 'class' => 'grid-data grid-data-default' ],
	'searchColumns' => [ 'title' => 'Title', 'desc' => 'Description', 'content' => 'Content' ],
	'sortColumns' => [
		'title' => 'Title',
		'cdate' => 'Created At', 'udate' => 'Updated At'
	],
	'filters' => [],
	'reportColumns' => [
		'title' => [ 'title' => 'Title', 'type' => 'text' ],
		'desc' => [ 'title' => 'Description', 'type' => 'text' ],
		'content' => [ 'title' => 'Content', 'type' => 'text' ]
	],
	'bulkPopup' => 'popup-grid-bulk',
	'bulkActions' => [],
	'header' => false, 'footer' => true,
	'grid' => true, 'columns' => [ 'root' => 'colf colf15', 'factor' => [ null, 'x3', 'x11' ] ],
	'gridColumns' => [
		'bulk' => 'Action',
		'title' => [ 'title' => 'Title', 'generate' => function( $model ) {
			$title	= isset( $model->link ) ? "<a href='" . Url::to( [ $model->link ], true) . "'>$model->title</a>" : $model->title;
			$date	= date( 'F d, Y', strtotime( $model->createdAt ) );

			return "<p class=\"bold\">$title</p><p>$date</p>";
		}],
		'content' => [ 'title' => 'Content', 'generate' => function( $model ) {
			return !empty( $model->description ) ? "<p class=\"bold\">{$model->description}</p><p>{$model->content}</p>" : $model->content;
		}]
	],
	'gridCards' => [ 'root' => 'col col12', 'factor' => 'x3' ],
	'templateDir' => "$breezeTemplates/grid", 'template' => 'default',
	//'dataView' => "$moduleTemplates/grid/data/activity",
	//'cardView' => "$moduleTemplates/grid/cards/activity",
	'actionView' => "$moduleTemplates/grid/actions/activity"
]) ?>

<?= Popup::widget([
	'title' => 'Apply Bulk Action', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/popup/grid/default"  ), 'template' => 'bulk',
	'data' => [ 'model' => 'Activity', 'app' => 'grid', 'controller' => 'crud', 'action' => 'bulk', 'url' => "$apixBase/bulk" ]
])?>

<?= Popup::widget([
	'title' => 'Delete Activity', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$breezeTemplates/popup/grid/default" ), 'template' => 'delete',
	'data' => [ 'model' => 'Activity', 'app' => 'grid', 'controller' => 'crud', 'action' => 'delete', 'url' => "$apixBase/delete?id=" ]
])?>
