<?php

namespace App\AdminModule\Model\Entity;

/**
 * Description of RoleEntity
 *
 * @author Dejv
 */
class RoleEntity {
    private $id;
    
    private $name;
    
    private $display_name;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDisplay_name() {
        return $this->display_name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDisplay_name($display_name) {
        $this->display_name = $display_name;
    }


}
