<?php

declare(strict_types=1);

namespace App\AdminModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\MyAuthenticator;
use App\AdminModule\Presenters\HomepagePresenter;

final class RegisterPresenter extends Nette\Application\UI\Presenter
{

    private $myAuthenticator;

    public function __construct(Myauthenticator $myAuthenticator)
    {
        parent::__construct();
        $this->myAuthenticator = $myAuthenticator;
    }

    public function actionSignOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect('Homepage:default');
    }

    public function createComponentRegisterForm(): Form
    {
        $form = new Form();
        $form->addText('username','Username');
        $form->addPassword('password', 'Password');
        $form->addSubmit('send', 'Zaregistrovat');
        $form->onSuccess[] = [$this, 'registerFormSuccess'];

        return $form;
    }

    public function registerFormSuccess($form)
    {
        $values = $form->getValues();
        $this->myAuthenticator->registering($values->username, $values->password, $values->role);
        $this->getUser()->login($values->username, $values->password);
        $this->redirect('Register:default');
    }
}
