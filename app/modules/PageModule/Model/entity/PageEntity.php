<?php
namespace App\PageModule\model\entity;
/**
 * Prvni modelova vrstva
 *  PageEntity
 *
 * @author Dejv
 */
class PageEntity {
    
    private $id;
    
    private $name;
    
    private $link;
    
    private $text;
    
    function __construct() {
        $this->id = null;
    }

    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLink() {
        return $this->link;
    }

    function getText() {
        return $this->text;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setText($text) {
        $this->text = $text;
    }


    
}
