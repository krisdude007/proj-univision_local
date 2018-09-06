
<div class="login" style="float:left;margin-left:140px; margin-top:50px;">
    <h1>REGÍSTRATE</h1>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-login-form',
        'enableAjaxValidation' => true,
            ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <div>
        <div style="float:left;">
            <h4>¿Cuál es tu dirección de correo electrónico?</h4>
            <label style="padding-left:20px;">Dirección de correo electrónico : </label>
            <?php echo $form->textField($model, 'username'); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
        <div style="float:left; clear:both; padding-top:20px;">
            <h4>¿Tienes una cuenta de Univision?</h4>
            <input style="margin-left:20px;" id="createNewAccount" type="radio" name="createAccount" value="1">
            <label>No, soy un usuario nuevo.</label>
            <div class="clearFix" style=" margin-top:10px;">
                <label style="padding-left:20px;">Sí, tengo contraseña: </label>
                <?php echo $form->passwordField($model, 'password'); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <div style="margin-left: 220px;">
                <a style="font-size: 12px;" href="/forgot">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
    <div style="margin-left: 25px; clear:both;padding-top:20px">
        <?php echo $form->hiddenField($model, 'source', array('value' => 'web')); ?>
        <input id="screen_width" type="hidden" name="screen_width" value="" />
        <input id="screen_height" type="hidden" name="screen_height" value="" />
        <?php echo CHtml::submitButton('ENVIAR'); ?>
    </div>
    <div style="margin-top:-40px;margin-left:210px;font-size:20px;">
        regístrate con
        <a href="#" class="twreg"><img src="<?php echo Yii::app()->request->baseurl; ?>/webassets/images/twitterSelected.png"></a>
        regístrate con
        <a href="#" class="fbreg"><img src="<?php echo Yii::app()->request->baseurl; ?>/webassets/images/facebookSelected.png"></a>
    </div>
    <?php $this->endWidget(); ?>
</div>