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
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to signup:</p>

        <div class="row">
            <div class="col-lg-6">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'password_repeat')->passwordInput() ?>



                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary w-100 mt-3', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-lg-6">
                    
            </div>
        </div>
    </div>
</div>