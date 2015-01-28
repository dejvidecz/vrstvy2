<?php

namespace App\PageModule\model\mapper;

use \App\PageModule\model\entity\PageEntity;

/**
 * Druha modelova vrstva
 * Description of PageMySQLMapper
 *
 * @author Dejv
 */
class PageMySQLMapper implements IPageMapper {

    /** @var Nette\Database\Context */
    private $database;
    private $tableName = 'rs_page';

    public function __construct(\Nette\Database\Context $database) {
        $this->database = $database;
    }

    public function delete(PageEntity $page) {
        $this->database->table($this->tableName)->where('id = ?', $page->getId())->delete();
    }

    /**
     * 
     * @param type $id
     * @return \PageEntity
     */
    public function find($id) {
        $data = $this->database->table($this->tableName)->where('id = ?', $id)->fetch();
        $page = new PageEntity();
        $page->setId($data->id);
        $page->setName($data->name);
        $page->setLink($data->link);
        $page->setText($data->text);
        return $page;
    }

    /**
     * 
     * @return array of PageEntities
     */
    public function findAll() {
        $data = $this->database->table($this->tableName)->fetchAll();
        $array = array();
        foreach ($data as $d) {
            $page = new PageEntity();
            $page->setId($d->id);
            $page->setName($d->name);
            $page->setLink($d->link);
            $page->setText($d->text);
            $array[] = $page;
        }
        return $array;
    }

    public function publish(PageEntity $page) {
        
    }

    public function save(PageEntity $page) {
        $data = array(
            'name' => $page->getName(),
            'link' => $page->getLink(),
            'text' => $page->getText()
        );
        if (is_null($page->getId())) {
            $this->database->table($this->tableName)->insert($data);
        } else {
            $this->database->table($this->tableName)->where('id = ?', $page->getId())->update($data);
        }
    }

}
