<?php
	class KancolleCharactersController extends KancolleAppController {
		public $helpers = array('Html', 'RealtimeForm.RealtimeForm', 'AjaxImage.AjaxImage');
		public $components = array('RequestHandler', 'RealtimeForm.RealtimeForm', 'AjaxImage.AjaxImage');
        public function beforeFilter() {
            $this->Auth->allow('index', 'summary', 'image');
        }

		public function index() {
			$characters = $this->KancolleCharacter->find('all', array(
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
			if (!$id || !$this->KancolleCharacter->exists($id)) {
				throw new NotFoundException();
			}

			$character = $this->KancolleCharacter->find('first', array(
				'conditions' => array('KancolleCharacter.id' => $id),
			));
			$naval_districts = $this->KancolleCharacter->NavalDistrict->find('list');
			$is_owner = User::getLoginId() == $character['KancolleCharacter']['user_id'];
			$title_for_layout = h($character['KancolleCharacter']['name']) . ' - ' . __('Kancolle KancolleCharacters') ;

			$this->set(compact('character', 'naval_districts', 'is_owner', 'title_for_layout'));
		}

		public function summary($id = null) {
			if (!$id || !$this->KancolleCharacter->exists($id)) {
				throw new NotFoundException();
			}

			$character = $this->KancolleCharacter->find('first', array(
				'conditions' => array('KancolleCharacter.id' => $id),
			));

            $this->set('character', [
                'id' => Hash::get($character, 'KancolleCharacter.id'),
                'name' => Hash::get($character, 'KancolleCharacter.name'),
                'url' => Router::url(['action' => 'view', Hash::get($character, 'KancolleCharacter.id')]),
                'portrait' => Hash::get($character, 'KancolleCharacter.image_mime') ? Router::url(['action' => 'image', Hash::get($character, 'KancolleCharacter.id')]) : null,
                'parameters' => [
                    'damage' => 0,
                    'action_power' => Hash::get($character, 'KancolleCharacter.action_power'),
                ],
            ]);
            $this->set('_serialize', 'character');
		}


		public function add() {
			if (!$this->request->is('post')) {
				throw new ForbiddenException;
			}

			$this->KancolleCharacter->create();
			$this->KancolleCharacter->set('name', __('New KancolleCharacter'));
			$this->KancolleCharacter->set('user_id', User::getLoginId());
			$this->KancolleCharacter->save();

			if ($this->KancolleCharacter->id) {
				$this->redirect(array('action' => 'view', $this->KancolleCharacter->id));
			}
		}

		public function delete($id = null) {
			if (!$this->request->is('post')) {
				throw new ForbiddenException;
			}

			$this->KancolleCharacter->id = $id;

			if (!$id || !$this->KancolleCharacter->exists()) {
				throw new NotFoundException;
			}

			if (!$this->KancolleCharacter->isOwner()) {
				throw new ForbiddenException;
			}

			if ($this->KancolleCharacter->delete()) {
				$this->redirect(array('action' => 'index'));
			}
		}

		public function update($id = null) {
			$this->RealtimeForm->update($id, 'KancolleCharacter', $this);
		}

		public function image($id = null) {
			if (!$this->KancolleCharacter->exists($id)) {
				throw new NotFoundException;
			}

			if ($this->request->is('post')) {
				$this->AjaxImage->save_image($this, $id, 'KancolleCharacter.image');
			} else {
				$this->layout = 'ajax';
				$image = $this->KancolleCharacter->find('first', [
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

				header('Content-type: ' . Hash::get($image, 'KancolleCharacter.image_mime'));
				echo Hash::get($image, 'KancolleCharacter.image_data');
			}
		}
	}
