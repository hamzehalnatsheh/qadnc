<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\achievements\Achievements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->widget(\kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showCaption' => true,
                'showRemove' => true,
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

    <?= $form->field($model, 'vedio')->textInput();?>

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
