<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

use cmsgears\files\widgets\AvatarUploader;

// Sidebar
$sidebar	= $this->context->sidebar;
$parent		= isset( $sidebar[ 'parent' ] ) ? $sidebar[ 'parent' ] : '';
$child		= isset( $sidebar[ 'child' ] ) ? $sidebar[ 'child' ] : '';

// User Settings
$user			= Yii::$app->core->getUser();
$microSidebar	= $user->getDataConfigMeta( CoreGlobal::DATA_SIDEBAR_MICRO );
?>
<div id="sidebar-main" class="sidebar sidebar-main <?= isset( $microSidebar ) && $microSidebar ? 'sidebar-main-micro' : null ?>">
	<div id="btn-sidebar-close" class="btn-sidebar-main align align-center">
		<i class="icon fa fas fa-window-close"></i>
	</div>
	<div class="collapsible-menu-wrap">
		<div class="collapsible-menu-scroller cscroller">
			<div class="collapsible-menu collapsible-menu-sidebar">
				<div class="collapsible-tab">
					<?= AvatarUploader::widget([
						'model' => $user->avatar,
						'postAction' => true, 'postActionUrl' => "user/assign-avatar?id=$user->id",
						'clearAction' => true, 'clearActionUrl' => "user/clear-avatar?id=$user->id",
						'cmtController' => 'user', 'cmtAction' => 'assignAvatar', 'cmtClearAction' => 'clearAvatar',
						'info' => true, 'fields' => false, 'dragger' => true
					])?>
				</div>
				<div id="sidebar-dasboard" class="collapsible-tab <?= strcmp( $parent, 'sidebar-dashboard' ) == 0 ? 'active' : null ?>">
					<span class="marker"></span>
					<div class="tab-header">
						<a href="<?= Url::toRoute( [ '/home' ] ) ?>">
							<div class="tab-icon"><span class="cmti cmti-dashboard"></span></div>
							<div class="tab-title">Dashboard</div>
						</a>
					</div>
				</div>
				<div id="sidebar-profile" class="collapsible-tab <?= strcmp( $parent, 'sidebar-profile' ) == 0 ? 'active' : null ?>">
					<span class="marker"></span>
					<div class="tab-header">
						<a href="<?= Url::toRoute( [ '/profile' ] ) ?>">
							<div class="tab-icon"><span class="cmti cmti-user-full"></span></div>
							<div class="tab-title">Profile</div>
						</a>
					</div>
				</div>
				<div id="sidebar-settings" class="collapsible-tab <?= strcmp( $parent, 'sidebar-settings' ) == 0 ? 'active' : null ?>">
					<span class="marker"></span>
					<div class="tab-header">
						<a href="<?= Url::toRoute( [ '/settings' ] ) ?>">
							<div class="tab-icon"><span class="cmti cmti-setting"></span></div>
							<div class="tab-title">Settings</div>
						</a>
					</div>
				</div>
				<div id="sidebar-calendar" class="collapsible-tab <?= strcmp( $parent, 'sidebar-calendar' ) == 0 ? 'active' : null ?>">
					<span class="marker"></span>
					<div class="tab-header">
						<a href="<?= Url::toRoute( [ '/notify/calendar/full' ] ) ?>">
							<div class="tab-icon"><span class="cmti cmti-calendar"></span></div>
							<div class="tab-title">Calendar</div>
						</a>
					</div>
				</div>
				<div class="collapsible-tab" id="btn-logout">
					<span class="marker"></span>
					<div class="tab-header">
						<a href="<?php echo Url::toRoute( [ '/core/site/logout' ] ); ?>" class="clearfix">
							<div class="tab-icon"><span class="cmti cmti-power"></span></div>
							<div class="tab-title">Logout</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="btn-sidebar-main" class="btn-sidebar-main">
		<div class="sidebar-trigger-expanded">
			<i class="icon fa fas fa-angle-double-left"></i>
			<span class="inline-block padding padding-left-default">Collapse</span>
		</div>
		<div class="sidebar-trigger-collapsed align align-center">
			<i class="icon fa fas fa-angle-double-right"></i>
		</div>
	</div>
</div>
