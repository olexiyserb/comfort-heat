<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'picture',
                'format' => 'raw',
                'value' => function (\app\models\Project $model) {
                    return Html::img($model->getImage(), ['width' => '300px']);
                }
            ],
            'text:ntext',
            [
                'attribute' => 'time_create',
                'value' => function (\app\models\Project $model) {
                    return  ($model->time_create) ? \app\components\DateHelper::getDate($model->time_create) .' в ' . \app\components\DateHelper::getTime($model->time_create) : 'Немає';
                }
            ],
            [
                'attribute' => 'time_update',
                'value' => function (\app\models\Project $model) {
                    return ($model->time_update) ? \app\components\DateHelper::getDate($model->time_update) .' в ' . \app\components\DateHelper::getTime($model->time_update) : 'Не оновлювався';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
