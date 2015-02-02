<?php

namespace App\AdminModule\Model\Service;

use Nette,
    Nette\Utils\Strings,
    Nette\Security\Passwords,
    App\AdminModule\Model\DAO;

/**
 * Users management.
 */
class UserService extends Nette\Object implements Nette\Security\IAuthenticator {

    private $salt = 'akYGs4h87gInGrt4MlFs5d';
    private $cost = 5;

    function getDao() {
        return $this->dao;
    }

    /**
     *
     * @var \App\AdminModule\Model\DAO\UserDAO 
     */
    private $dao;

    /**
     *
     * @var \App\AdminModule\Model\DAO\UserDAO 
     */
    private $roleDAO;

    public function __construct(Nette\Database\Context $database) {
        $this->dao = new DAO\UserDAO($database);
        $this->roleDAO = new DAO\RoleDAO($database);
    }

    /**
     * Performs an authentication.
     * @return Nette\Security\Identity
     * @throws Nette\Security\AuthenticationException
     */
    public function authenticate(array $credentials) {
        list($username, $password) = $credentials;

        /**
         * @var \App\AdminModule\Model\Entity\UserEntity
         */
        $user = $this->dao->findByNickName($username);
        if (is_null($user)) {
            throw new Nette\Security\AuthenticationException('Nesprávné uživatelské jméno.', self::IDENTITY_NOT_FOUND);
        }

        //prevod ze zastaraleho systemu na novy nette password
        if (md5($password) == $user->getPassword()) {
            $user->setPassword(Passwords::hash($password, array('cost' => $this->cost, 'salt' => $this->salt)));
            $this->dao->save($user);
        }


        if (!Passwords::verify($password, $user->getPassword())) {
            throw new Nette\Security\AuthenticationException('Nesprávné heslo.', self::INVALID_CREDENTIAL);
        } elseif (Passwords::needsRehash($user->getPassword())) {
            $user->setPassword(Passwords::hash($password));
            $this->dao->save($user);
        }


        return new Nette\Security\Identity($user->getId(), $this->roleDAO->find($user->getRole_id())->getName(), array('name' => $user->getName(), 'surname' => $user->getSurname()));
    }

    public function getUserArray($id) {
        $entity = $this->getDao()->find($id);
        if (is_null($entity))
            return null;
        return array(
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'surname' => $entity->getSurname(),
            'email' => $entity->getEmail(),
            'created' => $entity->getCreated(),
            'last_login' => $entity->getLast_login(),
            'nick' => $entity->getNick(),
            'role_id' => $entity->getRole_id(),
        );
    }

    public function getRoleArray($id = null) {
        if (is_null($id)) {
            return $this->roleDAO->findAllArray();
        } else {
            $entity = $this->roleDAO->find($id);
            if (is_null($entity))
                return null;
            return array(
                'id' => $entity->getId(),
                'name' => $entity->getName(),
                'display_name' => $entity->getDisplay_name(),
            );
        }
    }

    public function getRoleForm($id = null) {
        if (is_null($id)) {
            $all = $this->roleDAO->findAllArray();
            $tmp;
            foreach ($all as $a) {
                $tmp[$a['id']] = $a['display_name'];
            }
            return $tmp;
        } else {
            $entity = $this->roleDAO->find($id);
            $tmp[$entity->getId()] = $entity->getDisplay_name();
            return $tmp;
        }
    }

}
