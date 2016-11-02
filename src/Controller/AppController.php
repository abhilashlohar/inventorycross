<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
	 
	public function check_auth(){
		$session = $this->request->session();
		$controller = $this->request->params['controller'];
		$action = $this->request->params['action']; 
		$inventory_login_id = $session->read('inventory_login_id');
		$this->set(compact('$inventory_login_id'));
		if(empty($inventory_login_id)){
			return $this->redirect("/Users/login");
		}
		
		$this->set(compact('$blog_login_id'));
	}
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml']))
			{
            $this->set('_serialize', true);
			}
    }
	
	public function check_super_admin()
	{
		$session = $this->request->session();
		$inventory_login_id = $session->read('inventory_login_id');
		$this->loadModel('Users');
		$user = $this->Users->get($inventory_login_id);
		$this->set('user_role',$user->role);
		if($user->role=='super_admin'){
		
		}
		else
		{
			return $this->redirect("/Users/login");
		}
	}
	
	function beforeFilter(Event $event)
	{
		$session = $this->request->session();
		$inventory_login_id = $session->read('inventory_login_id');
		if(!empty($inventory_login_id)){
			$this->loadModel('Users');
			$user = $this->Users->get($inventory_login_id);
			$this->set('user_role',$user->role);
			$this->set('company_id',$user->company_id);
			
			if($user->company_id){
				$this->loadModel('Companies');
				$company=$this->Companies->get($user->company_id);
				$this->set('name',$company->name);
				
			}
		}
	}
	
	public function check_approve()
	{
		$session = $this->request->session();
		$inventory_login_id = $session->read('inventory_login_id');
		$this->loadModel('Users');
		$user = $this->Users->get($inventory_login_id);
		
	 $company_id=$user->company_id; 
		
		$this->loadModel('Companies');
		$companies = $this->Companies->get($company_id);
		 $companies->status;  
		 $status=$companies->status;  
 
		if($status=='Approve'){
		
		}
		else
		{
			return $this->redirect("/Users/login");
		}
	}
}
