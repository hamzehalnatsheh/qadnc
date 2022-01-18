<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\contactus\ContactusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contactuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'address',
            'email:email',
            'phone',
            'phone_number',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}' ,
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
