<div id="content">
    <div style="text-align:left;width:595px; height: 355px;margin-left:auto;margin-right:auto;clear:both;">
        <div style="text-align:center;padding-top: 40px;">
            <!--<div style="float:right;"><a class="uploadButton" href="<?php echo Yii::app()->request->baseurl; ?>/questions" style="width:70px;text-align: center;margin-right: 40px;">SUBIR</a></div>-->
            <h1>VIDEOS DE OTROS USUARIOS</h1>
            <div class="sorter" style="font-size:12px;margin-bottom:5px;">Ver por: &nbsp;&nbsp;
                <a class="activeLink" href="<?php echo Yii::app()->request->baseurl; ?>/videos/recent">Más recientes</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo Yii::app()->request->baseurl; ?>/videos/views">Más vistos</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo Yii::app()->request->baseurl; ?>/videos/rating">Mejor calificados</a>
            </div>
        </div>
        <div class="videoBlocks scroll-pane jspScrollable">
            <?php
            $this->renderPartial('/video/_blocks', array('videos' => $videos)
            );
            ?>
        </div>
    </div>
    <div class="placeHolder"><?php $this->renderPartial('//ads/_rightColumn', array('ad' => $ad)); ?></div>
</div>