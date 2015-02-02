<?php

namespace App\AdminModule\Model\Mapper;

use App\AdminModule\Model\Entity\MenuEntity;
use App\AdminModule\Model\Entity\MenuItemEntity;
use App\AdminModule\Model\Entity\MenuTypeEntity;

/**
 *
 * @author Dejv
 */
interface IMenuMapper {

    /**
     * 
     * @param int $id
     * @return \App\AdminModule\Model\Entity\MenuEntity
     */
    public function find($id);

    /**
     * 
     * @param int $id
     * @return \App\AdminModule\Model\Entity\MenuItemEntity
     */
    public function findMenuItem($id);

    /**
     * 
     * @param int $id
     * @return \App\AdminModule\Model\Entity\MenuTypeEntity 
     */
    public function findMenuType($id);

    public function findAllArray();

    public function findAllItemArray();

    public function findAllTypesArray();
    
    public function findItemsByMenuId($id);

    /**
     * Uloží a vrátí uloženou entitu
     * @param MenuEntity $menu
     * @return MenuEntity
     */
    public function save(MenuEntity $role);

    /**
     * Uloží a vrátí uloženou entitu
     * @param MenuItemEntity $menuItem
     * @return MenuItemEntity
     */
    public function saveMenuItem(MenuItemEntity $menuEntity);

    /**
     * Uloží a vrátí uloženou entitu
     * @param MenuTypeEntity $menuType
     * @return MenuTypeEntity
     */
    public function saveMenuType(MenuTypeEntity $menuType);

    /**
     * Zde nevim jeste co vracet ...
     * @return ArrayObject Description
     */
    public function findAll();

    /**
     * 
     * @param MenuEntity $role
     */
    public function delete(MenuEntity $role);

    /**
     * 
     * @param MenuItemEntity $menuItem
     */
    public function deleteMenuItem(MenuItemEntity $menuItem);

    /**
     * 
     * @param MenuTypeEntity $menuType
     */
    public function deleteMenuType(MenuTypeEntity $menuType);
}
