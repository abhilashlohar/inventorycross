<legend><?= __('Login') ?></legend>
<?= $this->Form->create($user) ?>
  <div class="form-group">
	<?= $this->Form->input('email',['class'=>'form-control']); ?>
  </div>
  <div class="form-group">
	<?= $this->Form->input('password',['class'=>'form-control']); ?>
  </div>
	<?= $this->Form->button(__('Login'),['class'=>'btn btn-primary']) ?>
	<?php echo $this->Html->link(__('Sign-Up', true), array('action' => '../companies/add'), array('class' => 'btn btn-primary'));?>
<?= $this->Form->end() ?>
