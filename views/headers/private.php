<?php
// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\nav\BasicNav;

use cmsgears\core\common\utilities\CodeGenUtil;

$menuItems = [ [ 'label' => 'Dashboard', 'url' => [ '/home' ] ] ];

$user = Yii::$app->core->getUser();

$menuItems[] = [ 'label' => 'Profile', 'url' => [ '/profile' ] ];
$menuItems[] = [ 'label' => 'Settings', 'url' => [ '/settings' ] ];
$menuItems[] = [ 'label' => 'Calendar', 'url' => [ '/notify/calendar/full' ] ];
$menuItems[] = [ 'label' => 'Logout', 'url' => [ '/logout' ] ];

$breezeTemplates = Yii::getAlias( '@breeze/templates' );

$userAvatar		= isset( $user->avatar ) ? $user->avatar : null;
$avatarThumb	= CodeGenUtil::getImageThumbTag( $userAvatar, [ 'icon' => 'fa fa-user icon', 'class' => 'user-avatar' ] );
?>
<header id="header-main" class="header header-fixed header-private row">
	<div class="colf colf15x4 header-logo">
		<span id="btn-sidebar-mobile">
			<i class="cmti cmti-menu"></i>
		</span>
		<?= Html::a( "<img class=\"logo\" src=\"$resourceUrl/images/logo.png\">", [ '/' ], null ) ?>
	</div>
	<div class="colf colf15x11 header-menu">
		<div class="cmt-popout-group popout-group popout-group-main">
			<div class="popout-actions">
				<span cmt-app="notify" cmt-controller="notification" cmt-action="notificationData" action="notify/stats/stats?type=notification">
					<span class="popout-trigger cmt-auto-hide cmt-click" popout="popout-notification" title="Notifications" data-target="#popout-notification">
						<span class="cmti cmti-flag-o"></span>
						<span class="count-header count-notification">0</span>
					</span>
				</span>
				<span cmt-app="notify" cmt-controller="notification" cmt-action="reminderData" action="notify/stats/stats?type=reminder">
					<span class="popout-trigger cmt-auto-hide cmt-click" popout="popout-reminder" title="Reminders" data-target="#popout-reminder">
						<span class="cmti cmti-bell-o "></span>
						<span class="count-header count-reminder">0</span>
					</span>
				</span>
				<span cmt-app="notify" cmt-controller="notification" cmt-action="activityData" action="notify/stats/stats?type=activity">
					<span class="popout-trigger cmt-auto-hide cmt-click" popout="popout-activity" title="Activities" data-target="#popout-activity">
						<span class="cmti cmti-sliders"></span>
						<span class="count-header count-activity">0</span>
					</span>
				</span>
				<span cmt-app="notify" cmt-controller="notification" cmt-action="announcementData" action="notify/stats/stats?type=announcement">
					<span class="popout-trigger cmt-auto-hide cmt-click" popout="popout-announcement" title="Announcements" data-target="#popout-announcement">
						<span class="cmti cmti-tweeter-o"></span>
						<span class="count-header count-announcement">0</span>
					</span>
				</span>
				<span class="popout-trigger wrap-user" popout="popout-user">
					<?= $avatarThumb ?>
					<span class="fa fa-caret-down"></span>
				</span>
			</div>
			<div class="popouts">
				<div id="popout-notification" class="popout">
					<div class="popout-content-wrap">
						<div class="popout-content">
							<ul>
								<li class="align align-center"><span class="fa fa-spin cmti cmti-2x cmti-spinner-1"></span></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="popout-reminder" class="popout">
					<div class="popout-content-wrap">
						<div class="popout-content">
							<ul>
								<li class="align align-center"><span class="fa fa-spin cmti cmti-2x cmti-spinner-1"></span></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="popout-activity" class="popout">
					<div class="popout-content-wrap">
						<div class="popout-content">
							<ul>
								<li class="align align-center"><span class="fa fa-spin cmti cmti-2x cmti-spinner-1"></span></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="popout-announcement" class="popout">
					<div class="popout-content-wrap">
						<div class="popout-content">
							<ul>
								<li class="align align-center"><span class="fa fa-spin cmti cmti-2x cmti-spinner-1"></span></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="popout-user" class="popout">
					<div class="popout-content-wrap">
						<div class="popout-content">
							<?= BasicNav::widget([
								'options' => [ 'class' => 'vnav' ],
								'items' => $menuItems
							])?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php
include "$breezeTemplates/handlebars/notify/user.php";
