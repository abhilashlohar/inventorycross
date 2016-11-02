
<div class="companies view large-9 medium-8 columns content">
    <h3><?= h($company->name) ?></h3>
    <table class="table table-borderd" >
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Landmark') ?></th>
            <td><?= h($company->landmark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($company->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($company->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($company->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pan No') ?></th>
            <td><?= h($company->pan_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Tax No') ?></th>
            <td><?= h($company->service_tax_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vat No') ?></th>
            <td><?= h($company->vat_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($company->status) ?></td>
        </tr>
		
		
        
    </table>
	
	 <table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
               
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($company->company_contacts as $company_contact): ?>
            <tr>
                <td><?= h($company_contact->name) ?></td>
                <td><?= h($company_contact->email) ?></td>
                <td><?= h($company_contact->contact) ?></td>
			</tr>
            <?php endforeach; ?>
		</tbody>
	</table>
</div>
