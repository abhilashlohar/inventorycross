<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 */
class CompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$this->check_auth();
		$this->check_super_admin();
		$this->viewBuilder()->layout('after_login');
		$companies = $this->paginate($this->Companies);

		$this->set(compact('companies'));
		$this->set('_serialize', ['companies']);
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->check_auth();
		$this->check_super_admin();
		$this->viewBuilder()->layout('signup_layout');
        $company = $this->Companies->get($id, [
            'contain' => ['CompanyContacts']
        ]);

        $this->set('company', $company);

        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
	
		$this->viewBuilder()->layout('signup_layout');
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->data);
			//pr($company); exit;
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));
				

                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
            }
        }
		$states=$this->Companies->CityStates->find('list',['keyField'=>'state','valueField'=>'state'])->distinct()->order(['state'=>'ASC']);
        $this->set(compact('company','states'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('signup_layout');
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->data);
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The company could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('company'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->viewBuilder()->layout('signup_layout');
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function cityDropdown($state = null)
    {
        $this->viewBuilder()->layout('');
		$cities = $this->Companies->CityStates->find('list',['keyField'=>'city','valueField'=>'city'])->distinct()->order(['state'=>'ASC'])->where(['state'=>$state]);
		$this->set(compact('cities'));
    }
	
	public function approve()
	{
		$company_id=$this->request->query('company_id'); 
		
		$query = $this->Companies->query();
					$query->update()
						->set(['status' => 'Approve'])
						->where(['id' => $company_id])
						->execute();
		
		
		return $this->redirect(['action' => 'index/'.$company_id]);
	}
}
