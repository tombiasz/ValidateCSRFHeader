<?php

class SiteController extends Controller
{

    public function actionIndex()
    {
        // force CSRF cookie
        Yii::app()->request->getCsrfToken();

        $this->render('index');
    }

}
