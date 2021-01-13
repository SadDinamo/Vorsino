<?php

namespace frontend\controllers;

use Yii;
use common\models\Ismdoc;
use common\models\IsmdocSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * IsmdocController implements the CRUD actions for Ismdoc model.
 */
class IsmdocController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ismdoc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IsmdocSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ismdoc model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Загружает ism документ на сервер, создает запись в БД: ismDoc
     * @return mixed
     */
    public function actionCreate() {

        $model = new Ismdoc();

        if ($model->load(Yii::$app->request->post())) {

            // initial version for new ismDoc
            $model->version = 1;

            // status for new ismDoc
            $model->status = Ismdoc::STATUS_NEW;

            // date of upload - current date
            $model->uploadedOn = date('Y-m-d h:m:s');

            // get the instance of the uploaded file
            $model->file = UploadedFile::getinstance($model,'file');
            
            $fileName = $model->code.'-v'.$model->version.'.'.$model->file->extension;
            $fileDirectory = Yii::getAlias('@ismDir').'/'.$model->code;

            // save the path of uploaded file in db 'link' column
            $model->link = $fileDirectory.'/'.$fileName;
            
            if ($model->validate()) {
                // save db record
                $model->save();

                // check if directroy exists, if not - create directory
                if(!file_exists($fileDirectory)) {
                    FileHelper::createDirectory($fileDirectory);
                }

                // save file on server
                $model->file->saveAs($fileDirectory.'/'.$fileName);

                // redirect
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $errors = $model->errors;
                //TODO::return $this->redirect(['error','errors'->$errors]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Добавляет очередную версию файла на сервер и запись в БД
     * 
     */
    public function actionAddVersion($id) {

        $model = $this->findModel($id);

    }

    /**
     * Updates an existing Ismdoc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ismdoc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Ismdoc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ismdoc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ismdoc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
