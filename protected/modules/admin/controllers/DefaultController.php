<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->layout='column1';
        
        
        $this->render('index');
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else {
                $this->render('error', $error);
            }
        }
    }

    public function actionLogin() {
        if (Yii::app()->user->isGuest) {
            $this->layout = "notlogged";
            $model = new LoginForm;

            // if it is ajax validation request
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login())
                    $this->redirect(Yii::app()->getModule('admin')->user->returnUrl);
            }
            // display the login form
            $this->render('login', array('model' => $model));
        }
        else $this->redirect(array('index'));
    }

    public function actionLogout() {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->getModule('admin')->user->loginUrl);
    }

}