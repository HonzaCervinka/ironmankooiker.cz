<?php

declare(strict_types=1);

namespace App\WebModule\Presenters;

use Nette;
use App\Model\ArticleManager;
use App\Presenters\BasePresenter;

final class CestovaniPresenter extends Nette\Application\UI\Presenter
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
}