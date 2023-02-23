<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use App\Model\PanDeskovekManager;

final class AddGameFormFactory
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
        
        $form->addText('name', 'Jméno hry:');
        $form->addSubmit('send', 'Uložit hru');
        $form->onSuccess[] = [$this, 'addGameFormSucceeded'];

        return $form;
    }
        
    public function addGameFormSucceeded(ArrayHash $data)
    {
        $post = $this->panDeskovekManager->saveBoardgame($data);
    }


}