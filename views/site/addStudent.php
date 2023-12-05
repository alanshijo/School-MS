<?php

/** @var yii\web\View $this */

use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = "Add Student";
$this->params['breadcrumbs'][] = 'Add Student';
?>
<div class="site-add-student w-50 mx-auto">
    <?= Html::tag('h1', 'Add Student', ['class' => 'text-center']) ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'student_img')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => false,
            'showCaption' => false,
            'showClose' => false,
            // 'allowedFileExtensions' => ['jpg', 'jpeg', 'png'],
            'removeClass' => 'btn btn-danger',
            'browseOnZoneClick' => true,
        ],
    ])->error(['class' => 'invalid-feedback d-block']); ?>

    <?= $form->field($model, 'full_name')->textInput(['placeholder' => 'Enter full name here']); ?>

    <?= $form->field($model, 'phone_no')->textInput(['placeholder' => 'Enter 10 digit mobile number here']); ?>

    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Enter email address here']); ?>

    <?= $form->field($model, 'dob')->widget(DatePicker::class, [
        'options' => [
            'placeholder' => 'Enter birth date'
        ],
        'readonly' => true,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ]
    ])->error(['class' => 'invalid-feedback d-block']); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 5, 'placeholder' => 'Enter address here']) ?>

    <?= Html::submitButton('Add Student', ['class' => 'btn btn-success w-100']) ?>


    <?php ActiveForm::end(); ?>
</div>