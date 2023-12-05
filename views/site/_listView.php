<?php

use yii\bootstrap5\Html;

$model->dob = date("d/m/Y", strtotime($model->dob));
?>

<div class="card my-3 p-4">
    <div class="row">
        <?php if ($model->student_img) : ?>
            <?= Html::img("@web/uploads/$model->student_img", ['class' => 'img-fluid', 'style' => 'height:200px;width:200px;object-fit: contain;']); ?>
        <?php else : ?>
            <?= Html::img("https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png", ['class' => 'img-fluid', 'style' => 'height:200px;width:200px;object-fit: contain;']); ?>
        <?php endif; ?>
        <div class="col">
            <?= Html::tag('p', 'Name: <strong>' . Html::encode($model->full_name) . '</strong>'); ?>
            <?= Html::tag('p', 'Email: <strong>' . Html::encode($model->email) . '</strong>'); ?>
            <?= Html::tag('p', 'Address: <strong>' . Html::encode($model->address) . '</strong>'); ?>
        </div>
        <div class="col">
            <?= Html::tag('p', 'Mobile No.: <strong>' . Html::encode($model->phone_no) . '</strong>'); ?>
            <?= Html::tag('p', 'Date of Birth: <strong>' . Html::encode($model->dob) . '</strong>'); ?>
        </div>
        <div class="col">
            <?= Html::a('<i class="fa-solid fa-eye"></i>', ['site/view-student', 'id' => $model->id], ['title' => 'View']) ?>
            <?= Html::a('<i class="fa-solid fa-pen-to-square mx-3"></i>', ['site/update-student', 'id' => $model->id], ['title' => 'Edit']) ?>
            <?= Html::a('<i class="fa-solid fa-trash-can"></i>', ['site/delete-student', 'id' => $model->id], ['data-confirm' => 'Are you sure want to delete this student', 'title' => 'Delete']) ?>
        </div>
    </div>

</div>