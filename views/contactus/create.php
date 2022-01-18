<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\contactus\Contactus */

$this->title = Yii::t('app', 'Create Contactus');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contactuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
