<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Weights Controller
 *
 * @property \App\Model\Table\WeightsTable $Weights
 *
 * @method \App\Model\Entity\Weight[] paginate($object = null, array $settings = [])
 */
class WeightsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['Units']
        ];
        $weights = $this->paginate($this->Weights);

        $this->set(compact('weights'));
        $this->set('_serialize', ['weights']);
    }

    /**
     * View method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
			$this->viewBuilder()->layout('index_layout');
        $weight = $this->Weights->get($id, [
            'contain' => ['Units']
        ]);

        $this->set('weight', $weight);
        $this->set('_serialize', ['weight']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
			$this->viewBuilder()->layout('index_layout');
        $weight = $this->Weights->newEntity();
        if ($this->request->is('post')) {
            $weight = $this->Weights->patchEntity($weight, $this->request->getData());
            if ($this->Weights->save($weight)) {
                $this->Flash->success(__('The weight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weight could not be saved. Please, try again.'));
        }
        $units = $this->Weights->Units->find('list', ['limit' => 200]);
        $this->set(compact('weight', 'units'));
        $this->set('_serialize', ['weight']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
			$this->viewBuilder()->layout('index_layout');
        $weight = $this->Weights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weight = $this->Weights->patchEntity($weight, $this->request->getData());
            if ($this->Weights->save($weight)) {
                $this->Flash->success(__('The weight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weight could not be saved. Please, try again.'));
        }
        $units = $this->Weights->Units->find('list', ['limit' => 200]);
        $this->set(compact('weight', 'units'));
        $this->set('_serialize', ['weight']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Weight id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weight = $this->Weights->get($id);
        if ($this->Weights->delete($weight)) {
            $this->Flash->success(__('The weight has been deleted.'));
        } else {
            $this->Flash->error(__('The weight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
