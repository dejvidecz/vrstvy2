<?php

namespace App\FrontModule\Presenters;

use Nette,
    App\Model;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \App\Presenters\BasePresenter {

    /**
     *
     * @var \App\FrontModule\Model\Service\MenuService 
     */
    private $menuService;

    protected function startup() {
        parent::startup();
    }
    
    function __construct(\App\FrontModule\Model\Service\MenuService $menuService) {
        parent::__construct();
        $this->menuService = $menuService;
    }

    
    public function beforeRender() {
        parent::beforeRender();
        $this->template->leftMenu = $this->menuService->getDao()->findItemsByMenuId(2);
        $this->template->topMenu = $this->menuService->getDao()->findItemsByMenuId(1);
        
    }

}
