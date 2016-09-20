<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SalesTransactions Controller
 *
 * @property \App\Model\Table\SalesTransactionsTable $SalesTransactions
 */
class SalesTransactionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'SalesOutlets', 'Staffs']
        ];
        $salesTransactions = $this->paginate($this->SalesTransactions);

        $this->set(compact('salesTransactions'));
        $this->set('_serialize', ['salesTransactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Sales Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salesTransaction = $this->SalesTransactions->get($id, [
            'contain' => ['Customers', 'SalesOutlets', 'Staffs', 'ProductsTransactions']
        ]);

        $this->set('salesTransaction', $salesTransaction);
        $this->set('_serialize', ['salesTransaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salesTransaction = $this->SalesTransactions->newEntity();
        if ($this->request->is('post')) {
            $salesTransaction = $this->SalesTransactions->patchEntity($salesTransaction, $this->request->data);
            if ($this->SalesTransactions->save($salesTransaction)) {
                $this->Flash->success(__('The sales transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sales transaction could not be saved. Please, try again.'));
            }
        }
        $customers = $this->SalesTransactions->Customers->find('list', ['limit' => 200]);
        $salesOutlets = $this->SalesTransactions->SalesOutlets->find('list', ['limit' => 200]);
        $staffs = $this->SalesTransactions->Staffs->find('list', ['limit' => 200]);
        $this->set(compact('salesTransaction', 'customers', 'salesOutlets', 'staffs'));
        $this->set('_serialize', ['salesTransaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sales Transaction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salesTransaction = $this->SalesTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salesTransaction = $this->SalesTransactions->patchEntity($salesTransaction, $this->request->data);
            if ($this->SalesTransactions->save($salesTransaction)) {
                $this->Flash->success(__('The sales transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sales transaction could not be saved. Please, try again.'));
            }
        }
        $customers = $this->SalesTransactions->Customers->find('list', ['limit' => 200]);
        $salesOutlets = $this->SalesTransactions->SalesOutlets->find('list', ['limit' => 200]);
        $staffs = $this->SalesTransactions->Staffs->find('list', ['limit' => 200]);
        $this->set(compact('salesTransaction', 'customers', 'salesOutlets', 'staffs'));
        $this->set('_serialize', ['salesTransaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sales Transaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salesTransaction = $this->SalesTransactions->get($id);
        if ($this->SalesTransactions->delete($salesTransaction)) {
            $this->Flash->success(__('The sales transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The sales transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
