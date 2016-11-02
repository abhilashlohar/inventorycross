
<div class="inventoryImages form large-9 medium-8 columns content">
    <?= $this->Form->create($inventoryImage,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Inventory Image') ?></legend>
        <?php
            echo $this->Form->input('image_name',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Default Image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
		<?php $num=1; ?>
            <?php foreach ($inventoryImages as $inventoryImage): ?>
            <tr>
                <td><?php echo $num;?></td>
                <td><?php echo $this->Html->image('/inventoryimages/'.$inventoryImage->image_name,['style'=>['height:50px']]); ?></td>
                <td><?= h($inventoryImage->default_image) ?></td>
                <td class="actions">
                    
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete','?'=>['inventory_id'=>$id,'image_id'=>$inventoryImage->id]], ['confirm' => __('Are you sure you want to delete # {0}?', $id,$inventoryImage->id)]) ?>
                   <?php if($inventoryImage->default_image=='no')
					{ ?>
					<?= $this->Html->link(__('Make Default'), ['action' => 'makedefault', '?'=>['inventory_id'=>$id,'image_id'=>$inventoryImage->id]], ['confirm' => __('Are you sure you want to Make Default Image # {0}?', $id,$inventoryImage->id)]) ?>
					<?php } ?>
				  
					
                </td>
            </tr>
			<?php $num++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>