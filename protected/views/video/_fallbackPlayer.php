<?php
if(!isset($width)) $width = '528';
if(!isset($height)) $height = '297';
?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="528" height="297" allowFullScreen="true">
    <param name="flashvars" value="file=<?php print '/' . basename(Yii::app()->params['paths']['video']) . '/' . $video->filename; ?><?php echo Yii::app()->params['video']['postExt'];?>&image=<?php print '/' . basename(Yii::app()->params['paths']['video']) . '/' . $video->thumbnail; ?><?php echo Yii::app()->params['video']['imageExt'];?>&controlbar=none&dock=false&autostart=false" />
    <param name="movie" value="/webassets/swf/player.swf" />
    <param name="wmode" value="transparent" />
    <embed src="/webassets/swf/player.swf"
           width="<?php echo $width;?>"
           height="<?php echo $height;?>"
           wmode="opaque"
           type="application/x-shockwave-flash"
           pluginspage="http://www.macromedia.com/go/getflashplayer"
           allowFullScreen="true"
           flashvars="file=<?php print '/' . basename(Yii::app()->params['paths']['video']) . '/' . $video->filename; ?><?php echo Yii::app()->params['video']['postExt'];?>&image=<?php print '/' . basename(Yii::app()->params['paths']['video']) . '/' . $video->thumbnail; ?><?php echo Yii::app()->params['video']['imageExt'];;?>&controlbar=none&dock=false&autostart=false" />
</object>