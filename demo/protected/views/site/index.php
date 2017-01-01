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

        <p>
            <button onClick="sendRequest('POST', 'site/post', true)">
                Send valid POST request
            </button>

            <button onClick="sendRequest('POST', 'site/post', false)">
                Send invalid POST request
            </button>
        </p>

        <p>
            <button onClick="sendRequest('DELETE', 'site/delete', true)">
                Send valid DELETE request
            </button>

            <button onClick="sendRequest('DELETE', 'site/delete', false)">
                Send invalid DELETE request
            </button>
        </p>

        <p>
            <button onClick="sendRequest('PATCH', 'site/patch', true)">
                Send valid PATCH request
            </button>

            <button onClick="sendRequest('PATCH', 'site/patch', false)">
                Send invalid PATCH request
            </button>
        </p>

        <p>
            <button onClick="sendRequest('PUT', 'site/put', true)">
                Send valid PUT request
            </button>

            <button onClick="sendRequest('PUT', 'site/put', false)">
                Send invalid PUT request
            </button>
        </p>

        <script src="<?php echo Yii::app()->getBaseUrl(); ?>/js/axios.min.js"></script>
        <script>
            function sendRequest(method, url, validCSRF) {
                var options = {
                    method: method,
                    url: url,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest' // allows yii to recognize ajax requests
                    },
                    xsrfHeaderName: 'X-CSRF-Token',
                    xsrfCookieName: validCSRF ? 'YII_CSRF_TOKEN' : '',
                };

                axios(options)
                .then(function(response) {
                    alert(response.data.msg);
                })
                .catch(function(error){
                    alert(error.response.data)
                });
            }
        </script>
    </body>
</html>
