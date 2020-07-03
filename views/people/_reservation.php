<?php

use yii\helpers\Html;

?>
<?php if ($reservations) : ?>
	<?php foreach ($reservations as $model) : ?>
		<tr>
			<td>
				<?= Html::a(date_format(date_create($model->date_from), 'Y-m-d h:i:s A'), '#', [
					'data-key' => $model->id,
					'data-toggle' => 'modal',
					'data-target' => '#reserved-places',
					'class' => 'link-place'
				]) ?>
			</td>
			<td><?= date_format(date_create($model->date_to), 'Y-m-d h:i:s A'); ?></td>
			<td>
				<?= Yii::$app->template->reservedEntity($model, 'name') ?>
			</td>
		</tr>
			
	<?php endforeach; ?>
<?php endif ?>

<div id="reserved-places" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reserved Equipments</h4>
  		<h4 id="loading">Loading...</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<?php

$script = <<<JS

	$('.link-place').on('click', function() {
		var id = $(this).data('key');
		$('#loading').show()
		$('#reserved-places .modal-title').hide()
		$('#reserved-places .modal-body').hide()
		$.ajax({
			url: base_url + 'reservation/detail',
			data: {id: id},
			method: 'get',
			dataType: 'html',
			success: (response => {
				$('#reserved-places .modal-body').html(response)
				$('#loading').hide()
				$('#reserved-places .modal-body').fadeIn('slow')
				$('#reserved-places .modal-title').fadeIn('slow')
			})	
		})
	})

JS;

$this->registerJs($script);