<?php

namespace app\controllers;

use app\models\courses\Courses;
use app\models\courses\CoursesSearch;
use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CoursesController implements the CRUD actions for Courses model.
 */
class CoursesController extends Controller
{
    public function init()
    {
        $this->layout = "admin";
        parent::init();
        if (Yii::$app->user->isGuest) {
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
     * Lists all Courses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CoursesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Courses model.
     * @param int $id ID
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
     * Creates a new Courses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {


        $model = new Courses();

        if ($this->request->isPost) {
            $model->scenario=Courses::Create;
            $newId = Courses::find()->max('id') + 1;
            if ($model->load($this->request->post()) ) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if( $model->validate()){
                    if (!is_null( $model->file)) {
                        FileHelper::createDirectory('uploads/coures');
                        $path="uploads/coures/$newId" . "." .  $model->file->extension;
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
     * Updates an existing Courses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario=Courses::Update;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if (!is_null( $model->file )) {
                $folder_path = "uploads/coures/$model->id";
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
     * Deletes an existing Courses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Courses::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
