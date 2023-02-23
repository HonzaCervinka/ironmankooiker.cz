<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use App\Model\PanDeskovekManager;
use Nette\Utils\ArrayHash;
use App\PanDeskovekModule\Forms\AddGameFormFactory;
use App\PanDeskovekModule\Forms\AddGameNightFormFactory;

abstract class BasePresenter extends Presenter
{
        /**
         * Konstruktor s injektovaným modelem pro správu článků.
         * @param PanDeskovekManager $travelManager automaticky injektovaný model pro správu článků
         */
        public function __construct(
            public PanDeskovekManager $panDeskovekManager,
            public AddGameFormFactory $addGameFormFactory,
            public AddGameNightFormFactory $addGameNightFormFactory,
            )
        {
            parent::__construct();
            $this->panDeskovekManager = $panDeskovekManager;
        }
    
    protected function startup(): void {
        parent::startup();
        if (!$this->getUser()->isAllowed($this->getName(), $this->getAction())) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění.');
            $this->redirect(':Admin:Homepage:default');
        }
    }

    protected function createComponentAddGameForm(): Form
    {
        $form = $this->addGameFormFactory->create();
        $form->onSuccess[] = function (Form $form) {
			$this->redirect("Homepage:default");
		};
        return $form;
    }

    protected function createComponentAddGameNightForm(): Form
    {
        $form = $this->addGameNightFormFactory->create();
        $form->onSuccess[] = function (Form $form) {
			$this->redirect("Homepage:default");
		};
        return $form;
    }


    /*
    protected function createComponentAddGameForm(): Form
    {
        $form = new Form();
        $form->addText('name', 'Jméno hry:');
        $form->addSubmit('send', 'Uložit hru');
        $form->onSuccess[] = [$this, 'addGameFormSucceeded'];
        return $form;
    }

    public function addGameFormSucceeded(ArrayHash $data)
    {
        if (!$this->getUser()->isAllowed('PanDeskovek', 'addGame')) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění.', 'danger');
            $this->redirect('this');
        }
        $post = $this->panDeskovekManager->saveBoardgame($data);
        $this->flashMessage('Hra byla úspěšně přidána', 'success');
        $this->redirect('this');
    }

    protected function createComponentAddGameNightForm(): Form
    {
        $form = new Form();
        $form->addText('date', 'Datum hraní:')
            ->setHtmlType('date');
        $form->addSelect('id_game', 'Hra:',$this->getTemplatesAssoc());
        $form->addCheckbox('honza', 'Honza');
        $form->addCheckbox('michal', 'Michal');
        $form->addCheckbox('sevi', 'Ševi');
        $form->addCheckbox('johny', 'Johny');
        $form->addSubmit('send', 'Uložit sezení');
        $form->onSuccess[] = [$this, 'addGameNightFormSucceeded'];
        return $form;
    }

    public function addGameNightFormSucceeded(ArrayHash $data)
    {
        if (!$this->getUser()->isAllowed('PanDeskovek', 'addGame')) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění.', 'danger');
            $this->redirect('this');
        }
        $post = $this->panDeskovekManager->saveGameNight($data);
        $this->flashMessage('Hra byla úspěšně přidána','sucess');
        $this->redirect('this');
    }

    public function getTemplatesAssoc(): array
    {
	return $this->panDeskovekManager->getBoardgames()->fetchAssoc('boardgame_id=name');
    }
    */

    public function actionSignOut()
    {
        $this->getUser()->logout(true);
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect(':Admin:Homepage:default');
    }

    /**
     * actionRemoveBoardGame
     * Odstrani deskovou hru
     * @param  mixed $postID
     * @return void
     */
    public function actionRemoveBoardGame(int $postID)
    {
        if (!$this->getUser()->isAllowed('PanDeskovek', 'RemoveBoardGame')) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění', 'danger');
            $this->redirect('Homepage:default');
        }
        $this->panDeskovekManager->removeBoardgame($postID);
        $this->flashMessage('Hra byla odstraněna', 'success');
        $this->redirect('Homepage:default');
    }
    
    /**
     * actionRemoveGameNight
     * Odstrani herni sezeni
     * @param  mixed $postID
     * @return void
     */
    public function actionRemoveGameNight(int $postID)
    {
        if (!$this->getUser()->isAllowed('PanDeskovek', 'RemoveGameNight')) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění', 'danger');
            $this->redirect('Homepage:default');
        }
        $this->panDeskovekManager->RemoveGameNight($postID);
        $this->flashMessage('Herní sezení bylo odstraněno', 'success');
        $this->redirect('Homepage:default');
    }
}