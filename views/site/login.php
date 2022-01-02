<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'تسجيل الدخول';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login courses-body">
    <div class="container">

        <!-- <p>Please fill out the following fields to login:</p> -->

        <div class="row">
            <div class="col-lg-6 border-left">
                <div class="login-box">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>Yii::t('app','Username')])->label('')  ?>

                    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('app','Password')])->label('') ?>

                    <div style="color:#999;margin:1em 0">
                        هل نسيت كلمة المرور؟ <?= Html::a(Yii::t('app','reset it'), ['site/request-password-reset']) ?>.
                        <br>
                        <!-- Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?> -->
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app','Login'), ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login-box">
                    <div class="row">
                        <div class="col-6 text-center">
                            <img src="<?= Yii::$app->request->baseUrl ?>/assets/images/graduated.png" alt="" style="width: 75px">
                            <div class="mb-3">
                                <strong>
                                    تسجيل طالب جديد
                                </strong>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary">
                                    سجل الان
                                </a>
                            </div>
                        </div>
                        <div class="col-6  text-center">
                            <img src="<?= Yii::$app->request->baseUrl ?>/assets/images/members.png" alt="" style="width: 75px">
                            <div class="mb-3">
                                <strong>
                                    تسجيل عضو جديد
                                </strong>
                            </div>
                            <a href="#" class="btn btn-primary">
                                سجل الان
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>