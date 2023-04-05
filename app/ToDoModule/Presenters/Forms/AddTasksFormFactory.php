<?php

declare(strict_types=1);

namespace App\ToDoModule\Forms;

use Nette;
use Nette\Application\UI\Form;;
use app\model\orm\Task;
use app\model\orm\Model;

final class AddTasksFormFactory
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
        
        $form->addTextArea('task', null )
        ->setRequired();
        $form->addImageButton('send', '../img/toDo/add.png');
        $form->onSuccess[] = [$this, 'addTasksFormSucceeded'];

        return $form;
    }
        
    public function addTasksFormSucceeded(Form $form, $data)
    {
        $task = new Task();
        $task->task = $data->task;

        $this->model->task->persistAndFlush($task);
    }
}
