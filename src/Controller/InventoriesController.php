<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventories Controller
 *
 * @property \App\Model\Table\InventoriesTable $Inventories
 */
class InventoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$this->check_auth();
		$this->check_approve();
		//$this->check_super_admin();
		$this->viewBuilder()->layout('after_login');
        $this->paginate = [
            'contain' => ['Users','InventoryTypes','Locations']
        ];
		$session = $this->request->session();
		$inventory_login_id = $session->read('inventory_login_id');
		$company_id=$this->viewVars['company_id'];
		//echo $company_id; exit;
        $inventories = $this->paginate($this->Inventories->find()->where(['Inventories.company_id'=>$company_id]));

        $this->set(compact('inventories'));
        $this->set('_serialize', ['inventories']);
		
		$locations = $this->Inventories->Locations->find();
		$this->set(compact('locations'));
		$this->set('_serialize', 'locations');
		
		$inventorytypes = $this->Inventories->InventoryTypes->find();
		$this->set(compact('inventorytypes'));
		$this->set('_serialize', 'inventorytypes');
    }

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->check_auth();
		$this->viewBuilder()->layout('after_login');
        $inventory = $this->Inventories->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('inventory', $inventory);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->check_auth();
		$this->check_approve();
		//$this->check_super_admin();
		$this->viewBuilder()->layout('after_login');
        $inventory = $this->Inventories->newEntity();

        if ($this->request->is('post')) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->data);
			$session = $this->request->session();
			$inventory_login_id = $session->read('inventory_login_id');
			$inventory->user_id=$inventory_login_id;
			//pr($inventory); exit;
			 $inventory->company_id=$this->viewVars['company_id'];
			$inventory->id= $inventory->inventory_type_id; 
		
			
            //pr($inventory); exit;
			if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
			else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
		$locations = $this->Inventories->Locations->find('list')->where(['Locations.company_id'=>$this->viewVars['company_id']]);;
		$inventorytypes = $this->Inventories->InventoryTypes->find('list');
		
        $users = $this->Inventories->Users->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'users','locations','inventorytypes'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->check_auth();
		$this->viewBuilder()->layout('after_login');
		$inventory = $this->Inventories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->data);
            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
		
		$locations = $this->Inventories->Locations->find('list');
		$inventorytypes = $this->Inventories->InventoryTypes->find('list');
		
        $users = $this->Inventories->Users->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'users','locations','inventorytypes'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
	
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventories->get($id);
        if ($this->Inventories->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	    public function InventoryForVisitor()
    {
		$this->viewBuilder()->layout('visitors');
        
       $this->paginate = [
            'contain' => []
        ];
		$session = $this->request->session();
		$inventory_login_id = $session->read('inventory_login_id');
        $inventories = $this->paginate($this->Inventories);
        $this->set(compact('inventories'));
        $this->set('_serialize', ['inventory']);
    }
}
