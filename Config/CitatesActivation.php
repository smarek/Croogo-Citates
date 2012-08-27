<?php

class CitatesActivation {

    var $uses = array('Session');

    /**
     * onActivate will be called if this returns true
     *
     * @param  object $controller Controller
     * @return boolean
     */
    public function beforeActivation(&$controller) {
        return true;
    }

    /**
     * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
     *
     * @param object $controller Controller
     * @return void
     */
    public function onActivation(&$controller) {
        // ACL: set ACOs with permissions
        $controller->Croogo->addAco('Citates');
        $controller->Croogo->addAco('Citates/admin_index');
        $controller->Croogo->addAco('Citates/admin_add');			
        $controller->Croogo->addAco('Citates/admin_edit');								
        // Import the Schema into Database
        App::uses('File', 'Utility');
        App::import('Model', 'CakeSchema', false);
        App::import('Model', 'ConnectionManager');
        $db = ConnectionManager::getDataSource('default');

        if (!$db->isConnected()) {
            $this->Session->setFlash(__('Could not connect to database.'), 'default', array('class' => 'error'));
        } else {
            CakePlugin::load('Citates'); //is there a better way to do this?
            $schema = & new CakeSchema(array('name' => 'citates', 'plugin' => 'Citates'));
            $schema = $schema->load();

            foreach ($schema->tables as $table => $fields) {
                $create = $db->createSchema($schema, $table);
                $db->execute($create);
            }
        }
    }

    /**
     * onDeactivate will be called if this returns true
     *
     * @param  object $controller Controller
     * @return boolean
     */
    public function beforeDeactivation(&$controller) {
        return true;
    }

    /**
     * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
     *
     * @param object $controller Controller
     * @return void
     */
    public function onDeactivation(&$controller) {
        // ACL: remove ACOs with permissions
        $controller->Croogo->removeAco('Citates');
        
        // Remove the tables from Database
        App::uses('File', 'Utility');
        App::import('Model', 'CakeSchema', false);
        App::import('Model', 'ConnectionManager');
        $db = ConnectionManager::getDataSource('default');

        if (!$db->isConnected()) {
            $this->Session->setFlash(__('Could not connect to database.'), 'default', array('class' => 'error'));
        } else {
            CakePlugin::load('Route'); //is there a better way to do this?
            $schema = & new CakeSchema(array('name' => 'citates', 'plugin' => 'Citates'));
            $schema = $schema->load();

            foreach ($schema->tables as $table => $fields) {
                $drop = $db->dropSchema($schema, $table);
                $db->execute($drop);
            }
        }
    }

}

?>
