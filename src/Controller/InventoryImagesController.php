<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InventoryImages Controller
 *
 * @property \App\Model\Table\InventoryImagesTable $InventoryImages
 */
class InventoryImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$this->viewBuilder()->layout('after_login');
        $this->paginate = [
            'contain' => ['Inventories']
        ];
        $inventoryImages = $this->paginate($this->InventoryImages);

        $this->set(compact('inventoryImages'));
        $this->set('_serialize', ['inventoryImages']);
    }

    /**
     * View method
     *
     * @param string|null $id Inventory Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventoryImage = $this->InventoryImages->get($id, [
            'contain' => ['Inventories']
        ]);

        $this->set('inventoryImage', $inventoryImage);
        $this->set('_serialize', ['inventoryImage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
		$this->viewBuilder()->layout('after_login');
        $inventoryImage = $this->InventoryImages->newEntity();
        if ($this->request->is('post')) {
            $inventoryImage = $this->InventoryImages->patchEntity($inventoryImage, $this->request->data);
			$file = $this->request->data['image_name'];
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
			$arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
			$setNewFileName = uniqid();
			
			$inventoryImage->image_name=$setNewFileName. '.' . $ext;
			if (in_array($ext, $arr_ext)) {
				move_uploaded_file($file['tmp_name'], WWW_ROOT . '/inventoryimages/' . $setNewFileName . '.' . $ext);
			}
			
			$inventoryImage->inventory_id=$id;
            if ($this->InventoryImages->save($inventoryImage)) {
                $this->Flash->success(__('The inventory image has been saved.'));
				$inventoryimg = $this->InventoryImages->find()->where(['inventory_id'=>$id]);
				$number=$inventoryimg->count();
				if($number==1){
					$inventoryImage->default_image='yes';
					$inventoryImage->id=$inventoryImage->id;
					$this->InventoryImages->save($inventoryImage);
				}
                return $this->redirect(['action' => 'add/'.$id]);
            } else {
                $this->Flash->error(__('The inventory image could not be saved. Please, try again.'));
            }
        }
        $inventories = $this->InventoryImages->Inventories->find('list', ['limit' => 200]);
        $this->set(compact('inventoryImage', 'inventories'));
        $this->set('_serialize', ['inventoryImage']);
		
		 $this->paginate = [
            'contain' => ['Inventories']
        ];
        $inventoryImages = $this->paginate($this->InventoryImages->find()->where(['inventory_id'=>$id]));

        $this->set(compact('inventoryImages','id'));
        $this->set('_serialize', ['inventoryImages']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory Image id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventoryImage = $this->InventoryImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventoryImage = $this->InventoryImages->patchEntity($inventoryImage, $this->request->data);
            if ($this->InventoryImages->save($inventoryImage)) {
                $this->Flash->success(__('The inventory image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory image could not be saved. Please, try again.'));
            }
        }
        $inventories = $this->InventoryImages->Inventories->find('list', ['limit' => 200]);
        $this->set(compact('inventoryImage', 'inventories'));
        $this->set('_serialize', ['inventoryImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
		$inventory_id=$this->request->query('inventory_id');
		$image_id=$this->request->query('image_id');
        $this->request->allowMethod(['post', 'delete']);
        $inventoryImage = $this->InventoryImages->get($image_id);
		

		unlink(WWW_ROOT . '/inventoryimages/' . $inventoryImage->image_name);
		if ($this->InventoryImages->delete($inventoryImage)) {
			$inventoryimg = $this->InventoryImages->find()->where(['inventory_id'=>$inventory_id,'default_image'=>'yes']);
			$number=$inventoryimg->count();
			if($number==0){
				$inventoryImage = $this->InventoryImages->find()->where(['inventory_id'=>$inventory_id])->first();
				if($inventoryImage){
					$inventoryImage->default_image='yes';
					$this->InventoryImages->save($inventoryImage);
				}
			}
            $this->Flash->success(__('The inventory image has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'add/'.$inventory_id]);
    }
	
	public function makedefault()
	{
		$inventory_id=$this->request->query('inventory_id');
		$image_id=$this->request->query('image_id');
		
		$query = $this->InventoryImages->query();
					$query->update()
						->set(['default_image' => 'no'])
						->where(['inventory_id' => $inventory_id])
						->execute();
		$query = $this->InventoryImages->query();
					$query->update()
						->set(['default_image' => 'yes'])
						->where(['id' => $image_id])
						->execute();
		
		return $this->redirect(['action' => 'add/'.$inventory_id]);
	}
}
