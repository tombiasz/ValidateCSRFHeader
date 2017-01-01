<?php

class SiteController extends Controller
{

    public function actionIndex()
    {
        // force CSRF cookie
        Yii::app()->request->getCsrfToken();

        $this->render('index');
    }

    public function renderJSON($data) {
        header('Content-type: application/json');
        echo CJSON::encode($data);

        foreach (Yii::app()->log->routes as $route) {
            if($route instanceof CWebLogRoute) {
                $route->enabled = false; // disable any weblogroutes
            }
        }
        Yii::app()->end();
    }

    public function actionPost()
    {
        $msg = "valid POST request";
        $this->renderJSON(array('msg'=> $msg));
    }

    public function actionDelete()
    {
        $msg = "valid DELETE request";
        $this->renderJSON(array('msg'=> $msg));
    }

    public function actionPatch()
    {
        $msg = "valid PATCH request";
        $this->renderJSON(array('msg'=> $msg));
    }

    public function actionPut()
    {
        $msg = "valid PUT request";
        $this->renderJSON(array('msg'=> $msg));
    }

}
