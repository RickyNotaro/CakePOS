<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RefPaymentMethods Controller
 *
 * @property \App\Model\Table\RefPaymentMethodsTable $RefPaymentMethods
 */
class RefPaymentMethodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $refPaymentMethods = $this->paginate($this->RefPaymentMethods);

        $this->set(compact('refPaymentMethods'));
        $this->set('_serialize', ['refPaymentMethods']);
    }

    /**
     * View method
     *
     * @param string|null $id Ref Payment Method id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refPaymentMethod = $this->RefPaymentMethods->get($id, [
            'contain' => []
        ]);

        $this->set('refPaymentMethod', $refPaymentMethod);
        $this->set('_serialize', ['refPaymentMethod']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refPaymentMethod = $this->RefPaymentMethods->newEntity();
        if ($this->request->is('post')) {
            $refPaymentMethod = $this->RefPaymentMethods->patchEntity($refPaymentMethod, $this->request->data);
            if ($this->RefPaymentMethods->save($refPaymentMethod)) {
                $this->Flash->success(__('The ref payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ref payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('refPaymentMethod'));
        $this->set('_serialize', ['refPaymentMethod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Payment Method id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refPaymentMethod = $this->RefPaymentMethods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refPaymentMethod = $this->RefPaymentMethods->patchEntity($refPaymentMethod, $this->request->data);
            if ($this->RefPaymentMethods->save($refPaymentMethod)) {
                $this->Flash->success(__('The ref payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ref payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('refPaymentMethod'));
        $this->set('_serialize', ['refPaymentMethod']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Payment Method id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refPaymentMethod = $this->RefPaymentMethods->get($id);
        if ($this->RefPaymentMethods->delete($refPaymentMethod)) {
            $this->Flash->success(__('The ref payment method has been deleted.'));
        } else {
            $this->Flash->error(__('The ref payment method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
