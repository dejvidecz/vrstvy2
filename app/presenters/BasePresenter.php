<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    
    protected $translator;
    
    protected function startup() {
        parent::startup();
        $this->translator = new \App\AdminModule\Components\Translator\Translator();
    }
    
    /**
     * 
     * @return \App\AdminModule\Components\Translator\Translator
     */
    public function getTranslator(){
        return $this->translator;
    }

}
