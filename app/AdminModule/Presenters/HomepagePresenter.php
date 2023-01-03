<?php

declare(strict_types=1);

namespace App\AdminModule\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{


    public function createComponentSignInForm(): Form
    {
        $projects = [
            'PanDeskovek' => 'Pán deskovek',
            'Cestovani' => 'Cestování',
            'Recepty' => 'Recepty',
        ];
        $form = new Form();
        $form->addRadioList('project', '', $projects);
        $form->setHtmlAttribute('class', 'login-form');
        $form->addText('username','')
            ->setRequired()
            ->setHtmlAttribute('placeholder', 'Jméno');
        $form->addPassword('password', '')
            ->setRequired()
            ->setHtmlAttribute('placeholder', 'Heslo');
        $form->addSubmit('send', 'Přihlásit');
        $form->onSuccess[] = [$this, 'signInFormSuccess'];

        return $form;
    }

    public function signInFormSuccess($form)
    {
        $values = $form->getValues();
        try {
            $this->getUser()->login($values->username, $values->password);
        } catch (Nette\Security\AuthenticationException $e) {
            $this->flashMessage($e->getMessage(), 'danger');
            $this->redirect('default');
        }
        
        $this->redirect(":" .$values->project. ":Homepage:default");
    }

    public function actionSignOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect('Homepage:default');
    }
}
