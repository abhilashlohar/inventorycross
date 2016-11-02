<legend><?= __('Edit Inventory') ?></legend>
 <?= $this->Form->create($inventory) ?>

			<div class="form-group">
			<?= $this->Form->input('name',['class'=>'form-control','label'=>'Inventory Name']); ?>
			</div>
			<div class="form-group">
			
			<?= $this->Form->input('inventory_type_id',['empty'=>'--Select inventory type--','options'=>$inventorytypes,'class'=>'form-control']); ?>
			</div>
			
			<div class="form-group">
			<?= $this->Form->input('inventory_code',['class'=>'form-control']);		 
			?>
			</div>

			<div class="form-group">
			<?= $this->Form->input('part_number',['class'=>'form-control']); ?>
			</div>
			<div class="form-group">
			<?= $this->Form->input('price',['class'=>'form-control']); ?>
			</div>
			<div class="form-group">
			<?= $this->Form->date('manufacture_date',['class'=>'form-control']);		 
			?>
			</div>

			<div class="form-group">
			<?= $this->Form->date('expiry_date',['class'=>'form-control','label'=>'Inventory Name']); ?>
			</div>
			<div class="form-group">
			
			<?= $this->Form->input('location_id',['empty'=>'--Select location--','options'=>$locations,'class'=>'form-control']); ?>
			</div>
			
		
			<div class="form-group">
			<?= $this->Form->input('quantity',['class'=>'form-control']); ?>
			</div>
			<div class="form-group">
			<?= $this->Form->input('discryption',['class'=>'form-control']);		 
			?>
			</div>


			<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
			
<?= $this->Form->end() ?>


