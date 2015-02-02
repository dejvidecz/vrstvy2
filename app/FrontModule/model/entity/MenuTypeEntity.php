<?php
namespace App\FrontModule\Model\Entity;


/**
 * Description of MenuTypeEntity
 *
 * @author Dejv
 */
class MenuTypeEntity {
    private $id;
    
    private $name;
    
    private $alias;
    
    private $description;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getAlias() {
        return $this->alias;
    }

    function getDescription() {
        return $this->description;
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

    function setDescription($description) {
        $this->description = $description;
    }


}
