
<div class="inventoryImages index large-9 medium-8 columns content">
    <h3><?= __('Inventory Images') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inventory_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventoryImages as $inventoryImage): ?>
            <tr>
                <td><?= $this->Number->format($inventoryImage->id) ?></td>
                <td><?= $inventoryImage->has('inventory') ? $this->Html->link($inventoryImage->inventory->name, ['controller' => 'Inventories', 'action' => 'view', $inventoryImage->inventory->id]) : '' ?></td>
                <td><?= h($inventoryImage->image_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inventoryImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventoryImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventoryImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventoryImage->id)]) ?>
                </td>
            </tr>
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
