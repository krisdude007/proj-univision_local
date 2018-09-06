<?php
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/webassets/js/jquery.oauthpopup.js', CClientScript::POS_END);
?>
<div class="fabmob_content-container text-center">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-login-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
            'validateOnType' => false,
        )
    ));
    ?>
    <h2 class="text-center">Reg&iacute;strate</h2>
    <div class="form-group">
        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Dirección de correo electrónico')); ?>
    </div>
    <div id="fabmob_login-password-form-input" class="form-group">
        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
    </div>
    <?php echo $form->hiddenField($model, 'source', array('value' => 'mobile web')); ?>
    <button id="js-login-btn" type="submit" class="btn btn-default btn-block">Reg&iacute;strate</button>
    <?php $this->endWidget(); ?>
    <p id="fabmob_login-register-copy">
        &iquest;Eres nuevo en Telemundo Deportes?
    </p>
    <a id="fabmob_login-register-link" href="/register">Reg&iacute;strate</a>
</div>

