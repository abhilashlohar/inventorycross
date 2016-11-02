<legend><?= __('Signup') ?></legend>

<?= $this->Form->create($user) ?>
  <div class="form-group">
	<?= $this->Form->input('name',['class'=>'form-control','label'=>'Company Name']); ?>
  </div>
  <div class="form-group">
	<?= $this->Form->input('address',['class'=>'form-control']); ?>
  </div>
  <div class="form-group">
	<?= $this->Form->input('landmark',['class'=>'form-control']); ?>
  </div>
   
   <div class="form-group">
	<?=
    $this->Form->input('country', [
    'type' => 'select',
    'multiple' => false,
    'class'=>'form-control'
    ]);
    ?>
  </div>
    
   <div class="form-group">
	<?=
    $this->Form->input('state', [
    'type' => 'select',
    'multiple' => false,
    'class'=>'form-control'
    ]);
    ?>
  </div>
	
   <div class="form-group">
	<?=
    $this->Form->input('city', [
    'type' => 'select',
    'multiple' => false,
    'class'=>'form-control'
    ]);
    ?>
  </div>
  
  
    
   <div class="form-group">
	<?= $this->Form->input('pan_no',['class'=>'form-control']); ?>
  </div>
  
    <div class="form-group">
	<?= $this->Form->input('service_tax',['class'=>'form-control']); ?>
  </div>
  
  <div class="form-group">
	<?= $this->Form->input('vat_no',['class'=>'form-control']); ?>
  </div>
  
	<?= $this->Form->button(__('Signup'),['class'=>'btn btn-primary']) ?>
		<?php echo $this->Html->link(__('Login', true), array('action' => 'login'), array('class' => 'btn btn-primary'));?>

<?= $this->Form->end() ?>
