<div id="content">
    <div>
        <div style="width:70%;float:left;margin-top:5px;position:relative;height:275px">

            <div style="float:left; clear:both;margin-top:80px; margin-left:80px; margin-bottom:40px;">

            </div>

            <div style="float:left; clear:both; margin-left:222px; margin-top:15px; text-align: center">
                <h1>
                    ¡FELICIDADES!
                </h1>

                <div style="margin-bottom:30px; text-align: center; font-family: Arial; font-size:16px">
                    ¡Tu video ha sido enviado para su aprobación! ¡Mientras tanto,  puedes seguir participando!
                </div>

                <a class="linkButton" href="<?php echo Yii::app()->request->baseurl; ?>/questions">
                    GRABA OTRO VIDEO
                </a>
                &nbsp
                <a class="linkButton" href="<?php echo Yii::app()->request->baseurl; ?>/videos">
                    VER VIDEOS
                </a>
            </div>
        </div>
    </div>
    <div class="placeHolder"><?php $this->renderPartial('//ads/_rightColumn', array('ad' => $ad)); ?></div>
</div>