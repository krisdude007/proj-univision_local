<div id="registerWrap">
    <br/>
    <h1 style="margin-top: 30px;">COMIENZA AQUÍ</h1>
    <div style="margin-top:30px;"></div>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-register-form',
        'enableAjaxValidation' => true,
            ));
    ?>
    <table style="height: 320px;">
        <tr>
            <td>Nombre</td>
            <td>Apellido</td>
        </tr>
        <tr>
            <td>
                <?php echo $form->textField($user, 'first_name'); ?>
                <?php echo $form->error($user, 'first_name'); ?>
            </td>
            <td>
                <?php echo $form->textField($user, 'last_name'); ?>
                <?php echo $form->error($user, 'last_name'); ?>
            </td>
        </tr>
        <tr>
            <td>Dirección de correo electrónico</td>
            <td>Confirmar dirección de correo electrónico</td>
        </tr>
        <tr>
            <td>
                <?php echo $form->textField($userEmail, 'email'); ?>
                <?php echo $form->error($userEmail, 'email'); ?>
            </td>
            <td>
                <?php echo $form->textField($userEmail, 'confirm_email'); ?>
                <?php echo $form->error($userEmail, 'confirm_email'); ?>
            </td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td>Confirmar contraseña</td>
        </tr>
        <tr>
            <td>
                <?php echo $form->passwordField($user, 'password'); ?>
                <?php echo $form->error($user, 'password'); ?>
            </td>
            <td>
                <?php echo $form->passwordField($user, 'confirm_password'); ?>
                <?php echo $form->error($user, 'confirm_password'); ?>
            </td>
        </tr>
        <tr>
            <td>Código postal/ZIP</td>
            <td>Fecha de nacimiento</td>
        </tr>
        <tr>
            <td>
                <?php echo $form->textField($userLocation, 'postal_code'); ?>
                <?php echo $form->error($userLocation, 'postal_code'); ?>
            </td>
            <td>
                <?php echo $form->dropDownList($user,'birthMonth',  DateTimeUtility::monthsOfYear()); ?>
                <?php echo $form->dropDownList($user,'birthDay', DateTimeUtility::daysOfMonth()); ?>
                <?php echo $form->dropDownList($user,'birthYear',  DateTimeUtility::yearsOfCentury()); ?>
                <?php echo $form->error($user, 'birthday'); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="font-size:10px;padding-top:10px;">
                <input type="checkbox" id="terms" name="terms" value="1">
                <a style="cursor:pointer;"class="fab-link" onclick="$('#registerTerms').toggle();">Acepto los Términos de uso y la </a>
                <a style="cursor:pointer;"class="fab-link" onclick="$('#privacyPopup').toggle();">Política de Privacidad</a><br/>
                <a style="cursor:pointer;"class="fab-link" onclick="$('#rulesPopup').toggle();">Normas y Reglamentos</a>
            </td>
            <td>
                <?php echo CHtml::submitButton('ENVIAR'); ?>
            </td>
        </tr>
        </tr>
        <tr>
            <td colspan="2" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="font-size:12px;">¿Ya tienes nombre de usuario? <a href="/login">¡Haz clic aquí!</a></td>
            <td>
                regístrate con
                <a href="#" class="twreg"><img src="<?php echo Yii::app()->request->baseurl; ?>/webassets/images/twitterSelected.png"></a>
                regístrate con
                <a href="#" class="fbreg"><img src="<?php echo Yii::app()->request->baseurl; ?>/webassets/images/facebookSelected.png"></a>
            </td>
        </tr>
    </table>
    <?php echo $form->hiddenField($user, 'source', array('value' => 'web')); ?>
    <input id="screen_width" type="hidden" name="screen_width" value="" />
    <input id="screen_height" type="hidden" name="screen_height" value="" />
    <?php $this->endWidget(); ?>
</div>


<!-- TERMS MODAL -->
<div class="termsOverlay" id="termsOverlayTrigger">
    <div class="termsOverlayContent" ></div>
</div>
<!-- TERMS MODAL -->