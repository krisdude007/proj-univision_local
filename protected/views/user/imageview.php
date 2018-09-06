<div id="content">
    <div class="you">
        <?php
        $this->renderPartial('/user/_sidebar', array(
            'user' => $user,
                )
        );
        ?>
        <div class="verticalRule">
        </div>
        <div class="youContent">
            <?php if (sizeof($images) == 0): ?>
                <h2 class="bold" style="margin-top:50px">
                    ¡Sube tu foto!
                </h2> 
            
                <div>
                    <div style="width:200px; margin-top:20px;">
                        <a href="<?php echo Yii::app()->request->baseurl; ?>/upload" style="color:white;text-transform: uppercase;text-decoration: none;">
                            <div class="darkOrange" style="padding:10px 30px; text-align: center;font-weight: bold;">ENVIAR</div>
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div style="text-align:center; width:545px;">
                    <h1>TUS FOTOS</h1>
                    <div class="sorter" style="font-size:12px;margin-bottom:5px;">Ver por: &nbsp;&nbsp;
                <a class="activeLink" href="<?php echo Yii::app()->request->baseurl; ?>/you/imageview">Más recientes</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo Yii::app()->request->baseurl; ?>/you/imageview/views">Más vistos</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo Yii::app()->request->baseurl; ?>/you/imageview/rating">Mejor calificados</a>
                    </div>
                    <div class="videoBlocks scroll-pane jspScrollable">
                        <?php
                            $this->renderPartial('/image/_blocks', array(
                                    'images' => $images,
                                    'user' => $user,
                                    )
                        );
                            ?>
                    </div>
                </div>
            <?php endif; ?>                
        </div>
    </div>
</div>