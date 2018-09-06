<?php
// page specific css
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/core/webassets/css/adminBanner/index.css');
?>

<!-- BEGIN PAGE -->
<?php $this->renderPartial('/admin/_csrfToken', array()); ?>
<div class="fab-page-content">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <div id="fab-top" style="background:#E02222;margin-bottom:0px;">
        <h2 class="fab-title" style="color:white"><img class="floatLeft marginRight10" src="<?php echo Yii::app()->request->baseUrl; ?>/core/webassets/images/video-admin-image.jpg"/>Banner Admin</h2>
    </div>
    <!-- flash messages -->
    <?php $this->renderPartial('/admin/_flashMessages', array()); ?>
    <!-- flash messages -->
    <!-- END PAGE TITLE & BREADCRUMB-->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="fab-container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <h2>Banner should be .<?php echo(Yii::app()->params['custom_params']['banner_extension']) ?> and image dimension should be <?php echo(Yii::app()->params['banner_dimension']) ?></h2>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'banner-upload-form',
            'enableAjaxValidation' => true,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo('<div class="fab-row-fluid" style="padding: 2px 4px;">');
            echo "<span>Home Banner " . $i . "</span><br/>";
            if (!empty($bannerImages[$i])) {
                echo('<img src="/userimages/' . $bannerImages[$i] . '"/>');
                echo CHtml::ajaxLink(
                        'Remove', array(Yii::app()->createUrl('/adminBanner/ajaxremove')), array(
                    'type' => 'POST',
                    'data' => array('fileName' => $bannerImages[$i]),
                    'success' => 'function(html){ window.location.reload(); }',
                        ), array('class' => 'linkButton',
                    'confirm' => 'Are you sure to remove banner?'));
            } else {
                echo $form->fileField($model, 'banner' . $i);
                echo $form->error($model, 'banner' . $i);
            }
            echo('</div>');
        }
        ?>
        <div style="padding:20px;"><?php echo CHtml::submitButton('Upload', array('submit' => Yii::app()->createUrl('/adminBanner/upload'))); ?></div>
        <?php $this->endWidget(); ?>
    </div>
    <!-- END PAGE HEADER-->
</div>
<!-- END PAGE CONTAINER-->