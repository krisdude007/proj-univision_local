<div id="content">
    <div style="margin-left:130px; padding-top:30px;float:left;">
        <h1>OLVIDÉ MI CONTRASEÑA</h1>
        <div style="margin-top:30px;"></div>
        <?php
            $this->renderPartial('_formReset',
                array(
                    'model'=>$model,
                )
            );
        ?>
    </div>
    <div class="placeHolder"></div>
</div>