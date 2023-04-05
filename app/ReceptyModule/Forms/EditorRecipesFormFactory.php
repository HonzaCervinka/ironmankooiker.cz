<?php

declare(strict_types=1);

namespace App\ReceptyModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use app\model\orm\Model;
use app\model\orm\Recipe;

final class EditorRecipesFormFactory
{
    use Nette\SmartObject;

    public function __construct(
        private FormFactory $factory, 
        private Model $model,
        )
	{}

    public function create(): Form
    {
        $form = $this->factory->create();
        
        $form->addHidden('id');
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
        
    public function editorRecipesFormSuccess(Form $form, $data)
    {
        $recipe = $data->id ? $this->model->recipe->getById($data->id) : new Recipe(); // kontrola, zda se jedná o úpravu nebo přidání
        $recipe->title = $data->title;
        $recipe->recipe = $data->recipe;

        $this->model->recipe->persistAndFlush($recipe);
    }


}