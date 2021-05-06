<?php
 
namespace Addresses\Controller;

use Addresses\Form\AddressesForm;
use Addresses\Model\Addresses;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class AddressesController extends AbstractActionController{
     
    private $table;

    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction(){
        //return new ViewModel();
        return new ViewModel(['addresses' => $this->table->getAll()]);
        

    }

    public function adicionarAction(){

        $form = new AddressesForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return new ViewModel(['form' => $form]);
        }

        $addresses = new Addresses();
        $form->setData($request->getPost());
        if(!$form->isValid()){
            return new ViewModel(['form' => $form]);
        }

        $addresses->exchangeArray($form->getData());
        $this->table->salvarAddresses($addresses);

        return $this->redirect()->toRoute('addresses');

    }
 }