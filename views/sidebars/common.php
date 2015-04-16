<?php
use cmsgears\files\widgets\AvatarUploader;
?>

<?= AvatarUploader::widget( [ 'avatarId' => 'avatar', 'listenerId' => 'btn-avatar-box', 'includeScripts' => true ] ); ?>