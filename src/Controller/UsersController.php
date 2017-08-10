<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class UsersController extends AppController
{
	
	public function login()
	{

		$this->viewBuilder()->layout('login');
		//debug($this->request->data);
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Usuário ou senha ínvalido, tente novamente'));
		}
	}
	
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Setors']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Setors']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $setors = $this->Users->Setors->find('list', ['limit' => 200]);
        $this->set(compact('user', 'setors'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $setors = $this->Users->Setors->find('list', ['limit' => 200]);
        $this->set(compact('user', 'setors'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['logout']); 
		// Permitindo que os usuários se registrem
	}
	
	/*
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		// Permitir aos usuários se registrarem e efetuar logout.
		// Você não deve adicionar a ação de "login" a lista de permissões.
		// Isto pode causar problemas com o funcionamento normal do AuthComponent.
		$this->Auth->allow(['add', 'logout']);
	}
	*/
	
	public function isAuthorized($user)
	{
		//debug($user['setor_id']);
		/*
		// All registered users can add articles
		if ($this->request->getParam('action') === 'add') {
			return true;
		}
		*/
		// The owner of an article can edit and delete it
		if (in_array($this->request->getParam('action'), ['edit', 'delete', 'add'])) {
			//$articleId = (int)$this->request->getParam('pass.0');
			if ($user['setor_id'] == 1) {
				return true;
			}
			return false;
		}

		return parent::isAuthorized($user);
	}
}

