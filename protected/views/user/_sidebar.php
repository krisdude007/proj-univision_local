
<?php if($user->id != Yii::app()->user->id): ?>
<div class="sidebar" style="margin-top: 73px;">
    <div style="padding:10px;">
        <div style="margin-bottom:20px;width:130px;">
            <a href="<?php echo Yii::app()->request->baseurl;?>/user/<?php echo $user->id; ?>">
                <img style="margin-left:auto;margin-right:auto;max-width:130px;max-height:135px;display:block" src="<?php echo UserUtility::getAvatar($user); ?>" />
            </a>
        </div>
        <div class="bold" style="margin-bottom:5px;"><?php
        $full = trim($user->first_name.' '.$user->last_name);
        if (empty($full)){
            $full = $user->username;
        }
        echo $full ?></div>
        <div><a href="<?php echo Yii::app()->request->baseurl;?>/user/video/<?php echo $user->id; ?>"><?php echo ClientUtility::getNumVideos($user->id);?> Videos</a></div>
        <!--<div><a href="<?php echo Yii::app()->request->baseurl;?>/user/image/<?php echo $user->id; ?>"><?php echo ClientUtility::getNumImages($user->id);?> Fotos</a></div>-->
    </div>
</div>
<?php else: ?>
<div class="sidebar" style="margin-top: 80px;">
    <div style="padding:10px;">
        <div style="margin-bottom:10px;width:130px;">
            <img style="margin-left:auto;margin-right:auto;max-width:130px;max-height:135px;display:block" src="<?php echo UserUtility::getAvatar($user); ?>" />
        </div>
        <div id="profileName" class="bold">
            <?php echo $user->first_name; ?>
            <?php echo $user->last_name; ?>
        </div>
        <ul class="counts">
            <li><a href="<?php echo Yii::app()->request->baseurl;?>/you/recent"><?php echo ClientUtility::getNumVideos($user->id); ?> videos</a></li>
        </ul><div style="margin-bottom:100px;"></div>
        <ul style="font-size: 13px;">
            <!--<li><a href="<?php echo Yii::app()->request->baseurl;?>/you/connections">Conéctate</a></li>-->
            <li><a href="<?php echo Yii::app()->request->baseurl;?>/you/help">¿Necesitas ayuda?</a></li>
            <!--<li><a href="<?php echo Yii::app()->request->baseurl;?>/you/about">Acerca de</a></li>
            <li><a href="<?php echo Yii::app()->request->baseurl;?>/you/terms">Términos de Uso</a></li>
            <li><a target="_blank" href="<?php echo Yii::app()->request->baseurl;?>/you/privacy">Política de Privacidad</a></li>-->
            <li><a href="<?php echo Yii::app()->request->baseurl;?>/you/userphoto">Foto Actual</a></li>
            <!--<li><a href="<?php echo Yii::app()->request->baseurl;?>/logout">Cerrar sesión</a></li>-->
        </ul>
    </div>
</div>
<?php endif; ?>
