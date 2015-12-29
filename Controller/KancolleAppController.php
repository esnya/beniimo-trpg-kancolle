<?php

App::uses('AppController', 'Controller');

class KancolleAppController extends AppController {
	public function beforeFilter() {
		$this->set('copyright', 'Copyright &copy; 2014 DMM.com/KADOKAWA GAMES, 河嶋陶一朗／冒険企画局, ukatama. All Rights Reserved');
	}
}
