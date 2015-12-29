<?php
	echo $this->RealtimeForm->create('Character', $character, array(
		'readonly' => !$is_owner,
	));
?>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th><?php echo __('Name'); ?></th>
								<td>
									<h1>
										<?php echo $this->RealtimeForm->element('name'); ?>
									</h1>
								</td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
			</div> <!-- row -->

			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th><?php echo __('User'); ?></th>
								<td><?php echo $this->RealtimeForm->element('user_id', array('readonly' => true, 'plugin' => null)); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th><?php echo __('Naval District'); ?></th>
								<td><?php echo $this->RealtimeForm->element('naval_district_id', array('empty' => true)); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> <!-- row -->

			<div class="row">
				<div class="col-sm-8">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th><?php echo __('Ship Type'); ?></th>
								<td><?php
										echo $this->RealtimeForm->element('type', array('options' => array(
											'1' => __('Destroyer'),
											'2' => __('Light Cruiser'),
											'3' => __('Heavy Cruiser'),
											'4' => __('Light Aircraft Carrier'),
											'5' => __('Aircraft Carrier'),
											'6' => __('Battle Ship'),
										)));
									?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->

				<div class="col-sm-4">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th><?php echo __('Level'); ?></th>
								<td><?php echo $this->RealtimeForm->element('level'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
			</div> <!-- row -->
		</div> <!-- col -->

		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-4">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th><?php echo __('Initial Personality'); ?></th>
								<td><?php echo $this->RealtimeForm->element('initial_personality'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->

				<div class="col-sm-8">
					<table class="table table-bordered">
						<thead>
							<tr class="small">
								<th></th>
								<th><?php echo __('Fuel'); ?></th>
								<th><?php echo __('Ammutition'); ?></th>
								<th><?php echo __('Steel'); ?></th>
								<th><?php echo __('Bauxite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									$compatibility_options = array(
										'1' => __('[Good]'),
										'2' => __('[OK]'),
										'3' => __('[NG]'),
									);
								?>
								<th><?php echo __('Material Compatibility'); ?></th>
								<td><?php echo $this->RealtimeForm->element('fuel_material_compatibility', array('options' => $compatibility_options)); ?></td>
								<td><?php echo $this->RealtimeForm->element('ammunition_material_compatibility', array('options' => $compatibility_options)); ?></td>
								<td><?php echo $this->RealtimeForm->element('steel_material_compatibility', array('options' => $compatibility_options)); ?></td>
								<td><?php echo $this->RealtimeForm->element('bauxite_material_compatibility', array('options' => $compatibility_options)); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
			</div> <!-- row -->

			<div class="row">
				<div class="col-xs-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><?php echo __('Accuracy'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $this->RealtimeForm->element('accuracy'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
				<div class="col-xs-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><?php echo __('Evasion'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $this->RealtimeForm->element('evasion'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
				<div class="col-xs-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><?php echo __('Equipment Power'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $this->RealtimeForm->element('equipment'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
			</div> <!-- row -->
			<div class="row">
				<div class="col-xs-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><?php echo __('Fire Power'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $this->RealtimeForm->element('fire_power'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
				<div class="col-xs-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><?php echo __('Protection Power'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $this->RealtimeForm->element('protection'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
				<div class="col-xs-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><?php echo __('Action Power'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $this->RealtimeForm->element('action_power'); ?></td>
							</tr>
						</tbody>
					</table>
				</div> <!-- col -->
			</div> <!-- row -->
		</div> <!-- col -->
	</div> <!-- row -->
	<div class="row text-center">
		<?php
			echo $this->AjaxImage->img(
				$character,
				'Character.image',
				$this->Html->url(['action' => 'image', $character['Character']['id']])
			);
		?>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo __('Personality Table'); ?>
		</div>
		<?php // ToDo: I18n ?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th>一．背景</th>
					<th></th>
					<th>二．魅力</th>
					<th></th>
					<th>三．性格</th>
					<th></th>
					<th>四．趣味</th>
					<th></th>
					<th>五．航海</th>
					<th></th>
					<th>六．戦闘</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach (array(
						array(
							'二',
							'人脈',
							'素直',
							'不思議',
							'寝る',
							'暗号',
							'電子戦',
						),
						array(
							'三',
							'名声',
							'クール',
							'おおらか',
							'空想',
							'通信',
							'航空打撃戦',
						),
						array(
							'四',
							'暗い過去',
							'優しい',
							'面倒見',
							'生き物',
							'索敵',
							'航空戦',
						),
						array(
							'五',
							'古風',
							'おしとやか',
							'マジメ',
							'読書',
							'規律',
							'対空戦闘',
						),
						array(
							'六',
							'口癖',
							'けなげ',
							'負けず嫌い',
							'食べ物',
							'補給',
							'突撃',
						),
						array(
							'七',
							'幸運',
							'笑顔',
							'元気',
							'おしゃべり',
							'待機',
							'砲撃',
						),
						array(
							'八',
							'アイドル',
							'ばか',
							'楽観的',
							'買い物',
							'機動',
							'退却',
						),
						array(
							'九',
							'秘密兵器',
							'さわやか',
							'丁寧',
							'芸能',
							'海図',
							'支援',
						),
						array(
							'十',
							'お嬢様',
							'面白い',
							'いじわる',
							'おしゃれ',
							'指揮',
							'魚雷',
						),
						array(
							'十一',
							'スタイル',
							'えっち',
							'自由奔放',
							'入浴',
							'衛生',
							'対潜戦闘',
						),
						array(
							'十二',
							'外国暮らし',
							'派手',
							'大胆',
							'恋愛',
							'整備',
							'夜戦',
						),
					) as $_i => $line):
				?>
				<tr>
					<?php $i = $_i + 2; ?>
					<th><?php echo $line[0]; ?></th>
					<?php foreach (array_slice($line, 1) as $_j => $column): ?>
					<?php $j = $_j + 1; ?>

					<td><?php echo $this->RealtimeForm->element("personality_gap_{$j}"); ?></td>
					<td>
						<?php
							echo $this->RealtimeForm->element("personality_{$j}_{$i}", array('style' => 'display: inline-block', 'empty' => true, 'options' => array(
								1 => '○',
								2 => '×',
							)));
						?>
						<?php echo $column; ?>
					</td>
					<?php endforeach; ?>
					<th><?php echo $line[0]; ?></th>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div> <!-- panel -->
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Equipment'); ?>
				</div>
				<table class="table table-bordered">
					<tbody>
						<?php for ($n = 1; $n <= 4; $n++) { ?>
						<tr>
							<td colspan=4><?php echo $this->RealtimeForm->element("equipment_{$n}_name");?></td>
							<th class="small"><?php echo __('Designated Personality'); ?></th>
							<td><?php echo $this->RealtimeForm->element("equipment_{$n}_personality");?></td>
							<th class="small"><?php echo __('Firing Range'); ?></th>
							<td>
								<?php
									echo $this->RealtimeForm->element("equipment_{$n}_range", array('empty' => '-', 'options' => array(
										1 => __('Short'),
										2 => __('Medium'),
										3 => __('Long'),
										4 => __('Very Long'),
									)));
								?>
							</td>
							<th class="small"><?php echo __('Accuracy Correction'); ?></th>
							<td><?php echo $this->RealtimeForm->element("equipment_{$n}_accuracy_correction");?></td>
							<th class="small"><?php echo __('Fire Power Correction'); ?></th>
							<td><?php echo $this->RealtimeForm->element("equipment_{$n}_fire_power_correction");?></td>
						</tr>
						<tr>
							<th class="small"><?php echo __('Type'); ?></th>
							<td><?php echo $this->RealtimeForm->element("equipment_{$n}_type");?></td>
							<th class="small"><?php echo __('Ability'); ?></th>
							<td colspan=9><?php echo $this->RealtimeForm->element("equipment_{$n}_ability");?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div> <!-- panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Tactics / Inherence'); ?>
				</div>
				<table class="table table-bordered">
					<tbody>
						<?php for ($n = 1; $n <= 4; $n++) { ?>
						<tr>
							<td colspan=2><?php echo $this->RealtimeForm->element("tactics_inherence_{$n}_name");?></td>
							<th class="small"><?php echo __('Type'); ?></th>
							<td><?php echo $this->RealtimeForm->element("tactics_inherence_{$n}_type", array('empty' => '-', 'options' => array('1' => __('Tactics'), '2' => __('Inherence'))));?></td>
							<th class="small"><?php echo __('Designated Personality'); ?></th>
							<td><?php echo $this->RealtimeForm->element("tactics_inherence_{$n}_personality");?></td>
							<th class="small"><?php echo __('Style'); ?></th>
							<td>
								<?php
									echo $this->RealtimeForm->element("tactics_inherence_{$n}_style", array('empty' => '-', 'options' => array(
										1 => __('Auto'),
										2 => __('Move'),
										3 => __('Sub'),
									)));
								?>
							</td>
						</tr>
						<tr>
							<th class="small"><?php echo __('Ability'); ?></th>
							<td colspan=7><?php echo $this->RealtimeForm->element("tactics_inherence_{$n}_ability");?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div> <!-- panel -->
		</div> <!-- col -->

		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Initial Personality'); ?>
				</div>
				<table class="table table-bordered">
					<tbody>
						<?php for ($n = 1; $n <= 5; $n++) { ?>
						<tr>
							<td>
								<?php
									echo $this->RealtimeForm->element("initial_personality_{$n}_type", array('empty' => '-', 'options' => array(
										'1' => __('[Positive]'),
										'2' => __('[Negative]'),
									)));
								?>
							</td>
							<td><?php echo $this->RealtimeForm->element("initial_personality_{$n}"); ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div> <!-- panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('People'); ?>
				</div>
				<table class="table table-bordered">
					<tbody>
						<?php for ($n = 1; $n <= 8; $n++) { ?>
						<tr>
							<td><?php echo $this->RealtimeForm->element("person_{$n}_name");?></td>
							<th class="small"><?php echo __('Cheer'); ?></th>
							<td><?php echo $this->RealtimeForm->element("person_{$n}_cheer");?></td>
							<th class="small"><?php echo __('Affect'); ?></th>
							<td><?php echo $this->RealtimeForm->element("person_{$n}_affect");?></td>
							<th class="small"><?php echo __('Attribute'); ?></th>
							<td><?php echo $this->RealtimeForm->element("person_{$n}_attribute");?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div> <!-- panel -->
			<div class="panel panel-default">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th><?php echo __('Items'); ?></th>
							<td><?php echo $this->RealtimeForm->element('item'); ?></td>
							<th><?php echo __('EXP'); ?></th>
							<td><?php echo $this->RealtimeForm->element('exp'); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Damage...'); ?>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th><?php echo __('Protection x 1'); ?></th>
							<th><?php echo __('Protection x 2'); ?></th>
							<th><?php echo __('Protection x 3'); ?></th>
							<th><?php echo __('Protection x 4'); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $this->RealtimeForm->element('damage_1'); ?></td>
							<td><?php echo $this->RealtimeForm->element('damage_2'); ?></td>
							<td><?php echo $this->RealtimeForm->element('damage_3'); ?></td>
							<td><?php echo $this->RealtimeForm->element('damage_4'); ?></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td><?php echo __('Minor Damage'); ?></td>
							<td><?php echo __('Middle Damage'); ?></td>
							<td><?php echo __('Major Damage'); ?></td>
							<td><?php echo __('Torpedoed'); ?></td>
						</tr>
					</tfoot>
				</table>
			</div> <!-- panel -->
		</div> <!-- col -->
	</div> <!-- row -->
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Reaction Table'); ?>
				</div>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th><?php echo __('One'); ?></th>
							<td><?php echo $this->RealtimeForm->element('reaction_1'); ?></td>
						</tr>
						<tr>
							<th><?php echo __('Two'); ?></th>
							<td><?php echo $this->RealtimeForm->element('reaction_2'); ?></td>
						</tr>
						<tr>
							<th><?php echo __('Three'); ?></th>
							<td><?php echo $this->RealtimeForm->element('reaction_3'); ?></td>
						</tr>
						<tr>
							<th><?php echo __('Four'); ?></th>
							<td><?php echo $this->RealtimeForm->element('reaction_4'); ?></td>
						</tr>
						<tr>
							<th><?php echo __('Five'); ?></th>
							<td><?php echo $this->RealtimeForm->element('reaction_5'); ?></td>
						</tr>
						<tr>
							<th><?php echo __('Six'); ?></th>
							<td><?php echo $this->RealtimeForm->element('reaction_6'); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- panel -->
		</div> <!-- col -->
		<div class="col-xs-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo __('Memo'); ?>
				</div>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td><?php echo $this->RealtimeForm->element('memo'); ?></td>
						</tr>
					</tbody>
				</table>
			</div> <!-- panel -->
		</div> <!-- col -->
	</div> <!-- row -->
	<?php if ($is_owner): ?>
	<?php
		echo $this->Form->postLink(
			__('Delete Character'),
			array('action' => 'delete', $character['Character']['id']),
			array('class' => 'btn btn-danger', 'role' => 'button'),
			__('Are you sure to delete character?')
		);
	?>
	<?php endif; ?>
</div> <!-- container -->
<?php echo $this->RealtimeForm->end(); ?>
