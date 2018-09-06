<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
require('constants.php');
require(Yii::getPathOfAlias('core').'/config/constants.php');
$docroot = dirname(__FILE__).'/../..';
$pathParts = explode('/',$docroot);
$dbname = ($pathParts[4] == 'dev')
        ? $pathParts[6].'_'.$pathParts[4]
        : $pathParts[4];
$client = ($pathParts[4] == 'dev')
        ? $pathParts[6]
        : $pathParts[4];

require(Yii::getPathOfAlias('core') . '/config/constants.php');
$docroot = dirname(__FILE__) . '/../..';
$config = require_once "env_manager.php";

$pathParts = explode('/', $docroot);
$client = ($pathParts[7] == 'config') ? $pathParts[5] : $pathParts[2];
$dev = ($pathParts[7] == 'config') ? $pathParts[4] : '';

return array(
    'commandPath' => Yii::getPathOfAlias('core').'/commands',
    'import' => array(
        'core.models.*',
        'core.components.*',
        'core.components.utilities.*',
        'client.models.*',
    ),
    //'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name' => ucfirst(basename($docroot)),
    'timeZone' => 'America/New_York',
    // preloading 'log' component
    'preload' => array('log'),
    // application components
    'components' => array(
        'db' => array(
            'connectionString' => "mysql:host={$config->db_host};dbname={$config->db_name}",
            'schemaCachingDuration' => 3600,
            'emulatePrepare' => true,
            'username' => $config->db_user,
            'password' => $config->db_pass,
            'charset' => 'utf8',
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
            'consumer_key' => 'RChO1lBGkJvQTZhOgjbw8A',
            'consumer_secret' => 'NLD9sTbY1YLWz7SbvSNvQ80RTRBfoRGvAluYYJZy8',
            'callback' => 'http://' . $_SERVER['HTTP_HOST'] . '/twitterConnect',
            'streamFile' => $_SERVER['DOCUMENT_ROOT'] . '/twitter.txt',
            'adminAccessToken' => '1967328594-hg0MWwc1GtYkdnfQUyOnrruBx3gDrzRCRWRpydB',
            'adminTokenSecret' => 'HnyF8uzVKxU1I6iR55iHOCjTtrCYOiasYXkMATPmE', 
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'ftp_naming_convention_video' => 'UND'.date('m').date('d').'V',
        'ftp_naming_convention_image' => 'UND'.date('m').date('d').'P',
        'docroot' => $docroot,
         
        'dev' => ($pathParts[4] == 'dev') ? $pathParts[5] : '',
        'client' => $client,
        'ticker' => array(
            'sleepTime'=>10,
        ),
    ),

    'request' => array(
            'hostInfo' => 'http://www.univision.com',
            'baseUrl' => 'univision.com',
            'scriptUrl' => '',
        ),
);