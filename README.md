Yii 1.1.x CSRF Header validation
================================

[Yii 1.1.x](https://github.com/yiisoft/yii) custom HttpRequest class implementing CSRF header validation for XMLHttpRequest. 

Written and tested with Yii 1.1.17 and PHP 5.6, but should easly work with previous versions. Both PHP and Yii.


INSTALLATION
------------
Copy *HttpRequest.php* file to *protected/components/* directory of your application.

In your main config file

    protected/config/main.php
    
enable CSRF validation and point Yii to use custom class

    [...]
    'request'=>array(
        'enableCookieValidation'=>true,
        'enableCsrfValidation'=>true,
        'class'=>'application.components.HttpRequest', // CUSTOM CLASS
    ),
    [...]

Enabling cookie validation (*enableCookieValidation*) is optional.

For reference, see:

    demo/protected/config/main.php

All your XHR request have to set X-Requested-With and X-CSRF-TOKEN headers, like

    X-Requested-With: XMLHttpRequest
    X-CSRF-TOKEN: [yii_csrf_token cookie value]

In demo app [axios](https://github.com/mzabriskie/axios) is used as ajax library. So the cofiguration looks like:

    axios({
        method: POST,
        url: url,
        headers: {
            'X-Requested-With': 'XMLHttpRequest' // allows yii to recognize ajax requests
        },
        xsrfHeaderName: 'X-CSRF-Token', /// yii csrf token cookie name
        xsrfCookieName: validCSRF ? 'YII_CSRF_TOKEN' : '', yii csrf token cookie value
    })

For reference, see:

    demo/protected/views/site/index.php
    
In you controller you will have to force Yii to set the csrf cookie, which by default is set only when forms are created with CForm helper class. To do this add this method call to your controller action

    Yii::app()->request->getCsrfToken();
            
For reference, see index action:

    demo/protected/controllers/SiteController.php
    

DEMO
----
To run demo:

    1. put Yii framework files in the yii directory
    2. run prepared Docker container
    3. go to http://127.0.0.1:8080/demo/

Altenativley, instead of using Docker point your web server root directory to the root of this repository.
