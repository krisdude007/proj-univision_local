<div id="content">
    <div class="you" style="width:915px;">
        <?php
        $this->renderPartial('/user/_sidebar', array(
            'user' => $user,
                )
        );
        ?>
        <div class="verticalRule">
        </div>
        <div class="youContent">
            <?php if (sizeof($videos) == 0): ?>
                <h2 class="bold" style="margin-top:50px">
                    <?php echo $question; ?>
                </h2>
                <h2 class="bold">
                    <br/>
                    Univision Deportes les agradece a todas aquellas personas que participaron en nuestro documental subiendo y enviando sus videos. <br/>Te invitamos ahora a que veas todos los videos entrando aquí:

                </h2>
                <div>
                    <div style="width:200px; margin-top:20px;">
                        <a href="<?php echo Yii::app()->request->baseurl; ?>/videos" style="color:white;text-transform: uppercase;text-decoration: none;">
                            <div class="darkOrange" style="padding:10px 30px; text-align: center;font-weight: bold;">VER VIDEOS</div>
                        </a>
                    </div>
                    <div style="margin-top:15px">
                    ¡Sintoniza Univision Deportes Network el domingo, 8 de Junio a las 10PM ET – 7PM PT para ver el documental y si tu video está en el proyecto final!
                    </div>
                </div>
            <?php else: ?>
                <div style="text-align:center; width:545px;margin-top:20px;">
                   <!-- <div style="float:right; margin-top: 5px;"><a class="uploadButton" href="/questions" style="width:90px; height: 25px; font-size: 18px;margin-right: 43px; margin-top:0px;text-align: center;">SUBIR</a></div>-->
                    <h1>TUS VIDEOS</h1>
                    <div class="sorter" style="font-size:12px;margin-bottom:5px;">Ver por: &nbsp;&nbsp;
                <a class="activeLink" href="<?php echo Yii::app()->request->baseurl; ?>/you/recent">Más recientes</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo Yii::app()->request->baseurl; ?>/you/views">Más vistos</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo Yii::app()->request->baseurl; ?>/you/rating">Mejor calificados</a>
                    </div>
                    <div class="videoBlocks scroll-pane jspScrollable">
                        <?php
                        $this->renderPartial('/video/_blocks', array('videos' => $videos)
                        );
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="placeHolder"><?php $this->renderPartial('//ads/_rightColumn', array('ad' => $ad)); ?></div>
</div>