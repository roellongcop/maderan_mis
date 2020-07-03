<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$this->params['page'] = 'Login';
?>


<div class="login-page">
    <div class="login-main">    
        <div class="login-head">
                <h1>Login</h1>
            </div>
            <div class="login-block">
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'username')->textInput([
                        'autofocus' => true,
                        'style' => 'text-transform:lowercase !important'
                    ]) ?>
                    <?= $form->field($model, 'password')->passwordInput([
                        'style' => 'text-transform:lowercase !important'
                    ]) ?>
                    <div class="forgot-top-grids">
                       
                        <div class="forgot">
                            <!-- <a href="#">Forgot password?</a> -->
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <?= Html::submitButton('Login', 
                        ['class' => 'btn btn-primary btn-block', 
                        'name' => 'login-button'
                    ]) ?>

                    <!-- <h3>Not a member?<a href="signup.html"> Sign up now</a></h3>                 -->
                    
                <?php ActiveForm::end(); ?>
            </div>
      </div>
</div>