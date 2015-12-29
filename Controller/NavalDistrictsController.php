<?php
	class NavalDistrictsController extends KancolleAppController {
		public $helpers = array('Html', 'RealtimeForm.RealtimeForm');
		public $components = array('RequestHandler', 'RealtimeForm.RealtimeForm');

		public function index() {
			$bases = $this->NavalDistrict->find('all', array(
				'fields' => array(
					'id',
					'name',
					'level',
					'User.name',
					'modified',
				),
				'order' => array(
					'modified' => 'desc',
				),
			));

			$this->set(compact('bases'));
		}

		public function add() {
			if (!$this->request->is('post')) {
				throw new ForbiddenException;
			}

			$this->NavalDistrict->create();
			$this->NavalDistrict->set('name', __('New Naval District'));
			$this->NavalDistrict->set('user_id', User::getLoginId());
			$this->NavalDistrict->save();

			if ($this->NavalDistrict->id) {
				$this->redirect(array('action' => 'view', $this->NavalDistrict->id));
			}
		}

		public function view($id = null) {
			if (!$id || !$this->NavalDistrict->exists($id)) {
				throw new NotFoundException();
			}

			$base = $this->NavalDistrict->find('first', array(
				'conditions' => array('NavalDistrict.id' => $id),
			));
			$is_owner = User::getLoginId() == $base['NavalDistrict']['user_id'];

			$this->set(compact('base', 'is_owner'));
		}

		public function delete($id = null) {
			if (!$this->request->is('post')) {
				throw new ForbiddenException;
			}

			$this->NavalDistrict->id = $id;

			if (!$id || !$this->NavalDistrict->exists()) {
				throw new NotFoundException;
			}

			if (!$this->NavalDistrict->isOwner()) {
				throw new ForbiddenException;
			}

			if ($this->NavalDistrict->delete()) {
				$this->redirect(array('action' => 'index'));
			}
		}

		public function update($id = null) {
			$this->RealtimeForm->update($id, 'NavalDistrict', $this);
		}
		public function append($id = null) {
			$this->RealtimeForm->append($id, 'NavalDistrict', $this);
		}
		public function remove($id = null) {
			$this->RealtimeForm->remove($id, 'NavalDistrict', $this);
		}
	}


