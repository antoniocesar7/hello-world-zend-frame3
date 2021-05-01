<?php

namespace AnCategoria\Form;

use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class AnCategoriaForm extends Form{

    public function __construct(){

        parent::__construct('an_categoria',[]);

        $this->add(new Hidden('id'));
        $this->add(new Text("descricao",['label' => "Descrição"]));
        $this->add(new Text("codigo",['label' => "Código"]));
        $this->add(new Text("chave",['label' => "Chave"]));

        $submit = new Submit('submit');
        $submit->setAttributes([
            'value' => 'Salvar',
            'id' => 'submitButton'
        ]);

        $this->add($submit);

    }
}