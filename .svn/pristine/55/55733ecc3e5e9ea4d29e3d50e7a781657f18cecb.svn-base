<div id="fabmob_videos-container">
    <?php
    $videoFormat = '
        <div class="fabmob_video-container">
            <div>%s</div>
            <div class="fabmob_video-copy-container">
                <h5 class="fabmob_video-title">%s</h5>
                <h6 style="color:grey;margin: 3px 0px;">by <span class="bold">%s</span></h6>
                <h6 style="color:grey;margin: 3px 0px;">%s vistas</h6>
            </div>
        </div>
    ';
    foreach ($videos as $video) {
        //$player = (isset($video->brightcoves[0]->brightcove_id) && is_numeric($video->brightcoves[0]->brightcove_id)) ? '_brightcovePlayer' : '_fallbackPlayer';
        $player = '_fallbackPlayer';
        $videoTag = $this->renderPartial($player, array(
            'video' => $video,
        ),true);
        $fullname = empty(trim($video->user->first_name . " " . $video->user->last_name)) ? "N/A" : trim($video->user->first_name . " " . $video->user->last_name);
        $stars = '';
        $starNum = 0;
        for ($i = 0; $i < $video->rating; $i++) {
            ++$starNum;
            $stars .= "<img src='/webassets/images/play/star_yellow.png' />";
        }
        for ($t = 0; $t < 5 - $i; $t++) {
            ++$starNum;
            $stars .= "<img src='/webassets/images/play/star_white.png' />";
        }
        echo sprintf($videoFormat,
                $videoTag,
                //'/' . basename(Yii::app()->params['paths']['video']) . "/{$video->thumbnail}.png",
                $video->title,
                //date("F j, Y",strtotime($video->created_on))." ".date("T"),
                $fullname, $video->views//,$stars
        );
    }
    ?>
</div>