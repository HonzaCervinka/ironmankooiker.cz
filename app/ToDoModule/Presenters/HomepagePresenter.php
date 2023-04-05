<?php

declare(strict_types=1);

namespace App\ToDoModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use Nette\ComponentModel\IComponent;
use app\model\orm\Model;
use App\ToDoModule\Forms\AddShoppingFormFactory;
use App\ToDoModule\Forms\AddTasksFormFactory;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var Model @inject */
    public $model;
        
    public function __construct(
        public AddShoppingFormFactory $addShoppingFormFactory,
        public AddTasksFormFactory $addTasksFormFactory,
        )
    {
    }

    /**
     * renderDefault
     * načte obsah z databáze a pošle je do šablony, která se vykreslí
     * @return void
     */
    public function renderDefault(): void
    {
        $this->template->shopping = $this->model->shopping->findAll();
            
        $this->template->tasks = $this->model->task->findAll();
    }

    /**
     * handleRemoveShop
     * smazání prvu z databáze pro nakup
     * @param  mixed $id
     * @return void
     */
    public function handleRemoveShop($id)
    {
        $goods = $this->model->shopping->getById($id);

        $this->model->shopping->removeAndFlush($goods);
        $this->redirect('this');
    }

    /**
     * handleRemoveTasks
     * smazání prvu z databáze ukolu
     * @param  mixed $id
     * @return void
     */
    public function handleRemoveTasks($id)
    {
        $task = $this->model->task->getById($id);

        $this->model->task->removeAndFlush($task);
        $this->redirect('this');
    }
        
    /**
     * createComponentAddShoppingForm
     * vytvoří formulář pro vložení do databaze
     * @return Form
     */
    protected function createComponentAddShoppingForm(): Form
    {
        $form = $this->addShoppingFormFactory->create();
        $form->onSuccess[] = function (Form $form) {
			$this->redirect("Homepage:default");
		};
        return $form;
    }

    /**
     * createComponentAddTasksForm
     * vytvoří formulář pro vložení do databaze
     * @return Form
     */
    protected function createComponentAddTasksForm(): Form
    {
        $form = $this->addTasksFormFactory->create();
        $form->onSuccess[] = function (Form $form) {
			$this->redirect("Homepage:default");
		};
        return $form;
    }
}
