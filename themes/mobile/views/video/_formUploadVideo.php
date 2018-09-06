<div class="fabmob_content-container">
    <h2 class="text-center">Estamos procesando tu video</h2>
    <div id="fabmob-loader">
        <div id="fabmob-loader-progress-bar"></div>
    </div>
</div>

<div class="form" style="width:400px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'video-uploader-form',
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <div style="font-size: 12px;">
        <?php echo $form->errorSummary(array($uploadvideo)); ?>
    </div>
    <div class="clearfix" style="padding-top:20px; font-size: 9px;">
     Sólo .mov<sup>*</sup>
    </div>
    <div class="clearfix">
        <div class="row">
            <?php echo $form->fileField($uploadvideo, 'video'); ?>
            <?php echo $form->error($uploadvideo, 'video'); ?>
        </div>
    </div>
    <div class="clearfix">
        <div style="margin-top:12px;margin-right:7px;">
            <div class="row">
                Titulo * Requerido
                <div class="helperText">Esto te ayudará a encontrar tu video.</div>
                <?php echo $form->textField($uploadvideo, 'title'); ?>
                <?php echo $form->error($uploadvideo, 'title'); ?>
            </div>

            <div class="row">
                Descripción * Opcional
                <div class="helperText">Describe tu video para que la gente sepa de qué se trata</div>
                <?php echo $form->textArea($uploadvideo, 'description', array('style' => 'width:207px')); ?>
                <?php echo $form->error($uploadvideo, 'description'); ?>
            </div>
        </div>
    </div>
    <div class="bold" style="float:left; font-family: hnb; margin-bottom: 10px; font-size:13px">Compártelo también en tus medios sociales</div>
    <div class="clearfix"></div>
    <div class="row" style="font-size:11px">
        <?php echo $form->checkBox($uploadvideo, 'to_twitter'); ?>
        <?php echo $form->labelEx($uploadvideo, 'to_twitter'); ?>
        <?php echo $form->error($uploadvideo, 'to_twitter'); ?>
    </div>
    <div class="row" style="margin-left:20px;font-size:11px">
        <?php echo $form->checkBox($uploadvideo, 'to_facebook'); ?>
        <?php echo $form->labelEx($uploadvideo, 'to_facebook'); ?>
        <?php echo $form->error($uploadvideo, 'to_facebook'); ?>
    </div>
    <div class="clearfix">
        <div class="row buttons" style="float:left;margin-top:12px;margin-right:7px;">
            <?php echo CHtml::submitButton('ENVIAR'); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->


