<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\memberscouncil\MembersCouncil */
/* @var $form yii\widgets\ActiveForm */


$dataImage = [
    'showCaption' => true,
    'showRemove' => true,
    'showUpload' => false,
    'initialPreviewAsData' => false,
    'initialPreviewConfig' => [
        ['caption' => 'logo'],
    ],
    'overwriteInitial'=>true,
    'placeholder'=>Yii::t('app','Image')

];

?>

<div class="members-council-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'file')->widget(\kartik\file\FileInput::classname(), [
        'options' => ['accept' => 'image/*','placeholder'=>Yii::t('app','Logo')],
        'pluginOptions' => $dataImage
    ])->label(Yii::t('app','Image'));
    ?>

    <?= $form->field($model, 'general_definition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'experiences')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'courses')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
