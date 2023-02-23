<?php

declare(strict_types=1);

namespace App\AdminModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\MyAuthenticator;
use App\AdminModule\Presenters\HomepagePresenter;
use App\AdminModule\Forms\RegisterFormFactory;


final class RegisterPresenter extends Nette\Application\UI\Presenter
{

    public function __construct(
        private Myauthenticator $myAuthenticator,
        private RegisterFormFactory $RegisterFactory,
        )
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

    protected function createComponentRegisterForm(): Form
    {
        $form = $this->RegisterFactory->create();
        $form->onSuccess[] = function (Form $form) {
            $this->redirect('Homepage:default');
		};
        return $form;
    }
}
