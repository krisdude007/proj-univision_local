
<div id="content">
    <div class="you">
    <?php if(!(Yii::app()->user->isGuest)): ?>

        <?php
        $this->renderPartial('/user/_sidebar', array(
            'user' => $user,
                )
        );
        ?>
    <?php else: { } ?>
        <?php endif; ?>
        <div class="verticalRule">
        </div>
        <div class="youContent" style="text-align:left;">
            <h1 style="margin-bottom: 0px;padding-top: 10px;">¿NECESITAS AYUDA?</h1>
            <div class="textBox">
                <div class="textBorder">
                    <div class="steps">
                        <div class="textHead">1er paso</div>
                    </div>
                    <div style="padding:15px;margin-left:95px;height:58px;color: #636363; font-size:14px;">
                        <b style="color:#636363; font-size: 18px;">Haz clic en “Grabar”  ¡Luz, cámara, acción!</b><br/>
                        Ponte frente a la cámara, habla claramente, sonríe, diviértete y enséñanos tu pasión por el fútbol.
                    </div>
                </div>
                <div class="textBorder">
                    <div class="steps">
                        <div class="textHead">2do paso</div>
                    </div>
                    <div style="padding:15px;margin-left:95px;height:58px;color: #636363; font-size:14px;">
                        <b style="color:#636363; font-size: 18px;">Describe tu video</b><br/>
		Agrega el título, etiquetas/tags y descripción. No olvides revisarlo. Si no te gusta, puedes volver a grabarlo.
                    </div>
                </div>
                <div class="textBorder">
                    <div class="steps">
                        <div class="textHead">3er paso</div>
                    </div>
                    <div style="padding:15px;margin-left:95px;height:58px;color: #636363; font-size:14px;">
                        <b style="color:#636363; font-size: 18px;">Después de hacer clic en enviar</b>,<br/> se te pedirá  que te registres si ya no lo has hecho!
                    </div>
                </div>
            </div>
            <div style="margin-right:35px; float:right;">
                <a href="mailto:<?php echo Yii::app()->params['email']['mailto'];?>" style="color: #fff; font-size: 12px;">Contáctanos</a>
            </div>
        </div>
    </div>
</div>