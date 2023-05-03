<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Forms;

use app\model\orm\Boardgame_list;
use Nette;
use Nette\Application\UI\Form;
use App\Model\PanDeskovekManager;
use app\model\orm\GameNight;
use app\model\orm\Model;

class AddGameNightFormFactory
{
    use Nette\SmartObject;

    public function __construct(
        private FormFactory $factory,
        private Model $model,
        )
	{}

    public function create(): Form
    {
        $form = $this->factory->create();
        
        $form->addText('date', 'Datum hraní:')
            ->setHtmlType('date');
        $boardgames = $this->model->boardgame_list->findAll()->orderBy('name')->fetchPairs('id', 'name');   
        $form->addSelect('idGame', 'Hra:', $boardgames);
        $form->addCheckbox('honza', 'Honza');
        $form->addCheckbox('michal', 'Michal');
        $form->addCheckbox('sevi', 'Ševi');
        $form->addCheckbox('johny', 'Johny');
        $form->addSubmit('send', 'Uložit sezení');
        $form->onSuccess[] = [$this, 'addGameNightFormSucceeded'];

        return $form;
    }
        
    public function addGameNightFormSucceeded(Form $form, $data)
    {

        $gameNight = new GameNight();

        $gameNight->date = $data->date;
        $gameNight->idGame = $this->model->boardgame_list->getById($data->idGame);
        $gameNight->honza = (bool) $data->honza;
        $gameNight->michal = (bool) $data->michal;
        $gameNight->sevi = (bool) $data->sevi;
        $gameNight->johny = (bool) $data->johny;

        $this->model->gameNight->persistAndFlush($gameNight);
    }
}