<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuEntity
 *
 * @author Dejv
 */
class MenuEntity {

    private $id;
    private $name;
    private $presenter;
    private $action;
    private $link;
    private $submenu;

    function getSubmenu() {
        return $this->submenu;
    }

    function setSubmenu($submenu) {
        $this->submenu = $submenu;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    /**
     * 
     * @param MenuEntity $submenu
     * @return \MenuEntity
     */
    function addSubmenu(MenuEntity $submenu) {
        $this->submenu[] = $submenu;
        return $this;
    }

    function getLink() {
        return $this->link;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function __construct($name, $presenter, $action) {
        $this->name = $name;
        $this->presenter = $presenter;
        $this->action = $action;
    }

    function getName() {
        return $this->name;
    }

    function getPresenter() {
        return $this->presenter;
    }

    function getAction() {
        return $this->action;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPresenter($presenter) {
        $this->presenter = $presenter;
    }

    function setAction($action) {
        $this->action = $action;
    }

}
