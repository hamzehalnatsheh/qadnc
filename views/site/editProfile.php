<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;


$this->title = 'تعديل الملف الشخصي';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="consulting-body">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 ">
                <div class="activity-title">
                    تعديل الملف الشخصي
                </div>
            </div>
        </div>

        <?php if (Yii::$app->session->hasFlash('success-consulting')) : ?>
            <div class="alert alert-secondary" role="alert">
                تم بنجاح
            </div>

        <?php else : ?>
            <div class="card">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card-body mb-5">
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                            <div class="mb-3">
                                <?= $form->field($model, 'project_name')->textInput(['placeholder' => 'الاسم الأول'])->label('')  ?>
                            </div>
                            <div class="mb-3">
                                <?= $form->field($model, 'project_name')->textInput(['placeholder' => 'الاسم الأخير'])->label('')  ?>
                            </div>
                            <div class="mb-3">
                                <?= $form->field($model, 'project_name')->textInput(['placeholder' => 'رقم الجوال'])->label('')  ?>
                            </div>
                            <div class="form-group field-signupformmember-username required">
                                <label for="signupform-dateofbirth"></label>
                                <input type="date" id="signupform-dateofbirth" onchange="changeDate(this)" value class="form-control <?= $model->hasErrors('dateofbirth') ? 'is-invalid' : 'is-valid' ?> " name="SignupForm[dateofbirth]" placeholder="تاريخ الميلاد" aria-required="true" aria-invalid="false" require>
                                <?php if ($model->hasErrors('dateofbirth')) : ?>
                                    <div class="invalid-feedback"><?= $model->getErrors('dateofbirth')[0] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <?= $form->field($model, 'about_project')->textarea(['placeholder' => 'الشهدات العلمية'])->label('') ?>
                            </div>
                            <div class="mb-3">
                                <?= $form->field($model, 'about_project')->textarea(['placeholder' => 'الخبرات العملية'])->label('') ?>
                            </div>
                            <div class="mb-3">
                                <?= $form->field($model, 'about_project')->textarea(['placeholder' => 'الدورات التدريبية'])->label('') ?>
                            </div>
                            <div>
                                <?= Html::submitButton('إرسال', ['class' => 'btn btn-primary pull-left']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img src="<?= Yii::$app->request->baseUrl ?>/images/suggest-course.jpeg" class="consulting-image" />
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>