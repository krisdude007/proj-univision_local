<?php

class ClientUserUtility {

    /**
     * login
     *
     * Put these here to avoid duplicate methods for admin and client
     */
    public static function login($user, $adminAuthAttempt = false, $mobileAuthAttempt = false) {
        if ($user->validate()) {

            if ($adminAuthAttempt) {
                $userRecord = $user->isAdmin()->findByAttributes(array('username' => $user->username));
            } else {
                $userRecord = $user->findByAttributes(array('username' => $user->username));
            }

            if (is_null($userRecord)) {
                return false;
            }

            $identity = new UserIdentity($user->username, $user->password, $user->scenario);
            $userLogin = new eUserLogin;
            $userLogin->source = $user->source;
            $userLogin->user_id = $userRecord->id;

            if ($identity->authenticate()) {

                if (!$mobileAuthAttempt) {
                    Yii::app()->user->login($identity, Yii::app()->params['session']['duration']);
                }

                $userLogin->result = 'PASS';
                $userLogin->save();

                $userTech = new eUserTech();
                $userTech->user_id = $userRecord->id;
                $userTech->login_id = $userLogin->id;
                $userTech->user_agent = $_SERVER['HTTP_USER_AGENT'];
                $userTech->screen_height = (isset($_POST['screen_height'])) ? $_POST['screen_height'] : 0;
                $userTech->screen_width = (isset($_POST['screen_width'])) ? $_POST['screen_width'] : 0;
                $userTech->save();

                if (!$mobileAuthAttempt) {
                    //Yii::app()->user->setFlash('success', Yii::app()->params['flashMessage']['loginSuccess']." {$userRecord->first_name}");
                }

                return true;
            } else {

                $userLogin->result = 'FAIL';
                $userLogin->save();

                if (defined('SET_FLASH') && SET_FLASH) {
                    if (!$mobileAuthAttempt) {
                        Yii::app()->user->setFlash('error', Yii::app()->params['flashMessage']['loginError']);
                    }
                }
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * logout
     *
     * Put these here to avoid duplicate methods for admin and client
     */
    public static function logout() {
        Yii::app()->request->cookies->clear();
        $audit = new eAudit;
        $audit->action = 'Logged Out';
        $audit->save();
        Yii::app()->user->logout();
        return true;
    }

    public static function getAvatar($user) {
        $image = eImage::model()->accepted()->isAvatar()->findByAttributes(array('user_id' => $user->id));
        $twitter = eUserTwitter::model()->findByAttributes(Array('user_id' => $user->id));
        $facebook = eUserFacebook::model()->findByAttributes(Array('user_id' => $user->id));
        if (is_null($image)) {
            if (is_null($twitter) && is_null($facebook)) {
                return '/webassets/images/you/profile-avitar.png';
            } else {
                if (is_null($twitter)) {
                    return FacebookUtility::getAvatarFromID($facebook->facebook_user_id);
                } else {
                    return TwitterUtility::getAvatarFromID($twitter->twitter_user_id);
                }
            }
        } else {
            return PATH_USER_IMAGES . "/{$image->filename}";
        }
    }

    public static function register($user, $userEmail, $userLocation) {
        //forcefully execute all validate for error message
        if ($user->save()) {
            $valEmail = $userEmail->validate();
            $valLocation = $userLocation->validate();
            if ($valEmail && $valLocation) {
                $userEmail->user_id = $user->id;
                $userLocation->user_id = $user->id;
                $userEmail->save();
                $userLocation->save();
                $audit = new eAudit;
                $audit->user_id = $user->id;
                $audit->action = 'created an account via ' . $user->source;
                $audit->save();
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public static function getAvailablePermissions() {
        $declaredClasses = get_declared_classes();
        foreach (glob('{' . Yii::getPathOfAlias('core.controllers') . '/Admin*Controller.php,' . Yii::getPathOfAlias('client.controllers') . '/Admin*Controller.php}', GLOB_BRACE) as $controller) {
            $class = basename($controller, ".php");
            if (!in_array($class, $declaredClasses)) {
                include_once($controller);
            }
        }
        foreach (get_declared_classes() as $class) {
            if (preg_match('/^Admin\w+Controller/', $class)) {
                $classes[strtolower(preg_replace('/Controller/', '', $class))] = implode(' ', preg_split('/(?<=\\w)(?=[A-Z])/', preg_replace('/Controller/', '', $class)));
            }
        }
        ksort($classes);

        $permissionsExtended = unserialize(USER_PERMISSIONS_EXTENDED);

        if (!empty($permissionsExtended)) {
            $classes = CMap::mergeArray($classes, $permissionsExtended);
        }

        return $classes;
    }

}

?>
