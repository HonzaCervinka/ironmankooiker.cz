<?php

declare(strict_types=1);

namespace App\AdminModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\AdminModule\Forms\SignInFormFactory;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
	public function __construct(
		private SignInFormFactory $signInFactory
	) {}

    protected function createComponentSignInForm(): Form
    {
        $form = $this->signInFactory->create();
        $form->onSuccess[] = function (Form $form) {
            $values = $form->getValues();
			$this->redirect(":" .$values->project. ":Homepage:default");
		};
        return $form;
    }
    
    public function actionSignOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect('Homepage:default');
    }


}
