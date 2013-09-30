<div class="todos form">
<?php echo $this->Form->create('Todo'); ?>
	<fieldset>
		<!--<legend><?php echo __('Add Todo'); ?></legend>-->
                <legend><?php echo $this->Html->image('addtodo.png', array('border' => '0'))?>  <?php echo __('Add Todo'); ?></legend> 
        <?php
		echo $this->Form->input('priority_id');
		echo $this->Form->input('created_on');
		//echo $this->Form->input('created_on', array('label' => 'Angelegt am: Datum / Uhrzeit:', 'dateFormat' => 'DMY', 'timeFormat' => 24));
                //echo $this->Form->input('due_on', array('label' => 'Fällig am: Datum / Uhrzeit:', 'dateFormat' => 'DMY', 'timeFormat' => 24));
                //type HTML 5 datetime-local wird nur vom chrome-Browser und opera erkannt
		//echo $this->Form->input('due_on', array('label' => 'Fällig am: Datum / Uhrzeit:', 'dateFormat' => 'DMY', 'timeFormat' => 24, 'type' => 'datetime-local'));
                echo $this->Form->input('due_on');
                echo $this->Form->input('modified_on');
		//echo $this->Form->input('modified_on', array('label' => 'Geändert am: Datum / Uhrzeit:', 'dateFormat' => 'DMY', 'timeFormat' => 24));
                echo $this->Form->input('name', array('label' => 'Aufgabe'));
		echo $this->Form->input('user_id');
		echo $this->Form->input('description');
		echo $this->Form->input('comment');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Todos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Priorities'), array('controller' => 'priorities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Priority'), array('controller' => 'priorities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
