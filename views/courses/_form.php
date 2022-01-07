<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\courses\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_at')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,

        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]);?>

    <?= $form->field($model, 'end_at')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,

        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]);?>



    <?= $form->field($model, 'file')->widget(\kartik\file\FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showCaption' => true,
//                        'showRemove' => true,
                    'showUpload' => false,
                    'initialPreview' => [
                        Yii::getAlias('@web')
                    ],
                    'initialPreviewAsData' => true,
                    'initialCaption' => Yii::getAlias('@web'),
                    'initialPreviewConfig' => [

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
