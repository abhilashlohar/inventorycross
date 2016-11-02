
<div class="companies index large-9 medium-8 columns content">
    <h3><?= __('Companies') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('landmark') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pan_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_tax_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vat_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; foreach ($companies as $company): $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?= h($company->name) ?></td>
                <td><?= h($company->landmark) ?></td>
                <td><?= h($company->country) ?></td>
                <td><?= h($company->state) ?></td>
                <td><?= h($company->city) ?></td>
                <td><?= h($company->pan_no) ?></td>
                <td><?= h($company->service_tax_no) ?></td>
                <td><?= h($company->vat_no) ?></td>
                <td><?= h($company->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $company->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
					<?php if($company->status=='pending')
					{ ?>
					<?= $this->Html->link(__('Approve and login'), ['action' => 'approve', '?'=>['company_id'=>$company->id]], ['confirm' => __('Are you sure you want Approve  # {0}?',$company->id)]) ?>
					<?php } ?>
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
