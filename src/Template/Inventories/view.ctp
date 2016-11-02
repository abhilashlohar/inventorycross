
<div class="inventories view large-9 medium-8 columns content">
    <h3><?= h($inventory->name) ?></h3>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($inventory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $inventory->has('user') ? $this->Html->link($inventory->user->name, ['controller' => 'Users', 'action' => 'view', $inventory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($inventory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($inventory->quantity) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Discryption') ?></h4>
        <?= $this->Text->autoParagraph(h($inventory->discryption)); ?>
    </div>
</div>
