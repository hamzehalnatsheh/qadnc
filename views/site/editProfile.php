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

        <?php if (Yii::$app->session->hasFlash('success-edit')) : ?>
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
                                <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'الاسم الأول', 'value'=>Yii::$app->user->identity->first_name])->label('')  ?>
                            </div>
                            <div class="mb-3">
                                <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'الاسم الأخير', 'value'=>Yii::$app->user->identity->last_name])->label('')  ?>
                            </div>
             
                            <div class="form-group field-editprofile-dateofbirth required">
                                <label for="signupform-dateofbirth"></label>
                                <input type="date" id="editprofile-dateofbirth" onchange="changeDate(this)" value="<?=Yii::$app->user->identity->dateofbirth?>" class="form-control <?= $model->hasErrors('dateofbirth') ? 'is-invalid' : 'is-valid' ?> " name="EditProfile[dateofbirth]" placeholder="تاريخ الميلاد" aria-required="true" aria-invalid="false" require>
                                <?php if ($model->hasErrors('dateofbirth')) : ?>
                                    <div class="invalid-feedback"><?= $model->getErrors('dateofbirth')[0] ?></div>
                                <?php endif; ?>
                            </div>

                            <?php if(Yii::$app->user->identity->type == \app\models\User::Memmber ||Yii::$app->user->identity->type == \app\models\User::SUPER_ADMIN):?>
                                <div class="mb-3">
                                    <?= $form->field($model, 'experience')->textarea(['placeholder' => 'الشهدات العلمية' , 'value'=>Yii::$app->user->identity->experience])->label('') ?>
                                </div>
                                <div class="mb-3">
                                    <?= $form->field($model, 'activities')->textarea(['placeholder' => 'الخبرات العملية','value'=>Yii::$app->user->identity->activities])->label('') ?>
                                </div>
                                <div class="mb-3">
                                    <?= $form->field($model, 'qualifications')->textarea(['placeholder' => 'الدورات التدريبية','value'=>Yii::$app->user->identity->qualifications])->label('') ?>
                                </div>
                            <?php endif;?>

                            <div class="mt-3">
                                <?= $form->field($model, 'file')->fileInput()->label(Yii::t('app','Image')) ?>
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

<script>

function changeDate(_this){
    document.getElementById("editprofile-dateofbirth").value = document.getElementById("signupformmember-dateofbirth").value;
}
</script>