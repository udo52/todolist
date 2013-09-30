<?php
App::uses('AppModel', 'Model');
/**
 * Priority Model
 *
 * @property Todo $Todo
 */
class Priority extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Todo' => array(
			'className' => 'Todo',
			'foreignKey' => 'priority_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
             )
	);

        
    public function beforeDelete($cascade = false) {
    $count = $this->Todo->find("count", array(
        "conditions" => array("priority_id" => $this->id)
    ));
    if ($count == 0) {
           return true;
    } else {
             
        return false;
    }
 
}      
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
}
