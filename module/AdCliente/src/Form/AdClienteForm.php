<?php

namespace AdCliente\Form;

use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class AdClienteForm extends Form{
    public function __construct(){
        
        parent::__construct('ad_cliente',[]);

        $this->add(new Hidden('id'));
        $this->add(new Text("nome",['label' => "Nome"]));
        $this->add(new Text("apelido", ['label' => "Fantasia"]));

        $submit = new Submit('submit');
        $submit->setAttributes([
            'value' => 'Salvar',
            'id'=> 'submitButton'
        ]);

        $this->add($submit);
    }   
}