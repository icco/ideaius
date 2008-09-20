<div class="posts index">
<?php
//There is a correct MVC way to doing this, and this is not it
//Not like this is anything anyway, but I need an easy way to convert things...

function cIDtoName($in)
{

return "Cat Name";
}

function uIDtoName($in)
{

return "User Name";
}
?>
<h2><?php __('Posts');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% ideas out of %count% total, starting on idea %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('ID');?></th>
	<th><?php echo $paginator->sort('content');?></th>
	<th><?php echo $paginator->sort('time');?></th>
	<th><?php echo $paginator->sort('user');?></th>
	<th><?php echo $paginator->sort('wikiptr');?></th>
	<th><?php echo $paginator->sort('cID');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($posts as $post):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $post['Post']['ID']; ?>
		</td>
		<td>
			<?php echo $post['Post']['content']; ?>
		</td>
		<td><!-- We should format the date nicely here... -->
			<?php echo $post['Post']['time']; ?>
		</td>
		<td>
			<?php echo uIDtoName($post['Post']['user']); ?>
		</td>
		<!--<td>
			<?php echo $post['Post']['wikiptr']; ?>
		</td>-->
		<td>
			<?php echo cIDtoName($post['Post']['cID']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $post['Post']['ID'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $post['Post']['ID'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $post['Post']['ID']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['ID'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Post', true), array('action'=>'add')); ?></li>
	</ul>
</div>
