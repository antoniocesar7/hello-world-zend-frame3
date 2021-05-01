<?php

namespace AdPlano\Controller;

use AdPlano\Form\AdPlanoForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\View\Model\ViewModel;

class AdPlanoController extends AbstractActionController{
    private $table;

    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction(){
        return new ViewModel();
    }
}