<?php

namespace App\AdminModule\Model\Mapper;

use App\AdminModule\Model\Entity\RoleEntity;

/**
 *
 * @author Dejv
 */
interface IRoleMapper {

    /**
     * 
     * @param int $id
     * @return RoleEntity
     */
    public function find($id);

    /**
     * Zde nevim jeste co vracet ...
     * @return ArrayObject Description
     */
    public function findAll();

    public function findAllArray();

    /**
     * Uloží a vrátí uloženou entitu
     * @param RoleEntity $role
     * @return RoleEntity
     */
    public function save(RoleEntity $role);

    /**
     * 
     * @param RoleEntity $role
     */
    public function delete(RoleEntity $role);
}
