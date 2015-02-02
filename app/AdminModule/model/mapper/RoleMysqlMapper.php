<?php

use App\AdminModule\Model\Mapper\IRoleMapper;
use App\AdminModule\Model\Entity\RoleEntity;

/**
 * Description of RoleMysqlMapper
 *
 * @author Dejv
 */
class RoleMysqlMapper implements IRoleMapper {

    /** @var Nette\Database\Context */
    private $database;
    private $tableName = 'rs_role';

    public function __construct(\Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function delete(RoleEntity $role) {
        $this->database->table($this->tableName)->where('id = ?', $page->getId())->delete();
    }

    public function find($id) {
        $data = $this->database->table($this->tableName)->where('id = ?', $id)->fetch();
        if(!$data) return null;
        $role = new RoleEntity();
        $role->setId($data->id);
        $role->setName($data->name);
        $role->setDisplay_name($data->display_name);
        return $role;
    }

    public function findAll() {
        
    }

    public function findAllArray() {
        return (array) $this->database->table($this->tableName)->fetchAll();
    }

    public function save(RoleEntity $role) {
        $data = array(
            'name' => $role->getName(),
            'display_name' => $role->getDisplay_name(),
        );
        if (is_null($role->getId())) {
            $this->database->table($this->tableName)->insert($data);
        } else {
            $this->database->table($this->tableName)->where('id = ?', $role->getId())->update($data);
        }
    }

//put your code here
}
