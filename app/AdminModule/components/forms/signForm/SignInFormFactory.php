<?php

use Nette\Application\UI\Form;

/**
 * Description of SignInForm
 *
 * @author Dejv
 */
class SignInFormFactory {

    /**
     * @return Form
     */
    public function create() {
        $form = new Form;
        $form->addText('name', 'Jméno:');
        $form->addSubmit('login', 'Přihlásit se');
        return $form;
    }

}
