<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\associationactivities\AssociationActivities */

$this->title = Yii::t('app', 'Create Association Activities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Association Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="association-activities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
