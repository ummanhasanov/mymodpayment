<?php

class MyModPayment extends PaymentModule {

    public function __construct() {
        $this->name = 'mymodpayment';
        $this->tab = 'payments_gateways';
        $this->version = '0.1';
        $this->author = 'Umman Hasanov';
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('MyMod payment');
        $this->description = $this->l('A simple payment module');
    }

    public function install() {
        if (!parent::install() ||
                !$this->registerHook('displayPayment') ||
                !$this->registerHook('displayPaymentReturn')) {
            return false;
        }
        return true;
    }

    public function getHookController($hook_name) {
        // Include the controller file
        require_once (dirname(__FILE__) . '/controllers/hook/' . $hook_name . '.php');

        // Build dynamically the controller name
        $controller_name = $this->name . $hook_name . 'Controller';

        // Instantiate controller
        $controller = new $controller_name($this, __FILE__, $this->_path);

        return $controller;
    }

    public function hookDisplayPayment($params) {
        $controller = $this->getHookController('displayPayment');
        return $controller->run($params);
    }

   

}
