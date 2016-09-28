<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Error\Debugger;
use Cake\Core\App;


/**
 * Staffs Controller
 *
 * @property \App\Model\Table\StaffsTable $Staffs */
class StaffsController extends AppController
{

  public function initialize()
  {
      parent::initialize();
    $this->Auth->allow(['display', 'logout']);
  }

  public function isAuthorized($user)
{
    $action = $this->request->params['action'];
    // Add et index sont toujours permises.

    if (in_array($action, ['index'])) {
        return true;
    }

        if (isset($this->request->params['pass'][0])) {
    // Vérifie que le bookmark appartient à l'utilisateur courant.
    $id = $this->request->params['pass'][0];
    $staff = $this->Staffs->get($id);
    $currentUserId = $this->Auth->user('id');


    if ($currentUserId == $user['id']) {
        return true;
    }

    }

    return parent::isAuthorized($user);
}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $staffs = $this->paginate($this->Staffs);

        $this->set(compact('staffs'));
        $this->set('_serialize', ['staffs']);
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => ['SalesTransactions']
        ]);

        $this->set('staff', $staff);
        $this->set('_serialize', ['staff']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staffs->newEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->data);
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The staff could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('staff'));
        $this->set('_serialize', ['staff']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staffs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staffs->patchEntity($staff, $this->request->data);
            if ($this->Staffs->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The staff could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('staff'));
        $this->set('_serialize', ['staff']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staffs->get($id);
        if ($this->Staffs->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
{
if ($this->request->is('post')) {
    $staff = $this->Auth->identify();
    if ($staff) {
        $this->Auth->setUser($staff);
        return $this->redirect($this->Auth->redirectUrl());
    }
    $this->Flash->error('Your username or password in invalid.');
    }
}

public function logout()
{
    $this->Flash->success('You are now disconnected.');
    return $this->redirect($this->Auth->logout());
}
}
