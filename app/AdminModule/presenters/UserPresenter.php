<?php

namespace App\AdminModule\Presenters;

class UserPresenter extends BasePresenter {

    /** @var \App\AdminModule\Model\Service\UserService */
    private $userService;

    function __construct(\App\AdminModule\Model\Service\UserService $userService) {
        parent::__construct();
        $this->userService = $userService;
    }

    public function actionEdit($id) {
        $result = $this->exist($id);
        $form = $this->getComponent('form');
        $form->setDefaults($result);
    }

    private function exist($id) {
        $result = $this->userService->getUserArray($id);
        if (is_null($result)) {
            $this->flashMessage($this->getTranslator()->translate('Takový uživatel neexistuje'));
            $this->redirect('default');
        }
        return $result;
    }

    protected function createComponentForm() {
        $form = new \Nette\Forms\Form();
        $form->addHidden('id');
        $form->addText('name', $this->getTranslator()->translate('Jméno'));
        $form->addText('surname', $this->getTranslator()->translate('Příjmení'));
        $form->addText('email', $this->getTranslator()->translate('E-mail'));
        $form->addText('nick', $this->getTranslator()->translate('Username'));
        $form->addSelect('role_id', $this->getTranslator()->translate('Role'), $this->userService->getRoleForm())
                ->setPrompt($this->getTranslator()->translate('Vyberte roli'));
        $form->addPassword('password', $this->getTranslator()->translate('Heslo'));
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

    protected function createComponentGrid() {
        $grid = new \App\AdminModule\Components\Grid\Grid($this->userService->getDao()->findAllArray());
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('id', 'ID'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('name', 'Jméno'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('surname', 'Příjmení'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('email', 'E-mail'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column_Menu('edit', 'Editovat', 'edit'));

        return $grid;
    }

}
