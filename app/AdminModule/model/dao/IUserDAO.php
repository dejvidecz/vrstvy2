<?php
namespace App\AdminModule\Model\DAO;
use App\AdminModule\Model\Entity\UserEntity;

/**
 *
 * @author Dejv
 */
interface IUserDAO {
     /**
     * 
     * @param int $id
     * @param UserEntity $user
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
     * @param UserEntity $user
     * @return PageEntity
     */
    public function save(UserEntity $user);
    
    /**
     * 
     * @param UserEntity $user
     */
    public function delete(UserEntity $user);
    
    /**
     * 
     * @param int $email
     * @return UserEntity
     */
    public function findByEmail($email);
    
    /**
     * 
     * @param int $nickName
     * @return UserEntity
     */
    public function findByNickName($nickName);
    
    
   
}
