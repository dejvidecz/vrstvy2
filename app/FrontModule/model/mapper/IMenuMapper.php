<?php

namespace App\FrontModule\Model\Mapper;

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
     * Zde nevim jeste co vracet ...
     * @return ArrayObject Description
     */
    public function findAll();
}
