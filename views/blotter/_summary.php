<tr>
	<td><?= $model->case_no ?></td>
	<td><?= date('m-d-y', strtotime($model->created_at)) ?></td>
	<td><?= $model->complainantList ?></td>
	<td><?= $model->respondentList ?></td>


	<?php foreach ($params['nature_of_case'] as $key => $val): ?>
		<td>
			<?= $model->nature_of_case == $key ? '<i class="fa fa-check"></i>': '' ?>
		</td>
	<?php endforeach; ?>


	<?php foreach ($params['action_taken'] as $key => $val): ?>
		<td>
			<?= $model->action_taken == $key ? '<i class="fa fa-check"></i>': '' ?>
		</td>
	<?php endforeach; ?>
	<td><?= $model->_remarks ?></td>
</tr>