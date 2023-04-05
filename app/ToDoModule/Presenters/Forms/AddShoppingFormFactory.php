<?php

declare(strict_types=1);

namespace App\ToDoModule\Forms;

use Nette;
use Nette\Application\UI\Form;;
use app\model\orm\Shopping;
use app\model\orm\Model;

final class AddShoppingFormFactory
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
        
        $form->addTextArea('goods', null )
        ->setRequired();
        $form->addImageButton('send', '../img/toDo/add.png');
        $form->onSuccess[] = [$this, 'addShoppingFormSucceeded'];

        return $form;
    }
        
    public function addShoppingFormSucceeded(Form $form, $data)
    {
        $shopping = new Shopping();
        $shopping->goods = $data->goods;

        $this->model->shopping->persistAndFlush($shopping);
    }
}
