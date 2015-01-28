<?php
namespace App\PageModule\model\mapper;
use \App\PageModule\model\entity\PageEntity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Dejv
 */
interface IPageMapper {
    
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
