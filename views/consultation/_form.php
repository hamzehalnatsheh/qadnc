<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\consultation\Consultation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specified_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'communication')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'about_project')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
