<?php

namespace app\controllers;

use app\models\students\Students;
use app\models\students\StudentsSearch;
use app\models\User;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
{
    public function init()
    {
        $this->layout = "admin";
        parent::init();
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('site/login');
        }

    }
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Students models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {


        $model = new Students();

        if ($this->request->isPost) {
            $model->scenario=Students::Create;
            $newId = Students::find()->max('id') + 1;
            if ($model->load($this->request->post()) ) {

                $model->status=User::STATUS_ACTIVE;
                $model->type=User::Student;
                $model->password_hash=\Yii::$app->security->generatePasswordHash("123456");
                $model->auth_key = \Yii::$app->security->generateRandomString();
                $model->verification_token = \Yii::$app->security->generateRandomString() . '_' . time();

                $model->file = UploadedFile::getInstance($model, 'file');
                if( $model->validate()){
                    if (!is_null( $model->file)) {
                        FileHelper::createDirectory('uploads/avatar');
                        $path="uploads/avatar/$newId" . "." .  $model->file->extension;
                        $model->file->saveAs($path);
                        $model->image=$path;
                    }
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    $model->loadDefaultValues();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);


    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario=Students::Update;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if (!is_null( $model->file )) {
                $folder_path = "uploads/avatar/$model->id";
                FileHelper::createDirectory($folder_path, $mode = 0775, $recursive = true);
                $imge = "$folder_path/index" . "." .  $model->file ->extension;
                $model->image = $imge;
                $model->file ->saveAs($imge);
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
