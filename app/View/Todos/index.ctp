<div class="todos index">
	<!--<h2><?php echo __('Todos'); ?></h2>-->
	<h2><?php echo $this->Html->image('todolist.png', array('alt' => 'Todolist'))?>  <?php echo __('Todos'); ?></h2>
        <table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('due_on',__('due_on')); ?></th>
                        <th><?php echo $this->Paginator->sort('status_id',__('status_id')); ?></th>
			<th><?php echo $this->Paginator->sort('name', __('task')); ?></th>
                        <th><?php echo $this->Paginator->sort('description', __('description')); ?></th>
			<th><?php echo $this->Paginator->sort('comment', __('comment')); ?></th>                                            
			<!--<th><?php echo $this->Paginator->sort('modified_on', __('modified_on')); ?></th>-->
			<th><?php echo $this->Paginator->sort('priority_id',__('priority_id')); ?></th>                        
			<th><?php echo $this->Paginator->sort('user_id', __('user_id')); ?></th>
                         <th><?php echo $this->Paginator->sort('created_on', __('created_on')); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($todos as $todo): ?>
	<tr>
		<td><?php echo h($todo['Todo']['id']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['due_on']))); ?>&nbsp;</td>
                <td><?php echo $this->Html->link($todo['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $todo['Status']['id'])); ?></td>
                <td><?php echo h($todo['Todo']['name']); ?>&nbsp;</td>
		<td><?php echo h($todo['Todo']['description']); ?>&nbsp;</td>
		<td><?php echo h($todo['Todo']['comment']); ?>&nbsp;</td>
                <!--<td><?php echo h($todo['Todo']['due_on']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($todo['Todo']['modified_on']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['modified_on']))); ?>&nbsp;</td>-->               
		<td><?php echo $this->Html->link($todo['Priority']['name'], array('controller' => 'priorities', 'action' => 'view', $todo['Priority']['id'])); ?></td>
                <td><?php echo $this->Html->link($todo['User']['name'], array('controller' => 'users', 'action' => 'view', $todo['User']['id'])); ?></td>		
                <!--<td><?php echo h($todo['Todo']['created_on']); ?>&nbsp;</td>-->
		<td><?php echo h($this->Time->format('d.m.Y, h:i',($todo['Todo']['created_on']))); ?>&nbsp;</td>
                <td class="actions">
			<?php echo $this->Html->link(__('PDF'), array('action' => 'viewpdf', $todo['Todo']['id'])); ?>
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $todo['Todo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $todo['Todo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $todo['Todo']['id']), null, __('Are you sure you want to delete # %s?', $todo['Todo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Todo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Priorities'), array('controller' => 'priorities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Priority'), array('controller' => 'priorities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
                <br />
                <hr />
                <br />
                <li><?php echo $this->Html->link(__('Search Todos', true), array('action' => 'sucheleer')); ?></li>
	</ul>
</div>
