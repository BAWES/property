<?php

class TenantFileController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new TenantFile;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TenantFile'])) {
            $model->attributes = $_POST['TenantFile'];
            $model->file_name = CUploadedFile::getInstance($model, 'file_name');
            if ($model->save()) {
                //generate unique filename
                $exploded = explode('.', $model->file_name);
                $uniqueName = (md5($model->file_name . time())) . '.' . (end($exploded));

                //save and update model
                $model->file_name->saveAs(Yii::app()->basePath . '/../tenantfiles/' . $uniqueName);
                $model->file_name = $uniqueName;
                $model->save();

                $this->redirect(array('view', 'id' => $model->file_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TenantFile'])) {
            $model->attributes = $_POST['TenantFile'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->file_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);

        //delete file
        if (file_exists(Yii::app()->basePath . '/../tenantfiles/' . $model->file_name)) {
            unlink(Yii::app()->basePath . '/../tenantfiles/' . $model->file_name);
        }
        
        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new TenantFile('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TenantFile']))
            $model->attributes = $_GET['TenantFile'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TenantFile the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TenantFile::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TenantFile $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tenant-file-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
