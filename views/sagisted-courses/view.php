<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\sagistedcourses\SagistedCourses */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'الدورات المقترحة'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sagisted-courses-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'body:ntext',
        ],
    ]) ?>

</div>
