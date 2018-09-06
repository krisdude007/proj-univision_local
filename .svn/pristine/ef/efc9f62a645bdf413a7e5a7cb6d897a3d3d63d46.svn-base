<?php
class clientSiteController extends SiteController
{
    public function actionIndex($order = 'recent'){
        if (isset($_COOKIE['ls']) && Yii::app()->user->isGuest) {
            $this->redirect('/questions');
        }

        $limit = 4;
        switch ($order) {
            case 'recent':
                $criteria = new CDbCriteria();
                $criteria->limit = $limit;
                $videos = eVideo::model()->with('user')->accepted()->recent()->findAll($criteria);
                break;
            default:
                $video = new eVideo;
                $videos = $video->orderBy(NULL, $order, $limit);
                break;
        }
        $this->render('index', array(
            'videos' => $videos,
        ));
    }
}