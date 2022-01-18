<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'نسيت كلمة المرور';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/bootstrap.rtl.min.css" />
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/all.min.css" />
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/site.css" />
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/login.css" />
<div class="site-request-password-reset login">
    <div class="login-container">


        <div class="row">
            <div class="col-lg-6 login-right-side">
                <div class="content">
                    <div class="mb-5">
                        <a href="/site/login" class="f-18">
                            <i class="fas fa-arrow-right"></i>
                            <span>تسجيل الدخول</span>
                        </a>
                    </div>

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>يرجى ادخال البريد الإلكتروني الخاص بك. سيتم إرسال رابط لإعادة تعيين كلمة المرور</p>
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => Yii::t('app', 'EMAIL')])->label('') ?>

                    <div class="form-group mt-4">
                        <?= Html::submitButton(Yii::t('app', 'إرسال'), ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-lg-6  login-left-side">
                <div class="hero-banner"></div>
            </div>
        </div>
    </div>
</div>