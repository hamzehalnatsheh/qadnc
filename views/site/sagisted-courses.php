<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;


$this->title = Yii::t('app','Sagisted_Courses');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="consulting-body">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 ">
                <div class="activity-title">
                    الإستشارات
                </div>
            </div>
        </div>

        <?php if (Yii::$app->session->hasFlash('success-consulting')): ?>
            <div class="alert alert-secondary" role="alert">
               تم بنجاح
            </div>

        <?php else: ?>
            <div class="card">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body mb-5">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                            <div class="mt-3 mb-4 text-green">
                                <h1 class="f-20">
                                   اقترح دوره
                                </h1>
                            </div>
                            <div class="mb-3">

                                <?= $form->field($model, 'title')->textInput(['placeholder' => 'عنوان'])->label('')  ?>

                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <?= $form->field($model, 'body')->textInput(['placeholder' => 'وصف'])->label('')  ?>

                                </div>
                           
                            <div>
                                <?= Html::submitButton('إرسال', ['class' => 'btn btn-primary pull-left']) ?>

                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?= Yii::$app->request->baseUrl ?>/images/consulting.jpeg" class="consulting-image" />
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>