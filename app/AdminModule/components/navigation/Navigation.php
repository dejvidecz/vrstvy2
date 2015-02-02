<?php

namespace App\AdminModule\Components\Navigation;

/**
 * Description of Navigation
 *
 * @author Dejv
 */
class Navigation extends \Nette\Application\UI\Control {

    private $menu = null;
    private $menuItems;

 

    public function render() {
        $this->template->setFile(__DIR__ . '/navigation.latte');
        $this->prepareMenu();
        $this->template->menu = $this->menuItems;
        $this->template->render();
    }

    private function prepareMenu() {
        //zde jeste nacteni modulu z databaze
        foreach ($this->menuItems as $item) {
            $item->setLink((string) $item->getPresenter() . ':' . $item->getAction());
            if(!is_null($item->getSubmenu())){
                foreach ($item->getSubmenu() as $sub) {
                    $sub->setLink((string) $sub->getPresenter() . ':' . $sub->getAction());
                }
            }
        }
    }
 
    /**
     * 
     * @param \MenuEntity $menuItem
     * @return \MenuEntity
     */
    public function addMenuItem(\MenuEntity $menuItem){
      $this->menuItems[] = $menuItem;
      return $menuItem;
    }
    
    

}
