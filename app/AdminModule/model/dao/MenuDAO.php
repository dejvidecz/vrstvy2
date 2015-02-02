<?php

namespace App\AdminModule\Model\DAO;

use App\AdminModule\Model\Entity\MenuEntity;
use App\AdminModule\Model\Entity\MenuItemEntity;
use App\AdminModule\Model\Entity\MenuTypeEntity;

/**
 * Description of RoleDAO
 *
 * @author Dejv
 */
class MenuDAO implements IMenuDAO {

    private $mapper;

    public function __construct(\Nette\Database\Context $database) {
        $this->mapper = new \App\AdminModule\Model\Mapper\MenuMySQLMapper($database);
    }

    public function find($id) {
        return $this->mapper->find($id);
    }

    public function findAll() {
        return $this->mapper->findAll();
    }

    public function findAllArray() {
        return $this->mapper->findAllArray();
    }

    public function deleteMenuItem(MenuItemEntity $menuItem) {
        
    }

    public function deleteMenuType(MenuTypeEntity $menuType) {
        
    }

    public function findAllItemArray() {
        
    }
    public function findAllItemSArray($id) {
        
    }

    public function findAllTypesArray() {
        
    }

    public function findMenuItem($id) {
        
    }

    public function findMenuType($id) {
        
    }

    public function saveMenuItem(MenuItemEntity $menuEntity) {
        
    }

    public function saveMenuType(MenuTypeEntity $menuType) {
        
    }

    public function delete(MenuEntity $role) {
        
    }

    public function save(MenuEntity $role) {
        
    }

    public function findItemsByMenuId($id) {
        return $this->mapper->findItemsByMenuId($id);
    }

}
