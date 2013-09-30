<div class="todos view">
<h2><?php echo $this->Html->image('todolist.png', array('border' => '0'))?>  <?php echo __('Todo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($todo['Todo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due On'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['due_on']))); ?>
                        &nbsp;
		</dd>               
                <dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($todo['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $todo['Status']['id'])); ?>
			&nbsp;
		</dd>       
                <dt>&nbsp;</dt>
		<dd>&nbsp;</dd>   
                <dt><?php echo __('Aufgabe'); ?></dt>
		<dd>
			<?php echo h($todo['Todo']['name']); ?>
			&nbsp;
		</dd>               
                <dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($todo['Todo']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($todo['Todo']['comment']); ?>
			&nbsp;
		</dd>
		<dt>&nbsp;</dt>
		<dd>&nbsp;</dd>   
                <dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo $this->Html->link($todo['Priority']['name'], array('controller' => 'priorities', 'action' => 'view', $todo['Priority']['id'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($todo['User']['name'], array('controller' => 'users', 'action' => 'view', $todo['User']['id'])); ?>
			&nbsp;
		</dd> 
                <dt>&nbsp;</dt>
		<dd>&nbsp;</dd>   
                <dt><?php echo __('Created On'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['created_on']))); ?>
                        &nbsp;
		</dd>
		
		<dt><?php echo __('Modified On'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['modified_on']))); ?>
                    	&nbsp;
		</dd>		
		
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Todo'), array('action' => 'edit', $todo['Todo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Todo'), array('action' => 'delete', $todo['Todo']['id']), null, __('Are you sure you want to delete # %s?', $todo['Todo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Todos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Todo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Priorities'), array('controller' => 'priorities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Priority'), array('controller' => 'priorities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
