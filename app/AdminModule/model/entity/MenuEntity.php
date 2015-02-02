<?php

namespace App\AdminModule\Model\Entity;

/**
 * Description of MenuEntity
 *
 * @author Dejv
 */
class MenuEntity {

    private $id;
    private $name;
    private $alias;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getAlias() {
        return $this->alias;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

}
