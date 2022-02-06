<?php

namespace app\controllers;

use app\models\aboutus\Aboutus;
use app\models\achievements\Achievements;
use app\models\associationactivities\AssociationActivities;
use app\models\consultation\Consultation;
use app\models\Consulting;
use app\models\contactus\Contactus;
use app\models\courses\Courses;
use app\models\memberscouncil\MembersCouncil;
use app\models\PasswordResetRequestForm;
use app\models\ResendVerificationEmailForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\SignupFormMember;
use app\models\slider\Slider;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\studentcourses\StudentCourses;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','membersignup','profile'],
                'rules' => [
                    [
                        'actions' => ['signup','membersignup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $about_us=Aboutus::find()->one();
        $connect_us=Contactus::find()->one();
        $associations=AssociationActivities::find()->all();
        $sliders=Slider::find()->all();
        $achievements=Achievements::find()->all();
     
        return $this->render('index',['about_us'=>$about_us,'connect_us'=>$connect_us,'associations'=>$associations,'sliders'=>$sliders,'achievements'=>$achievements]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = "empty";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['courses/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionMembersignup()
    {
        $model = new SignupFormMember();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('membersignup', [
            'model' => $model,
        ]);
    }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }




    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = "empty";
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }



    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (\InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }



    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * Displays consulting.
     *
     * @return string
     */
    public function actionConsulting()
    {

        $model = new Consultation();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success-consulting');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('consulting', [
            'model' => $model,
        ]);

    }

    /**
     * Displays consulting.
     *
     * @return string
     */
    public function actionCourses()
    {
        $courses=Courses::find()->where(['deleted_at'=>null])->all();
        return $this->render('courses',['courses'=>$courses]);
    }

    /**
     * Displays Board.
     *
     * @return string
     */
    public function actionBoard()
    {
        $membersCouncil=MembersCouncil::find()->all();
        return $this->render('board',['membersCouncil'=>$membersCouncil]);
    }

  

    /**
     * Displays Board Profile.
     *
     * @return string
     */
    public function actionBoardProfile($id)
    {

        $membersCouncil=MembersCouncil::findOne($id);

        return $this->render('boardprofile',['membersCouncil'=>$membersCouncil]);
    }
    
    /**
     * Displays Profile.
     *
     * @return string
     */
    public function actionProfile()
    {
        $lastsubQuer=StudentCourses::find()->select('course_id')
            ->andWhere(['student_id'=>\Yii::$app->user->identity->id]);
        $currentsubQuer=StudentCourses::find()->select('course_id')
                ->andWhere(['student_id'=>\Yii::$app->user->identity->id]);

        $lastcouress=Courses::find()->andWhere(['in', 'id', $lastsubQuer])
                ->andWhere('date(end_at) >= :date', [':date' => date('y-m-d')])
                ->all();
        $currentcouress=Courses::find()->andWhere(['in', 'id', $currentsubQuer])
                ->andWhere('date(end_at) <=:date', [':date' => date('y-m-d')])
                ->all();
                
        return $this->render('profile',[
            'lastcouress'=>$lastcouress,
            'currentcouress'=>$currentcouress,
        ]);
    }

    /**
     * @param $id
     * @return View
     */
    public function actionCourse($id){
        $course=Courses::findOne($id);
        return $this->render('course',['course'=>$course]);
    }

    /**
     * Displays Suggest Course.
     *
     * @return string
     */
    public function actionSuggestCourse(){
        return $this->render('suggestCourse');
    }
    /**
     * Displays Edit Profile.
     *
     * @return string
     */
    public function actionEditProfile(){
        return $this->render('editProfile');
    }



       /**
     * @param $id
     * @return View
     */
    public function actionAchievements($id){
        $achievement=Achievements::findOne($id);
        return $this->render('achievements',['achievement'=>$achievement]);
    }



}
