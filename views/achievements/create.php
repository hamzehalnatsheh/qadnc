<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\achievements\Achievements */

$this->title = Yii::t('app', 'Create Achievements');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Achievements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
