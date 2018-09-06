<div class="fabmob_content-container">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-register-form',
        'enableAjaxValidation' => true,
        'htmlOptions'=>array(
            'class'=>'form-horizontal fabmob_condensed-form',
        ),
    ));
    ?>
        <h3 class="text-center">Comienza Aqui&iacute;</h3>
        <div class="form-group">
            <?php echo $form->textField($user, 'first_name', array('class' => 'form-control fabmob_round-border-top', 'placeholder' => 'Nombre')); ?>
            <?php echo $form->error($user, 'first_name'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <?php echo $form->textField($user, 'last_name', array('class' => 'form-control', 'placeholder' => 'Apellido')); ?>
            <?php echo $form->error($user, 'last_name'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <?php echo $form->textField($userEmail, 'email', array('class' => 'form-control', 'placeholder' => 'Dirección de correo electrónico')); ?>
            <?php echo $form->error($userEmail, 'email'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <?php echo $form->textField($userEmail, 'confirm_email', array('class' => 'form-control', 'placeholder' => 'Confirmar dirección de correo electrónico')); ?>
            <?php echo $form->error($userEmail, 'confirm_email'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <?php echo $form->passwordField($user, 'password', array('class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
            <?php echo $form->error($user, 'password'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <?php echo $form->passwordField($user, 'confirm_password', array('class' => 'form-control', 'placeholder' => 'Confirmar contraseña')); ?>
            <?php echo $form->error($user, 'confirm_password'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <?php echo $form->textField($userLocation, 'postal_code', array('class' => 'form-control', 'placeholder' => 'Código postal/ZIP')); ?>
            <?php echo $form->error($userLocation, 'postal_code'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <?php echo $form->dropDownList($user,'birthMonth',  DateTimeUtility::monthsOfYear(), array('class' => 'form- fabmob_round-border-bottom')); ?>
            <?php echo $form->dropDownList($user,'birthDay', DateTimeUtility::daysOfMonth(), array('class' => 'form- fabmob_round-border-bottom')); ?>
            <?php echo $form->dropDownList($user,'birthYear',  DateTimeUtility::yearsOfCentury(), array('class' => 'form- fabmob_round-border-bottom')); ?>
            <?php echo $form->error($user, 'birthday'); ?>
            <span class="help-block hidden"></span>
        </div>
        <div class="form-group">
            <input id="fabmob_sign-up-terms-input" type="checkbox" value="true" id="terms-of-use" name="termsOfUse" />
            <span id="fabmob_sign-up-terms-input-label">
                Acepto los&nbsp;
                <a href="/#terms_of_use">
                    T&eacute;rminos de Uso
                </a> &nbsp; &amp; &nbsp;
                <a href="/#privacy_policy">
                    Pol&iacute;tica de privacidad
                </a>
                &nbsp;y la&nbsp;
                <a href="/#rules_and_regulations">
                    Normas y Reglamentos
                </a>
            </span>
            <span class="help-block hidden"></span>
        </div>
        <button type="submit" id="signUpButton" class="btn btn-block">Enviar</button>
    <?php $this->endWidget(); ?>
</div>