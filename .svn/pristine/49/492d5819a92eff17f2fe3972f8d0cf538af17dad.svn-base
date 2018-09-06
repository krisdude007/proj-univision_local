<?php
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseurl . '/webassets/js/client.js', CClientScript::POS_END);
$cs->registerScript('googleanalytics', "var _gaq=_gaq||[];_gaq.push(['_setAccount', 'UA-25950024-1']);_gaq.push(['_setDomainName', 'youtoo.com']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();", CClientScript::POS_END);

?>
<!DOCTYPE html>
<html>
    <!--<![endif]-->
    <head>
        <!-- @todo figure out a way to automatically change this base href for deployments -->
        <!-- <base href="http://localhost:8888/univision/public/" /> -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Univision</title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/webassets/mobile/stylesheets/app.css">
        <link rel="stylesheet" href="/webassets/mobile/stylesheets/client.css">
        <script src="/webassets/mobile/javascripts/vendor.js"></script>
        <script src="/webassets/mobile/javascripts/app.js"></script>
        <script src="/webassets/mobile/javascripts/main.js"></script>
        <script src="/webassets/mobile/javascripts/client.js"></script>
    </head>
    <body>
        <img height="1" width="1" style="border-style:none;" alt="" src="//insight.adsrvr.org/track/conv/?adv=a1l2ens&ct=0:j31whkcg&fmt=3"/>


            <script src="https://tracking.aimediagroup.com/aipx_secure.js" type="text/javascript"></script>
    <script type="text/javascript">
                    _startSecureTrack("K4002Z9C2bWbkRth2n");
    </script>
        <div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left">
                <ul id="nav">
                    <li class="sidebar"><a href="/">Inicio</a></li>
                   <!-- <li class="sidebar"><a href="<?php echo Yii::app()->createUrl('question/index'); ?>">Sube</a></li>-->
                    <li class="sidebar"><a href="<?php echo Yii::app()->createUrl('video/index'); ?>">Ver Videos</a></li>
                    <li class="sidebar"><a href="<?php echo Yii::app()->createUrl('user/help'); ?>">&nbsp;&nbsp;&nbsp;&iquest;Necesitas Ayuda?</a></li>
                    <li class="sidebar"><a href="<?php echo Yii::app()->createUrl('mobileTerms'); ?>">&nbsp;&nbsp;&nbsp;T&eacute;rminos de Uso</a></li>
                    <li class="sidebar"><a href="<?php echo Yii::app()->createUrl('mobilePrivacy'); ?>">&nbsp;&nbsp;&nbsp;Pol&iacute;tica de Privacidad</a></li>
                    <li class="sidebar"><a href="<?php echo Yii::app()->createUrl('mobileRules'); ?>">&nbsp;&nbsp;&nbsp;Normas y Reglamentos</a></li>
                </ul>
            </div>
        </div>
        <div id="content-container" class="snap-content">
            <div id="toolbar">
                <a href="#" id="open-left"></a>
            </div>
            <a HREF="https://ad.doubleclick.net/jump/N9281.503.UNIVISION/B8070260.41;sz=1x1;ord=<?php echo time(); ?>?" style="position:absolute;">
                <img SRC="https://ad.doubleclick.net/ad/N9281.503.UNIVISION/B8070260.41;sz=1x1;ord=<?php echo time(); ?>?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement">
            </a>
            <a target="_blank" href="https://ad.doubleclick.net/clk;281784193;108350329;j">
                <div id="fabmob_banner" style="height:50px;"></div>
            </a>
            <div id="fabmob_view-container">
                <?php echo $content; ?>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
        <?php $this->renderPartial('/csrf/_csrfToken'); ?>
    </body>
</html>
