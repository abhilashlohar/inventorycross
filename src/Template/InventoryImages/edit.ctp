<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inventoryImage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inventoryImage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Inventory Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Inventories'), ['controller' => 'Inventories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inventory'), ['controller' => 'Inventories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inventoryImages form large-9 medium-8 columns content">
    <?= $this->Form->create($inventoryImage) ?>
    <fieldset>
        <legend><?= __('Edit Inventory Image') ?></legend>
        <?php
            echo $this->Form->input('inventory_id', ['options' => $inventories]);
            echo $this->Form->input('image_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
