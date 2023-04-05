<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Presenters;

use Nette;
use App\Model\PanDeskovekManager;
use App\PanDeskovekModule\Presenters\BasePresenter;
use Nette\Application\AbortException;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\ArrayHash;
use App\Model\orm\Boardgame_listRepository;
use App\Model\orm\GameNightRepository;



final class HomepagePresenter extends BasePresenter
{
    /** @var Boardgame_listRepository @inject */
    public $boardgame_listRepository;

    /** @var GameNightRepository @inject */
    public $gameNightRepository;

    public function renderDefault()
    {
        $this->template->boardGames = $this->boardgame_listRepository->findAll()->orderBy('name');
        $this->template->gameNights = $this->gameNightRepository->test();
    //    $this->template->gameNights = $this->panDeskovekManager->getGameNights();
        $this->template->playersPosition = $this->panDeskovekManager->getPlayerVictory();
    }
}