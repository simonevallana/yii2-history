<?php

use boolean\history\HistoryEntity;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel boolean\history\HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'History Entities');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content') ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'initiator',
            'ip',
            [
                'attribute' => 'event',
                'filter' => HistoryEntity::getEventsList(),
            ],
            'class',
            'table_name',
            'row_id',
            'created_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

<?php $this->endBlock() ?>

<?= $this->render('_layout') ?>