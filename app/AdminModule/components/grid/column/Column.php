<?php

namespace App\AdminModule\Components\Grid\Column;

/**
 * Description of Column
 *
 * @author Dejv
 */
class Column extends \Nette\Object {

    protected $name;
    protected $label;
    protected $type = 'normal';

    public function getOutput($array){
        return $array[$this->name];
    }
    
    function getType() {
        return $this->type;
    }

    function __construct($name, $label) {
        $this->name = $name;
        $this->label = $label;
    }

    function getName() {
        return $this->name;
    }

    function getLabel() {
        return $this->label;
    }

}
