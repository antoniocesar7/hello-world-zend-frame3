<?php

namespace Produto\Form;

use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ProdutoForm extends Form{
    public function __construct() {
        
        parent::__construct('produto',[]);

        $this->add(new Hidden("id"));
        $this->add(new Text("nome",['label' => "Nome"]));
        $this->add(new Text("tipo",['label' => "Tipo"]));
        $this->add(new Text("situacao",['label' => "Situação"]));
        
        $submit = new Submit('submit');
        $submit->setAttributes([
            'value' => 'Salvar',
             'id' => 'submitButton'
             ]);
        $this->add($submit);
    }
}