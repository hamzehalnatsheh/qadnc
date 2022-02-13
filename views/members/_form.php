<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\students\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'dateofbirth')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,

        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

<?= $form->field($model, 'qualifications')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'experience')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'activities')->textarea(['rows' => 6]) ?>

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



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
