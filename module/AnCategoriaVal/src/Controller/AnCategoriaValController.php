<?php

namespace AnCategoriaVal\Controller;

use AnCategoriaVal\Form\AnCategoriaValForm;
use AnCategoriaVal\Model\AnCategoriaVal;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\View\Model\ViewModel;


class AnCategoriaValController extends AbstractActionController{
    private $table;

    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction(){
        return new ViewModel(['anCategoriaVals' => $this->table->getAll()]);
    }

    public function adicionarAction(){

        $form = new AnCategoriaValForm();
        $form->get('submit')->setValue('Adcionar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return new ViewModel(['form' => $form]);
        }

        $anCategoriaVal = new AnCategoriaVal();
        $form->getData($request->getPost());
        if(!$form->isValid()){
            
            return new ViewModel(['form' => $form]);
        }

        $anCategoriaVal->exchangeArray($form->getData());
        $this->table->salvarAnCategoriaVal($anCategoriaVal);

        return $this->redirect()->toRoute('an-categoria-val');
    }
}