<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model boolean\history\HistoryEntity */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'History Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$log = json_decode($model->log);

?>

<?php $this->beginBlock('content') ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'initiator',
            'ip',
            'event',
            'class',
            'table_name',
            'row_id',
            'created_at:datetime',
        ],
    ]) ?>

    <pre>
<?php \yii\helpers\VarDumper::dump($log); ?>
    </pre>

<?php $this->endBlock() ?>

<?= $this->render('_layout') ?>