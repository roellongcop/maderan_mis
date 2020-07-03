<?php

if (Yii::$app->session->hasFlash('success')) {
	echo "<div class='alert alert-success'>".Yii::$app->session->getFlash('success')."</div>";
}

if (Yii::$app->session->hasFlash('danger')) {
	echo "<div class='alert alert-danger'>".Yii::$app->session->getFlash('danger')."</div>";
}