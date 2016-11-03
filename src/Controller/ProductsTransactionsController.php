<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsTransactions Controller
 *
 * @property \App\Model\Table\ProductsTransactionsTable $ProductsTransactions
 */
class ProductsTransactionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Transactions']
        ];
        $productsTransactions = $this->paginate($this->ProductsTransactions);

        $this->set(compact('productsTransactions'));
        $this->set('_serialize', ['productsTransactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Products Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsTransaction = $this->ProductsTransactions->get($id, [
            'contain' => ['Products', 'Transactions']
        ]);

        $this->set('productsTransaction', $productsTransaction);
        $this->set('_serialize', ['productsTransaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsTransaction = $this->ProductsTransactions->newEntity();
        if ($this->request->is('post')) {
            $productsTransaction = $this->ProductsTransactions->patchEntity($productsTransaction, $this->request->data);
            if ($this->ProductsTransactions->save($productsTransaction)) {
                $this->Flash->success(__('The products transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The products transaction could not be saved. Please, try again.'));
            }
        }
        $products = $this->ProductsTransactions->Products->find('list', ['limit' => 200]);
        $transactions = $this->ProductsTransactions->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('productsTransaction', 'products', 'transactions'));
        $this->set('_serialize', ['productsTransaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Transaction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsTransaction = $this->ProductsTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsTransaction = $this->ProductsTransactions->patchEntity($productsTransaction, $this->request->data);
            if ($this->ProductsTransactions->save($productsTransaction)) {
                $this->Flash->success(__('The products transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The products transaction could not be saved. Please, try again.'));
            }
        }
        $products = $this->ProductsTransactions->Products->find('list', ['limit' => 200]);
        $transactions = $this->ProductsTransactions->Transactions->find('list', ['limit' => 200]);
        $this->set(compact('productsTransaction', 'products', 'transactions'));
        $this->set('_serialize', ['productsTransaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Transaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsTransaction = $this->ProductsTransactions->get($id);
        if ($this->ProductsTransactions->delete($productsTransaction)) {
            $this->Flash->success(__('The products transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The products transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
