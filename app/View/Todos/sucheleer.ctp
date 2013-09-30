<div class="todos index">
	<!--<h2><?php echo __('Todos'); ?></h2>-->
	<h2><?php echo $this->Html->image('suche.png', array('alt' => 'Todolist'))?>  <?php echo __('Search Todos'); ?></h2>
        <table cellpadding="0" cellspacing="0">
	<tr>
			<th>Id</th>
			<th>Priority</th>
			<th>Task</th>
                        <th>Created on</th>
			<th>Due on</th>
			<!--<th><?php echo $this->Paginator->sort('modified_on'); ?></th>-->
			<th>User</th>
			<th>Description</th>
			<th>Comment</th>
			<th>Status</th>
	</tr>
	<?php foreach ($todos as $todo): ?>
	<tr>
		<td><?php echo h($todo['Todo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($todo['Priority']['name'], array('controller' => 'priorities', 'action' => 'view', $todo['Priority']['id'])); ?>
		</td>
                <td><?php echo h($todo['Todo']['name']); ?>&nbsp;</td>
		<!--<td><?php echo h($todo['Todo']['created_on']); ?>&nbsp;</td>-->
		<td><?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['created_on']))); ?>&nbsp;</td>
                <!--<td><?php echo h($todo['Todo']['due_on']); ?>&nbsp;</td>-->
		<td><?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['due_on']))); ?>&nbsp;</td>
                <!--<td><?php echo h($todo['Todo']['modified_on']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['modified_on']))); ?>&nbsp;</td>-->               
		<td>
			<?php echo $this->Html->link($todo['User']['name'], array('controller' => 'users', 'action' => 'view', $todo['User']['id'])); ?>
		</td>
		<td><?php echo h($todo['Todo']['description']); ?>&nbsp;</td>
		<td><?php echo h($todo['Todo']['comment']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($todo['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $todo['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $todo['Todo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $todo['Todo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $todo['Todo']['id']), null, __('Are you sure you want to delete # %s?', $todo['Todo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>		

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Todos', true), array('action' => 'index'));?></li>
	</ul>
</div>


<div class="actions">
<br />
<hr />
<br />
<h3><?php __('Suche'); ?></h3>
<?php echo $this->Form->create(false,array('action' => 'suche')); ?>
<!--<?php echo $this->Form->input('firstname', array('style' => 'width: 170px;', 'label' => 'firstname')); ?>-->
<?php echo $this->Form->input('name', array('style' => 'width: 170px;', 'label' => 'Task')); ?>
<?php echo $this->Form->end('Suchen'); ?>
<!--<?php pr($todos); ?>-->
</div
</div>
