<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Level'); ?></th>
				<th><?php echo __('Admiral'); ?></th>
				<th><?php echo __('Last Modify'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bases as $base): ?>
			<tr>
				<td>
					<?php 
						echo $this->Html->link(
							__('View'),
							array('action' => 'view', $base['NavalDistrict']['id']),
							array('class' => 'btn btn-primary btn-xs', 'role' => 'button')
						); 
					?>
				</td>
				<td><?php echo h($base['NavalDistrict']['name']); ?></td>
				<td><?php echo h($base['NavalDistrict']['level']); ?></td>
				<td><?php echo h($base['User']['name']); ?></td>
				<td><?php echo h($base['NavalDistrict']['modified']); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php
		echo $this->Form->postLink(
			__('Create New Naval District'),
			array('action' => 'add'),
			array('class' => 'btn btn-primary', 'role' => 'button'),
			__('Are you sure to create new naval district?')
		);
	?>
</div>
