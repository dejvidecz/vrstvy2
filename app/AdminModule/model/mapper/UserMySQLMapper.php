<?php

namespace App\AdminModule\Model\Mapper;

use App\AdminModule\Model\Entity\UserEntity;

/**
 * Description of UserMySQLMapper
 *
 * @author Dejv
 */
class UserMySQLMapper implements IUserMapper {

    /** @var Nette\Database\Context */
    private $database;
    private $tableName = 'rs_user';

    public function __construct(\Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function delete(UserEntity $user) {
        $this->database->table($this->tableName)->where('id = ?', $page->getId())->delete();
    }

    public function find($id) {
        $data = $this->database->table($this->tableName)->where('id = ?', $id)->fetch();
        if(!$data) return null;
        $user = new UserEntity();
        $user->setId($data->id);
        $user->setName($data->name);
        $user->setSurname($data->surname);
        $user->setEmail($data->email);
        $user->setCreated($data->created);
        $user->setLast_login($data->last_login);
        $user->setNick($data->nick);
        $user->setPassword($data->password);
        $user->setRole_id($data->role_id);
        return $user;
    }

    public function findAll() {
        throw new Exception;
    }

    public function findAllArray() {
        $array = array();
        foreach ($this->database->table($this->tableName)->fetchAll() as $v) {
            $array[] = $v;
        }
        return $array;
        
    }

    public function save(UserEntity $user) {
         $data = array(
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'created' => $user->getCreated(),
            'last_login' => $user->getLast_login(),
            'nick' => $user->getNick(),
            'password' => $user->getPassword(),
            'role_id' => $user->getRole_id()
        );
        if (is_null($user->getId())) {
            $this->database->table($this->tableName)->insert($data);
        } else {
            $this->database->table($this->tableName)->where('id = ?', $user->getId())->update($data);
        }
    }

    public function findByEmail($email) {
        $data = $this->database->table($this->tableName)->where('email = ?', $email)->fetch();
        if(!$data) return null;
        $user = new UserEntity();
        $user->setId($data->id);
        $user->setName($data->name);
        $user->setSurname($data->surname);
        $user->setEmail($data->email);
        $user->setCreated($data->created);
        $user->setLast_login($data->last_login);
        $user->setNick($data->nick);
        $user->setPassword($data->password);
        $user->setRole_id($data->role_id);
        return $user;
    }

    public function findByNickName($name) {
        $data = $this->database->table($this->tableName)->where('nick = ?', $name)->fetch();
        if(!$data) return null;
        $user = new UserEntity();
        $user->setId($data->id);
        $user->setName($data->name);
        $user->setSurname($data->surname);
        $user->setEmail($data->email);
        $user->setCreated($data->created);
        $user->setLast_login($data->last_login);
        $user->setNick($data->nick);
        $user->setPassword($data->password);
        $user->setRole_id($data->role_id);
        return $user;
    }

}
