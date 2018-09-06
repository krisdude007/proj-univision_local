<?php
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/webassets/js/jquery.jscrollpane.min.js', CClientScript::POS_END);
$cs->registerScriptFile('/webassets/js/jquery.mousewheel.js', CClientScript::POS_END);
$cs->registerScriptFile('/webassets/js/mwheelIntent.js', CClientScript::POS_END);
$cs->registerScriptFile('/webassets/js/jquery.oauthpopup.js', CClientScript::POS_END);
$cs->registerScript('scrollpane',"$('.scroll-pane').jScrollPane({scrollbarWidth:18,verticalDragMinHeight: 60,verticalDragMaxHeight: 60,horizontalDragMinWidth: 18,horizontalDragMaxWidth: 18,hideFocus: true});");
$videoFormat = '
    <div class="videoBlock">
        <div class="videoThumb"><a href="%s"><img src="%s"  %s  /></a></div>
        <div class="videoData" style="text-align:left;">
            <div class="videoTitle bold">%s</div>
            <div class="videoDate">%s</div>
            <div class="videoByline">by <a href="%s"><span class="bold">%s</span></a></div>
            <div class="videoViews">%s vistas</div>
            <div class="videoRate">%s</div>
        </div>
    </div>
';
$starNum=0;
if(sizeof($videos) != 0){
    foreach($videos as $video){
        $video->user->first_name = (isset($video->user->first_name)) ? $video->user->first_name : $video->first_name;
        $video->user->last_name = (isset($video->user->last_name)) ? $video->user->last_name : $video->last_name;
        $stars='';
        $videoThumbnailWidth ='';
        for($i=0;$i<$video->rating;$i++){
            ++$starNum;
            $stars .= "<img src='/webassets/images/play/star_yellow.png' />";
        }
        for($t=0;$t<5-$i;$t++){
            ++$starNum;
            $stars .= "<img src='/webassets/images/play/star_white.png' />";
        }

        if($video->source == 'instagram' || $video->source == 'vine')
        {
            $videoThumbnailWidth ='class="videoThumbInstagram"';
            $userLink = '#';
            $byName = ucfirst($video->source).': '.$video->source_user_id;
            $byName = '<img src="'.Yii::app()->request->baseUrl.'/core/webassets/images/'.$video->source.'.png" alt="'.$video->source.'" style="width:17px;height:17px;"/> '.$video->source_user_id;
        }
        elseif($video->user->first_name)
        {
            $userLink = '/user/'.$video->user_id;
            $byName = $video->user->first_name.' '.$video->user->last_name;
        }
        else {
             $userLink = '/user/'.$video->user_id;
             $byName = $video->user->username;
        }

        echo sprintf(
            $videoFormat,
            '/play/'.$video->view_key,
            '/'.basename(Yii::app()->params['paths']['video'])."/{$video->thumbnail}.png",
            $videoThumbnailWidth,
            $video->title,
            date("F j, Y",strtotime($video->created_on))." ".date("T"),
            $userLink,
            $byName,
            $video->views,
            $stars
        );
    }
}
?>
