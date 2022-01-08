<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'تسجيل الدخول';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/bootstrap.rtl.min.css" />
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/all.min.css" />
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/site.css" />
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/login.css" />
<div class="site-login login">
    <div class="login-container">

        <!-- <p>Please fill out the following fields to login:</p> -->

        <div class="row">
            <div class="col-lg-6 login-right-side">
                <div class="content">
                    <!-- <div class="text-center mb-4">
                        <a href="/">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/dark-logo.png" alt="qadnc logo" class="site-logo" />
                        </a>
                    </div> -->
                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => Yii::t('app', 'Username')])->label('')  ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'Password')])->label('') ?>



                    <div class="form-group mt-4">
                        <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <div class="mt-5">
                        <div class="reg-options">
                            <i class="fas fa-redo"></i>
                            <?= Html::a(Yii::t('app', 'نسيت كلمة المرور'), ['site/request-password-reset']) ?>
                        </div>
                        <div class="reg-options">
                            <i class="fas fa-user-graduate"></i>
                            <?= Html::a(Yii::t('app', ' تسجيل الطلاب'), ['site/request-password-reset']) ?>
                        </div>
                        <div class="reg-options">
                            <i class="fas fa-user-tie"></i>
                            <?= Html::a(Yii::t('app', 'تسجيل الأعضاء'), ['site/request-password-reset']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <footer class="login-ft">
                    جميع الحقوق محفوظة © الجمعية التعاونية تأهيل وتطوير الكوادر الوطنية
                </footer>
            </div>
            <div class="col-lg-6  login-left-side">
                <div class="hero-banner"></div>
            </div>
        </div>
    </div>
</div>