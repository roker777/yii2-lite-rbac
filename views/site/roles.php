<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <code>\Yii::$app->user->can('admin')</code> - <?php echo \Yii::$app->user->can('admin')?'True':'False'; ?>
    </p>
    <p>
       <code>\Yii::$app->user->can('user')</code> - <?php echo \Yii::$app->user->can('user')?'True':'False'; ?>
    </p>

</div>
