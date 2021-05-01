<?php

namespace AnClassificacao\Form;

use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class AnClassificacaoForm extends Form{
    public function __construct(){
        
        parent::__construct('an_classificacao',[]);

        $this->add(new Hidden('id'));
        $this->add(new Text("descricao",['label' => "Descrição"]));
        $this->add(new Text("codido",['label' => "Código"]));

        $submit = new Submit('submit');
        $submit->setAttributes([
            'value' => 'salvar',
            'id' => 'submitButton'
        ]);

        $this->add($submit);
    }
}