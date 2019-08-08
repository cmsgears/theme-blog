<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

// Config
$coreProperties		= $this->context->getCoreProperties();
$themeTemplates		= Yii::getAlias( '@themeTemplates' );
$breezeTemplates	= Yii::getAlias( '@breeze/templates' );
$themeIncludes		= Yii::getAlias( '@themes/basic/views/includes' );

$frmSpinner = "$themeTemplates/components/spinners/form.php";

$apixBase = 'user';

// Page
$this->title = 'Settings | ' . $coreProperties->getSiteTitle();

// Sidebar
$this->context->sidebar	= [ 'parent' => 'sidebar-settings' ];

// Breadcrumbs
$this->context->breadcrumbs	= [
	'base' => [ [ 'label' => 'Home', 'url' =>  Url::toRoute( [ '/home' ], true ) ] ],
	'settings' => [ [ 'label' => 'Settings' ] ]
];
?>
<div class="data-crud-wrap">
	<div class="data-crud-wrap-main">
		<div class="cmt-tabs tabs tabs-underline">
			<div class="tab-links-wrap">
				<span class="tab-link" target="#tab-content-privacy">Privacy</span>
				<span class="tab-link" target="#tab-content-notification">Notifications</span>
				<span class="tab-link" target="#tab-content-reminder">Reminders</span>
			</div>
			<div class="tab-content-wrap">
				<div id="tab-content-privacy" class="tab-content">
					<div class="data-crud data-crud-settings data-crud-settings-privacy">
						<!--<div class="data-crud-title">Privacy</div>-->
						<form class="form" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/settings" cmt-keep>
							<?php include $frmSpinner; ?>
							<div class="data-crud-form">
								<div class="row">
									<div class="col col5x4">
										Show Email on public profile.
									</div>
									<div class="col col5 frm-field align align-right">
										<input type="hidden" name="Meta[0][name]" value="show_email" />
										<input type="hidden" name="Meta[0][type]" value="<?= CoreGlobal::SETTINGS_PRIVACY ?>" />
										<input type="hidden" name="Meta[0][valueType]" value="flag" />
										<span class="cmt-switch cmt-checkbox">
											<input id="privacy_show_email" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
											<label for="privacy_show_email"></label>
											<input type="hidden" name="Meta[0][value]" value="<?php if( isset( $privacy[ 'show_email' ] ) ) echo $privacy[ 'show_email' ]->value; ?>" />
										</span>
									</div>
								</div>
								<hr/>
								<div class="filler-height"></div>
								<div class="row">
									<div class="col col5x4">
										Show Mobile on public profile.
									</div>
									<div class="col col5 frm-field align align-right">
										<input type="hidden" name="Meta[1][name]" value="show_mobile" />
										<input type="hidden" name="Meta[1][type]" value="<?= CoreGlobal::SETTINGS_PRIVACY ?>" />
										<input type="hidden" name="Meta[1][valueType]" value="flag" />
										<span class="cmt-switch cmt-checkbox">
											<input id="privacy_show_mobile" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
											<label for="privacy_show_mobile"></label>
											<input type="hidden" name="Meta[1][value]" value="<?php if( isset( $privacy[ 'show_mobile' ] ) ) echo $privacy[ 'show_mobile' ]->value; ?>" />
										</span>
									</div>
								</div>
								<hr/>
								<div class="filler-height"></div>
								<div class="row">
									<div class="col col5x4">
										Show Address on public profile.
									</div>
									<div class="col col5 frm-field align align-right">
										<input type="hidden" name="Meta[2][name]" value="show_address" />
										<input type="hidden" name="Meta[2][type]" value="<?= CoreGlobal::SETTINGS_PRIVACY ?>" />
										<input type="hidden" name="Meta[2][valueType]" value="flag" />
										<span class="cmt-switch cmt-checkbox">
											<input id="privacy_show_address" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
											<label for="privacy_show_address"></label>
											<input type="hidden" name="Meta[2][value]" value="<?php if( isset( $privacy[ 'show_address' ] ) ) echo $privacy[ 'show_address' ]->value; ?>" />
										</span>
									</div>
								</div>
								<div class="filler-height"></div>
							</div>
							<div class="row data-crud-message">
								<div class="col col1 message success"></div>
								<div class="col col1 message warning"></div>
								<div class="col col1 message error"></div>
							</div>
							<div class="row data-crud-actions">
								<div class="col col1">
									<input class="frm-element-small" type="submit" value="Update" />
								</div>
							</div>
						</form>
					</div>
				</div>
				<div id="tab-content-notification" class="tab-content">
					<div class="data-crud data-crud-settings data-crud-settings-notifications">
						<!--<div class="data-crud-title">Notifications</div>-->
						<form class="form" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/settings" cmt-keep>
							<?php include $frmSpinner; ?>
							<div class="data-crud-form">
								<div class="row">
									<div class="col col5x4">
										Receive emails of notifications triggered for your personal profile.
									</div>
									<div class="col col5 frm-field align align-right">
										<input type="hidden" name="Meta[0][name]" value="receive_mail" />
										<input type="hidden" name="Meta[0][type]" value="<?= CoreGlobal::SETTINGS_NOTIFICATION ?>" />
										<input type="hidden" name="Meta[0][valueType]" value="flag" />
										<span class="cmt-switch cmt-checkbox">
											<input id="notify_receive_mail" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
											<label for="notify_receive_mail"></label>
											<input type="hidden" name="Meta[0][value]" value="<?php if( isset( $notification[ 'receive_mail' ] ) ) echo $notification[ 'receive_mail' ]->value; ?>" />
										</span>
									</div>
								</div>
								<div class="filler-height"></div>
							</div>
							<div class="row data-crud-message">
								<div class="col col1 message success"></div>
								<div class="col col1 message warning"></div>
								<div class="col col1 message error"></div>
							</div>
							<div class="row data-crud-actions">
								<div class="col col1">
									<input class="frm-element-small" type="submit" value="Update" />
								</div>
							</div>
						</form>
					</div>
				</div>
				<div id="tab-content-reminder" class="tab-content">
					<div class="data-crud data-crud-settings data-crud-settings-reminders">
						<!--<div class="data-crud-title">Reminders</div>-->
						<form class="form" cmt-app="core" cmt-controller="user" cmt-action="settings" action="<?= $apixBase ?>/settings" cmt-keep>
							<?php include $frmSpinner; ?>
							<div class="data-crud-form">
								<div class="row">
									<div class="col col5x4">
										Receive emails of reminders triggered for your personal profile.
									</div>
									<div class="col col5 frm-field align align-right">
										<input type="hidden" name="Meta[0][name]" value="receive_mail" />
										<input type="hidden" name="Meta[0][type]" value="<?= CoreGlobal::SETTINGS_REMINDER ?>" />
										<input type="hidden" name="Meta[0][valueType]" value="flag" />
										<span class="cmt-switch cmt-checkbox">
											<input id="remind_receive_mail" class="cmt-toggle cmt-toggle-round" type="checkbox" name="value" />
											<label for="remind_receive_mail"></label>
											<input type="hidden" name="Meta[0][value]" value="<?php if( isset( $reminder[ 'receive_mail' ] ) ) echo $reminder[ 'receive_mail' ]->value; ?>" />
										</span>
									</div>
								</div>
								<div class="filler-height"></div>
							</div>
							<div class="row data-crud-message">
								<div class="col col1 message success"></div>
								<div class="col col1 message warning"></div>
								<div class="col col1 message error"></div>
							</div>
							<div class="row data-crud-actions">
								<div class="col col1">
									<input class="frm-element-small" type="submit" value="Update" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
