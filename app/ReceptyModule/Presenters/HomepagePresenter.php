<?php

declare(strict_types=1);

namespace App\ReceptyModule\Presenters;

use Nette;
use App\Model\ReceptyManager;
use App\Presenters\BasePresenter;
use Nette\Application\AbortException;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\ArrayHash;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var ReceptyManager Model pro správu s článků. */
    private $receptyManager;

    /**
     * Konstruktor s injektovaným modelem pro správu článků.
     * @param ReceptyManager $travelManager automaticky injektovaný model pro správu článků
     */
    public function __construct(ReceptyManager $receptyManager)
    {
        parent::__construct();
        $this->receptyManager = $receptyManager;
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
        $this->template->posts = $this->receptyManager->getRecipes();
    }

    /**
     * Načte a předá článek do šablony podle jeho ID.
     * @param string|null $postId ID článku
     */
    public function renderPost(int $postId)
    {
        $this->template->post = $this->receptyManager->getRecipe($postId);
    }
    
    /**
     * actionRemove
     * Odstrani recept podle parametru ID
     * @param  mixed $postID
     * @return void
     */
    public function actionRemove(int $postID)
    {
        $this->receptyManager->removeRecipe($postID);
        $this->flashMessage('Článek byl úspěšně odstraněn.');
        $this->redirect('Homepage:default');
    }
    
    /**
     * Vykresluje formulář pro editaci článku podle zadané ID.
     * Pokud ID není zadána, nebo článek s daným ID neexistuje, vytvoří se nový.
     * @param int $postID ID článku
     */
    public function actionEditor(int $postID = null)
    {
        if ($postID) {
            if (!($article = $this->receptyManager->getRecipe($postID)))
                $this->flashMessage('Článek nebyl nalezen.'); // Výpis chybové hlášky.
            else $this['editorForm']->setDefaults($article); // Předání hodnot článku do editačního formuláře.
        }
    }
    
    /**
     * createComponentEditorForm
     * Vykresli formular
     * @return Form
     */
    protected function createComponentEditorForm(): Form
    {
        $form = new Form;
        $form->addText('title')
            ->setRequired()
            ->setHtmlAttribute('placeholder', 'Název receptu');
        $form->addTextArea('recipe')
            ->setHtmlAttribute('placeholder', 'Postup');
        $form->addSubmit('send', 'Uložit')
            ->setHtmlAttribute('class', 'btn btn-success');
        $form->onSuccess[] = [$this, 'editorFormSucceeded'];
        return $form;
    }

    public function editorFormSucceeded(ArrayHash $data)
    {
        $post = $this->receptyManager->saveRecipe($data);
        $this->flashMessage('Článek byl úspěšně uložen.');
        $this->redirect('Homepage:Post', $post->recipes_id );
    }

    public function actionSignOut()
    {
        $this->getUser()->logout(true);
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect(':Admin:Homepage:default');
    }
}