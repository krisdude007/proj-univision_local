<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'video-process-form',
        'enableAjaxValidation' => true,
    ));
    ?>
    <div class="row" style="margin-bottom:20px">
        <span class="bold" style="font-family: sans-serif; color: #fff;">Titulo *</span>
        <div class="helperText" style="font-family: sans-serif;">Esto te ayudará a encontrar tu video.</div>
        <?php echo $form->textField($model, 'title'); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row" style="margin-bottom:20px">
        <span class="bold" style="font-family: sans-serif; color: #fff;">Descripción </span>
        <div class="helperText" style="font-family: sans-serif;">Describe tu video para que la gente sepa de qué se trata</div>
        <?php echo $form->textArea($model, 'description', array('style' => 'width:207px;')); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>
    <div style="margin-top:15px;"></div>
    <!--<div class="bold" style="float:left; font-family: hnb; color: #fff; margin-bottom: 10px; font-size:13px">Compártelo también en tus redes sociales</div>
    <div class="clearfix"></div>
    <div class="row" style="margin-bottom:20px">
        <?php echo $form->checkBox($model, 'to_twitter'); ?>
        <?php echo $form->labelEx($model, 'to_twitter'); ?>
        <?php echo $form->error($model, 'to_twitter'); ?>
    </div>
    <div class="row" style="margin-left:20px">
        <?php echo $form->checkBox($model, 'to_facebook'); ?>
        <?php echo $form->labelEx($model, 'to_facebook'); ?>
        <?php echo $form->error($model, 'to_facebook'); ?>
    </div>-->

    <div style="clear:both">
        <div class="row buttons" style="margin-top:20px;width:200px;text-align:right;">
            <?php echo $form->hiddenField($model, 'source', array('value' => 'web')); ?>
            <?php echo $form->hiddenField($model, 'question_id', array('value' => $question_id)); ?>
            <?php echo CHtml::submitButton('ENVIAR'); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<div style="clear:both;margin-top:20px;display:inline-block;width:100%">
    <input type="hidden" name="userid" value="<?php print Yii::app()->user->getId(); ?>">
    <input type="hidden" name="question_id" value="<?php print $question_id; ?>">
</div>