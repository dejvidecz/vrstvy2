<?php

namespace App\AdminModule\Model\Entity;

/**
 * Description of UserEntity
 *
 * @author Dejv
 */
class UserEntity {

    private $id;
    private $name;
    private $surname;
    private $email;
    private $created;
    private $last_login;
    private $nick;
    private $password;
    private $role_id;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function getCreated() {
        return $this->created;
    }

    function getLast_login() {
        return $this->last_login;
    }

    function getNick() {
        return $this->nick;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole_id() {
        return $this->role_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setLast_login($last_login) {
        $this->last_login = $last_login;
    }

    function setNick($nick) {
        $this->nick = $nick;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole_id($role_id) {
        $this->role_id = $role_id;
    }

}
