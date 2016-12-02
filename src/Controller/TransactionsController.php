<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 */
class TransactionsController extends AppController
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
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
        $this->set('_serialize', ['transactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Customers', 'SalesOutlets', 'Staffs', 'Products']
        ]);

        $this->set('transaction', $transaction);
        $this->set('_serialize', ['transaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->data);
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Transactions->Customers->find('list', ['limit' => 200]);
        $salesOutlets = $this->Transactions->SalesOutlets->find('list', ['limit' => 200]);
        $staffs = $this->Transactions->Staffs->find('list', ['limit' => 200]);
        $products = $this->Transactions->Products->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'customers', 'salesOutlets', 'staffs', 'products'));
        $this->set('_serialize', ['transaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->loadModel('ProductsTransactions');
        $productstransactions = $this->ProductsTransactions->newEntity();

        $transaction = $this->Transactions->get($id, [
            'contain' => ['Products']
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->data);

            //add Products
            if(isset($this->request->data['theproduct_id'])){
                $productstransactions->transaction_id = $id;
                $productstransactions->product_id = $this->request->data['theproduct_id'];
                $productstransactions->quantity = $this->request->data['quantity'];
                $this->addProductsTransactions($productstransactions);
            //End
          }else{
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
            }
        }


        $customers = $this->Transactions->Customers->find('list', ['limit' => 200]);
        $salesOutlets = $this->Transactions->SalesOutlets->find('list', ['limit' => 200]);
        $staffs = $this->Transactions->Staffs->find('list', ['limit' => 200]);

        $condition = array('transaction_id =' . $id);
        $productsTransactions = $this->ProductsTransactions->find('all', array( 'conditions' => $condition));

        $productsToShow = $this->Transactions->Products->find('all');
        $products = $this->Transactions->Products->find('list', ['limit' => 200]);

        $this->set(compact('transaction', 'customers', 'salesOutlets', 'staffs', 'products', 'productsToShow', 'productstransactions'));
        $this->set('_serialize', ['transaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addProductsTransactions($productstransactions){
      if ($this->ProductsTransactions->save($productstransactions)) {
          $this->Flash->success(__('The product transaction has been saved.'));

          return $this->redirect(['action' => 'index']);
      } else {
          $this->Flash->error(__('The items order could not be saved. Please, try again.'));
      }
    }
}
