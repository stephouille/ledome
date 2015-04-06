<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>

<div class="form-group">
	<?= $this->Form->input('email', array('class' => 'form-control')); ?>
</div>
<div class="form-group">
	<?= $this->Form->input('password', array('class' => 'form-control')); ?>
</div>

<?php echo $this->Form->end(__('Login')); ?>
</div>