<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\FileUpload;

class FileUploadController extends Controller
{
    public function actionIndex()
    {
        $model = new FileUpload();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                Yii::$app->session->setFlash('success', 'Файл успешно загружен.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}