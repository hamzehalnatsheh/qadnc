<?php

namespace app\controllers;

use app\models\achievements\Achievements;
use app\models\achievements\AchievementsSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;

/**
 * AchievementsController implements the CRUD actions for Achievements model.
 */
class AchievementsController extends Controller
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
     * Lists all Achievements models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AchievementsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Achievements model.
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
     * Creates a new Achievements model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Achievements();
        if ($this->request->isPost) {
            $newId = Achievements::find()->max('id') + 1;
            if ($model->load($this->request->post()) ) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if( $model->validate()){
                    if (!is_null( $model->file)) {
                        FileHelper::createDirectory("uploads/achievements/$newId");
                        $path="uploads/achievements/$newId/index" . "." .  $model->file->extension;
                        $model->file->saveAs($path);
                        $model->image=$path;
                    }
                    if(!is_null($model->vedio) && $model->vedio !=""){
                        parse_str( parse_url( $model->vedio, PHP_URL_QUERY ), $my_array_of_vars );
                         $model->image= 'https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg';
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




        // $model = new Achievements();

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->validate()) {
        //         $model->scenario=Achievements::Create;
        //         $newId = Achievements::find()->max('id') + 1;

        //         $file = UploadedFile::getInstance($model, 'file');
        //         $vedio_file = UploadedFile::getInstance($model, 'vedio_file');
        //         if (!is_null($file)) {
        //             $folder_path = "uploads/images/$model->id";
        //             FileHelper::createDirectory($folder_path, $mode = 0775, $recursive = true);
        //             $image = $folder_path."index" . "." . $file->extension;
        //             $model->image = $image;
        //             $file->saveAs($image);
        //         }
        //         if (!is_null($vedio_file)) {
        //             $folder_path = "uploads/vedios/$model->id";
        //             FileHelper::createDirectory($folder_path, $mode = 0775, $recursive = true);
        //             $vedio_path = "$folder_path/index" . "." . $file->extension;
        //             $model->vedio = $vedio_path;
        //             $file->saveAs($vedio_path);
        //         }
        //         $model->save(false);

        //         return $this->redirect(['view', 'id' => $model->id]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Updates an existing Achievements model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ( $model->load($this->request->post()) && $model->validate()) {
            
            $file = UploadedFile::getInstance($model, 'file');
            if (!is_null($file)) {
                $folder_path = "uploads/achievements/$model->id";
                FileHelper::createDirectory($folder_path, $mode = 0775, $recursive = true);
                $image = "$folder_path/index" . "." . $file->extension;
                $model->image = $image;
                $file->saveAs($image);
            }

            if(!is_null($model->vedio) && $model->vedio!="" ){
                
                    parse_str( parse_url( $model->vedio, PHP_URL_QUERY ), $my_array_of_vars );
    
                    $model->image= 'https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg';
            }

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Achievements model.
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
     * Finds the Achievements model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Achievements the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Achievements::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
