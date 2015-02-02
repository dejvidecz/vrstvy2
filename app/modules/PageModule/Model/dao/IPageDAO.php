<?php
namespace App\PageModule\model\dao;
use \App\PageModule\model\entity\PageEntity;
/**
 *
 * @author Dejv
 */
interface IPageDAO {
     /**
     * 
     * @param int $id
     * @return PageEntity
     */
    public function find($id);
    
    /**
     * Zde nevim jeste co vracet ...
     * @return ArrayObject Description
     */
    public function findAll();
   
     public function findAllArray();
   
    /**
     * Uloží a vrátí uloženou entitu
     * @param PageEntity $page
     * @return PageEntity
     */
    public function save(PageEntity $page);
    
    /**
     * 
     * @param PageEntity $page
     */
    public function delete(PageEntity $page);
    
    /**
     * 
     * @param PageEntity $page
     */
    public function publish(PageEntity $page);
}
