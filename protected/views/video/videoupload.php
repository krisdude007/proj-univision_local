<?php
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/webassets/js/jquery.oauthpopup.js', CClientScript::POS_END);
?>
<div id="content">
  <div>
    <div style="width:70%;float:left;margin-top:5px;position:relative;height:275px">
      <div style="float:left; clear:both; margin-left:84px; margin-top:15px;">

        <div style="margin-bottom:30px; text-align: left; font-family: Arial; font-size:16px; width:670px; padding-top: 15px; ">
          <h1>SUBE UN VIDEO</h1>

<?php
$this->renderPartial('/video/_formUploadVideo', array(
    'uploadvideo' => $uploadvideo,
    )
);
?>

        </div>
      </div>

    </div>
  </div>
    <div class="placeHolder"><?php $this->renderPartial('//ads/_rightColumn', array('ad' => $ad)); ?></div>
</div>