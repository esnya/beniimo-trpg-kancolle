<?php
	class NavalDistrict extends KancolleAppModel {
		public $belongsTo = array(
			'User',
		);

		public $hasMany = array(
			'Kancolle.NavalDistrictEquipmentAbility',
			'Kancolle.Character',
		);

		public function isOwner($id = null) {
			if (!$id) $id = $this->getID();
			$tmp = $this->recursive;
			$this->recursive = -1;
			$character = $this->findById($id, array('user_id'));
			$this->recursive = $tmp;
			return Hash::get($character, 'NavalDistrict.user_id') == User::getLoginId();
		}
	}
