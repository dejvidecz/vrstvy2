<?php

namespace App\AdminModule\Model\Entity;

/**
 * Description of MenuItemEntity
 *
 * @author Dejv
 */
class MenuItemEntity {

    /**
     *
     * @var int
     */
    private $id;

    /**
     *
     * @var string
     */
    private $name;

    /**
     *
     * @var MenuTypeEntity 
     */
    private $menu_type;

    /**
     *
     * @var \MenuEntity 
     */
    private $menu;
    /**
     * 
     * @return type
     */
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getMenu_type() {
        return $this->menu_type;
    }

    function getMenu() {
        return $this->menu;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setMenu_type(MenuTypeEntity $menu_type) {
        $this->menu_type = $menu_type;
    }

    function setMenu(\MenuEntity $menu) {
        $this->menu = $menu;
    }



}
