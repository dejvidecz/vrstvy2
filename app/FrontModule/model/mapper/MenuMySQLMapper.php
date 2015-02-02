<?php

namespace App\FrontModule\Model\Mapper;

use App\FrontModule\Model\Entity\MenuEntity;
use App\FrontModule\Model\Entity\MenuItemEntity;
use App\FrontModule\Model\Entity\MenuTypeEntity;

/**
 * Description of MenuMySQLMapper
 *
 * @author Dejv
 */
class MenuMySQLMapper implements IMenuMapper {

    /** @var Nette\Database\Context */
    private $database;
    private $tableName = 'rs_menu';
    private $tableNameItem = 'rs_menu_item';
    private $tableNameType = 'rs_menu_type';

    public function __construct(\Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function find($id) {
        $data = $this->database->table($this->tableName)->where('id = ?', $id)->fetch();
        if (!$data)
            return null;
        $menu = new MenuEntity();
        $menu->setId($data->id);
        $menu->setName($data->name);
        $menu->setAlias($data->alias);
        return $menu;
    }

    public function findAll() {
        
    }

    public function findAllArray() {
        $array = array();
        foreach ($this->database->table($this->tableName)->fetchAll() as $v) {
            $array[] = $v;
        }
        return $array;
    }

    public function findAllItemArray() {
        $array = array();
        foreach ($this->database->table($this->tableNameItem)->fetchAll() as $v) {
            $array[] = $v;
        }
        return $array;
    }

    public function findAllTypesArray() {
        $array = array();
        foreach ($this->database->table($this->tableNameType)->fetchAll() as $v) {
            $array[] = $v;
        }
        return $array;
    }

    public function findMenuItem($id) {
        $data = $this->database->table($this->tableNameItem)->where('id = ?', $id)->fetch();
        if (!$data)
            return null;
        $menu = new MenuItemEntity();
        $menu->setId($data->id);
        $menu->setMenu_type($this->findMenuType($data->menu_type));
        $menu->setMenu($this->find($data->menu_id));
        return $menu;
    }

    public function findMenuType($id) {
        $data = $this->database->table($this->tableNameType)->where('id = ?', $id)->fetch();
        if (!$data)
            return null;
        $menu = new MenuTypeEntity();
        $menu->setId($data->id);
        $menu->setName($data->name);
        $menu->setAlias($data->alias);
        $menu->setDescription($data->description);
        return $menu;
    }

   

    public function findItemsByMenuId($id) {
        $array = array();
        foreach ($this->database->table($this->tableNameItem)->where('menu_id = ?',$id)->fetchAll() as $v) {
            $array[] = $v;
        }
        return $array;
    }


}
