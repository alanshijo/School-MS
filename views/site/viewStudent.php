<?php


use yii\bootstrap5\Html;
use yii\web\ForbiddenHttpException;

if (Yii::$app->user->identity->id !== $model->created_by) {
    throw new ForbiddenHttpException('You don\'t have permission');
}

$this->title = $model->full_name;
$model->dob = date("d/m/Y", strtotime($model->dob));
$this->params['breadcrumbs'][] = $model->full_name;
?>
<div class="card text-center mx-auto" style="min-width:260px;max-width:420px;">
    <?php if ($model->student_img) : ?>
        <?= Html::img("@web/uploads/$model->student_img", ['class' => 'img-responsive mx-auto w-100 mb-3', 'style' => 'max-width:600px;']); ?>
    <?php else : ?>
        <?= Html::img("https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png", ['class' => 'img-responsive mx-auto my-3', 'style' => 'width:220px;']); ?>
    <?php endif; ?>
    <?= Html::tag('p', Html::encode($model->full_name), ['class' => 'text-danger fw-bolder text-uppercase fs-4']); ?>
    <?= Html::tag('p', Html::encode($model->dob), ['class' => 'text-success fw-bold']); ?>
    <?= Html::tag('p', 'Mobile No.: <strong>' . Html::encode($model->phone_no) . '</strong>'); ?>
    <?= Html::tag('p', 'Email: <strong>' . Html::encode($model->email) . '</strong>'); ?>
    <?= Html::tag('p', 'Address: <strong>' . Html::encode($model->address) . '</strong>'); ?>
</div>