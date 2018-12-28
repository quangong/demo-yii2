<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $arr = \Yii::$app->authManager->getRolesByUser(\Yii::$app->user->id);
    $role = array_keys($arr)[0];
    $readonly = false;
        if(\Yii::$app->controller->action->id == 'update' && \Yii::$app->user->id != $model->id){
            $readonly = true;
        }
    ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'readonly' => $readonly]) ?>

    <?php
        echo $form->field($model, 'id_department')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Department::find()->all(), 'id', 'name'), ['class' => 'form-control inline-block',]);
    ?>

    <?php

        if ($role == 'admin'){
    ?>

            <?= Html::radioList('author', true, ['manager' => 'Manager', 'employee' => "Employee"]) ?>

    <?php }?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
