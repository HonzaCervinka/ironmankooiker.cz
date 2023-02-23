<?php

declare(strict_types=1);

namespace App\AdminModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use App\Model\MyAuthenticator;
use Nette\Security\User;

final class RegisterFormFactory
{
    use Nette\SmartObject;

    public function __construct(
        private FormFactory $factory, 
        private Myauthenticator $myAuthenticator,
        private User $user
        )
	{}

    public function create(): Form
    {
        $form = $this->factory->create();
        
        $form->addText('username','Username');
        $form->addText('role','role');
        $form->addPassword('password', 'Password');
        $form->addSubmit('send', 'Zaregistrovat');
        $form->onSuccess[] = [$this, 'registerFormSuccess'];

        return $form;
    }
        
    public function registerFormSuccess($form, array $values)
    {
        $values = $form->getValues();
        $this->myAuthenticator->registering($values->username, $values->password, $values->role);
        $this->user->login($values->username, $values->password);
    }


}