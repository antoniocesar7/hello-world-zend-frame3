<?php

namespace AnCategoria\Controller;

use AnCategoria\Form\AnCategoriaForm;
use AnCategoria\Model\AnCategoria;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\View\Model\ViewModel;


class AnCategoriaController extends AbstractActionController{
    private $table;

    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction(){
        return new ViewModel(['anCategorias' => $this->table->getAll()]);

    }

    public function adicionarAction(){

        $form = new AnCategoriaForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return new ViewModel(['form' => $form]);
        }
        
        $anCategoria = new AnCategoria();
        $form->setData($request->getPost());
        if(!$form->isValid()){
            return new ViewModel(['form' => $form]);
        }

        $anCategoria->exchangeArray($form->getData());
        $this->table->salvarAnCategoria($anCategoria);

        return $this->redirect()->toRoute('an-categoria');

    }
}