<?php
namespace App\PageModule\Model\service;

/**
 * 4.vrstva obsahuje slozitejsi ukoly a vraci take 3.vrstvu dao
 * PageService
 *
 * @author Dejv
 */
class PageService extends \Nette\Object {

    /**
     *
     * @var PageDAO 
     */
    private $dao;

    public function __construct(\Nette\Database\Context $database) {
        $this->dao = new \App\PageModule\model\dao\PageDAO($database);
    }

    /**
     * 
     * @return PageDAO
     */
    function getDao() {
        return $this->dao;
    }



}