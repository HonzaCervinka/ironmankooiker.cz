<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use App\Model\PanDeskovekManager;
use Nette\Utils\ArrayHash;

abstract class BasePresenter extends Presenter
{
        /** @var PanDeskovekManager Model pro správu s článků. */
        public $panDeskovekManager;

        /**
         * Konstruktor s injektovaným modelem pro správu článků.
         * @param PanDeskovekManager $travelManager automaticky injektovaný model pro správu článků
         */
        public function __construct(PanDeskovekManager $panDeskovekManager)
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
        $form = new Form();
        $form->addText('name', 'Jméno hry:');

        $form->addSubmit('send', 'Uložit hru');
        $form->onSuccess[] = [$this, 'addGameFormSucceeded'];
        return $form;
    }

    public function addGameFormSucceeded(ArrayHash $data)
    {
        if (!$this->getUser()->isAllowed('PanDeskovek', 'addGame')) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění.');
            $this->redirect('this');
        }
        $post = $this->panDeskovekManager->saveBoardgame($data);
        $this->flashMessage('Hra byla úspěšně přidána');
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

    public function getTemplatesAssoc(): array
    {
	return $this->panDeskovekManager->getBoardgames()->fetchAssoc('boardgame_id=name');
    }

    public function addGameNightFormSucceeded(ArrayHash $data)
    {
        if (!$this->getUser()->isAllowed('PanDeskovek', 'addGame')) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění.');
            $this->redirect('this');
        }
        $post = $this->panDeskovekManager->saveGameNight($data);
        $this->flashMessage('Hra byla úspěšně přidána');
        $this->redirect('this');
    }

    public function actionSignOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect(':Admin:Homepage:default');
    }

}