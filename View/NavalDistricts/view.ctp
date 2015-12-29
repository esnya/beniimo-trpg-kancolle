<?php
	echo $this->RealtimeForm->create('NavalDistrict', $base, array(
		'readonly' => !$is_owner,
	));
?>
<style>
	body {
			padding-top: 50px;
	}
</style>
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th><?php echo __('Naval District Name'); ?></th>
							<td><?php echo $this->RealtimeForm->element('name'); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- col -->
			<div class="col-sm-3">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th><?php echo __('Level'); ?></th>
							<td><?php echo $this->RealtimeForm->element('level'); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- col -->
			<div class="col-sm-3">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th><?php echo __('Fleet Name'); ?></th>
							<td><?php echo $this->RealtimeForm->element('fleet_name'); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- col -->
			<div class="col-sm-3">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th><?php echo __('Admiral'); ?></th>
							<td><?php echo $this->RealtimeForm->element('user_id', array('readonly' => true)); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- col -->
		</div> <!-- row -->
	</div>
</div>
<div class="container">

	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Materials'); ?>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th><?php echo __('Fuel'); ?></th>
							<th><?php echo __('Ammunition'); ?></th>
							<th><?php echo __('Steel'); ?></th>
							<th><?php echo __('Bauxite'); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $this->RealtimeForm->element('material_fuel'); ?></td>
							<td><?php echo $this->RealtimeForm->element('material_ammunition'); ?></td>
							<td><?php echo $this->RealtimeForm->element('material_steel'); ?></td>
							<td><?php echo $this->RealtimeForm->element('material_bauxite'); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- panel -->
		</div> <!-- col -->

		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Equipment Abilities'); ?>
				</div>
				<?php
					echo $this->RealtimeForm->simpleTable($base, 'NavalDistrictEquipmentAbility', array(
						array(
							'name' => __('Equipment Name'),
							'path' => 'name',
						),
						array(
							'name' => __('Specified Personality'),
							'path' => 'specified_personality',
						),
						array(
							'name' => __('Firing Range'),
							'path' => 'firing_range_id',
							'options' => array('options' => array(
								1 => __('Short'),
								2 => __('Medium'),
								3 => __('Long'),
								4 => __('Very Long'),
							))
						),
						array(
							'name' => __('Accuracy Power Collection'),
							'path' => 'accuracy_power_collection',
						),
						array(
							'name' => __('Fire Power Collection'),
							'path' => 'fire_power_collection',
						),
						array(
							'name' => __('Equipment Ability'),
							'path' => 'equipment_ability',
						),
					), array('class' => 'table table-bordered')); 
				?>
			</div> <!-- panel -->
		</div> <!-- col -->
	</div> <!-- row -->

	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo __('Kanmusu'); ?>
		</div>
		<div class="panel-body">
			<div class="row">
				<?php foreach ($base['Character'] as $n => $character): ?>
				<div class="col-xs-6 col-sm-4 col-md-3">
					<?php echo $this->Html->link(h($character['name']), array('controller' => 'characters', 'action' => 'view', $character['id'])); ?>
				</div>
				<?php endforeach; ?>
			</div> <!-- row -->
		</div> <!-- panel-body -->
	</div> <!-- panel -->

	<?php if ($is_owner): ?>
	<?php
		echo $this->Form->postLink(
			__('Delete Naval District'),
			array('action' => 'delete', $base['NavalDistrict']['id']),
			array('class' => 'btn btn-danger', 'role' => 'button'),
			__('Are you sure to delete base?')
		);
	?>
	<?php endif; ?>
</div>
<?php echo $this->RealtimeForm->end(); ?>
