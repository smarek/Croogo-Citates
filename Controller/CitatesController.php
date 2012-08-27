<?php

class CitatesController extends CitatesAppController {

    public $components = array('Session', 'Paginator');
    public $helpers = array('Form', 'Layout');
    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Citate.id' => 'asc',
        ),
    );
    public $uses = array('Citate');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title_for_layout', __('Citates'));
    }

    public function admin_index() {
        $this->set('citates', $this->paginate('Citate'));
    }

    public function admin_edit($id = null) {
        if ($id == null) {
            $this->setFlash(__('Invalid Citate ID'));
            $this->redirect(array('action' => 'index', 'admin' => true, 'controller' => 'citates', 'plugin' => 'citates'));
        }
        if (!empty($this->request->data)) {
            $this->request->data['Citate']['id'] = $id;
            if ($this->Citate->save($this->request->data)) {
                $this->Session->setFlash(__('Citate has been saved.'));
                $this->redirect(array('action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash(__('Citate could not be saved. Please try again.'));
            }
        }
        $this->request->data = $this->Citate->read(null, $id);
    }

    public function admin_add() {
        $this->set('title_for_layout', __('Create Citate', true));
        if (!empty($this->data)) {
            $this->Citate->create();
            if ($this->Citate->save($this->data)) {
                $this->Session->setFlash(__('Citate has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index', 'admin' => 'true', 'controller' => 'citates', 'plugin' => 'citates'));
            } else {
                $this->Session->setFlash(__('Error saving citate', true), 'default', array('class' => 'error'));
            }
        }
    }

    public function admin_delete($id = null) {
        if ($id == null) {
            $this->setFlash(__('Invalid Citate ID'));
        } else {
            if ($this->Citate->delete($id)) {
                $this->Session->setFlash(__('Citate deleted successfully'));
            } else {
                $this->Session->setFlash(__('Error occured while deleting Citate'));
            }
        }
        $this->redirect(array('action' => 'index', 'admin' => true, 'controller' => 'citates', 'plugin' => 'citates'));
    }

}

?>
