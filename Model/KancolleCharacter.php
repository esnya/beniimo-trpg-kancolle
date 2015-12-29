<?php
	class KancolleCharacter extends KancolleAppModel {
        public $useTable = 'characters';

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
			return Hash::get($character, 'KancolleCharacter.user_id') == User::getLoginId();
		}
	}
