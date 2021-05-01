<?php

namespace Produto\Controller;

use Produto\Form\ProdutoForm;
use Produto\Model\Produto;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Produto\Model\ProdutoTable;


class ProdutoController extends AbstractActionController
{
    private $table;

    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel(['produtos' => $this->table->getAll()]);
        //return new ViewModel();
    }

    public function adicionarAction()
    {
        $form = new ProdutoForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();
        if(!$request->isPost()){
            return new ViewModel(['form' => $form]);
        }

        $produto = new Produto();
        $form->setData($request->getPost());
        if(!$form->isValid()){
            
            return new ViewModel(['form' => $form]);

        }

        $produto->exchangeArray($form->getData());
        $this->table->salvarProduto($produto);

        return $this->redirect()->toRoute('produto');
    }

    public function outroAction()
    {
        return new ViewModel();
    }

    public function salvarAction()
    {
        return new ViewModel();
    }

    public function editarAction()
    {
        return new ViewModel();
    }

    public function removerAction()
    {
        return new ViewModel();
    }

    public function confirmacaoAction()
    {
        return new ViewModel();
    }
}