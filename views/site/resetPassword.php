<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'إنشاء كلمة مرور جديدة';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password mt-5 mb-5">
    <div class="container">

        <div class="row text-center">
            <div class="col-12 ">
                <div class="activity-title">
                    <?= Html::encode($this->title) ?>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-lg-5 m-auto">
                <p>يرجى ادخال كلمة المرور الجديدة:</p>
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('إرسال', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>