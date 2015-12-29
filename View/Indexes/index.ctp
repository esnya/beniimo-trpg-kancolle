<?php $this->Html->script('Kancolle.indexes', array('inline' => false)); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<form action="" onsubmit="return false;">
				<div class="form-group">
					<label for="IndexSearchBox"><?php echo __('Keyword'); ?></label>
					<input type="text" class="form-control" id="IndexSearchBox">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th><?php echo __('Keyword'); ?></th>
							<th><?php echo __('Yomigana'); ?></th>
							<th><?php echo __('Book'); ?></th>
							<th colspan=3><?php echo __('Page'); ?></th>
						</tr>
					</thead>
					<tbody id="IndexSearchResult">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
