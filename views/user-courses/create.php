<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\courses\UserCourses */

$this->title = Yii::t('app', 'Create User Courses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-courses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
