<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use dosamigos\datepicker\DatePicker;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;


$this->title = 'تسجيل الأعضاء';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup mt-5 mb-5">
    <div class="container">

        <div class="row text-center">
            <div class="col-12 ">
                <div class="activity-title">
                    <?= Html::encode($this->title) ?>
                </div>
            </div>
        </div>

        <div class="card">



            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body mb-5">
                        <div class="mt-3 mb-4 text-green">
                            <h1 class="f-20">
                                يرجى ملء الحقول التالية للتسجيل
                            </h1>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'form-memberSignup']); ?>

                        <?= $form->field($model, 'username')->textInput(['placeholder' => 'اسم المستخدم'])->label('') ?>
     

                        <?= $form->field($model, 'dateofbirth')->widget(
                                    DatePicker::className(), [
                                    // inline too, not bad
                                    'inline' => false,

                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'placeholder' => 'تاريخ الميلاد'
                                    ]
                                ])->label('') ;?>


                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'اليريد الإلكتروني'])->label('') ?>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'كلمة المرور'])->label('') ?>

                        <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'إعادة كلمة المرور'])->label('') ?>

                        <div class="form-group">
                            <?= Html::submitButton('إرسال', ['class' => 'btn btn-primary pull-left mt-3', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?= Yii::$app->request->baseUrl ?>/images/member.png" class="consulting-image" />
                </div>
            </div>
        </div>
    </div>
</div>