<?php

declare(strict_types=1);

namespace App\ReceptyModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use App\Model\ReceptyManager;
use Nette\Utils\ArrayHash;

final class EditorRecipesFormFactory
{
    use Nette\SmartObject;

    public function __construct(
        private FormFactory $factory, 
        private ReceptyManager $receptyManager,
        )
	{}

    public function create(): Form
    {
        $form = $this->factory->create();
        
        $form->addText('title')
            ->setRequired()
            ->setHtmlAttribute('placeholder', 'Název receptu');
        $form->addTextArea('recipe')
            ->setHtmlAttribute('placeholder', 'Postup');
        $form->addSubmit('send', 'Uložit')
            ->setHtmlAttribute('class', 'btn btn-success');
        $form->onSuccess[] = [$this, 'editorRecipesFormSuccess'];

        return $form;
    }
        
    public function editorRecipesFormSuccess(Arrayhash $data)
    {
        $post = $this->receptyManager->saveRecipe($data);
    }


}