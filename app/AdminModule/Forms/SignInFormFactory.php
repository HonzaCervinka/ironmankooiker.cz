<?php

declare(strict_types=1);

namespace App\AdminModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Security\User;

final class SignInFormFactory
{
    use Nette\SmartObject;

    public function __construct(
        private FormFactory $factory, 
        private User $user
        )
	{}

    public function create(): Form
    {
        $form = $this->factory->create();
        
        $projects = [
            'PanDeskovek' => 'Pán deskovek',
            'Blog' => 'Blog',
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
        
    public function signInFormSuccess($form, array $values)
    {
        try {
            $values = $form->getValues();
            $location = $values->project;
            $this->user->login($values->username, $values->password);
            
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Špatné jméno nebo heslo');

        }
        
    }


}