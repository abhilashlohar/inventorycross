<div class="location view large-9 medium-8 columns content">
    <h3><?= h($location->id) ?></h3>
    <table class="vertical-table table table-bordered">
        <tr>
            <th scope="row"><?= __('Location Name') ?></th>
            <td><?= h($location->location_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $location->has('user') ? $this->Html->link($location->user->name, ['controller' => 'Users', 'action' => 'view', $location->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $location->has('company') ? $this->Html->link($location->company->name, ['controller' => 'Companies', 'action' => 'view', $location->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
    </table>
</div>
