<div class="priorities view">
<h2><?php echo $this->Html->image('priority.png', array('border' => '0'))?>  <?php echo __('Priority'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($priority['Priority']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($priority['Priority']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Priority'), array('action' => 'edit', $priority['Priority']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Priority'), array('action' => 'delete', $priority['Priority']['id']), null, __('Are you sure you want to delete # %s?', $priority['Priority']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Priorities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Priority'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Todos'), array('controller' => 'todos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Todo'), array('controller' => 'todos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Todos'); ?></h3>
	<?php if (!empty($priority['Todo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<!--<th><?php echo __('Priority Id'); ?></th>-->
		<!--<th><?php echo __('Created On'); ?></th>-->
		<th><?php echo __('User Id'); ?></th>
                <th><?php echo __('Due On'); ?></th>
		<!--<th><?php echo __('Modified On'); ?></th>-->
		<th><?php echo __('Name'); ?></th>
		<!--<th><?php echo __('User Id'); ?></th>-->
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($priority['Todo'] as $todo): ?>
		<tr>
			<td><?php echo $todo['id']; ?></td>
			<td><?php echo $todo['user_id']; ?></td>
                        <!--<td><?php echo $todo['priority_id']; ?></td>-->
			<!--<td><?php echo $todo['created_on']; ?></td>-->
			<td><?php echo $todo['due_on']; ?></td>
			<!--<td><?php echo $todo['modified_on']; ?></td>-->
			<td><?php echo $todo['name']; ?></td>
			<!--<td><?php echo $todo['user_id']; ?></td>-->
                        <td><?php echo $todo['description']; ?></td>
			<td><?php echo $todo['comment']; ?></td>
			<td><?php echo $todo['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('PDF'), array('controller' => 'todos',  'action' => 'viewpdf', $todo['id'])); ?>
                                <?php echo $this->Html->link(__('View'), array('controller' => 'todos', 'action' => 'view', $todo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'todos', 'action' => 'edit', $todo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'todos', 'action' => 'delete', $todo['id']), null, __('Are you sure you want to delete # %s?', $todo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Todo'), array('controller' => 'todos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
