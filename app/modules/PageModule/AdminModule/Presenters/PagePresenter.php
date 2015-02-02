<?php

namespace App\Modules\PageModule\AdminModule\Presenters;

use Nette,
    App\Model;

/**
 * Base presenter for all application presenters.
 */
class PagePresenter extends \App\AdminModule\Presenters\BasePresenter {

    /** @var \App\PageModule\Model\service\PageService */
    private $pageService;

    public function __construct(\App\PageModule\model\service\PageService $pageService) {
        $this->pageService = $pageService;
        parent::__construct();
    }

    public function renderDefault() {
        $this->template->pages = $this->pageService->getDao()->findAll();
    }

    public function renderDetail($id) {
        $this->template->page = $this->pageService->getDao()->find($id);
    }

    protected function createComponentSignInForm() {
        $factory = new \SignInFormFactory();
        $form = $factory->create();
        return $form;
    }

    protected function createComponentGrid() {
        $grid = new \App\AdminModule\Components\Grid\Grid($this->pageService->getDao()->findAllArray());
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('id', 'ID'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('name', 'Jméno'));
        $grid->addColumn(new \App\AdminModule\Components\Grid\Column\Column('link', 'Link'));
        return $grid;
    }

}
