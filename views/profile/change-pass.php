<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Change_Password');

?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
        </div>
        <?php if (Yii::$app->session->has('message')) : ?>
            <div class="alert alert-success" role="alert">
                <h1><?php echo Yii::$app->session->get('message'); ?></h1>
            </div>
            <?php Yii::$app->session->remove('message'); ?>
        <?php else : ?>
            <div class="panel-body">
                <?php $form = ActiveForm::begin() ?>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <?= $form->field($model, 'old_password')->passwordInput()->label(Yii::t('app', 'Old_Password')) ?>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <?= $form->field($model, 'new_password')->passwordInput()->label(Yii::t('app', 'New_Password')) ?>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <?= $form->field($model, 'confirm_pass')->passwordInput()->label(Yii::t('app', 'Conf_Password'))  ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        <?php endif; ?>
    </div>