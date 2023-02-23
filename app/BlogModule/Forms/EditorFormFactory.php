<?php

declare(strict_types=1);

namespace App\BlogModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use App\Model\ArticleManager;
use Nette\Utils\ArrayHash;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\Image;
use App\BlogModule\Presenters\HomepagePresenter;
use Nette\SmartObject;

final class EditorFormFactory
{

    public function __construct(
        private FormFactory $factory, 
        private ArticleManager $articleManager,
        )
	{
    }

    public function create(): Form
    {
        $form = $this->factory->create();
        
        $form->addText('title', 'Název')
            ->setRequired();
        $form->addUpload('photo_title', 'Vyber');
        $form->addText('date', 'Datum')
            ->setHtmlType('date')
            ->setRequired();
        $form->addTextArea('content', 'Obsah');
         //   ->setRequired();
        $form->addSubmit('send', 'Uložit a publikovat')
            ->setHtmlAttribute('class', 'btn btn-success');
        $form->onSuccess[] = [$this, 'editorFormSucceeded'];
        return $form;
    }
        
    public function editorFormSucceeded(Arrayhash $data)
    {

        if($data['photo_title']->hasFile())
        {
         $uploadPath = __DIR__.'/../../../www/img/blog/nahled/';
         $uniqid = uniqid();
         
         $file_name_image = 'nahled-' . $uniqid . $data['photo_title']->getName();
         $data['photo_title']->move($uploadPath .  $file_name_image);
         $image = Image::fromFile($uploadPath . $file_name_image);
         $image->resize(1920,1080, Image::EXACT);
         $completFilePath = $uploadPath . $file_name_image;
         $this->fixRotateImage($image, $completFilePath);
         
         $image->save($uploadPath . $file_name_image, 80, Image::JPEG);
         $data['photo_title'] = $file_name_image;
     }
     $post = $this->articleManager->saveArticle($data);
    }

    public function fixRotateImage($image, $completFilePath) {
        $ex = @exif_read_data($completFilePath, 'EXIF');
        if(!empty($ex['Orientation'])) {
            switch($ex['Orientation']) {
                case 8:
                    $image->rotate(90, 0);
                    break;
                case 3:
                    $image->rotate(180, 0);
                    break;
                case 6:
                    $image->rotate(-90, 0);
                    break;
            }
        }
    }
}