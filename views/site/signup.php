<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;


$this->title = 'تسجيل الطلاب';
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
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'الأسم الاول'])->label('') ?>
                        <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'الأسم الاخير'])->label('') ?>

                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'اليريد الإلكتروني'])->label('') ?>

                        <div class="form-group field-signupformmember-username required">
                            <label for="signupform-dateofbirth"></label>
                            <input type="date" id="signupform-dateofbirth"  onchange="changeDate(this)" value class="form-control <?= $model->hasErrors('dateofbirth')?'is-invalid':'is-valid' ?> " name="SignupForm[dateofbirth]" placeholder="تاريخ الميلاد" aria-required="true" aria-invalid="false" require>
                              <?php if($model->hasErrors('dateofbirth')):?>
                                     <div class="invalid-feedback"><?=  $model->getErrors('dateofbirth')[0]?></div>
                                <?php endif;?>
                          
                        </div>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'كلمة المرور'])->label('') ?>

                        <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'إعادة كلمة المرور'])->label('') ?>
                        <div class="mt-3">
                        <?= $form->field($model, 'file')->fileInput()->label(Yii::t('app','Image')) ?>
                        </div>
                      

                        <div class="form-group">
                            <?= Html::submitButton('إرسال', ['class' => 'btn btn-primary pull-left mt-3', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?= Yii::$app->request->baseUrl ?>/images/reg.jpg" class="consulting-image" />
                </div>
            </div>
        </div>
    </div>
</div>


<script>

function changeDate(_this){
    document.getElementById("signupformmember-dateofbirth").value = document.getElementById("signupformmember-dateofbirth").value;
}
</script>