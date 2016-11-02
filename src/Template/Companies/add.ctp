
<div class="companies form large-9 medium-8 columns content">
   <?= $this->Form->create($company) ?>

   <fieldset>
        <legend><?= __('Add Company') ?></legend>
     
	<div class="form-group">
		<?= $this->Form->input('name',['class'=>'form-control','label'=>'Company Name']); ?>
	</div>
  
	<div class="form-group">
		<?= $this->Form->input('landmark',['class'=>'form-control']); ?>
	</div>

	<div class="form-group">
		<?= $this->Form->input('country',['class'=>'form-control']); ?>
	</div>

	<div class="form-group">
		<?= $this->Form->input('state',['empty'=>'--Select state--','options'=>$states,'class'=>'form-control']); ?>
	</div>
	
	<div class="form-group"  id="city_div" >
		<?= $this->Form->input('city',['class'=>'form-control', 'label'=>'City']); ?>
	</div>
  
    <div class="form-group">
		<?= $this->Form->input('pan_no',['class'=>'form-control']); ?>
	</div>
  
    <div class="form-group">
		<?= $this->Form->input('service_tax_no',['class'=>'form-control']); ?>
	</div>
  
    <div class="form-group">
		<?= $this->Form->input('vat_no',['class'=>'form-control']); ?>
	</div>
	
	<h4 style="font-size:13px'">Contact Details</h4>
				<table class="table table-condensed tableitm" id="main_tb">
					<thead>
						<tr>
							<th><label class="control-label">ID<label></th>
							<th><label class="control-label">NAME<label></th>
							<th><label class="control-label">EMAIL<label></th>
							<th><label class="control-label">CONTACT<label></th>
						</tr>
					</thead>
					
					<tbody>
						
					</tbody>
				</table>
				
				<div class="alert alert-danger" id="row_error" style="display:none;">
                    Provide your Contact Details.
                </div>
  
   

    </fieldset>
	<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->script('/bjs/jquery.min.js'); ?>

<script>

$(document).ready(function() {

	$('select[name="state"]').on("change",function() {
	$('#city_div').html('Loading...');
	var state=$('select[name="state"] option:selected').val();
	var url="<?php echo $this->Url->build(['controller'=>'Companies','action'=>'CityDropdown']); ?>";
	url=url+'/'+state,
	$.ajax({
		url: url,
		type: 'GET',
	}).done(function(response) {
		$('#city_div').html(response);
	});
});



	$(document).on("click","a[role='button']",function(e){
		e.preventDefault();
	});
	
	$(document).on("click",".addrow",function(e){
		add_row();
	});
	
	add_row();
	function add_row(){
		var tr=$("#sample_tb tbody tr").clone();
		$("#main_tb tbody").append(tr);
		var i=0;
		$("#main_tb tbody tr").each(function(){
			$(this).find("td:nth-child(1)").html(++i); --i;
			$(this).find("td:nth-child(2) input").attr("name","company_contacts["+i+"][name]");
			$(this).find("td:nth-child(3) input").attr("name","company_contacts["+i+"][email]");
			$(this).find("td:nth-child(4) input").attr("name","company_contacts["+i+"][contact]");
			i++;
		});
	}
	
	$(document).on("click",".deleterow",function(e){
		$('input[name="company_contacts[0][default_address]"]').val("DEFAULT").css('background-color','#DDD');
		var l=$(this).closest("table tbody").find("tr").length;
		if (confirm("Are you sure to remove row ?") == true) {
			if(l>1){
				$(this).closest("tr").remove();
				var i=0;
				$("#main_tb tbody tr").each(function(){
					
					$(this).find("td:nth-child(1)").html(++i); --i;
					$(this).find("td:nth-child(2) input").attr("name","company_contacts["+i+"][name]");
					$(this).find("td:nth-child(3) input").attr("name","company_contacts["+i+"][email]");
					$(this).find("td:nth-child(4) input").attr("name","company_contacts["+i+"][contact]");
					i++;
				});
				calculate_total();
			}
		} 
    });
});
</script>

<table id="sample_tb" style="display:none;">
	<tbody>
		<tr>
			<td>0</td>
			<td><?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm','placeholder'=>'Name']); ?></td>
			<td><?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm','placeholder'=>'Email']); ?></td>
			<td><?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm','placeholder'=>'Contact No']); ?></td>
			<td><a class="btn btn-xs btn-default addrow" href="#" role='button'><i class="fa fa-plus-circle"></i></a>
			<a class="btn btn-xs btn-default deleterow" href="#" role='button'><i class="fa fa-times" style="color:red;"></i></a></td>
		</tr>
	</tbody>
</table>