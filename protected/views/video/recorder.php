<?php
/* @var $this VideoController */
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/webassets/js/swfobject.js', CClientScript::POS_HEAD);
$cs->registerScriptFile('/webassets/js/cbUtil.js', CClientScript::POS_HEAD);
?>
<script type="text/javascript">
    var tag="<?php echo $question_id; ?>";
    var question="<?php echo htmlentities($question, ENT_QUOTES); ?>";
    var swfVersionStr = "10.0.0";
    var xiSwfUrlStr = "expressInstall.swf";
    var flashvars = {'max_dur':'<?php echo $duration; ?>','uid':'<?php echo $user_id; ?>','recMode':'','server':'rtmp://<?php echo $wowzaip; ?>/vod/','integrationURL':'/newrecorder/hd/','micTint':100,'micHexColor':'0x008711;','frameTint':100,'frameHexColor':'0x008711'};
    var params = {};
    params.quality = "high";
    params.wmode="opaque";
    params.bgcolor = "#636363";
    params.allowscriptaccess = "true";
    params.allowfullscreen = "true";
    var attributes = {};
    attributes.id = "youtoorecorder";
    attributes.name = "youtoorecorder";
    attributes.align = "middle";
    swfobject.embedSWF("/webassets/swf/univrecorder.swf?id=<?php echo time(); ?>", "flashContent", "544", "340", swfVersionStr, xiSwfUrlStr, flashvars, params, attributes);
    swfobject.createCSS("#flashContent", "display:block;");
</script>

<div id="content" class="content">
    <div class="recorder">
        <center>
            <div style="text-align:left;width:545px; height: 40px; margin-bottom: 50px;">
                <!--<h1 style="display:inline;">Step 2: </h1><h2 style="display:inline;">Record Your Video</h2>-->
                <div class="topic bold" style="float:left;padding-top:45px;color:#fff;text-align:center; width:545px;">
                    <?php echo $question; ?>
                </div>
            </div>
            <div style="width:545px;margin-bottom:5px">
                <span style="float:left;margin-left:5px"><a href="<?php echo Yii::app()->request->baseurl; ?>/questions" style="color:#fff;text-decoration: none; margin-bottom: 5px;">Ver más preguntas</a></span>
                <span style="float:right; margin-right:5px"><a href="<?php echo Yii::app()->request->baseurl; ?>/you/help" style="color:#fff;text-decoration: none; margin-bottom: 5px;">¿Necesitas ayuda?</a></span>
            </div>
            <div style="clear:both;display:inline-block;">
                <div id="flashContent">
                    <p>To view this page ensure that Adobe Flash Player version 10.3.187.7 or greater is installed.</p>
                    <script type="text/javascript">
                        var pageHost = ((document.location.protocol == "https:") ? "https://" :	"http://");
                        document.write("<a href='http://www.adobe.com/go/getflashplayer'><img src='"
                            + pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" );
                    </script>
                </div>
            </div>
        </center>
    </div>
    <div class="dim" style="display: none;">
        <div class="overlay">
            <div class="overlaytitle">
                ESPERA, ANTES DE COMENZAR A GRABAR ...
            </div>
            <div class="overlaybody">
                <div class="column">
                    <div class="columntitle">Primero</div>
                    <div class="columnbody" style="width:167px">
                        <ul class="recorderinstructions1">
                            <li>Asegurate que no haya ruidos alrededor al momento de grabar; incluyendo el volumen de tu TV. Sube el volumen de tu micrófono.</li>
                            <li>Habla fuerte y claramente hacia el micrófono – no uses lenguaje profano.</li>
                            <li>LO MÁS IMPORTANTE ¡SE TU MISMO, DIVIÉRTETE Y MUESTRA TU PASIÓN POR EL FÚTBOL!</li>
                        </ul>
                    </div>
                </div>
                <div class="column">
                    <div class="columntitle">DESPUÉS, ESTABLECE LA CONFIGURACIÓN DE TU GRABADORA</div>
                    <div class="columnbody" style="width:540px;text-align:center">
                        <div style="position:relative;text-align:left;font-size:13px;color:#1a93a8;padding-left:10px;">
                            <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false): ?>
                            <img src="/webassets/images/record/chrome-flash-settings.png" alt="Adobe Flash settings diagram" />
                            <?php else: ?>
                            <img src="/webassets/images/record/chrome-flash-settings.png" alt="Adobe Flash settings diagram" />
                            <?php endif; ?>

                            <div style="position:absolute;top:136px;left:125px; font-size:12px;color:#008711;">
                                <ul>
                                    <li>Haz clic aquí</li>
                                </ul>
                            </div>

                            <div style="position:absolute;top:130px;left:322px;color:#008711;">
                                <ul>
                                    <li>Haz clic en “Allow”(Permitir)</li>
                                    <li>Seleccionar "Recordar"</li>
                                    <li>Haz clic en “Close” (Cerrar)</li>
                                </ul>
                            </div>

                            <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false): ?>
                            <div style="position:absolute;top:181px;left:447px;color:#008711;">
                                <ul>
                                    <li>Haz clic en “Allow” (Permitir) en la esquina superior derecha de tu navegador.</li>
                                </ul>
                            </div>
                            <?php else: ?>
                            <div style="position:absolute;top:192px;left:425px;color:#008711;">
                                <ul>
                                    <li>Clic "Permitir" en la esquina superior derecha de tu navegador.</li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div>
                        Comienza ahora<br/> Haz clic abajo para configurar tu grabadora.<br /></div>
                        <button class="hide_dim" style="margin:10px;">HAZ CLIC AQUÍ</button>
                        <br />
                        <label for="hiderecorderhelp">
                            <input type="checkbox" id="hiderecorderhelp" name="hiderecorderhelp" value="1" />
                            No mostrar de nuevo
                        </label>
                    </div>
                </div>
                <div style="clear:both;margin:10px;padding:0;font-size:9px; font-family: helvetica,arial,sans-serif;">
                </div>
                <div style="clear:both;padding:1px"></div>
            </div>
        </div>
    </div>
    <div class="placeHolder"><?php $this->renderPartial('//ads/_rightColumn', array('ad' => $ad)); ?></div>
</div>