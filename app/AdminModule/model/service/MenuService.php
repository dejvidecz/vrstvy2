<?php

namespace App\AdminModule\Model\Service;

/**
 * Description of MenuService
 *
 * @author Dejv
 */
class MenuService extends \Nette\Object {

    function getDao() {
        return $this->dao;
    }

    /**
     *
     * @var \App\AdminModule\Model\DAO\MenuDAO
     */
    private $dao;

    public function __construct(\Nette\Database\Context $database) {
        $this->dao = new \App\AdminModule\Model\DAO\MenuDAO($database);
    }

    public function getMenuArray($id) {
        $entity = $this->getDao()->find($id);
        if (is_null($entity))
            return null;
        return array(
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'alias' => $entity->getAlias(),
        );
    }

    public function getMenuItemArray($id) {
        $entity = $this->getDao()->findMenuItem($id);
        if (is_null($entity))
            return null;
        return array(
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'menu_type' => $entity->getMenu_type()->getId(),
            'menu_id' => $entity->getMenu()->getId(),
        );
    }

    public function getMenuTypeArray($id) {
        $entity = $this->getDao()->findMenuType($id);
        if (is_null($entity))
            return null;
        return array(
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'alias' => $entity->getAlias(),
            'description' => $entity->getDescription(),
        );
    }

}
