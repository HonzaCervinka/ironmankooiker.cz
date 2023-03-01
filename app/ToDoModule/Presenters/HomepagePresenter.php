<?php

declare(strict_types=1);

namespace App\ToDoModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use Nette\ComponentModel\IComponent;
use app\model\orm\ShoppingRepository;
use app\model\orm\TasksRepository;
use app\model\orm\Shopping;
use app\model\orm\Task;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var ShoppingRepository @inject */
    public $shoppingRepository;

    /** @var TasksRepository @inject */
    public $tasksRepository;
        
    /**
     * renderDefault
     * načte obsah z databáze a pošle je do šablony, která se vykreslí
     * @return void
     */
    public function renderDefault(): void
    {
        $this->template->shopping = $this->shoppingRepository->findAll();
            
        $this->template->tasks = $this->tasksRepository->findAll();
    }

    /**
     * handleRemoveShop
     * smazání prvu z databáze pro nakup
     * @param  mixed $id
     * @return void
     */
    public function handleRemoveShop($id)
    {
        $goods = $this->shoppingRepository->getById($id);

        $this->shoppingRepository->removeAndFlush($goods);
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
        $task = $this->tasksRepository->getById($id);

        $this->tasksRepository->removeAndFlush($task);
        $this->redirect('this');
    }
    
    /**
     * createComponentShopForm
     * vytvoří formulář pro vložení do databaze
     * @return Form
     */
    protected function createComponentShopForm(): Form
    {
        $form = new Form;
        $form->addTextArea('goods', null )
        ->setRequired();

        $form->addImageButton('send', '../img/toDo/add.png');

        $form->onSuccess[] = [$this, 'shopFormSucceeded'];

        return $form;
    }


    public function shopFormSucceeded(Form $form, $data): void
    {
        $shopping = new Shopping();
        $shopping->goods = $data->goods;

        $this->shoppingRepository->persistAndFlush($shopping);
        $this->redirect('this');
    }

        protected function createComponentAddGameForm(): Form
    {
        $form = $this->addGameFormFactory->create();
        $form->onSuccess[] = function (Form $form) {
			$this->redirect("Homepage:default");
		};
        return $form;
    }
    
    /**
     * createComponentTasksForm
     * vytvoří formulář pro vložení do databaze ukolu
     * @return Form
     */
    protected function createComponentTasksForm(): Form
    {
        $form = new Form;
        $form->addTextArea('task', null )
        ->setRequired();

        $form->addImageButton('send', '../img/toDo/add.png');

        $form->onSuccess[] = [$this, 'tasksFormSucceeded'];

        return $form;
    }

    /**
     * shopFormSucceeded
     * přidá ukol do seznamu
     * @param  mixed $data
     * @return void
     */
    public function tasksFormSucceeded(Form $form, $data): void
    {
        $tasks = new Task();
        $tasks->task = $data->task;

        $this->tasksRepository->persistAndFlush($tasks);
        $this->redirect('this');
    }
}
