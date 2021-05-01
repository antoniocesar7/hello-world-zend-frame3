<?php

namespace AnClassificacao\Controller;

use AnClassificacao\Form\AnClassificacaoForm;
use AnClassificacao\Model\AnClassificacao;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\View\Model\ViewModel;
use AnClassificacao\Model\AnClassificacaoTable;


class AnClassificacaoController extends AbstractActionController{
    private $table;

    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction(){
        return new ViewModel(['anClassificacaos' => $this->table->getAll()]);
    }

    public function adicionarAction(){
        
        $form = new AnClassificacaoForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return new ViewModel(['form' => $form]);
        }

        $anClassificacao = new AnClassificacao();
        $form->getData($request->getPost());
        if(!$form->isValid()){
            return new ViewModel(['form' => $form]);
        }

        $anClassificacao->exchangeArray($form->getData());
        $this->table->salvarAnClassificacao($anClassificacao);
        
        return $this->redirect()->toRoute('an-classificacao');
    }
}