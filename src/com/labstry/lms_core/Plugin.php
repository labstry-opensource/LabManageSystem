<?php


namespace com\labstry\lms_core;


class Plugin
{
    public $connection;
    protected $plugin_name = null;
    public $plugin_table_name = 'nightingale_plugin';
    public $data_table_name = 'nightingale_plugin_data';

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function registerPlugin($plugin_name, $namespace, $description){
        $this->setPluginName($plugin_name);

        //We aren't doing anything if the plugin is already registered in database.
        if($this->isPluginRegistered()) return false;

        //Check namespace if such namespace is available in file system. If not, we won't register the namespace
        $file_src_dir =  ROOT_DIR . '/src/' . str_replace('\\', DIRECTORY_SEPARATOR , $namespace) . '/';
        $namespace = (!empty($namespace) && file_exists($file_src_dir)) ? $file_src_dir : '';

        $this->connection->insert($this->plugin_table_name, [
            'plugin_name' => $plugin_name,
            'plugin_namespace' => $namespace,
            'activated' => 0,
            'description' => htmlspecialchars($description),
            'installed_date' => date('Y-m-d H:i:s'),
        ]);

        return true;
    }

    public function getRegisteredPlugins(){
        $this->connection->select($this->plugin_table_name, [
            ''
        ]);
    }

    public function activatePlugin($plugin_name){
        $this->setPluginName($plugin_name);

        //We can't activate a un-registered plugin. Please register it first.
        if(!$this->isPluginRegistered()) return false;

        $this->connection->update($this->plugin_table_name, [
            'activated' => 1,
        ], [
            'plugin_name[=]' => $plugin_name,
        ]);

        return true;
    }

    public function deactivatePlugin($plugin_name){
        $this->setPluginName($plugin_name);

    }

    public function getActivatedPlugins(){
        $this->connection->select($this->plugin_table_name, [
            'plugin_name', 'plugin_description', 'installed_date',
        ], [
            'activated[=]' => 1,
        ]);
    }

    public function setPluginName($name){
        //Set plugin name in this class
        $this->plugin_name = $name;
    }


    public function isPluginActivated(){
        //Check if the plugin is activated

        return $this->connection->count($this->plugin_table_name , '*', [
            'is_activated[=]' => 1,
            'plugin_name[=]' => $this->plugin_name,
        ]);
    }

    public function isPluginRegistered(){
        //Check if the plugin is registered in DB
        return $this->connection->count($this->plugin_table_name, '*', [
            'plugin_name[=]' => $this->plugin_name,
        ]);
    }

    protected function hasData($meta_key){
        $this->connection->count($this->data_table_name, '*', [
            'meta_key[=]' => $meta_key,
            'id[=]' => $this->connection->get($this->plugin_table_name , 'id' , [
                'plugin_name[=]' => $this->plugin_name,
            ]),
        ]);
    }

    public function getData($meta_key){
        //Get data from plugin data table

        if(!$this->isPluginActivated())
            return array();

        $this->connection->get($this->data_table_name, '*', [
            'meta_key[=]' => $meta_key,
            'id[=]' => $this->connection->get($this->plugin_table_name , 'id' , [
                'plugin_name[=]' => $this->plugin_name,
            ]),
        ]);
    }

    public function editData($meta_key, $data){
        //Edit data. If the data isn't available, the function will create
        if(!$this->isPluginActivated())
            return false;

        $this->connection->update($this->data_table_name, [
            'data' => $data,
        ], [
            'meta_key[=]' => $meta_key,
            'plugin_name[=]' => $this->plugin_name,
        ]);
        return true;

    }
}