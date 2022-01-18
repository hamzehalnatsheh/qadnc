<?php

namespace app\controllers;

use app\models\memberscouncil\MembersCouncil;
use app\models\memberscouncil\MembersCouncilSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;

/**
 * MembersCouncilController implements the CRUD actions for MembersCouncil model.
 */
class MembersCouncilController extends Controller
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
     * Lists all MembersCouncil models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MembersCouncilSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MembersCouncil model.
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
     * Creates a new MembersCouncil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MembersCouncil();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->validate()) {
                $newId = MembersCouncil::find()->max('id') + 1;
                $file = UploadedFile::getInstance($model, 'file');
                if (!is_null($file)) {
                    FileHelper::createDirectory('uploads/memberscouncil');

                    $path="uploads/memberscouncil/$newId" . "." . $file->extension;
                    $file->saveAs($path);
                    $model->image=$path;
                }
                $model->save();


                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MembersCouncil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {

            $file = UploadedFile::getInstance($model, 'file');
            if (!is_null($file)) {
                FileHelper::createDirectory('uploads/memberscouncil');

                $path="uploads/memberscouncil/$model->id" . "." . $file->extension;
                $file->saveAs($path);
                $model->image=$path;
            }
            $model->save();


            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MembersCouncil model.
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
     * Finds the MembersCouncil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MembersCouncil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MembersCouncil::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
