<?php
App::uses('AppController', 'Controller');
/**
 * Todos Controller
 *
 * @property Todo $Todo
 */
class TodosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Todo->recursive = 0;
		$this->set('todos', $this->paginate());
	}

/**
 * Funktion für leere Such-View
 * 
 */
 public function sucheleer() {
		$daten = $this->Todo->find('all', array('conditions' => 'Todo.id < 1'));	
		$this->set('todos', $daten);
	}        
        
/**
 * Funktion für Action nach Klick auf Suche-Button in Sucheleer-View
 * 
 */        
public function suche() 
		{
		// Einige auskommentierte Beispiele für Such-Syntax
                //$daten = $this->Jazzmusician->find('all', array('conditions' => 'jazzmusician.lastname LIKE ' . '"d%"'));	
				
		//$daten = $this->set('todos',$this->Todo->find('all', array('conditions' => array('Todo.name LIKE' =>$this->data['name'] . '%'))));							
		// läuft
		
		//$daten = $this->Todo->find('all', array('conditions' => array('Todo.name LIKE' =>$this->data['name'] . '%')));							
		$order = array('Todo.name' => 'ASC');
		$conditions = array('Todo.name LIKE' =>$this->data['name'] . '%'); 
    
               // $order = array('Jazzmusician.lastname' => 'ASC');	
		
               // $conditions = array('and' => array('Jazzmusician.lastname LIKE' =>$this->data['lastname'] . '%'), 
										//	'Jazzmusician.firstname LIKE' =>$this->data['firstname'] . '%');
		//$conditions = 'Jazzmusician.id = 1';
		//$conditions = 'jazzmusician.lastname LIKE ' . '"%"';
                //$conditions = array('jazzmusician.lastname LIKE' =>$this->data['lastname'] . '%');
                
                // Beispiel für paginate mit find conditions
                //$this->paginate = array('conditions' => array('Post.user_id' => $userid)));
                //$this->set('posts', $this->paginate());

                //$this->Paginator->paginate

                //Neu
                if (!empty($this->data)) {   
                  // ohne Paginate next, previous
                // $daten = $this->Todo->find('all', array('conditions' => $conditions, 'order' => $order));
                 
               $this->paginate = array('conditions' => $conditions, 'order' => $order);
                //$this->paginate = array('conditions' => $conditions);
                    
                }		
		/* else {$daten = $this->Todo->find('all', array(
			'order' => 'id',
			));
                }*/
                $this->Todo->recursive = 0;
		//$sortdaten = $this->paginate($daten);
              //$this->set('todos',  $daten);
                $this->set('todos', $this->paginate());
                
                 }	        
        
 /**
  * PDF Ausgabe
  */
 public function viewpdf($id = null) {
		//$this->User->recursive = 0;
		//$this->set('users', $this->paginate());
	// alle anzeigen
     
   // $daten= $this->Todo->find('all', array('conditions' => array('Todo.name LIKE' =>$this->data['name'] . '%')));
     
    /* $daten = $this->Todo->find('all', array(
			'order' => 'todo.id DESC',
			));
	$this->set('todos', $daten);*/
     if (!$this->Todo->exists($id)) {
			throw new NotFoundException(__('Invalid todo'));
		}   
    $options = array('conditions' => array('Todo.' . $this->Todo->primaryKey => $id));
	$this->set('todo', $this->Todo->find('first', $options));


// die nächste Zeile ermöglicht die korrekte PDF Ausgabe im Crome und Firefox-Browserfenster
        // ohne vorherigen Download bzw. Speichern 
        // $tcpdf->Output('File_Name.pdf', 'I');        
        $this->response->type('application/pdf');       
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
               
        }                   
                 
                 
                 
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Todo->exists($id)) {
			throw new NotFoundException(__('Invalid todo'));
		}
		$options = array('conditions' => array('Todo.' . $this->Todo->primaryKey => $id));
		$this->set('todo', $this->Todo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Todo->create();
			if ($this->Todo->save($this->request->data)) {
				$this->Session->setFlash(__('The todo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The todo could not be saved. Please, try again.'));
			}
		}
		$priorities = $this->Todo->Priority->find('list');
		$users = $this->Todo->User->find('list');
		$statuses = $this->Todo->Status->find('list');
		$this->set(compact('priorities', 'users', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Todo->exists($id)) {
			throw new NotFoundException(__('Invalid todo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Todo->save($this->request->data)) {
				$this->Session->setFlash(__('The todo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The todo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Todo.' . $this->Todo->primaryKey => $id));
			$this->request->data = $this->Todo->find('first', $options);
		}
		$priorities = $this->Todo->Priority->find('list');
		$users = $this->Todo->User->find('list');
		$statuses = $this->Todo->Status->find('list');
		$this->set(compact('priorities', 'users', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Todo->id = $id;
		if (!$this->Todo->exists()) {
			throw new NotFoundException(__('Invalid todo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Todo->delete()) {
			$this->Session->setFlash(__('Todo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Todo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
