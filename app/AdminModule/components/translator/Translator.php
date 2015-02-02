<?php

namespace App\AdminModule\Components\Translator;

/**
 * Description of Translator
 *
 * @author Dejv
 */
class Translator extends \Nette\Object implements \Nette\Localization\ITranslator {
    
    private $language;
   
    public function translate($message, $count = NULL) {
        return $message;
    }
    
    function getLanguage() {
        return $this->language;
    }

    function setLanguage($language) {
        $this->language = $language;
    }




}
