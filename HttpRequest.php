<?php

class HttpRequest extends CHttpRequest {

    public $csrfHeaderName = 'X-CSRF-Token';

    public function getCsrfTokenFromHeader()
    {
        $token = null;
        $key = 'HTTP_' . str_replace('-', '_', strtoupper($this->csrfHeaderName));

        if (isset($_SERVER[$key])) {
            $token = $_SERVER[$key];

            if ($this->enableCookieValidation) {

                $sm = Yii::app()->getSecurityManager();
                $token = $sm->validateData($token);

                if($token !== false) {
                    $token = @unserialize($token);
                }
            }
        }

        return $token;
    }

    public function validateCsrfToken($event)
    {
        if (!$this->getIsAjaxRequest()) {
            // standard behavior for non-ajax requests
            return parent::validateCsrfToken($event);
        }

        $headerToken = $this->getCsrfTokenFromHeader();

        $cookies=$this->getCookies();
        $cookieToken=$cookies->itemAt($this->csrfTokenName)->value;

        $valid = !empty($cookieToken) &&
                 !empty($headerToken) &&
                 $cookieToken === $headerToken;

        if (!$valid) {
            throw new CHttpException(400,Yii::t('yii','The CSRF token could not be verified.'));
        }

    }
}

