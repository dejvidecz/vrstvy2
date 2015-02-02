<?php

namespace App\AdminModule\Presenters;

use Nette,
    App\Model;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \App\Presenters\BasePresenter {

    protected function startup() {
        parent::startup();
        if (!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }

    /**
     * Leve menu
     * @return Nette\Application\UI\Control
     */
    protected function createComponentNavigation() {
        $navigation = new \App\AdminModule\Components\Navigation\Navigation();
        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Úvodní strana'), 'Homepage', 'default'));
        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Nastavení'), 'Setting', 'default'));
        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Stránky'), 'Page', 'default'));
        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Uživatelé'), 'User', 'default'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Seznam uživatelů'), 'User', 'default'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Přidat uživatele'), 'User', 'add'));
        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Menu'), 'Menu', 'default'));
        //moduly ktere budu pozdeji nahravat z databaze
        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Jazyky'), 'Languages', 'default'));
        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Eshop'), 'Eshop', 'default'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Produkty'), 'Eshop', 'product'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Atributy produktu'), 'Eshop', 'product'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Kategorie'), 'Eshop', 'product'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Objednávky'), 'Eshop', 'product'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Slevové kódy'), 'Eshop', 'product'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Statistiky'), 'Eshop', 'product'))
                ->addSubmenu(new \MenuEntity($this->getTranslator()->translate('Nastavení'), 'Eshop', 'transport'));

        $navigation->addMenuItem(new \MenuEntity($this->getTranslator()->translate('Slideshow'), 'Slideshow', 'default'));


        return $navigation;
    }


}
