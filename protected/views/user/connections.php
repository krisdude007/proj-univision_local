<?php
/* @var $this UserController */
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->request->baseurl.'/webassets/js/jquery.oauthpopup.js', CClientScript::POS_END);

?>
<div id="content">
    <div class="you">
        <?php
        $this->renderPartial('/user/_sidebar', array(
            'user' => $user,
                )
        );
        ?>
        <div class="verticalRule">
        </div>
        <div class="youContent" style="text-align: left;">
            <h1>Conéctate</h1>
            <div class="textBox" style="height: 116px; background-color: #fff; padding:20px;">
                <h4 style="margin-bottom:20px;color:#636363">Haz clic abajo para conéctate con tus cuentas de Twitter y Facebook.</h4>
                <div class="twitter" style="float:left;color: #008711">
                    <span id="twitter_user">
                        <?php if (!empty($user->userTwitters[0]->id)): ?>
                            <a href="#" id="tw_conn" rel="1">
                                <img src="<?php echo Yii::app()->request->baseurl;?>/webassets/images/twitterSelected.png" />
                            </a>
                            <a style="color:#008711;font-weight: bold;" href="http://www.twitter.com/<?php echo $twuser->screen_name; ?>" target="_blank"><?php echo $twuser->screen_name; ?></a>
                        <?php else: ?>
                            <a href="#" id="tw_conn" rel="0">
                                <img class="img" src="<?php echo Yii::app()->request->baseurl;?>/webassets/images/twitter.png" />
                            </a>
                            <b style="color:#636363;">Conectar</b>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="facebook" style="float:left;margin-left: 40px;">
                    <span id="facebook_user">
                        <?php if (!empty($user->userFacebooks[0]->id)): ?>
                            <a href="#" id="fb_conn" rel="1">
                                <img src="<?php echo Yii::app()->request->baseurl;?>/webassets/images/facebookSelected.png" />
                            </a>
                            <a style="color:#008711;font-weight: bold;" href="<?php echo $facebook['link']; ?>" target="_blank"><?php echo $facebook['name']; ?></a>
                        <?php else: ?>
                            <a href="#" id="fb_conn" rel="0">
                                <img src="<?php echo Yii::app()->request->baseurl;?>/webassets/images/facebook.png" />
                            </a>
                            <b style="color:#636363;">Conectar</b>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>