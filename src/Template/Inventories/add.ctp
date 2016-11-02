<legend><?= __('Add Inventory') ?></legend>
 <?= $this->Form->create($inventory) ?>

 <table cellpadding="0" cellspacing="0" class="table table-bordered tableitm" id="main_tb">
        <thead>
             <tr>
				 <th scope="col"><?= $this->Paginator->sort('#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inventory_type & name') ?></th>
				<th scope="col"><?= $this->Paginator->sort('inventory_code & part_number') ?></th>
 				<th scope="col"><?= $this->Paginator->sort('manufacture & Expiry date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location price & quantity') ?></th>
				 <th scope="col"><?= $this->Paginator->sort('') ?></th>
            </tr>
        </thead>
		<tbody>


		</tbody>
</table>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
<?= $this->Form->end() ?>


<?= $this->Html->script('/bjs/jquery.min.js'); ?>

<script>

$(document).ready(function() {



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
			
			$(this).find("td:nth-child(2) select").attr("name","inventories["+i+"][inventory_type_id]");
			$(this).find("td:nth-child(2) input").attr("name","inventories["+i+"][name]");
			$(this).find("td:nth-child(3)").find('input').each(function(){
			$(this).attr("name","inventories["+i+"][inventory_code]");
			});
			alert();
			//$(this).find("td:nth-child(3)").find('input:nth-child(1)').attr("name","inventories["+i+"][inventory_code]");
			//$(this).find("td:nth-child(3)").find('input:nth-child(2)').attr("name","inventories["+i+"][part_number]");
			
			
			$(this).find("td:nth-child(4) input:nth-child(1)").attr("name","inventories["+i+"][manufacture_date]");
			$(this).find("td:nth-child(4) input:nth-child(2)").attr("name","inventories["+i+"][expiry_date]");
			
			$(this).find("td:nth-child(5) select:nth-child(1)").attr("name","inventories["+i+"][location_id]");
			$(this).find("td:nth-child(5) input:nth-child(2)").attr("name","inventories["+i+"][price]");
			$(this).find("td:nth-child(5) input:nth-child(3)").attr("name","inventories["+i+"][quantity]");
			i++;
		});
	}
	
	$(document).on("click",".deleterow",function(e){
	
		var l=$(this).closest("table tbody").find("tr").length;
		if (confirm("Are you sure to remove row ?") == true) {
			if(l>1){
				$(this).closest("tr").remove();
				var i=0;
				$("#main_tb tbody tr").each(function(){
					
					$(this).find("td:nth-child(1)").html(++i); --i;
					$(this).find("td:nth-child(2) select").attr("name","inventories["+i+"][inventory_type_id]");
					$(this).find("td:nth-child(2) input").attr("name","inventories["+i+"][name]");
					
					$(this).find("td:nth-child(3) input:nth-child(1)").attr("name","inventories["+i+"][inventory_code]");
					
					$(this).find("td:nth-child(3) input").attr("name","inventories["+i+"][part_number]");
					$(this).find("td:nth-child(6) input").attr("name","inventories["+i+"][price]");
					$(this).find("td:nth-child(7) input").attr("name","inventories["+i+"][manufacture_date]");
					$(this).find("td:nth-child(8) input").attr("name","inventories["+i+"][expiry_date]");
					$(this).find("td:nth-child(9) input").attr("name","inventories["+i+"][location_id]");
					$(this).find("td:nth-child(10) input").attr("name","inventories["+i+"][quantity]");
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
					<td>
						<div class="form-group">
						<?= $this->Form->input('inventory_type_id',['empty'=>'--Select inventory type--','options'=>$inventorytypes,'label'=>false,'class'=>'form-control']); ?>
						</div>
						<div class="form-group">
						<?= $this->Form->input('name',['class'=>'form-control','label'=>false,'placeholder'=>'Inventory Name']); ?>
						</div>
					</td>
					<td>
						<div class="form-group">
						<?= $this->Form->input('inventory_code',['class'=>'form-control','label'=>false,'placeholder'=>'Inventory Code']);		 
						?>
						</div>

						<div class="form-group">
						<?= $this->Form->input('part_number',['class'=>'form-control','label'=>false,'placeholder'=>'Part Number']); ?>
						</div>
					</td>
					<td>
						<div class="form-group">
						<?= $this->Form->input('manufacture_date',['class'=>'form-control','type'=>'text','label'=>false,'placeholder'=>'manufacture_date']);		 
						?>
						</div>

						<div class="form-group">
						<?= $this->Form->input('expiry_date',['class'=>'form-control','type'=>'text','label'=>false,'placeholder'=>'expiry_date']); ?>
						</div>

					</td>	
					<td>
						<div class="form-group">
						<?= $this->Form->input('location_id',['empty'=>'--Select location--','options'=>$locations,'label'=>false,'class'=>'form-control']); ?>
						</div>
						
						<div class="form-group col-lg-6">
						<?= $this->Form->input('price',['class'=>'form-control','label'=>false,'placeholder'=>'price']);		 
						?>
						</div>

						<div class="form-group col-lg-6">
						<?= $this->Form->input('quantity',['class'=>'form-control','label'=>false,'placeholder'=>'quantity']);		 
						?>
						</div>
					</td>	
					
					<td><a class="btn btn-xs btn-default addrow" href="#" role='button'><i class="fa fa-plus-circle"></i></a>
						<a class="btn btn-xs btn-default deleterow" href="#" role='button'><i class="fa fa-times" style="color:red;"></i></a>
					</td>
			</tr>
			
			
	</tbody>
</table>