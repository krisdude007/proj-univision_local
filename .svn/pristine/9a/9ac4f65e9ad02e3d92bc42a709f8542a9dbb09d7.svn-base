<div class="fabmob_content-container">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'video-uploader-form',
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <label>Expediente</label>
    <?php echo $form->fileField($uploadvideo, 'video', array('class' => 'form-control')); ?>
    <?php echo $form->error($uploadvideo, 'video'); ?>
    <label>Titulo</label>
    <?php echo $form->textField($uploadvideo, 'title', array('class' => 'form-control', 'placeholder' => 'Titulo *Requerido')); ?>
    <?php echo $form->error($uploadvideo, 'title'); ?>
    <span class="help-block hidden"></span>
    <label>Descripción</label>
    <?php echo $form->textArea($uploadvideo, 'description', array('class' => 'form-control', 'placeholder' => 'Descripción *Opcional')); ?>
    <?php echo $form->error($uploadvideo, 'description'); ?>
    <span class="help-block hidden"></span>
    <button id="fabmob_review-form-submit-btn" class="btn btn-block"> Enviar </button>
    <?php $this->endWidget(); ?>
</div>
