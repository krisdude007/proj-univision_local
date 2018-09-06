<?php

class clientVideoController extends VideoController {

    public $layout = '//layouts/main';
    public $user;
    public $ticker;

    public function actionIndex($order = 'recent') {
        $limit = 99;
        if ($order == 'recent')
            $order = "t.id";
        $criteria = new CDbCriteria();
        $criteria->select = array('*','COUNT(videoViews.id) AS views','(select Avg(rating) from video_rating where video_id= t.id) as rating');
        $criteria->with = array('user', 'brightcoves', 'videoViews');
        $criteria->together = true;
        $criteria->condition = Yii::app()->params['video']['useExtendedFilters'] ? ("t.statusbit & " . Yii::app()->params['statusBit']['accepted'] . " AND (t.statusbit & " . Yii::app()->params['statusBit']['denied'] . ") = 0") : 't.status="accepted"';
        $criteria->group = 't.id';
        $criteria->order = $order . ' DESC';
        $videos = eVideo::model()->findAll($criteria);

        $sweepstake = null;
        $sweepstakeuser = null;
        if (Yii::app()->params['enableSweepstakes']) {
            $sweepstake = eSweepStake::model()->current()->find(); //->active()
            if (!is_null($sweepstake)) {
                $sweepstakeuser = eSweepStakeUser::model()->findByAttributes(Array('sweepstake_id' => $sweepstake->id, 'user_id' => Yii::app()->user->getId()));
            }
        }
        $this->render('index', array(
            'videos' => $videos,
            'sweepstake' => $sweepstake,
            'sweepstakeuser' => $sweepstakeuser,
            'ad' => eAd::model()->current()->find(),
        ));
    }

    public function actionRecord($id = 0) {
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->createUrl('/login'));
        } else {
            $user = eUser::model()->findByPK(Yii::app()->user->getId());
            if (!$user->terms_accepted) {
                $this->redirect(Yii::app()->createURL('/you/terms'));
            }
            if ($id == 0) {
                $questions = eQuestion::model()->video()->current()->findAll();
                foreach ($questions as $q) {
                    $question = $q->question;
                    $id = $q->id;
                }
            } else {
                $questions = eQuestion::model()->findByPK($id);
                $question = $questions->question;
            }
            if (!is_null($question)) {
                $this->render('recorder', array(
                    'question' => $question,
                    'question_id' => $id,
                    'duration' => Yii::app()->params['video']['duration'],
                    'user_id' => Yii::app()->user->getId(),
                    'wowzaip' => Yii::app()->params['wowza']['clientip'],
                    'ad' => eAd::model()->current()->find(),
                ));
            } else {
                $this->redirect('/');
            }
        }
    }

    public function actionVideoUpload($id = 0) {

        if (Yii::app()->user->isGuest) {
            $this->redirect('/login');
        }

        $uploadvideo = new FormVideoUpload;
        if ($id == 0) {
                $questions = eQuestion::model()->video()->current()->findAll();
                foreach ($questions as $q) {
                    $question = $q->question;
                    $id = $q->id;
                }
            } else {
                $uploadvideo->question_id = $id;
            }
        $uploadvideo->is_ad = 0;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'video-uploader-form') {
            echo CActiveForm::validate(array($uploadvideo));
            Yii::app()->end();
        }

        if (isset($_POST['FormVideoUpload'])) {
            $uploadvideo->attributes = $_POST['FormVideoUpload'];
            $uploadvideo->video = CUploadedFile::getInstance($uploadvideo, 'video');
            if ($uploadvideo->validate()) {

                $filename = uniqid('UP');
                $fileExtension = $uploadvideo->video->extensionName;
                $fileInput = Yii::app()->params['paths']['video'] . '/' . $filename . '.' . $fileExtension;
                $fileOutput = Yii::app()->params['paths']['video'] . '/' . $filename . '.mp4';
                $fileThumb = Yii::app()->params['paths']['video'] . '/' . $filename . '.png';
                $fileGif = Yii::app()->params['paths']['video'] . '/' . $filename . '.gif';

                $uploadvideo->video->saveAs($fileInput);

                $durationArray = VideoUtility::getVideoDuration($fileInput);
                $duration = explode('.', $durationArray[2]);
                $duration = round($duration[0]);
                //$duration = DateTimeUtility::secsToTimecode(Yii::app()->params['video']['duration']) . ".00";
                // convert to mp4

                $watermarkVideo = eAppSetting::model()->findByAttributes(Array('attribute' => 'water_mark_on_video'));
                $watermark = "";
                if ($watermarkVideo->value == 1) {
                    $watermark = $_SERVER['DOCUMENT_ROOT'] . Yii::app()->params['video']['watermark'];
                }
                $videoEncoded = VideoUtility::ffmpegFlvToMp4($fileInput, $fileOutput, $duration, $watermark = '');

                if ($videoEncoded) {

                    // generate thumb
                    VideoUtility::ffmpegGenerateThumbFromVideo($fileOutput, $fileThumb);

                    // generate gif
                    VideoUtility::ffmpegMp4ToGif($fileOutput, $fileGif);

                    // add record
                    $record = array();
                    $record['filename'] = $filename;
                    $record['thumbnail'] = $filename;
                    if ($uploadvideo->question_id != '0') {
                        $record['question_id'] = $uploadvideo->question_id;
                    }

                    $record['arbitrator_id'] = Yii::app()->user->getId();
                    $record['user_id'] = Yii::app()->user->getId();
                    $record['processed'] = 1;
                    $record['source'] = 'upload';
                    $record['title'] = $uploadvideo->title;
                    $record['description'] = $uploadvideo->description;

                    $record['view_key'] = eVideo::generateViewKey();
                    $record['duration'] = $duration;
                    $record['watermarked'] = (file_exists($watermark)) ? 1 : 0;

                    $fileInfo = VideoUtility::getID3Info($fileOutput);
                    $record['frame_rate'] = $fileInfo['video']['frame_rate'];
                    $inserted = eVideo::insertRecord($record);

                    $autoApprove = eAppSetting::model()->findByAttributes(Array('attribute' => 'auto_approve_submitted_videos'));
                    if ($autoApprove->value) {
                        $inserted->status = 'accepted';
                        if (Yii::app()->params['video']['useExtendedFilters']) {
                            $inserted->extendedStatus['accepted'] = true;
                            $inserted->extendedStatus['new_tv'] = true;
                        }
                    } else {
                        $inserted->status = 'new';
                        if (Yii::app()->params['video']['useExtendedFilters']) {
                            $inserted->extendedStatus['new'] = true;
                            $inserted->extendedStatus['new_tv'] = true;
                        }
                    }

                    // see if user selected share to twitter or facebook
                    if ($uploadvideo->to_twitter == '1')
                        if (eUserTwitter::model()->countByAttributes(array('user_id' => Yii::app()->user->id)) == 0)//no connection to twitter
                            $inserted->to_twitter = 0;
                        else{
                            $inserted->to_twitter = 1;
                        }
                    if ($uploadvideo->to_facebook == '1')
                        if (eUserFacebook::model()->countByAttributes(array('user_id' => Yii::app()->user->id)) == 0)//no connection to facebook
                            $inserted->to_facebook = 0;
                        else{
                            $inserted->to_facebook = 1;
                        }

                    if ($inserted) {
                        $inserted->save();
                         
                        $this->redirect('/video/thanks');
                    } else {
                        Yii::app()->user->setFlash('error', 'Unable to insert video record.');
                    }
                } else {
                    Yii::app()->user->setFlash('error', 'Unable to encode video.');
                }
            }
        }
        $this->render('videoupload', array(
            'uploadvideo' => $uploadvideo,
            'ad' => eAd::model()->current()->find(),
        ));
    }

    public function actionProcess($id = 0) {
        if (Yii::app()->user->isGuest) {
            $this->redirect('/');
        }
        if ($id == 0) {
            $this->redirect(Yii::app()->createUrl('/record'));
        }
        $video = eVideo::model()->findByPK($id);
        if ($video->user_id != Yii::app()->user->getId()) {
            $this->redirect(Yii::app()->createUrl('/record'));
        }
        if (is_null($video) || $video->processed == 1) {
            $this->redirect(Yii::app()->createUrl('/record'));
        }
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'video-process-form') {
            echo CActiveForm::validate(array($video));
            Yii::app()->end();
        }
        $this->download($id);
        if (isset($_POST['eVideo'])) {
            $video->attributes = $_POST['eVideo'];
            if ($video->validate()) {

                // see if user selected share to twitter or facebook
                if ($video->to_twitter == '1') {

                    // check to see if user has connected a twitter account
                    if (eUserTwitter::model()->countByAttributes(array('user_id' => Yii::app()->user->id)) == 0) {

                        // set to_twitter back to false
                        $video->to_twitter = 0;
                    }
                }

                // see if user selected share to twitter or facebook
                if ($video->to_facebook == '1') {

                    // check to see if user has connected a twitter account
                    if (eUserFacebook::model()->countByAttributes(array('user_id' => Yii::app()->user->id)) == 0) {

                        // set to_facebook back to false
                        $video->to_facebook = 0;
                    }
                }

                $autoApprove = eAppSetting::model()->findByAttributes(Array('attribute' => 'auto_approve_submitted_videos'));

                if ($autoApprove->value) {
                    $video->status = 'accepted';

                    if (Yii::app()->params['video']['useExtendedFilters']) {
                        $this->extendedStatus['accepted'] = true;
                        $this->extendedStatus['new_tv'] = true;
                    }
                }

                // save the video
                $video->save();

                if ($video->status == 'accepted') {
                    AuditUtility::save($this, false, Array('action' => 'autoApprove', 'type' => 'video', 'id' => $video->id));
                }
                $this->encode($video->id);
                if (Yii::app()->Paypal->active) {
                    $paypal = PaymentUtility::paypal($video);
                    if ($paypal['response'] == 'success') {
                        $this->redirect($paypal['url']);
                    } else {
                        var_dump($paypal);
                        //$this->redirect(Yii::app()->createURL('/thanks'));
                    }
                } else {
                    $this->redirect(Yii::app()->createURL('/thanks'));
                }
                return true;
            }
        }
        $this->render('process', array(
            'model' => $video,
            'question_id' => $video->question_id,
            'videoInfo' => Array(
                'videofile' => '/' . basename(Yii::app()->params['paths']['video']) . "/{$video->filename}" . '.flv',
                'image' => '/' . basename(Yii::app()->params['paths']['video']) . "/{$video->thumbnail}" . '.png',
                'width' => 426,
                'height' => 240,
            ),
            'ad' => eAd::model()->current()->find(),
        ));
    }

    public function actionThanks() {
        if (Yii::app()->user->isGuest) {
            $this->redirect('/');
        }
        $videos = eVideo::model()->findAllByAttributes(Array('user_id' => Yii::app()->user->getId()));
        $questions = eQuestion::model()->video()->current()->findAll();
        foreach ($videos as $video) {
            $user_answered[] = $video->question_id;
        }
        foreach ($questions as $question) {
            if (in_array($question->id, $user_answered)) {
                continue;
            } else {
                break;
            }
        }
        $question = (is_null($question)) ? eQuestion::model()->video()->current()->find() : $question;
        $sweepstake = null;
        $sweepstakeuser = null;
        if (Yii::app()->params['enableSweepstakes']) {
            $sweepstake = eSweepStake::model()->current()->find();
            if (!is_null($sweepstake)) {
                $sweepstakeuser = eSweepStakeUser::model()->findByAttributes(Array('sweepstake_id' => $sweepstake->id, 'user_id' => Yii::app()->user->getId()));
            }
        }
        $this->render('thanks', array(
            'question' => $question,
            'sweepstake' => $sweepstake,
            'sweepstakeuser' => $sweepstakeuser,
            'ad' => eAd::model()->current()->find(),
        ));
    }
}

