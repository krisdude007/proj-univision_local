<?php

class clientQuestionController extends QuestionController {

    public $layout = '//layouts/main';
    public $user;
    public $ticker; // used for ticker form shown on every page when user is logged in

    public function actionIndex($type = 'video') {

//        $json = file_get_contents("https://miembros.univision.com/crm/login/validateLoginCookie?callback=jsonp");
//
//        var_dump($json);
//        exit();
        

        if (isset($_COOKIE['ls']) && Yii::app()->user->isGuest) {      //email, password
            $username = pack("H*", $_COOKIE['a']);
            $userRecord = eUser::model()->findByAttributes(array('username' => $username));
            if (!is_null($userRecord)) {// check if user already exists
                $userRecord->scenario = 'reset';
                if (ClientUserUtility::login($userRecord)) {
                    AuditUtility::save($this, $_REQUEST);
                }
            }
            //register and save a record in our system with some test data for univision users
            else {
                $user = new clientUser;
                $userEmail = new eUserEmail;
                $userLocation = new eUserLocation;

                $hex = pack("H*", $_COOKIE['d']);
                $birthday = substr($hex,(strpos($hex,"B=")+2), 10);
                $user->birthDay = substr($birthday, -2);
                $user->birthMonth = substr($birthday, -5, 2);
                $user->birthYear = substr($birthday, 0, 4);
                $gender = substr($hex,(strpos($hex,"G=")+2), 1);
                $zipcode = substr($hex,(strpos($hex,"Z=")+2),5);
                $user->username = pack("H*", $_COOKIE['a']);
                $user->first_name = '';
                $user->last_name = '';
                $userEmail->email = pack("H*", $_COOKIE['uv']);
                $userLocation->postal_code = $zipcode ? $zipcode : 75039;
                //$user->birthday = $user->birthYear . '-' . $user->birthMonth . '-' . $user->birthDay;
                $user->birthday = $birthday;
                $password = 'Test' . substr($birthday, 0, 4);
                $user->password = $password;

                $user->gender = $gender;
                $user->source = 'web';
                $userEmail->type = 'primary';
                $userEmail->active = 1;
                $userLocation->type = 'primary';

                ClientUserUtility::register($user, $userEmail, $userLocation);
                $userRecord->scenario = 'reset';
                if (ClientUserUtility::login($user)) {
                    AuditUtility::save($this, $_REQUEST);
                    // MailUtility::send('welcome', $userEmail->email);
                }
            }
            /* bof Phase 2 integration */
            $this->redirect('/videos');
            /* eof Phase 2 integration */
        } elseif (isset($_COOKIE['ls'])) {

        } else {
            if(!Yii::app()->user->isGuest)
                ClientUserUtility::logout();
        }
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->params['custom_params']['clientRedirectUrl'] . rawurlencode(Yii::app()->createAbsoluteUrl('question/index')));
        }
        $this->render('index', array(
            'type' => $type,
            'questions' => eQuestion::model()->{$type}()->current()->findAll(),
            'ad' => eAd::model()->current()->find(),
                )
        );
    }

}