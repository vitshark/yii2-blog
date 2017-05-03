<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\MenuWidget;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <h1><?= MenuWidget::widget(['tpl'=>'select'])?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'post_id',
            'category_id',
            'title',
            'image',
            'short',
            // 'text:ntext',
            // 'slug',
            // 'time:datetime',
            // 'views',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
