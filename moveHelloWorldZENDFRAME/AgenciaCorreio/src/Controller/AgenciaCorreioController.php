<?php

namespace AgenciaCorreio\Controller;

use AgenciaCorreio\Form\AgenciaCorreioForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;
use Zend\View\Model\ViewModel;


class AgenciaCorreioController extends AbstractActionController{
    private $table;

    public function __construct($table){
        $this->table = $table;
    }

    public function indexAction(){
        return new ViewModel();
    }
}