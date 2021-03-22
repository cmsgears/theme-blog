<?php
// Yii Imports
use yii\helpers\Url;

// Config
$coreProperties		= $this->context->getCoreProperties();
$themeTemplates		= Yii::getAlias( '@themeTemplates' );
$breezeTemplates	= Yii::getAlias( '@breeze/templates' );

$mobileRequired	= false;
$intlTelInput	= true;
$intlTelCcode	= 'us';

$frmSpinner = "$themeTemplates/components/spinners/form.php";

$apixBase = 'user';

// Page
$this->title = 'Profile | ' . $coreProperties->getSiteTitle();

// Sidebar
$this->context->sidebar	= [ 'parent' => 'sidebar-profile' ];

// Breadcrumbs
$this->context->breadcrumbs	= [
	'base' => [ [ 'label' => 'Home', 'url' =>  Url::toRoute( [ '/home' ], true ) ] ],
	'profile' => [ [ 'label' => 'Profile' ] ]
];

// Model
$model = $user;

// Addresses
$modelAddresses = $user->modelAddresses;
$searchCity		= true;
?>
<div class="data-crud-wrap">
	<div class="data-crud-wrap-main">
		<div class="cmt-tabs tabs tabs-underline">
			<div class="tab-links-wrap">
				<span class="tab-link" target="#tab-content-basic">Basic</span>
				<span class="tab-link" target="#tab-content-account">Account</span>
				<span class="tab-link" target="#tab-content-address">Address</span>
			</div>
			<div class="tab-content-wrap">
				<div id="tab-content-basic" class="tab-content">
					<?php include "$breezeTemplates/components/user/profile.php"; ?>
				</div>
				<div id="tab-content-account" class="tab-content">
					<?php include "$breezeTemplates/components/user/settings/password.php"; ?>
				</div>
				<div id="tab-content-address" class="tab-content">
					<?php include "$breezeTemplates/components/address/card.php"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
