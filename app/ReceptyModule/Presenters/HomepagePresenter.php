<?php

declare(strict_types=1);

namespace App\ReceptyModule\Presenters;

use Nette;

use App\Presenters\BasePresenter;
use Nette\Application\AbortException;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Form;
use App\ReceptyModule\Forms\EditorRecipesFormFactory;
use app\model\orm\Model;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var Model @inject */
    public $model;

    public function __construct(
        private EditorRecipesFormFactory $editorRecipesFactory,
        )
    {
    }
    
    protected function startup(): void {
        parent::startup();
        if (!$this->getUser()->isAllowed($this->getName(), $this->getAction())) {
            $this->flashMessage('Pro tuto akci nemáš dostatečná oprávnění.');
            $this->redirect(':Admin:Homepage:default');
        }
    }
    
    /** Načte a předá seznam článků do šablony. */
    public function renderDefault()
    {
        $this->template->posts = $this->model->recipe->findAll();
    }

    /**
     * Načte a předá článek do šablony podle jeho ID.
     * @param string|null $id ID článku
     */
    public function renderPost(int $id)
    {
        $this->template->post = $this->model->recipe->getById($id);
    }
        
    /**
     * handleRemoveRecipe
     * mazání prvu z databáze pro nakup
     * @param  mixed $id
     * @return void
     */
    public function handleRemoveRecipe($id)
    {
        $recipe = $this->model->recipe->getById($id);
        $this->model->recipe->removeAndFlush($recipe);
        $this->redirect('this');
    }
    
    /**
     * Vykresluje formulář pro editaci článku podle zadané ID.
     * Pokud ID není zadána, nebo článek s daným ID neexistuje, vytvoří se nový.
     * @param int $postID ID článku
     */
    public function actionEditor(int $id = null)
    {
        if ($id) {
            if (!($recipe = $this->model->recipe->getById($id)))
                $this->flashMessage('Článek nebyl nalezen.'); // Výpis chybové hlášky.
            else $this['editorRecipesForm']->setDefaults([
                'id' => $recipe->id,
                'title' => $recipe->title,
                'recipe' => $recipe->recipe,
            ]); // Předání hodnot článku do editačního formuláře.
        }
    }
    
    /**
     * createComponentEditorRecipesForm
     * Vykresli formular
     * @return Form
     */
    protected function createComponentEditorRecipesForm(): Form
    {
        $form = $this->editorRecipesFactory->create();
        $form->onSuccess[] = function (Form $form) {
            $this->redirect('Homepage:default');
		};
        return $form;
    }

    public function actionSignOut()
    {
        $this->getUser()->logout(true);
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect(':Admin:Homepage:default');
    }
}