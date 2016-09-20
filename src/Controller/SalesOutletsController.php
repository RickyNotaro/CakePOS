<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SalesOutlets Controller
 *
 * @property \App\Model\Table\SalesOutletsTable $SalesOutlets
 */
class SalesOutletsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $salesOutlets = $this->paginate($this->SalesOutlets);

        $this->set(compact('salesOutlets'));
        $this->set('_serialize', ['salesOutlets']);
    }

    /**
     * View method
     *
     * @param string|null $id Sales Outlet id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salesOutlet = $this->SalesOutlets->get($id, [
            'contain' => ['SalesTransactions']
        ]);

        $this->set('salesOutlet', $salesOutlet);
        $this->set('_serialize', ['salesOutlet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salesOutlet = $this->SalesOutlets->newEntity();
        if ($this->request->is('post')) {
            $salesOutlet = $this->SalesOutlets->patchEntity($salesOutlet, $this->request->data);
            if ($this->SalesOutlets->save($salesOutlet)) {
                $this->Flash->success(__('The sales outlet has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sales outlet could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('salesOutlet'));
        $this->set('_serialize', ['salesOutlet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sales Outlet id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salesOutlet = $this->SalesOutlets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salesOutlet = $this->SalesOutlets->patchEntity($salesOutlet, $this->request->data);
            if ($this->SalesOutlets->save($salesOutlet)) {
                $this->Flash->success(__('The sales outlet has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sales outlet could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('salesOutlet'));
        $this->set('_serialize', ['salesOutlet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sales Outlet id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salesOutlet = $this->SalesOutlets->get($id);
        if ($this->SalesOutlets->delete($salesOutlet)) {
            $this->Flash->success(__('The sales outlet has been deleted.'));
        } else {
            $this->Flash->error(__('The sales outlet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
