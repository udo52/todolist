<div class="priorities form">
<?php echo $this->Form->create('Priority'); ?>
	<fieldset>
		<!--<legend><?php echo __('Edit Priority'); ?></legend>-->
                <legend><?php echo $this->Html->image('priority.png', array('border' => '0'))?>  <?php echo __('Edit Priority'); ?></legend>
                    <?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Priority.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Priority.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Priorities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Todos'), array('controller' => 'todos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Todo'), array('controller' => 'todos', 'action' => 'add')); ?> </li>
	</ul>
</div>
