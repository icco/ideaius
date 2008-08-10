<div class="wikis form">
<?php echo $form->create('Wiki');?>
	<fieldset>
 		<legend><?php __('Add Wiki');?></legend>
	<?php
		echo $form->input('ID');
		echo $form->input('pID');
		echo $form->input('content');
		echo $form->input('date');
		echo $form->input('uID');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Wikis', true), array('action'=>'index'));?></li>
	</ul>
</div>
