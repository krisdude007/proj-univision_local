<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require('constants.php'); // backward compatibility 

$config = require_once "env_manager.php";
$config_array = array(
    'import' => array(
        'client.models.*',
        'client.components.*',
    ),
    //'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name' => 'UNIVISION',
    'timeZone' => 'America/New_York',
    // preloading 'log' component
    'preload' => array('log'),
    'language' => 'es',
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
      'loginUrl' => array('login'),
           'class' => 'WebUser',
            'autoUpdateFlash' => false,
         ),
        'request' => array(
            'csrfTokenName' => 'CSRF_TOKEN',
            'enableCsrfValidation' => false,
            'enableCookieValidation' => true,
            'class' => 'HttpRequest',
        //'class' => 'application.components.GHttpRequest',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'showScriptName' => false,
            'urlFormat' => 'path',
            'rules' => array(
                'thanks' => '/video/thanks',
                'help' => '/user/help',
                'capture' => '/video/capture',
                'process/<id:\d+>' => '/video/process',
                'register' => '/user/register',
                'login' => '/user/login',
                'logout' => '/user/logout',
                'forgot/<key:\w+>' => '/user/forgot',
                'forgot' => '/user/forgot',
                'videos' => '/video/index',
                'videos/<order:\w+>' => '/video/index',
                'videoupload/<id:\d+>' => '/video/videoupload',
                'play/<view_key:\w+>' => '/video/play',
                'images' => '/image/index',
                'images/<order:\w+>' => '/image/index',
                'viewimage/<view_key:\w+>' => '/image/view',
                'avatar' => '/user/userphoto',
                'vote/<id:\d+>' => '/poll/index',
                'vote' => '/poll/index',
                'you' => '/user/index',
                'mobilePrivacy' => '/user/mobilePrivacy',
                'mobileTerms' => '/user/mobileTerms',
                'mobileRules' => '/user/mobileRules',
                'terms' => '/user/termsoverlay',
                'privacyoverlay' => '/user/privacyoverlay',
                'you/<order:recent|views|rating>' => '/user/index',
                'you/imageview/<order:recent|views|rating>' => '/user/imageview',
                'you/<action:\w+>' => '/user/<action>',
                'record/<id:\d+>' => '/video/record',
                'record' => '/video/record',
                'upload/<id:\d+>' => '/image/upload',
                'upload' => '/image/upload',
                'videoupload/<id:\d+>' => '/video/videoupload',
                'videoupload' => '/video/videoupload',
                'password' => '/user/password',
                'profile' => '/user/profile',
                'youtooterms' => '/user/youtooterms',
                'youtooprivacy' => '/user/youtooprivacy',
                'questions' => '/question/index',
                'ticker' => '/ticker/index',
                'user' => '/user',
                'user/<id:\d+>' => '/user/view',
                'user/<id:\d+>/<order:\w+>' => '/user/view',
                'user/video/<id:\d+>' => '/user/video',
                'user/image/<id:\d+>' => '/user/image',
                'user/video/<id:\d+>/<order:\w+>' => '/user/video',
                'user/image/<id:\d+>/<order:\w+>' => '/user/image',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => "mysql:host={$config->db_host};dbname={$config->db_name}",
            'schemaCachingDuration' => 3600,
            'emulatePrepare' => true,
            'username' => $config->db_user,
            'password' => $config->db_pass,
            'charset' => 'utf8',
        ),
        'cache' => array(
            'class' => 'system.caching.CMemCache',
            'servers' => array(
                array(
                    'host' => $config->memcached_host,
                    'port' => $config->memcached_port
                ),
            ),
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    'twitter' => array(
            'active' => true,
            'advancedFilters' => true,
            'class' => 'ext.yiitwitteroauth.YiiTwitter',
            'accountName' => '',
            'consumer_key' => 'RChO1lBGkJvQTZhOgjbw8A',
            'consumer_secret' => 'NLD9sTbY1YLWz7SbvSNvQ80RTRBfoRGvAluYYJZy8',
            'callback' => 'http://' . $_SERVER['HTTP_HOST'] . '/twitterConnect',
            'streamFile' => $_SERVER['DOCUMENT_ROOT'] . '/twitter.txt',
            'adminAccessToken' => '1967328594-hg0MWwc1GtYkdnfQUyOnrruBx3gDrzRCRWRpydB',
            'adminTokenSecret' => 'HnyF8uzVKxU1I6iR55iHOCjTtrCYOiasYXkMATPmE',
            'filterLatitude' => '37.09024',
            'filterLongitide' => '-95.712891',
            'renderTwitterMetaTags' => true,
        ),
    'facebook' => array(
            'appNamespace' => 'UnivisionDeportes',
            'pageId' => '173155703431',
            'class' => 'ext.yii-facebook-opengraph.SFacebook',
            'appId' => '599797423449610', // needed for JS SDK, Social Plugins and PHP SDK
            'secret' => '4494b32157e4245e1e3f0546627070da', // needed for the PHP SDK
            'fileUpload' => true, // needed to support API POST requests which send files
            //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
            //'locale'=>'en_US', // override locale setting (defaults to en_US)
            //'jsSdk'=>true, // don't include JS SDK
            //'async'=>true, // load JS SDK asynchronously
            //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
            //'status'=>true, // JS SDK - check login status
            //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
            //'oauth'=>true,  // JS SDK - enable OAuth 2.0
            //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
            //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
            //'html5'=>true,  // use html5 Social Plugins instead of XFBML
            'ogTags' => array(// set default OG tags
                'title' => 'UNIVISION',
                'description' => 'UNIVISION',
                'image' => '',
            ),
        ),
        'Paypal' => array(
            'active' => true,
            'class' => 'application.components.Paypal',
            'apiUsername' => 'kyrie42-facilitator_api1.gmail.com',
            'apiPassword' => '1364840459',
            'apiSignature' => 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAMim7FhqR5hEznOFh8CIior9BSdJ',
            'apiLive' => false,
            'returnUrl' => 'paypal/confirm/', //regardless of url management component
            'cancelUrl' => 'paypal/cancel/', //regardless of url management component
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
     'session' => array('durationOffset' => 60 * 5,
            'duration' => 86400),
    'email' => array(
            'title' => 'BECAUSE FUTBOL',
            'mailto' => 'youtootechsupport@youtootech.com',
            'showEmailAssistanceLink' => false,
        ),
    'clientIframeUrl' => 'http://futbol.univision.com/beta/fifa-copa-mundial/equipos/',
    'enableSweepstakes' => false,
    'useMobileTheme' => true,
    'enableYtFunctionality' => false,
    'showUserCountry' => false,
    'noCsrfValidationRoutes' => array('facebook/index'),
    'client' => $subdomain,
        'maxActiveQuestions' => 5,
         'perPage' => 50,
        
        'vine' => array(
            'username' => 'greg.stringer@gmail.com',
            'password' => 'i!ur@ss4o',
            'url' => 'https://api.vineapp.com',
            'ext' => '.mp4',
        ),
        'keek' => array(
            'username' => 'greg.stringer@gmail.com',
            'password' => 'g33m4n',
            'url' => 'https://www.keek.com',
            'url2' => 'https://keek-a.akamaihd.net/keek/video/{VIDEO_ID}/flv',
            'ext' => '.flv',
        ),
    'brightcove' => array(
            'playerID' => '2929404779001',
            'playerKey' => 'AQ~~,AAABqrGtIvE~,QfeoOVnmCtU2RJSnX8vs_7c53vsvAF2X',
        ),
      'ftp' => array(
            'server' => '192.155.112.163',
            'port' => 21,
            'secure' => false,
            'passive' => true,
            'user' => 'youtoo',
            'pass' => 'youtoo',
            'uploadPath' => '/ProRes',
            'uploadPathMxf'=>'/MXF',
            'sendVideoXML' => false,
            'sendImageXML' => false,
        ),
    'reporting' => array(
            'showTwitterAmplifyStats' => false,
            'showImageStats' => false,
        ),
        'ticker' => array(
            'allowCreateAsEntity' => false,
            'sleepTime' => 10,
            'breakingTweets' => false,
            'defaultHashtag' => '',
            'defaultEndTime' => time() + 60 * 60 * 24,
            'defaultQuestion' => 0,
            'useExtendedFilters' => false,
            'extendedFilterLabels' => array(array('new' => 'New Web', 'accepted' => 'Accepted Web'),
    array('newtv' => 'New TV', 'acceptedtv' => 'Accepted TV')),
            'superAdminExtendedFilterLabels' => array('denied' => 'Denied Web', 'deniedtv' => 'Denied TV'),
        ),
       'video' => array(
            'filePrefix' => 'UP',
            'watermark' => '/webassets/images/watermark.png',
            'watermarkLocation' => 'topRight',
            'duration' => 60,
            'fps' => 30,
            'imageExt' => '.png',
            'preExt' => '.flv',
            'postExt' => '.mp4',
            'flipExt' => '.mov',
            'allowMovUploadToNetwork' => true,
            'allowMxfUploadToNetwork' => true,
            'acceptedFileTypes' => 'mov',
            'maxUploadFileSize' => 1024 * 1024 * 100,
            'allowCustomFileNameToNetwork' => true,
            'useEvalForCustomFileName' => false,
            'customFileNamePrefix' => 'BEC' . date('m') . date('d'),
            'customFileNameExt' => '.mov',
            'customFileNameExtMxf' => '.mxf',
            'customFileNameFormat' => '{INCREMENTED_VALUE}',
            'defaultHashtag' => '',
            'defaultEndTime' => time() + 365 * 60 * 60 * 24,
            'useExtendedFilters' => false,
            'extendedFilterLabels' => array(array('new' => 'New', 'accepted' => 'Accepted')),
            'superAdminExtendedFilterLabels' =>array('denied' => 'Denied', 'all' => 'All'),
            'allow3rdPartyImport' => true,
            'allowImportVine' => true,
            'allowImportKeek' => false,
            'allowImportInstagram' => true,
            'adminAllowUpload' => true,
            'adminAllowAdUpload' => false,
            'adminAllowAmplify' => false,
            'autoFtpBasedOnStatus' => false,
            'autoFtpStatuses' => array(''),
        ),
        'ffmpeg' => array(
            'concatParams' => '-q:v 1 -async 1  -r 30 -b:v 2M -bt 4M -vcodec libx264 -preset placebo -g 1 -s 1920:1080 -s 1920x1080 -movflags +faststart -acodec libfdk_aac -ac 2 -ar 48000 -ab 192k -bufsize 10k',
            'tvParams' => '-y -i {FILE_INPUT} -s 1920:1080 -vcodec prores -profile:v 2 -b 294000k -minrate 294000k -maxrate 294000k -top 0 -s 1920x1080 -r 30000/1001 -acodec pcm_s16le -ar 48000 -bufsize 294000k -b:v 294000k -y {FILE_OUTPUT}',
            'tvParamsMxf' => '-y -i {FILE_INPUT} -s 1920x1080 -vcodec mpeg2video -s 1920x1080 -b:v 145000k -r 60000/1001 -top 1 -qscale 1 -qmin 1 -intra -ar 48000 {FILE_OUTPUT_MXF}',
            'imageToVideoParams' => '-loop 1 -f image2 -r 29.97 -i {FILE_INPUT} -vcodec libx264 -t 00:00:01 {FILE_OUTPUT} -y',
            'imageToVideoToTvParams' => '-i {FILE_INPUT} -vcodec libx264 -preset placebo -bufsize 5000 -g 1 -acodec libfdk_aac -ac 2 -ar 48000 -ab 192k -r 30000/1001 {FILE_OUTPUT} -y',
            'imageToVideoWithAudioParams' => '-i {FILE_INPUT_AUDIO} -i {FILE_INPUT} -map 0:0 -map 1:0 {FILE_OUTPUT} -shortest -y',
            'imageScaleParams' => ' -i {FILE_INPUT} -vf "scale=iw*min(1920/iw\,1080/ih):ih*min(1920/iw\,1080/ih), pad=1920:1080:(1920-iw*min(1920/iw\,1080/ih))/2:(1080-ih*min(1920/iw\,1080/ih))/2" {FILE_OUTPUT} -y',
        ),
        'videoAdmin' => array(
            'perPage' => 12,
            'indicatorThreshold' => array(
                'min' => 0.2,
                'max' => 0.5,
            ),
        ),
    'image' => array(
            'allowImageToVideo' => true,
            'acceptedFileTypes' => 'gif,png,jpg,jpeg',
            'maxUploadFileSize' => 1024 * 1024 * 5,
            'allowCustomFileNameToNetwork' => true,
            'useEvalForCustomFileName' => false,
            'customFileNamePrefix' =>'UND' . date('m') . date('d'),
            'customFileNameFormat' =>'{INCREMENTED_VALUE}',
            'autoApprove' => false,
            'autoApproveAvatar' => true,
            'useExtendedFilters' => false,
            'extendedFilterLabels' => array(array('new' => 'New Web', 'accepted' => 'Accepted Web'),
                                                        array('newtv' => 'New TV', 'acceptedtv' => 'Accepted TV')),
            'superAdminExtendedFilterLabels' => array('denied' => 'Denied Web', 'deniedtv' => 'Denied TV', 'all' => 'All'),
        ),
    'imageAdmin' => array(
            'perPage' => 12,
        ),
    'training' => array(
            'showManual' => true,
        ),
    'analytics' => array(
            'username' => 'lee4youtoo@gmail.com',
            'password' => 'Dallas1101',
            'projectId' => 86308707,
            'startDate' => '2014-05-21',
        ),
    'mobileAPI' => array(
            'sessionTimeoutSecs' => 60 * 60,
        ),
      'user' => array(
            'extendedPermissions' => array(),
        ),
        'features' => array(
            "HAS_VIDEO",
        "HAS_USER",
            "HAS_AUDIT",
            "HAS_DAILY_REPORT",
            "HAS_QUESTION_REPORT",
            "HAS_REPORT", 
        "HAS_QUESTION_VIDEO", 
        "HAS_CONTACT",
            "HAS_TRAINING"
       ),
        'statusBit' => array(
            'new' => 128,
            'accepted' => 64,
            'denied' => 32,
            'newTv' => 16,
            'acceptedTv' => 8,
            'deniedTv' => 4,
            'acceptedSuperAdmin1' => 2,
            'acceptedSuperAdmin2' => 1,
        ),
        'xml' => array(
            'encoding' => 'utf-16',
        ),
    'flashMessage' => array(
            'loginSuccess' => 'Hola.',
            'loginError' => 'Nombre de usuario o contraseña no válidos.',
            'profileUpdateSuccess' => 'Perfil de usuario actualizada.',
            'avatarUpdateSuccess' => 'Imagen de perfil del usuario actualizada.',
            'avatarUpdateError' => 'Unable to update Avatar.',
            'registrationSuccess' => 'Has registrado correctamente. Revise su correo electrónico para recibir la confirmación',
            'registrationError' => 'Failed to register.',
            'passwordUpdateSuccess' => 'Actualiza la contraseña del usuario.',
            'tickerSuccess' => 'Ticker ahorrado!',
            'tickerError' => 'Incapaz de salvar ticker',
            'tickerInactive' => 'Ticker is not active',
            'resetPasswordSuccess' => '<h2>Gracias por enviar una solicitud</h2>Pronto, te enviaremos instrucciones para que cambies tu contraseña a tu correo electrónico.',
            'resetPasswordError' => 'No se pudo enviar un mensaje de restablecimiento de',
            'imageUploadSuccess' => 'Foto subido correctamente.',
            'videoUploadSuccess' => 'Video uploaded successfully.',
            'invalidFiletype' => 'Invalid file type.',
        ),
    'custom_params' => array(
            'clientRedirectUrl' =>'https://miembros.univision.com/crm/login?redir=',
            'toggle_preview_ticker' => false,
            'youtoo_peoplemercials_or_famespots' => false,
            'invalid_file_type' => 'El archivo que intentas subir est√° en el formato incorrecto. Por favor intenta subir un .mov de hasta ' . ((1024 * 1024 * 100) / 1024 / 1024) . 'Mb',
            'invalid_file_size' => 'El archivo que inentas subir es muy grande. El tama√±o m√°ximo es de' . ((1024 * 1024 * 100) / 1024 / 1024) . 'Mb.',
            'terms_of_service' => 'Debe aceptar las condiciones para utilizar nuestro servicio',
            'video_share_text' => 'Me gust√≥ un video de #BecauseFutbol. ¬°Te desaf√≠o a que grabes tu video  http://futbol.univision.com/beta/fifa-copa-mundial/equipos/  y ver qui√©n graba el mejor para ser parte del documental de Univision Deportes!',
            'twitter_share_text' => 'Graba tu video ahora y se parte de Por El F√∫tbol. Un documental sobre el Mundial de la gente para la gente como TU',
        ),    ),
);

if (isset($developer)) {
    $config_array['components']['db']['enableProfiling'] = true;
    $config_array['components']['db']['enableParamLogging'] = true;
    $config_array['components']['log']['routes'][] = array('class' => 'CWebLogRoute', 'levels' => 'error, warning');
    $config_array['components']['log']['routes'][] = array('class' => 'CProfileLogRoute');
}
return $config_array;