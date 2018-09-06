<?php
/* @var $this VideoController */
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/webassets/js/jquery.oauthpopup.js', CClientScript::POS_END);
if(!file_exists(Yii::app()->params['paths']['video'].'/'.basename($videoInfo['videofile']))){
    $cs->registerScript('reloadVideo',"reloadVideo({$model->id});", CClientScript::POS_END);
}
?>
<div id="content">
    <div class="processing">
        <div id="videoWindow" class="videoWindow">
            <div id="videoPlayer">
            <?php
            $this->renderPartial('/video/_videoPlayer', array(
                'videoInfo' => $videoInfo,
                )
            );
            ?>
            </div>
            <div style="color:#fff">Por favor revisa tu video.</div>
            <div style="text-align:left;margin-top:4px;">
                <a href="/record/<?php echo $question_id; ?>"><button style="background-color:#008711">VOLVER A GRABAR</button></a>
            </div>
        </div>
        <div style="float:left;width:255px;margin-left:20px;">
            <?php
            $this->renderPartial('/video/_formProcess', array(
                'model' => $model,
                'question_id' => $question_id,
                    )
            );
            ?>
        </div>
    </div>
    <div class="placeHolder"><?php $this->renderPartial('//ads/_rightColumn', array('ad' => $ad)); ?></div>
</div>