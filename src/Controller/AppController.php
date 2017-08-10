<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
	
    public function initialize()
    {
        parent::initialize();

		
		$this->viewBuilder()->theme('TwitterBootstrap');
		$this->viewBuilder()->layout('adminlte');
		$this->set('Projeto 1', 'Titulo');
		
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
			'authorize' => ['Controller'], // Added this line
            
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'index',
                'home'
            ]
			
        ]);
		
		$this->loadComponent('Auth');
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        
    }
	
	public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login']);
		//$this->Auth->allow('login');


		//for example, you want to read messages
	    //import the Model
	    /*
	    $this->loadModel('User');
	    $all_users = $this->Users->find('all'); //or whatever you need to do to get the data
	    $this->set('all_users', $all_users); 
	    */
	    $user_id = $this->Auth->user('id');	    
	    
	    if (!empty($user_id))
		{
			$user_name = $this->Auth->user('name');	    
		    $setor_id = $this->Auth->user('setor_id');
			$this->set('user_name', $user_name);

		    $user_sector = $this->loadModel('Setors')->get($setor_id);
		    $setor_name = $user_sector['setor_name']; 
			$this->set('setor_name', $setor_name);
		}

    }
	
	/*public function beforeFilter(Event $event)
	{
		$user = $this->Auth->user();
		$prefix = null;
		//debug(!$authUser);
		if ($user['setor_id'] ==1)
			throw new ForbiddenException('Não permitido');
			
		}
		 
		
	}
	*/
	
	public function isAuthorized($user)
	{
		// Admin can access every action
		//debug($user['setor_id']);
		/*
		if (isset($user['setor_id']) && $user['setor_id'] === 1) {
			return true;
		}

		// Default deny
		return false;
		*/
		return true;
	}
}
