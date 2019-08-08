<?php
// Yii Imports
use yii\helpers\Url;

// Config
$coreProperties		= $this->context->getCoreProperties();
$themeTemplates		= Yii::getAlias( '@themeTemplates' );
$breezeTemplates	= Yii::getAlias( '@breeze/templates' );

$frmSpinner = "$themeTemplates/components/form-spinner.php";

$apixBase	= 'user';
$returnUrl	= $this->context->returnUrl;

// Page
$this->title = 'Calendar Events | ' . $coreProperties->getSiteName();

// Sidebar
$this->context->sidebar	= [ 'parent' => 'sidebar-calendar' ];

// Breadcrumbs
$this->context->breadcrumbs	= [
	'base' => [
		[ 'label' => 'Home', 'url' =>  Url::toRoute( [ '/home' ], true ) ],
		[ 'label' => 'Calendar', 'url' =>  $this->context->returnUrl ]
	],
	'full' => [ [ 'label' => 'All Events' ] ]
];
?>
<div class="data-crud-wrap">
	<div class="data-crud-wrap-main">
		<?php include "$breezeTemplates/components/event/card.php"; ?>
	</div>
</div>
