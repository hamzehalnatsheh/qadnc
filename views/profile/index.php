<?php


$this->title=Yii::t('app','Profile');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php if (Yii::$app->session->has('message')) : ?>
    <div class="alert alert-success">
        <strong>Success!</strong> <?= Yii::$app->session->get('message') ?>
    </div>
    <?php Yii::$app->session->remove('message') ?>
<?php endif; ?>
<div class="advertisement-form">

    <?php $form =\kartik\form\ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->name]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->phone]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->username]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true,'value'=>Yii::$app->user->identity->email]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'avatar')->widget(\kartik\file\FileInput::classname(), [
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
        </div>
    </div>






    <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>

    <?php \kartik\form\ActiveForm::end(); ?>

</div>