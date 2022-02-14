<?php

use Carbon\Carbon;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\courses\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute'=>'title',
                'value'=>function($searchModel){
                    return Html::a($searchModel->title,['student-courses/index' ,'course'=> $searchModel->id]);
                },
                'format'=>'html'

            ],
          
            'description:ntext',

            [
                'attribute'=>'start_at',
                'value'=>function($searchModel){
                    return Carbon::parse($searchModel->start_at)->toDateString();
                },
               

            ],

            [
                'attribute'=>'end_at',
                'value'=>function($searchModel){
                    return Carbon::parse($searchModel->end_at)->toDateString();
                },
               
            ],
            'start_time',
            'end_time',
            
            //'image',
            'categorytype.name',
            //'status',
            //'created_at',
            //'update_at',
            //'deleted_at',

          

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}{view}',
                'buttons' => [
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                            'class' => '',
                            'data' => [
                                'confirm' =>  Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
