<?php

declare(strict_types=1);

namespace App\ToDoModule\Presenters;

use Nette;
use Nette\Application\UI\Form;
use Nette\ComponentModel\IComponent;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
	private Nette\Database\Explorer $database;
	
	/**
	 * __construct
	 * slouzi k pripojeni k databazi
	 * @param  mixed $database
	 * @return void
	 */
	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

    /**
     * renderDefault
     * načte obsah z databáze a pošle je do šablony, která se vykreslí
     * @return void
     */
    public function renderDefault(): void
    {
        $this->template->shopping = $this->database
            ->table('shopping')
            ->order('id');
            
        $this->template->tasks = $this->database
            ->table('tasks')
            ->order('id');   
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

    /**
     * shopFormSucceeded
     * přidá nákup do seznamu
     * @param  mixed $data
     * @return void
     */
    public function shopFormSucceeded(array $data): void
    {
        $shop = $this->database
            ->table('shopping')
            ->insert($data);

            $this->redirect(':Default');
    }
    
    /**
     * handleRemoveShop
     * smazání prvu z databáze pro nakup
     * @param  mixed $id
     * @return void
     */
    public function handleRemoveShop($id)
    {
        $this->database->query('DELETE FROM shopping WHERE id = ?', $id);
        $this->redirect(':Default');
    }

    /**
     * renderTasks
     * načte obsah z databáze ukolu a pošle je do šablony, která se vykreslí
     * @return void
     */
    public function renderTasks(): void
    {
        $this->template->tasks = $this->database
            ->table('tasks')
            ->order('id');        
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
    public function tasksFormSucceeded(array $data): void
    {
        $shop = $this->database
            ->table('tasks')
            ->insert($data);

            $this->redirect(':Default');
    }

    /**
     * handleRemoveTasks
     * smazání prvu z databáze ukolu
     * @param  mixed $id
     * @return void
     */
    public function handleRemoveTasks($id)
    {
        $this->database->query('DELETE FROM tasks WHERE id = ?', $id);
        $this->redirect(':Default');
    }
}
