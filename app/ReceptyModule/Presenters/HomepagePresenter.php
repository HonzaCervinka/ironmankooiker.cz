<?php

declare(strict_types=1);

namespace App\ReceptyModule\Presenters;

use Nette;
use App\Model\ArticleManager;
use App\Presenters\BasePresenter;
use Nette\Application\AbortException;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\ArrayHash;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var ArticleManager Model pro správu s článků. */
    private $articleManager;

    /**
     * Konstruktor s injektovaným modelem pro správu článků.
     * @param ArticleManager $travelManager automaticky injektovaný model pro správu článků
     */
    public function __construct(ArticleManager $articleManager)
    {
        parent::__construct();
        $this->articleManager = $articleManager;
    }
    
    /** Načte a předá seznam článků do šablony. */
    public function renderDefault()
    {
        $this->template->posts = $this->articleManager->getTravels();
    }

    /**
     * Načte a předá článek do šablony podle jeho ID.
     * @param string|null $postId ID článku
     */
    public function renderPost(int $postId)
    {
        $this->template->post = $this->articleManager->getTravel($postId);
    }

    public function actionRemove(int $postID)
    {
        $this->articleManager->removeArticle($postID);
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
            if (!($article = $this->articleManager->getTravel($postID)))
                $this->flashMessage('Článek nebyl nalezen.'); // Výpis chybové hlášky.
            else $this['editorForm']->setDefaults($article); // Předání hodnot článku do editačního formuláře.
        }
    }

    protected function createComponentEditorForm(): Form
    {
        $form = new Form;
        $form->addText('title', 'Titulek:')
            ->setRequired();
        $form->addTextArea('content', 'Obsah:');
         //   ->setRequired();

        $form->addSubmit('send', 'Uložit a publikovat');
        $form->onSuccess[] = [$this, 'editorFormSucceeded'];
    
        return $form;
    }

    public function editorFormSucceeded(ArrayHash $data)
    {
        $post = $this->articleManager->saveArticle($data);
        $this->flashMessage('Článek byl úspěšně uložen.');
        $this->redirect('Homepage:Post', $post->id );
    }
}