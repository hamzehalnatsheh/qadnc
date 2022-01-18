<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\aboutus\Aboutus */

$this->title = Yii::t('app', 'Create Aboutus');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aboutuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
