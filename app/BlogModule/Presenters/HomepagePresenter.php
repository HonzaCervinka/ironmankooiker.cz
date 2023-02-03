<?php

declare(strict_types=1);

namespace App\BlogModule\Presenters;

use Nette;
use App\Model\ArticleManager;
use App\Presenters\BasePresenter;
use Nette\Application\AbortException;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\ArrayHash;
use Nette\Utils\Image;


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
        $this->template->posts = $this->articleManager->getTravels(0);
    }

    /**
     * Načte a předá článek do šablony podle jeho ID.
     * @param string|null $postId ID článku
     */
    public function renderPost(int $postId)
    {
        $this->template->post = $this->articleManager->getTravel($postId);
    }
    
    /**
     * actionRemove
     * Odstrani clanek
     * @param  mixed $postID
     * @return void
     */
    public function actionRemove(int $postID)
    {
        $this->articleManager->removeArticle($postID);
        $this->flashMessage('Článek byl úspěšně odstraněn.', 'primary');
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
        $form->addText('title', 'Název')
            ->setRequired();
        $form->addUpload('photo_title', 'Vyber');
        $form->addTextArea('content', 'Obsah');
         //   ->setRequired();
        $form->addSubmit('send', 'Uložit a publikovat')
            ->setHtmlAttribute('class', 'btn btn-success');
        $form->onSuccess[] = [$this, 'editorFormSucceeded'];
        return $form;
    }

    public function actionSignOut()
    {
        $this->getUser()->logout(true);
        $this->flashMessage('Odhlasil ses', 'info');
        $this->redirect(':Admin:Homepage:default');
    }

    public function editorFormSucceeded(ArrayHash $data)
    {
        if($data['photo_title']->hasFile()){
            $data['photo_title']->move(__DIR__.'/../../../www/img/blog/nahled/'.$data['title'].'_title.jpg');
            $image = Image::fromFile(__DIR__.'/../../../www/img/blog/nahled/'.$data['title'].'_title.jpg');
            $image->resize(1920,1080, Image::EXACT);
            $image->save(__DIR__.'/../../../www/img/blog/nahled/'.$data['title'].'_title.jpg');
            $data['photo_title'] = $data['title'].'_title.jpg';
        }
        $post = $this->articleManager->saveArticle($data);
        $this->flashMessage('Článek byl úspěšně uložen.');
        $this->redirect('Homepage:Post', $post->id );
    }   

    public function actiontinymceInsertImage(): void
    {
        $uploadPath = __DIR__.'/../../../www/img/blog/clanky/';
        $pathToImage = '/ironmankooiker.cz/img/blog/clanky/';

        $insertedImage = $this->getHttpRequest()->getFile('file');

        $uniqid = uniqid();
		$file_name_image = $uniqid . '-' . $insertedImage->getName();

        $insertedImage->move($uploadPath . $file_name_image);

        $image = Image::fromFile($uploadPath . $file_name_image);
        $image->resize(1180, 1920, Image::FIT);
        $image->save($uploadPath . $file_name_image, 100, Image::JPEG);

        $link = $pathToImage . $file_name_image;
        $this->sendJson([
            'location' => ($pathToImage . $file_name_image),
        ]);
    }
}