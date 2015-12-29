<?php
	class Character extends KancolleAppModel {
		public $belongsTo = array(
			'User',
			'Kancolle.NavalDistrict',
		);

		public function isOwner($id = null) {
			if (!$id) $id = $this->getID();
			$tmp = $this->recursive;
			$this->recursive = -1;
			$character = $this->findById($id, array('user_id'));
			$this->recursive = $tmp;
			return Hash::get($character, 'Character.user_id') == User::getLoginId();
		}
	}
