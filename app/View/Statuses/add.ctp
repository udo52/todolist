<div class="statuses form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<!--<legend><?php echo __('Add Status'); ?></legend>-->
                <legend><?php echo $this->Html->image('status.png', array('border' => '0'))?>  <?php echo __('Add Status'); ?></legend> 
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Todos'), array('controller' => 'todos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Todo'), array('controller' => 'todos', 'action' => 'add')); ?> </li>
	</ul>
</div>
