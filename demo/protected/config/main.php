<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Web Application',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    'modules'=>array(),

    // application components
    'components'=>array(

        'request'=>array(
            'enableCookieValidation'=>true,
            'enableCsrfValidation'=>true,
            'class'=>'application.components.HttpRequest', // CUSTOM CLASS
        ),

        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),

        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                array('site/index', 'pattern'=>'', 'verb'=>'GET'),
                array('site/post', 'pattern'=>'post', 'verb'=>'POST'),
                array('site/delete', 'pattern'=>'delete', 'verb'=>'DELETE'),
                array('site/patch', 'pattern'=>'patch', 'verb'=>'PATCH'),
                array('site/put', 'pattern'=>'put', 'verb'=>'PUT'),
            ),
        ),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>YII_DEBUG ? null : 'site/error',
        ),

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
    ),
);
