<?php

declare(strict_types=1);

namespace App\WebModule\Presenters;

use Nette;
use App\Presenters\BasePresenter;
use App\Model\orm\Travel_postsRepository;

final class CestovaniPresenter extends Nette\Application\UI\Presenter
{
        /** @var Travel_postsRepository @inject */
        public $travel_postsRepository;

        /** Načte a předá seznam článků do šablony. */
        public function renderDefault()
        {
            $this->template->posts = $this->travel_postsRepository->findAll();
        }
        
        /**
         * renderPost
         *Načte a předá článek do šablony podle jeho ID.
         * @param  mixed $postId
         * @return void
         */
        public function renderPost(int $postId)
        {
            $this->template->post = $this->travel_postsRepository->getById($postId);
            
        }
}