<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\courses\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_at')->widget(\kartik\date\DatePicker::classname(), [
         'options' => ['placeholder' => 'Enter birth date ...'],
         'pluginOptions' => [
             'autoclose' => true
         ]
     ]);
    ?>

    <?= $form->field($model, 'end_at')->widget(DatePicker::classname(), [
         'options' => ['placeholder' => 'Enter birth date ...'],
         'pluginOptions' => [
             'autoclose' => true
         ]
     ]);

    ?>






    <?= $form->field($model, 'file')->widget(\kartik\file\FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showCaption' => true,
//                        'showRemove' => true,
                    'showUpload' => false,
                    'initialPreview' => [
                        Yii::getAlias('@web') .'/'.Yii::$app->user->identity->avatar
                    ],
                    'initialPreviewAsData' => true,
                    'initialCaption' => Yii::getAlias('@web') . '/' . Yii::$app->user->identity->avatar,
                    'initialPreviewConfig' => [
                        ['caption' => Yii::$app->user->identity->name],
                    ],
                    'overwriteInitial'=>true
                ]
            ]);
    ?>
    <?= $form->field($model, 'category')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
