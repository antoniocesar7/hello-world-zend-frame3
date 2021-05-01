<?php 

namespace Addresses\Form;

use Zend\Form\Element\Hidden;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class AddressesForm extends Form{

    public function __construct(){

        parent::__construct('addresses',[]);

        $this->add(new Hidden('id'));

        $this->add(new Text("address",[
            'label' => "Endereço" 
            ])
        );

        $this->add(new Text("number",[
            'label' => 'Número'
            ])
        );

        $this->add(new Text("neighborhood",[
            'label' => 'Bairro'
            ])
        );

        $this->add(new Text("cep",[
            'label' => 'CEP'
            ])
        );

        $submit = new Submit('submit');

        $submit->setAttributes([
            'value' => 'Salvar',
            'id'    => 'buttonSalvar'
        ]);

        $this->add($submit);
        
    }

}


