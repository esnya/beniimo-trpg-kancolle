<?php
	class CharactersController extends KancolleAppController {
		public $helpers = array('Html', 'RealtimeForm.RealtimeForm', 'AjaxImage.AjaxImage');
		public $components = array('RequestHandler', 'RealtimeForm.RealtimeForm', 'AjaxImage.AjaxImage');

		public function index() {
			$characters = $this->Character->find('all', array(
				'fields' => array(
					'id',
					'name',
					'User.name',
					'modified',
				),
				'order' => array(
					'modified' => 'desc',
				),
			));

			$this->set(compact('characters'));
		}

		public function view($id = null) {
			if (!$id || !$this->Character->exists($id)) {
				throw new NotFoundException();
			}

			$character = $this->Character->find('first', array(
				'conditions' => array('Character.id' => $id),
			));
			$naval_districts = $this->Character->NavalDistrict->find('list');
			$is_owner = User::getLoginId() == $character['Character']['user_id'];
			$title_for_layout = h($character['Character']['name']) . ' - ' . __('Kancolle Characters') ;

			$this->set(compact('character', 'naval_districts', 'is_owner', 'title_for_layout'));
		}

		public function summary($id = null) {
			if (!$id || !$this->Character->exists($id)) {
				throw new NotFoundException();
			}

			$character = $this->Character->find('first', array(
				'conditions' => array('Character.id' => $id),
			));

            $this->set('character', [
                'id' => Hash::get($character, 'Character.id'),
                'name' => Hash::get($character, 'Character.name'),
                'url' => Router::url(['action' => 'view', Hash::get($character, 'Character.id')]),
                'portrait' => Hash::get($character, 'Character.image_mime') ? Router::url(['action' => 'image', Hash::get($character, 'Character.id')]) : null,
                'parameters' => [
                    'damage' => 0,
                    'action_power' => Hash::get($character, 'Character.action_power'),
                ],
            ]);
            $this->set('_serialize', 'character');
		}


		public function add() {
			if (!$this->request->is('post')) {
				throw new ForbiddenException;
			}

			$this->Character->create();
			$this->Character->set('name', __('New Character'));
			$this->Character->set('user_id', User::getLoginId());
			$this->Character->save();

			if ($this->Character->id) {
				$this->redirect(array('action' => 'view', $this->Character->id));
			}
		}

		public function delete($id = null) {
			if (!$this->request->is('post')) {
				throw new ForbiddenException;
			}

			$this->Character->id = $id;

			if (!$id || !$this->Character->exists()) {
				throw new NotFoundException;
			}

			if (!$this->Character->isOwner()) {
				throw new ForbiddenException;
			}

			if ($this->Character->delete()) {
				$this->redirect(array('action' => 'index'));
			}
		}

		public function update($id = null) {
			$this->RealtimeForm->update($id, 'Character', $this);
		}

		public function image($id = null) {
			if (!$this->Character->exists($id)) {
				throw new NotFoundException;
			}

			if ($this->request->is('post')) {
				$this->AjaxImage->save_image($this, $id, 'Character.image');
			} else {
				$this->layout = 'ajax';
				$image = $this->Character->find('first', [
				'conditions' => [
				'id' => $id,
				'NOT' => [ 'OR' => [['image_data' => null], ['image_mime' => null]]],
				],
				'fields' => ['image_data', 'image_mime'],
				'recursive' => -1,
				]);

				if (empty($image)) {
					throw new NotFoundException;
				}

				header('Content-type: ' . Hash::get($image, 'Character.image_mime'));
				echo Hash::get($image, 'Character.image_data');
			}
		}
	}
