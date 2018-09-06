<?php
/* @var $this Controller */
$cs = Yii::app()->getClientScript();
$cs->registerCssFile(Yii::app()->request->baseurl . '/webassets/css/reset.css');
$cs->registerCssFile(Yii::app()->request->baseurl . '/webassets/css/jquery.jscrollpane.css');
$cs->registerCssFile(Yii::app()->request->baseurl . '/webassets/css/client.css');
$cs->registerCoreScript('jquery', CClientScript::POS_END);
$cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseurl . '/webassets/js/client.js', CClientScript::POS_END);
$cs->registerScript('twitter', '!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");', CClientScript::POS_END);
$cs->registerScript('google', "(function(){var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();", CClientScript::POS_END);
$cs->registerScript('googleanalytics', "var _gaq=_gaq||[];_gaq.push(['_setAccount', 'UA-25950024-1']);_gaq.push(['_setDomainName', 'youtoo.com']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();", CClientScript::POS_END);

?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-25950024-4', 'univision.com');
  ga('send', 'pageview');

</script>
<script src="https://tracking.aimediagroup.com/aipx_secure.js" type="text/javascript"></script>
<script type="text/javascript">
                    _startSecureTrack("K4002Z9C2bWbkRth2n");
</script>

<?php
if (!Yii::app()->user->isGuest) {
    $cs->registerScript('crawlInterval', 'crawl = setInterval(crawler,' . (Yii::app()->params['ticker']['sleepTime'] * 1000) . ');', CClientScript::POS_READY);
}
Yii::app()->facebook->initJs($output); // this initializes the Facebook JS SDK on all pages
FacebookUtility::setOGTags($this);
Yii::app()->facebook->renderOGMetaTags(); // this renders the OG tags
TwitterUtility::renderCardMetaTags($this); // this renders the twitter tags

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional/EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseurl; ?>/webassets/images/logo.png">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="language" content="en" />
            <?php
            $list = array('play','view');
            if(in_array(Yii::app()->controller->action->id, $list)): ?>
            <title><?php echo Yii::app()->params['twitter_share_text'] ?></title>
            <?php else: ?>
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
            <?php endif; ?>
           <!--[if lt IE 9]><script src="/webassets/vendor/RGraph/excanvas/excanvas.original.js"></script><![endif]-->
    </head>
    <body id="<?php echo Yii::app()->controller->id . '-' . Yii::app()->controller->action->id; ?>">
        <img height="1" width="1" style="border-style:none;" alt="" src="//insight.adsrvr.org/track/conv/?adv=a1l2ens&ct=0:j31whkcg&fmt=3"/>

<div id="fb-root"></div>

        <?php $flashMessages = Yii::app()->user->getFlashes(); ?>
        <div id="popupWrap" <?php echo ($flashMessages) ? "style='display:block'" : ''; ?>>
            <div class="flashes">
                <div id="popupClose">x</div>
                <?php
                if ($flashMessages) {
                    $messageFormat = '<div class="flash-%s">%s</div></div>';
                    foreach ($flashMessages as $key => $message) {
                        echo sprintf($messageFormat, $key, $message);
                    }
                }
                ?>
            </div>
        </div>
        <div class="main">
            <div id="head"></div>
            <div id="nav">
                <ul style="position:relative;left:-50%;overflow: hidden;">
                    <li id="linkHome"><a style="color:#fff" href="<?php echo Yii::app()->request->baseurl; ?>/">INICIO</a></li>
                    <!--<li id="linkRecord"><a style="color:#fff" href="<?php echo Yii::app()->request->baseurl; ?>/questions">GRABA AQUÍ</a></li>-->
                    <?php if(Yii::app()->user->isGuest || Yii::app()->controller->action->id == "play" || Yii::app()->controller->action->id == "videos"): ?>
                    <li id="linkVideo"><a style="color:#fff" href="<?php echo Yii::app()->request->baseurl; ?>/videos">VIDEOS</a></li>
                    <?php else: ?>
                    <li id="linkVideo"><a style="color:#fff" href="<?php echo Yii::app()->request->baseurl; ?>/videos">VIDEOS</a></li>
                    <?php endif; ?>
                    <?php
                    $navArray = array("you", "register", "login", "forgot");
                    if (Yii::app()->user->isGuest || in_array(Yii::app()->controller->action->id, $navArray)):
                        ?>
                        <li id="link<?php echo ucfirst(Yii::app()->controller->action->id) ?>"><a style="color:#fff" href="<?php echo Yii::app()->request->baseurl; ?>/you">MI CUENTA</a></li>
                    <?php elseif (!Yii::app()->user->isGuest): ?>
                        <li id="linkYou"><a style="color:#fff" style="color:#fff" href="<?php echo Yii::app()->request->baseurl; ?>/you">MI CUENTA</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php echo $content; ?>
            <div id="footer">
                UNIVISION
                <a style="color:#008711; cursor: pointer;" class="fab-link" onclick="$('#registerTerms').toggle();">Términos de Uso</a>
                ,
                <a style="color:#008711; cursor: pointer;" class="fab-link" onclick="$('#privacyPopup').toggle();">Política de Privacidad</a>
                &amp;  <a style="color:#008711; cursor: pointer;" class="fab-link" onclick="$('#rulesPopup').toggle();">Reglas Oficiales</a>
                | YOUTOO
                <a style="color:#008711" href="http://www.youtootech.com/terms/" target="_blank">TERMS OF USE</a>
                &amp;
                <a style="color:#008711" href="http://www.youtootech.com/privacy/" target="_blank">PRIVACY POLICY</a>
                &copy; <?php echo date('Y'); ?> Youtoo Technologies, LLC. <a style="color:#008711" href="http://www.youtootech.com/patents" target="_blank">youtootech.com/patents</a>
            </div>
        </div>

        <div id="registerTerms" class="footerPopup">
            <div class="orange closeBar" style="position:relative; top:100px" onclick="$('#registerTerms').toggle();">X</div>
            <div class="pop" style="overflow: scroll">
                <?php $this->renderPartial('/user/_terms'); ?>
            </div>
        </div>

        <div id="privacyPopup" class="footerPopup">
            <div class="orange closeBar" style="position:relative; top:100px" onclick="$('#privacyPopup').toggle();">X</div>
            <div  class="pop" style="overflow: scroll">
                <?php $this->renderPartial('/user/_privacy'); ?>
            </div>
        </div>

        <div id="rulesPopup" class="footerPopup">
            <div class="orange closeBar" style="position:relative; top:100px" onclick="$('#rulesPopup').toggle();">X</div>
            <div class="pop" style="overflow: scroll">
                <?php $this->renderPartial('/user/_rules'); ?>
            </div>
        </div>

        <!-- TERMS MODAL -->
        <div class="termsOverlay" id="termsOverlayTrigger">
            <div class="termsOverlayContent" ></div>
        </div>
        <!-- TERMS MODAL -->
        <?php $this->renderPartial('/csrf/_csrfToken'); ?>
    </body>
</html>