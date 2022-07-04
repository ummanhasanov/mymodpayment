<?php

class MyModPaymentPaymentModuleFrontController extends ModuleFrontController {

    public $ssl = true;

    public function initContent() {

        // Disable left and right column
        $this->display_column_left = false;
        $this->display_column_right = false;

        // Call parent init content method
        parent::initContent();

        // Assign data to Smarty
        $this->context->smarty->assign(array(
            'nb_products' => $this->context->cart->nbProducts(),
            'cart_currency' => $this->context->cart->id_currency,
            'currencies' => $this->module->getCurrency((int) $this->context->cart->id_currency),
            'total_amount' => $this->context->cart->getOrderTotal(true, Cart::BOTH),
            'path' => $this->module->getPathUri(),
        ));

        // Set template
        $this->setTemplate('payment.tpl');
    }

}
