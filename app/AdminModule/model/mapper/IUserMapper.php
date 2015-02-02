<?php
namespace App\AdminModule\Model\Mapper;
use App\AdminModule\Model\Entity\UserEntity;

/**
 *
 * @author Dejv
 */
interface IUserMapper {
    
    /**
     * 
     * @param int $id
     * @return UserEntity
     */
    public function find($id);
    
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
    
  
    
    
    
}
