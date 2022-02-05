<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\courses\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'start_at')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'end_at')->widget(
                DatePicker::className(), [
                // inline too, not bad
                'inline' => false,

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>

        </div>

    </div>





    <div class="row">
        <div class="col-md-4">
            
            <?= $form->field($model, 'start_time')->widget(TimePicker::classname(), 
            [

                'pluginOptions' => [
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ]

            ]);?>
        </div>
        <div class="col-md-4">

            <?= $form->field($model, 'end_time')->widget(TimePicker::classname(), [

'pluginOptions' => [
    'showSeconds' => true,
    'showMeridian' => false,
    'minuteStep' => 1,
    'secondStep' => 5,
]
            ]);?>

        </div>
            
    </div>



    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>







    <div class="row">
        <div class="col-md-4">
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
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'category')->widget(\kartik\select2\Select2::classname(), [
                'data' =>  \yii\helpers\ArrayHelper::map(\app\models\categories\Categories::find()->all(), 'id', 'name'),
                'language' => 'ar',
                'options' => ['placeholder' =>Yii::t('app',"Plz_Select")],

            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList
                    ([
                            \app\models\courses\Courses::Active => Yii::t('app','Active'),
                            \app\models\courses\Courses::DisActive => Yii::t('app','DisActive'),
                    ]);?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
