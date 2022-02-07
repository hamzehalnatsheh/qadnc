<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\sagistedcourses\SagistedCoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sagisted_Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sagisted-courses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'title',
            'body:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} ' ,
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
