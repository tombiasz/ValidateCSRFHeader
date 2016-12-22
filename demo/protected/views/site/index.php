<html>
    <head>
        <title>ValidateCSRFHeaderFilter Demo</title>

    </head>
    <body>
        <h1>ValidateCSRFHeaderFilter Demo</h1>

        <h2>Config</h2>
        <p>
            <strong>CSRF protection enabled:</strong>
            <?php
                echo Yii::app()->request->enableCsrfValidation ? 'true' : 'false';
            ?>
        </p>
        <p>
            <strong>Cookie validation enabled:</strong>
            <?php
                echo Yii::app()->request->enableCookieValidation ? 'true' : 'false';
            ?>
        </p>
    </body>
</html>
