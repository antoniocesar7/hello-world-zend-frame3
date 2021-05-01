<?php

namespace AdCliente\Controller;

use AdCliente\Form\AdClienteForm;
use AdCliente\Model\AdCliente;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\View\Model\ViewModel;

class AdClienteController extends AbstractActionController{
    private $table;
    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction(){

        return new ViewModel(['adClientes' => $this->table->getAll()]);

    }

    public function adicionarAction(){

        $form = new AdClienteForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return new ViewModel(['form' => $form]);
        }

        $adCliente = new AdCliente();
        $form->getData($request->getPost());
        if(!$form->isValid()){
            return new ViewModel(['form' => $form]);
        }

        $adCliente->exchangeArray($form->getData());
        $this->salvarAdCliente($adCliente);

        return $this->redirect()->toRoute('ad-cliente');

    }


}