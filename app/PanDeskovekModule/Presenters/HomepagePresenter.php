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

final class HomepagePresenter extends BasePresenter
{



    public function renderDefault()
    {
        $this->template->boardGames = $this->panDeskovekManager->getBoardgames();
        $this->template->gameNights = $this->panDeskovekManager->getGameNights();
        $this->template->playersPosition = $this->panDeskovekManager->getPlayerVictory();
    }
}