<?php
namespace App\PageModule\model\dao;
use \App\PageModule\model\entity\PageEntity;

/**
 * Treti modelova vrstva
 * DAO rozhoduje do ktereho uloziste budu ukladat. Toto uloziste nastavuji v konstruktoru
 * plus je vhodny k ruznym cache do memcached
 * @author Dejv
 */
class PageDAO implements IPageDAO {

    private $mapper;
    
    
    public function __construct(\Nette\Database\Context $database) {
        $this->mapper = new \App\PageModule\model\mapper\PageMySQLMapper($database);
    }

    public function delete(PageEntity $page) {
        $this->mapper->delete($page);
    }

    public function find($id) {
        return $this->mapper->find($id);
    }

    public function findAll() {
        return $this->mapper->findAll();
    }

    public function publish(PageEntity $page) {
        $this->mapper->publish($page);
    }

    public function save(PageEntity $page) {
        return $this->mapper->save($page);
    }
    
     public function findAllArray() {
        return $this->mapper->findAllArray();
        
    }
}
