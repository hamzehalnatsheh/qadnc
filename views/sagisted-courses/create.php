<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\sagistedcourses\SagistedCourses */

$this->title = Yii::t('app', 'Create Sagisted Courses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sagisted Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sagisted-courses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
