<div id="content">
    <div class="questions centerBlock">
        <div class="stepQuestions">
            <div class="textHead1">1</div>
            <div class="textHead2">ELIGE</div>
            <div class="textHead3">UNA PREGUNTA</div>
        </div>
        <div class="stepQuestions">
            <div class="textHead1">2</div>
            <div class="textHead2">GRABA</div>
            <div class="textHead3">TU VIDEO</div>
        </div>
        <div class="stepQuestions">
            <div class="textHead1">3</div>
            <div class="textHead2">ENVÍA</div>
            <div class="textHead3">COMIENZA ABAJO</div>

        </div>
        <div style="display:inline-block;color:#fff; width:573px;">

            <div class="bold" style="clear:both;padding:10px; background-color: #006b0d;">
                <div style="text-align:center;">
                    Haz clic en la pregunta que quieres responder.<br/> ¡Ahora estás un paso más cerca de aparecer en TV!
                </div>
            </div>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($questions as $question): ?>
        <div class="<?php echo $i % 2 == 0 ? 'even' : 'odd';?>">
            <a onclick="overlayHandlersForRecord(<?php echo $question->id;?>);">
                <div class="questionTopic">Tema <?php echo $i; ?></div>
                <div style="float:left;width:425px;cursor: pointer; text-decoration: underline"><?php echo $question->question; ?></div>
            </a>
            <?php ++$i; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="placeHolder"><?php $this->renderPartial('//ads/_rightColumn', array('ad' => $ad)); ?></div>
</div>
<div class="dimQuestions" id="RecOrUp" style="display: none;">
        <div class="overlayRecOrUp">
            <div id="recorupClose">x</div>
            <div class="overlaybodyRecOrUp">
                <a id="record" class="linkButton" href="/record?id=">GRABA</a><br/>
                <a id="upload" class="linkButton" href="video/videoupload?id=">SUBIR</a>
                <p style="color:#636363">Requerimiento para subir un video:<br/> 1 min max.
                </p>
                </div>
        </div>
</div>