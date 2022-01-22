<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\students\Students */

$this->title = Yii::t('app', 'Create Students');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
