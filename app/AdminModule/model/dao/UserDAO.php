<?php

namespace App\AdminModule\Model\DAO;

use App\AdminModule\Model\Entity\UserEntity;

/**
 * Treti modelova vrstva
 * DAO rozhoduje do ktereho uloziste budu ukladat. Toto uloziste nastavuji v konstruktoru
 * plus je vhodny k ruznym cache do memcached
 * @author Dejv
 */
class UserDAO implements IUserDAO {

    private $mapper;

    public function __construct(\Nette\Database\Context $database) {
        $this->mapper = new \App\AdminModule\Model\Mapper\UserMySQLMapper($database);
    }

    public function delete(UserEntity $page) {
        $this->mapper->delete($page);
    }

    /**
     * 
     * @param type $id
     * @return \App\AdminModule\Model\Entity\RoleEntity
     */
    public function find($id) {
        return $this->mapper->find($id);
    }

    public function findAll() {
        return $this->mapper->findAll();
    }

    public function save(UserEntity $page) {
        return $this->mapper->save($page);
    }

    public function findAllArray() {
        return $this->mapper->findAllArray();
    }

    /**
     * 
     * @param type $nickName
     * @return UserEntity
     */
    public function findByEmail($email) {
        return $this->mapper->findByEmail($email);
    }

    /**
     * 
     * @param type $nickName
     * @return UserEntity
     */
    public function findByNickName($nickName) {
        return $this->mapper->findByNickName($nickName);
    }

}
