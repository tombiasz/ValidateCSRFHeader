Yii 1.1.x CSRF Header validation
================================

Yii 1.1.x custom HttpRequest class implementing CSRF header validation for XMLHttpRequest. This was written and tested with Yii 1.1.17 and PHP 5.6, but should easly work with previous versions.

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


DEMO
----
To run demo:

    1. put Yii framework files in the yii directory
    2. run prepared Docker container
    3. go to http://127.0.0.1:8080/demo/

Altenativley, point your web server root directory to the root of this repository instead of using Docker.
