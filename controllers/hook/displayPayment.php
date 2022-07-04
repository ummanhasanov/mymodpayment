<?php

class MyModPaymentDisplayPaymentController {

    public function __construct($module, $file, $path) {
        $this->file = $file;
        $this->module = $module;
        $this->context = Context::getContext();
        $this->_path = $path;
    }

    public function run($params) {
        
        
        $this->context->controller->addCSS($this->_path . 'views/css/mymodpayment.css', 'all');
        return $this->module->display($this->file, 'displayPayment.tpl');
    }

}
