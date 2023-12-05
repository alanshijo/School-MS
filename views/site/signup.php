<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Signup';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true, 'placeholder' => 'Enter your First name here']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Enter your Last name here']) ?>
                </div>
            </div>
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Enter your email address here']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter your new password here']) ?>

            <?= $form->field($model, 'password_confirm')->passwordInput(['placeholder' => 'Enter your new password again here']) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>