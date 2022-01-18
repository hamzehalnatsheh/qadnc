<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\memberscouncil\MembersCouncil */

$this->title = Yii::t('app', 'Create Members Council');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members Councils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-council-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
