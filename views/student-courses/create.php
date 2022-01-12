<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\studentcourses\StudentCourses */

$this->title = Yii::t('app', 'Create Student Courses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-courses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
