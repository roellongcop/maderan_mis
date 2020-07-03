<div class="col-md-4 climate-grids">
    <div class="climate-grid2  price-block" 
        style="background: url(
            <?= Yii::$app->urlManager->baseUrl . $model->path ?>
        )no-repeat bottom">

        <!-- <span class="shoppy-rate">
            <h4>
                <?= date_format(date_create($model->date_added), 'Y') ?>
            </h4>
        </span> -->
        <ul>
            <li> <i class="fa fa-edit"> </i> </li>
            <li> <i class="fa fa-trash"> </i> </li>
        </ul>
    </div>
    <div class="shoppy">
    <h3><?= $model->name ?></h3>
    </div>
</div>