
<div class="inventories index large-9 medium-8 columns content">
    <h3><?= __('Inventories') ?></h3>
	
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inventory_type') ?></th>
				<th scope="col"><?= $this->Paginator->sort('inventory_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('part_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
				<th scope="col"><?= $this->Paginator->sort('manufacture_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discryption') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
		<?php $num=1; ?>
            <?php foreach ($inventories as $inventory): ?>
			
            <tr>
                <td><?php echo $num;?></td>
                <td><?= h($inventory->name) ?></td>
				
				<td><?= h($inventory->inventory_type->type) ?></td>
				
				<td><?= h($inventory->inventory_code) ?></td>
				<td><?= h($inventory->part_number) ?></td>
				<td><?= h($inventory->price) ?></td>
				<td><?= h($inventory->manufacture_date) ?></td>
				<td><?= h($inventory->expiry_date) ?></td>
				
				<td><?= h($inventory->location->location_name) ?></td>
				
				
				<td><?= h($inventory->quantity) ?></td>
				<td><?= h($inventory->discryption) ?></td>
                                
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->id]) ?>
					<?= $this->Html->link(__('Add Image'), ['controller'=>'InventoryImages','action' => 'add', $inventory->id]) ?>
                </td>
            </tr>
			<?php $num++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
