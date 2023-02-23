<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use App\Model\PanDeskovekManager;

final class AddGameNightFormFactory
{
    use Nette\SmartObject;

    public function __construct(
        private FormFactory $factory,
        private PanDeskovekManager $panDeskovekManager,
        )
	{}

    public function create(): Form
    {
        $form = $this->factory->create();
        
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
        $post = $this->panDeskovekManager->saveGameNight($data);
    }

    public function getTemplatesAssoc(): array
    {
	return $this->panDeskovekManager->getBoardgames()->fetchAssoc('boardgame_id=name');
    }
}