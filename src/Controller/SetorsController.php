<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Setors Controller
 *
 * @property \App\Model\Table\SetorsTable $Setors
 *
 * @method \App\Model\Entity\Setor[] paginate($object = null, array $settings = [])
 */
class SetorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $setors = $this->paginate($this->Setors);

        $this->set(compact('setors'));
        $this->set('_serialize', ['setors']);
    }

    /**
     * View method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $setor = $this->Setors->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('setor', $setor);
        $this->set('_serialize', ['setor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $setor = $this->Setors->newEntity();
        if ($this->request->is('post')) {
            $setor = $this->Setors->patchEntity($setor, $this->request->getData());
            if ($this->Setors->save($setor)) {
                $this->Flash->success(__('The setor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setor could not be saved. Please, try again.'));
        }
        $this->set(compact('setor'));
        $this->set('_serialize', ['setor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setor = $this->Setors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $setor = $this->Setors->patchEntity($setor, $this->request->getData());
            if ($this->Setors->save($setor)) {
                $this->Flash->success(__('The setor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setor could not be saved. Please, try again.'));
        }
        $this->set(compact('setor'));
        $this->set('_serialize', ['setor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setor = $this->Setors->get($id);
        if ($this->Setors->delete($setor)) {
            $this->Flash->success(__('The setor has been deleted.'));
        } else {
            $this->Flash->error(__('The setor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
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
