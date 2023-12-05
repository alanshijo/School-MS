<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'SMS';
?>
<div class="site-index">
    <?= Html::tag('h1', 'Student details', ['class' => 'mb-4']) ?>
    <?= Html::a('Add Student', ['site/add-student'], ['class' => 'btn btn-success mb-3']) ?>

    <?= ListView::widget([
        'dataProvider' => $data_provider,
        'itemView' => '_listView',
        'pager' => [
            'class' => LinkPager::class
        ]
    ]); ?>

</div>