<?php

namespace App\AdminModule\Model\DAO;

use App\AdminModule\Model\Entity\RoleEntity;

/**
 * Description of RoleDAO
 *
 * @author Dejv
 */
class RoleDAO implements IRoleDAO {

    private $mapper;

    public function __construct(\Nette\Database\Context $database) {
        $this->mapper = new \RoleMysqlMapper($database);
    }

    public function delete(RoleEntity $role) {
        $this->mapper->delete($role);
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

    public function save(RoleEntity $role) {
        return $this->mapper->save($role);
    }


}
