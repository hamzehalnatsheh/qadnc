<?php

namespace app\controllers;

use app\models\studentcourses\StudentCourses;
use app\models\studentcourses\StudentCoursesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * StudentCoursesController implements the CRUD actions for StudentCourses model.
 */
class StudentCoursesController extends Controller
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
     * Lists all StudentCourses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentCoursesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentCourses model.
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
     * Creates a new StudentCourses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new StudentCourses();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing StudentCourses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentCourses model.
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



    public function actionRegister(){
        $course_id = isset($_GET['course_id']) ? $_GET['course_id'] : -1;
        $studentCourses=StudentCourses::find()
                ->andwhere(['course_id'=> $course_id])
                ->andwhere(['student_id'=>\Yii::$app->user->identity->id])
                ->all();
        if(empty($studentCourses)){
            $model = new StudentCourses();
            $model->course_id= $course_id;
            $model->student_id = \Yii::$app->user->identity->id;
            $model->save();
        }
       
        exit();

    }

    public function actionUnregister($id){
    
        StudentCourses::find()
                ->andwhere(['course_id'=> $id])
                ->andwhere(['student_id'=>\Yii::$app->user->identity->id])
                ->delete();
       
       
        exit();

    }
    /**
     * Finds the StudentCourses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return StudentCourses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentCourses::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
