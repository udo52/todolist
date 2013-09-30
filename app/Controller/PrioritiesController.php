<?php
App::uses('AppController', 'Controller');
/**
 * Priorities Controller
 *
 * @property Priority $Priority
 */
class PrioritiesController extends AppController {

    /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Priority->recursive = 0;
		$this->set('priorities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Priority->exists($id)) {
			throw new NotFoundException(__('Invalid priority'));
		}
		$options = array('conditions' => array('Priority.' . $this->Priority->primaryKey => $id));
		$this->set('priority', $this->Priority->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Priority->create();
			if ($this->Priority->save($this->request->data)) {
				$this->Session->setFlash(__('The priority has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The priority could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Priority->exists($id)) {
			throw new NotFoundException(__('Invalid priority'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Priority->save($this->request->data)) {
				$this->Session->setFlash(__('The priority has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The priority could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Priority.' . $this->Priority->primaryKey => $id));
			$this->request->data = $this->Priority->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Priority->id = $id;
		if (!$this->Priority->exists()) {
			throw new NotFoundException(__('Invalid priority'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Priority->delete()) {
			$this->Session->setFlash(__('Priority deleted'));
			$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Priority was not deleted'));
		$this->Session->setFlash(__('Der Datensatz kann nicht gelöscht werden, da es in der Tabelle Todo Datensätze mit dieser Priorität gibt!'));
                $this->redirect(array('action' => 'index'));
	}
       
        
}


