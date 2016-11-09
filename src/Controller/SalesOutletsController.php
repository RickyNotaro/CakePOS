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
            'contain' => ['Transactions']
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
      $response = ['result' => 'fail'];
      $errors = $this->SalesOutlets->validator()->errors($this->request->data);
      if (empty($errors)) {
          $salesOutlet = $this->SalesOutlets->newEntity($this->request->data);
          if ($this->SalesOutlets->save($salesOutlet)) {
              $response = ['result' => 'success'];
          }
      } else {
          $response['error'] = $errors;
      }
      $this->set(compact('response'));
      $this->set('_serialize', ['response']);
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
      $response = ['result' => 'fail'];
        $errors = $this->SalesOutlets->validator()->errors($this->request->data);
        if (empty($errors)) {
            $salesOutlet = $this->SalesOutlets->newEntity($this->request->data);
            $salesOutlet->id = $this->request->data['id'];
            if ($this->SalesOutlets->save($salesOutlet)) {
                $response = ['result' => 'success'];
            }
        } else {
            $response['error'] = $errors;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

        /**
     * gets either done or incomplete to-do's depending on the status
     *
     * @param int $status 0/1 incomplete/complete
     * @return void
     */
    public function get($status = 0) {
        $salesOutlet = $this->SalesOutlets->find('all');
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

        $response = ['result' => 'fail'];
        $errors = $this->SalesOutlets->validator()->errors($this->request->data);
        if (empty($errors)) {
            $salesOutlet = $this->SalesOutlets->newEntity($this->request->data);
            $id = $this->request->data['id'];
            $salesOutlet = $this->SalesOutlets->get($id);
            if ($this->SalesOutlets->delete($salesOutlet)) {
                $response = ['result' => 'success'];
            }
        } else {
            $response['error'] = $errors;
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);


    }
}
