<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Inventory Image'), ['action' => 'edit', $inventoryImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inventory Image'), ['action' => 'delete', $inventoryImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventoryImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inventory Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inventory Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inventories'), ['controller' => 'Inventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inventory'), ['controller' => 'Inventories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inventoryImages view large-9 medium-8 columns content">
    <h3><?= h($inventoryImage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Inventory') ?></th>
            <td><?= $inventoryImage->has('inventory') ? $this->Html->link($inventoryImage->inventory->name, ['controller' => 'Inventories', 'action' => 'view', $inventoryImage->inventory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Name') ?></th>
            <td><?= h($inventoryImage->image_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($inventoryImage->id) ?></td>
        </tr>
    </table>
</div>
