<?php

namespace App\AdminModule\Presenters;

class MenuPresenter extends BasePresenter {

    /** @var \App\AdminModule\Model\Service\MenuService */
    private $menuService;
    
    private $menu_id;

    function __construct(\App\AdminModule\Model\Service\MenuService $menuService) {
        parent::__construct();
        $this->menuService = $menuService;
    }

    public function actionEdit($id) {
        $form = $this->getComponent('form');
        $form->setDefaults($this->menuService->getMenuArray($id));
    }

    protected function createComponentForm() {
        $form = new \Nette\Forms\Form();
        $form->addHidden('id');
        $form->addText('name', $this->getTranslator()->translate('Jméno'));
        $form->addText('alias', $this->getTranslator()->translate('Alias'));
        $form->addSubmit('ok', $this->getTranslator()->translate('Uložit'));
        $form->onSubmit[] = $this->submitForm;
        return $form;
    }
    
    
    /**
     * Zpracování formuláře.
     * @param Form $form
     */
    public function submitForm($form) {
        $values = $form->getValues();
        dump($values);
        die();
    }

    public function renderDetail($id) {
        $this->menu_id = $id;
        $items = $this->menuService->getDao()->findItemsByMenuId($id);
    }

    protected function createComponentGrid() {
        $grid = new \App\AdminModule\Components\Grid\Grid($this->menuService->getDao()->findAllArray());
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('id', 'ID'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('name', 'Jméno'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column_Menu('id', 'Detail', 'detail'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column_Menu('id', 'Editovat', 'edit'));
        return $grid;
    }
    
    protected function createComponentDetailGrid(){
        $grid = new \App\AdminModule\Components\Grid\Grid($this->menuService->getDao()->findItemsByMenuId($this->menu_id));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('id', 'ID'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('name', 'Jméno'));
        return $grid;
    }

}
